<?php

namespace JK;

class Autoloader {

	protected static $instance;

	private $prefix_class;
	private $suffix_file;

	/**
	 * @type AutoloadCacheManager
	 */
	private $cacheManager;

	private $standardDirSeparator;

	private $listSearchDirectory;

	private $exploratedFiles;

	private $recursiveDirs;
	private $recursiveExplored = false;

	private $includes;

	const CURRENT_DIR = '.';
	const PREVIOUS_DIR = '..';
	

	private function __construct(){
		spl_autoload_register(array($this, 'autoload'));
		$this->cacheManager = new JsonFileCache;
		$this->standardDirSeparator = '_';
		$this->suffix_file = '.php';		
		$this->listSearchDirectory = array();
		$this->exploratedFiles = $this->includes = array();
	}

	public static function getInstance(){
		if( empty(self::$instance) ){
			self::$instance = new Autoloader;
		}
		return self::$instance;
	}

	public function setPrefix( $prefix ){
		$this->prefix_class = $prefix;
		return $this;
	}
	public function setSuffix( $suffix ){
		$this->suffix_file = $suffix;
		return $this;
	}

	public function setCacheManager( AutoloadCacheManager $manager ){
		$this->cacheManager = $manager;
		return $this;
	}

	public function addDirectory( $dir ){		
		if( !in_array($dir, $this->listSearchDirectory) ){			
			$dir = rtrim( $dir, DIRECTORY_SEPARATOR );
			$this->listSearchDirectory [] = $dir;
		}		
		return $this;
	}

	public function addEntireDirectory( $dir ){
		$this->recursiveDirs [] = $dir;		
		return $this;
	}

	private function exploreRecursiveDirs(){
		foreach($this->recursiveDirs as $dir){
			$this->exploreDir( $dir );
		}
		$this->recursiveExplored = true;
	}

	private function exploreDir($dir){
		$this->addDirectory( $dir );
		$fd = opendir( $dir );
		while( $file = readdir( $fd ) ){
			if( $file != self::CURRENT_DIR && $file != self::PREVIOUS_DIR && is_dir( $dir . DIRECTORY_SEPARATOR . $file ) ){
				$this->exploreDir( $dir . DIRECTORY_SEPARATOR . $file );
			}
		}
		closedir( $fd );
	}

	public function standardInclude( $classname ){
		$path = str_replace( array( '\\', $this->standardDirSeparator ), DIRECTORY_SEPARATOR, $classname );
		if( !empty( $this->prefix_class ) ){			
			$path = $this->removePrefixClass( $path );
		}
		$path .= $this->suffix_file;
		$path = ltrim( $path, DIRECTORY_SEPARATOR );
		foreach( $this->listSearchDirectory as $dir ){			
			$filepath = $dir . DIRECTORY_SEPARATOR . $path;
			if( file_exists( $filepath ) ){						
				return $filepath;
			}
		}
		throw new NotStandardInclude;
	}		

	protected function removePrefixClass( $path ){
		$elements = explode( DIRECTORY_SEPARATOR, $path );
		$len = sizeof( $elements );
		$elements [ $len-1 ] = str_replace( $this->prefix_class, '', $elements [ $len-1 ]);
		return implode( DIRECTORY_SEPARATOR, $elements );
	}

	public function autoloadInDir( $classname, $suffix = '' ){
		$found = false;				
		foreach( $this->listSearchDirectory as $dir ){
			$fd = opendir( $dir );			
			while( $file = readdir( $fd ) ){
				$completePath = $dir . DIRECTORY_SEPARATOR . $file;
				$testSuffix = empty( $suffix ) ? $this->suffix_file : $suffix;
				if( false != strpos($file, $testSuffix) && !in_array( $completePath, $this->exploratedFiles ) ){
					$tokens = array_filter( token_get_all( file_get_contents( $completePath ) ), 'is_array' );
					$addNextString = false;
					$namespace = '';
					$addNextStringNamespace = false;					
					foreach( $tokens as $token ){				
						if( $addNextStringNamespace ) {							
							if( $token[0] === T_STRING  || $token[0] === T_NS_SEPARATOR || $token[0] === T_WHITESPACE){
								$namespace .= $token[1];
							} else {
								$namespace = str_replace(' ','',trim($namespace));
								$addNextStringNamespace = false;
							}		
						}
						if( $addNextString && $token[0] === T_STRING ){
							$completeName = empty( $namespace ) ? $token[1] : $namespace . '\\' . $token[1];
							$this->cacheManager->addPath( $completeName, $completePath );
							if( $completeName == $classname ){
								$found = true;
							}
							$addNextString = false;												
						} else if( $token[0] === T_CLASS || $token[0] === T_INTERFACE ){
							$addNextString = true;
						} else if( $token[0] === T_NAMESPACE ) {
							$namespace = '';
							$addNextStringNamespace = true;							
						}
					}
					if( $found ){
						closedir( $fd );
						$this->exploratedFiles[] = $completePath;
						return true;
					}
				} else {
					continue;
				}
				$this->exploratedFiles[] = $completePath;
			}
			closedir( $fd );
		}
		return false;
	}


	public function autoload( $classname ){		
		if( $this->cacheManager->exists( $classname ) ){
			$path = $this->cacheManager->getPath( $classname );
		} else {
			if(empty($this->listSearchDirectory)){
				$this->listSearchDirectory [] = self::CURRENT_DIR;
			}
			try{
				$path = $this->standardInclude( $classname );
				$this->cacheManager->addPath( $classname, $path );
			} catch ( NotStandardInclude $e ){
				if(!$this->recursiveExplored){
					$this->exploreRecursiveDirs();
				}
				if( $this->autoloadInDir( $classname ) ){
					return $this->autoload( $classname );
				}
			}
		}
		if( isset( $path ) && !in_array( $path, $this->includes ) ){
			require $path;		
			$this->includes []	= $path;
			return true;
		} else {
			throw new UnfoundClass( $classname );
		}
	}


	public function __destruct(){
		$this->cacheManager->save();
	}
}


//Cache Manager
interface AutoloadCacheManager {
	public function exists( $classname );
	public function getPath( $classname );
	public function addPath( $classname, $path );
	public function save();
}

class JsonFileCache implements AutoloadCacheManager {
	private $cache = array();
	private $loaded = false;

	const FILENAME = 'class_loader_cache.json';	

	protected function init(){
		if( !$this->loaded && file_exists( __DIR__ . DIRECTORY_SEPARATOR . self::FILENAME ) ){			
			$this->cache = json_decode( file_get_contents( __DIR__ . DIRECTORY_SEPARATOR . self::FILENAME ), true );
		}
		$this->loaded = true;
	}

	public function exists( $classname ){
		$this->init();		
		return array_key_exists( $classname, $this->cache );
	}
	public function getPath( $classname ){
		$this->init();
		return $this->cache[$classname];
	}
	public function addPath( $classname, $path ){
		$this->init();
		$this->cache[$classname] = $path;		
		return $this;
	}
	public function save(){				
		file_put_contents( __DIR__. DIRECTORY_SEPARATOR .self::FILENAME, json_encode( $this->cache ) );
	}
}


//Exceptions
class NotStandardInclude extends \Exception {}
class UnfoundClass extends \Exception {}