<?php

/**
 * News
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    epharma
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class News
{
	protected $erreur=array(),
			  $_idnews,
			  $_titre,
			  $_contenu,
			  $_dateajout,
			  $_illustration,
			  $_redacteur;
	
	
	const  TITRE_INVALIDE=1;
	const  CONTENU_INVALIDE=2;
	const  ILLUSTRATION_INVALIDE=4;
	const  REDACTEUR_INVALIDE=5;
			  
	public function __construct($valeur=array())
	{
		if(!empty($valeur))
		{
			$this->hydrate($valeur);
		}
	}
	
	public function hydrate($donnees)
	{
		foreach($donnees as $attribut => $valeur)
		{
			$methode= 'set'.ucfirst($attribut);
			if (is_callable(array($this, $methode)))
			{
				$this->$methode($valeur);
			}
		}
	}
	
	public function isNew()
	{
		return empty($this->_idnews);
	}
	
	public function isValid()
	{
		return !(empty($this->_titre)||empty($this->_contenu)||empty($this->_illustration)||empty($this->_redacteur));	
	}
	
	//LISTE DES SETTERS
	
	public function setIdnews($idnews)
	{
		$this->_idnews=(int)htmlspecialchars($idnews);
	}
	
	public function setTitre($titre)
	{
		if(is_string($titre)&&strlen($titre)<=60)
		{
			$this->_titre=(string)nl2br(strip_tags($titre));
			
		}
		else
		{
			$this->erreur[]=self::TITRE_INVALIDE;
		}
	}
	
	public function setContenu($contenu)
	{
		if(is_string($contenu)&&!empty($contenu))
		{
			$this->_contenu=nl2br((string)strip_tags($contenu));
			
		}
		else
		{
			$this->erreur[]=self::CONTENU_INVALIDE;
		}
	}
	
	public function setDateajout($dateajout)
	{
		if(is_string($dateajout)&& preg_match('`[0-9]{2}/[0-9]{2}/[0-9]{4}`', $dateajout))
		{
			$this->_dateajout=htmlspecialchars($dateajout);
		}
	}
	
	public function setIllustration($illustration)
	{
		if(is_string($illustration)&&!empty($illustration)&&strlen($illustration)<=30)
		{
			$this->_illustration=(string)$illustration;
		}
		else
		{
			$this->erreur[]=self::ILLUSTRATION_INVALIDE;
		}
	}
	
	public function setRedacteur($redacteur)
	{
		$this->_redacteur=(int)htmlspecialchars($redacteur);
		
	}
	
	//LISTE DES GETTERS
	
	public function idnews()
	{
		return $this->_idnews;
	}
	
	public function titre()
	{
		return $this->_titre;
	}
	
	public function contenu()
	{
		return $this->_contenu;
	}
	public function dateajout()
	{
		return $this->_dateajout;
	}
	public function illustration()
	{
		return $this->_illustration;
	}
	public function redacteur()
	{
		return $this->_redacteur;
	}
	
	public function erreur()
	{
		return $this->_erreur;
	}
	
}