<?php 

	require_once ('../config/autoloader.php');
	JK\Autoloader::getInstance()
	->addDirectory('../../corleos/big_class')
	->addEntireDirectory('../../corleos/big_class');
	$db = Dbfactory::getMysqlConnexionWithPDO();
	$managerUser=new UtilisateursManager_PDO($db );
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Inscription </title>
<link rel="stylesheet" type="text/css" href="css/view.css" media="all">
<script type="text/javascript" src="js/view.js"></script>
<script type="text/javascript" src="js/calendar.js"></script>
</head>
<body id="main_body" >
	
	<img id="top" src="images/top.png" alt="top">
	<div id="form_container">
	
		<h1><a>Inscription </a></h1>
		<form id="form_638650" class="appnitro"  method="post" action="inscription.php">
					<div class="form_description">
			<h2>Inscription </h2>
			<p>C'est gratuit et ça le restera toujours</p>
		</div>						
			<ul >
			
					<li id="li_1" >
	 
		</li>		<li id="li_2" >
		<?php 
			if(isset($_POST['element_2'])&&isset($_POST['element_3'])&&isset($_POST['element_4'])&&isset($_POST['element_7']))
			{
				$var1=htmlspecialchars($_POST['element_2']);
				$var2=htmlspecialchars($_POST['element_3']);
				$var3=htmlspecialchars($_POST['element_4']);
				$var4=htmlspecialchars($_POST['element_7']);
				
				if (!empty($var1)&& strlen($var1)<=60)
				{
					if(!empty($var2)&& strlen($var2)<=30)
					{
						if(!empty($var3)&&strlen($var3)<=30)
						{
							if(!empty($var4)&& $var4==2)
							{
									$nouvelUser= new Utilisateurs(
									array('email'=>$var1,
									  'pseudo'=>$var2,
									  'motpass'=>$var3));
									
									if($managerUser->verifdonnees($nouvelUser->email(), $nouvelUser->pseudo()))
									{
										echo 'Le nom d\'utilisateur ou le pseudo est deja pris';
										
									}	
									elseif($nouvelUser->isValid())
									{
										echo '<br/>C\'est bon !'.'<br/>';
										echo $nouvelUser->pseudo().'<br/>';
										$managerUser->save($nouvelUser);
										
									}
							}
							else
							{
								echo 'le pseudonyme ou l\'email existe deja';
							}
						}
					}
					
				}
				
			}
		?>
		<label class="description" for="element_2">Votre adresse electronique </label>
		<div>
			<input id="element_2" name="element_2" class="element text medium" type="email" maxlength="60" value=""/> 
		</div> 
		</li>		<li id="li_3" >
		<label class="description" for="element_3">Votre pseudonyme </label>
		<div>
			<input id="element_3" name="element_3" class="element text medium" type="text" maxlength="30" value=""/> 
		</div> 
		</li>		<li id="li_4" >
		<label class="description" for="element_4">Mot de passe </label>
		<div>
			<input id="element_4" name="element_4" class="element text medium" type="password" maxlength="30" value=""/> 
		</div> 
		</li>		<li id="li_5" >
		
		 
		</li>		<li id="li_6" >
		 
		</li>		<li id="li_7" >
		<label class="description" for="element_7">Quels type d'utilisateur êtes-vous ? </label>
		<span>
			<input id="element_7_1" name="element_7" class="element radio" type="radio" value="1" />
<label class="choice" for="element_7_1">une pharmacie</label>
<input id="element_7_2" name="element_7" class="element radio" type="radio" value="2" />
<label class="choice" for="element_7_2">une tièrce personne</label>

		</span> 
		</li>
			
					<li class="buttons">
			    <input type="hidden" name="form_id" value="638650" />
			    
				<input id="saveForm" class="button_text" type="submit" name="submit" value="valider" />
		</li>
			</ul>
		</form>	
		<div id="footer">
			
		</div>
	</div>
	<img id="bottom" src="images/bottom.png" alt="">
	</body>
</html>