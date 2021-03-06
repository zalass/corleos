<?php

/**
 * Pharmacies
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    epharma
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class Pharmacies
{
	protected $erreur=array(),
			  $_idpharmacies,
			  $_nom,
			  $_siteinternet,
			  $_tel1,
			  $_tel2,
			  $_fax,
			  $_region,
			  $_departement,
			  $_ville,
			  $_adresse,
			  $_datecreation,
			  $_autorisation,
			  $_existence,
			  $_proprietaire;
			  
	const  NOM_INVALIDE=1;
	const  SITEINTERNET_INVALIDE=2;
	const  TEL1_INVALIDE=3;
	const  TEL2_INVALIDE=4;
	const  FAX_INVALIDE=5;
	const  REGION_INVALIDE=6;
	const  DEPARTEMENT_INVALIDE=7;
	const  VILLE_INVALIDE=8;
	const  ADRESSE_INVALIDE=9;
	const  AUTORISATION_INVALIDE=10;
			  
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
		return empty($this->_idpharmacies);
	}
	
	public function isValid()
	{
		return!(empty($this->_nom)||empty($this->_siteinternet)||empty($this->_tel1)|| empty($this->_region)||empty($this->_departement)||empty($this->_existence));
	}
	
	//LISTE DES SETTERS 
	
	public function setIdpharmacies($idpharmacie)
	{
		return $this->_idpharmacies=(int)htmlspecialchars($idpharmacie);
	}
	
	public function setNom($nom)
	{
		if(is_string($nom)&&strlen($nom)<=30)
		{
			$this->_nom=(string)htmlspecialchars($nom);
			
		}
		else
		{
			$this->erreur[]=self::NOM_INVALIDE;
		}
	}
	
	public function setSiteinternet($site)
	{
		if(is_string($site)&&strlen($site)<=60)
		{
			$this->_siteinternet=(string)htmlspecialchars($site);
			
		}
		else
		{
			$this->erreur[]=self::SITEINTERNET_INVALIDE;
		}
	}
	
	public function setTel1($tel1)
	{
		if(is_string($tel1) && !empty($tel1))
		{
			$this->_tel1=(int)htmlspecialchars($tel1);
		}
		else
		{
			$this->erreur[]=self::TEL1_INVALIDE;
		}
	}
	
	public function setTel2($tel2)
	{
		if(is_string($tel2))
		{
			$this->_tel2=(int)htmlspecialchars($tel2);
		}
		else
		{
			$this->erreur[]=self::TEL2_INVALIDE;
		}
	}
	
	public function setFax($fax)
	{
		if(is_string($fax))
		{
			$this->_fax=(int)htmlspecialchars($fax);
		}
		else
		{
			$this->erreur[]=self::FAX_INVALIDE;
		}
	}
	
	public function setRegion($region)
	{
		if(is_string($region)&&strlen($region)<=20)
		{
			$this->_region=(string)htmlspecialchars($region);
			
		}
		else
		{
			$this->erreur[]=self::REGION_INVALIDE;
		}
	}
	
	public function setDepartement($departement)
	{
		if(is_string($departement)&&strlen($departement)<=30)
		{
			$this->_departement=(string)htmlspecialchars($departement);
			
		}
		else
		{
			$this->erreur[]=self::DEPARTEMENT_INVALIDE;
		}
	}
	
	public function setVille($ville)
	{
		if(is_string($ville)&&strlen($ville)<=30)
		{
			$this->_ville=(string)htmlspecialchars($ville);
			
		}
		else
		{
			$this->erreur[]=self::VILLE_INVALIDE;
		}
	}
	
	public function setAdresse($adresse)
	{
		if(is_string($adresse)&&strlen($adresse)<=60)
		{
			$this->_adresse=(string)htmlspecialchars($adresse);
			
		}
		else
		{
			$this->erreur[]=self::ADRESSE_INVALIDE;
		}
	}
	
	public function setDatecreation($datecreation)
	{
		if(is_string($datecreation)&& preg_match('`[0-9]{2}/[0-9]{2}/[0-9]{4}`', $datecreation))
		{
			$this->_datecreation=htmlspecialchars($datecreation);
		}
	}
	
	public function setAutorisation($autorisation)
	{
		if(is_string($autorisation)&&!empty($autorisation)&&strlen($autorisation)<=30)
		{
			$this->_autorisation=(string)$autorisation;
		}
		else
		{
			$this->erreur[]=self::AUTORISATION_INVALIDE;
		}
	}
	
	public function setExistence($existence)
	{
		if(is_string($existence)&& strlen($existence)==1)
		{
			$this->_existence=(int)htmlspecialchars($existence);
		}
		else
		{
			$this->erreur[]=self::EXISTENCE_INVALIDE;
		}
	}
	
	public function setProprietaire($proprietaire)
	{
		$this->_proprietaire=(int)htmlspecialchars($proprietaire);
	}
	
	//LISTE DES GETTERS 
	
	public function idpharmacies()
	{
		return $this->_idpharmacie;
	}
	
	public function nom()
	{
		return $this->_nom;
	}
	
	public function siteinternet()
	{
		return $this->_siteinternet;
	}
	public function tel1()
	{
		return $this->_tel1;
	}
	
	public function tel2()
	{
		return $this->_tel2;
	}
	
	public function fax()
	{
		return $this->_fax;
	}
	
	public function region()
	{
		return $this->_region;
	}
	
	public function departement()
	{
		return $this->_departement;
	}
	
	public function ville()
	{
		return $this->_ville;
	}
	
	public function adresse()
	{
		return $this->_adresse;
	}
	public function autorisation()
	{
		return $this->_autorisation;
	}
	
	public function datecreation()
	{
		return $this->_datecreation;
	}
	public function existence()
	{
		return $this->_existence;
	}
	
	public function erreur()
	{
		return $this->_erreur;
	}
	
	public function proprietaire()
	{
		return $this->_proprietaire;
	}
	
}