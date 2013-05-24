<?php

/**
 * Reponsemessage
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    epharma
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class Reponsemessage 
{
	protected $erreur=array(),
			  $_idreponseMessage,
			  $_date,
			  $_contenureponse,
			  $_heritemessageencours,
			  $_destinateur,
			  $_destinataire;
	

	const  CONTENUREPONSE_INVALIDE=1;
	const  HERITEMESSAGENCOURS_INVALIDE=2;
	const  DESTINATEUR_INVALIDE=3;
	const  DESTINATAIRE_INVALIDE=4;	
		
		
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
		return empty($this->_idreponseMessage);
	}
	
	public function isValid()
	{
		return !(empty($this->_contenureponse)||empty($this->_heritemessageencours)||empty($this->_destinateur)||empty($this->_destinataire));
	}
	
	//LISTE DES SETTERS 
	
	public function setIdreponsemessage($idreponse)
	{
		$this->_idreponsemessage=(int)htmlspecialchars($idreponse);
	}
	
	public function setDate($date)
	{
		if(is_string($date)&& preg_match('`le [0-9]{2}/[0-9]{2}/[0-9]{4}`', $date))
		{
			$this->_datecreation=htmlspecialchars($date);
		}
	}
	
	public function setContenureponse($contenu)
	{
		if(is_string($contenu) && !empty($contenu))
		{
			$this->_contenu=(string)htmlspecialchars(nl2br($contenu));
		}
		else
		{
			$this->erreur[]=self::CONTENU_INVALIDE;
		}
	}
	
	public function setHeritemessageencours($messencours)
	{
		$this->_heritemessageencours=(int)htmlspecialchars($messencours);
	}
	
	public function setDestinateur($destinateur)
	{
		$this->_destinateur=(int)htmlspecialchars($destinateur);
	}
	
	public function setDestinataire($destinataire)
	{
		$this->_destinataire=(int)htmlspecialchars($destinataire);
	}
	
	//LISTE DES GETTERS 
	
	public function idreponsemessage()
	{
		return $this->_idreponsemessage;
	}
	
	public function dater()
	{
		return $this->_date;
	}
	
	public function contenureponse()
	{
		return $this->_contenureponse;
	}
	
	public function heritemessageencours()
	{
		return $this->_heritemessageencours;
	}
	
	public function destinateur()
	{
		return $this->_destinateur;
	}
	
	public function destinataire()
	{
		return $this->_destinataire;
	}
	
	public function erreur()
	{
		return $this->_erreur;
	}
}