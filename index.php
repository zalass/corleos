<?php
	require_once ('/config/config.php');
	require_once ('/config/autoloader.php');
	JK\Autoloader::getInstance()
	->addDirectory('big_class')
	->addEntireDirectory('big_class');
	$db = Dbfactory::getMysqlConnexionWithPDO();
	
	$action =  isset($_GET['action']) ? $_GET['action'] : "";
	
	switch($action) {
		
		case 'produits':
		    produits($db);
			break;
		case 'pharmacies':
		    pharmacies($db);
			break;
        case 'conseils':
            conseils($db);
			break;
		default:
		    homepage($db);
	}
	
	function produits($db){
		$results = array();
		$manager = new ProduitsManager_PDO($db);
		$data = $manager->getList(0, 1000);
		
		$results['pageTitle'] = "Tous les produits";
		require('templates/produits.php');
	}
	function pharmacies($db){
		$results = array();
		$manager = new PharmaciesManager_PDO($db);
		$data = $manager->getList(0, 1000);

		$results['pageTitle'] = "Toutes les pharmacies";
		require('templates/pharmacies.php');
	}
	function conseils($db){
		$results = array();
		$manager = new NewsManager_PDO($db);
		$data = $manager->getList(0, 10000);
		
		$results['pageTitle'] = "Tous les conseils";
		require('templates/conseils.php');
	}
	function homepage($db){
		$results = array();
		
		$manager_produits = new ProduitsManager_PDO($db);
		$manager_pharma = new PharmaciesManager_PDO($db);
		$manager_news = new NewsManager_PDO($db);
		
		$data_produits = $manager_produits->getRecentList();
		$data_pharma = $manager_pharma->getRecentList();
		$data_news = $manager_news->getMonthList();

		$results['pageTitle'] = "Accueil";
		require('templates/homepage.php');
	}
	
	/**$manager= new NewsManager_PDO($db);
	$manager1=new PharmaciesManager_PDO($db);
	$manager2=new ProduitsManager_PDO($db);
	
	echo 'Dans notre stock nous avons :'.$manager2->count().' produits en stock(admin)';
?>
	<h1>Voici les produits recemment ajoutés</h1>
	 <?php 
		
	   $produits=$manager2->getRecentList();
	   foreach($produits as $unproduit)
	   {
		echo $unproduit->nom().'<br/>';
	   }
		
	 ?>
	 <form action="index.php" method="post">
		<label for="search">RECHERCHER</label><input type="search" name="search" placeholder="taper le nom du médicament que vous recherchez"/>
		<input type="submit" value="rechercher"/>
	 </form>
	 <?php
		if(isset($_POST['search']) and !empty($_POST['search']))
		{
			$i=0;
			$mot_cle=htmlspecialchars(strip_tags($_POST['search']));
			$resultat=$manager2->getApproximativeList($mot_cle);
			?><p>Votre recherche a donné les résultats suivants</p><?php
			foreach($resultat as $unresultat)
			{
				$i++;
				echo $unresultat->nom().'<br/>';
			}
			echo 'Soit '.$i.' résultat(s)';
		} **/
		?>
