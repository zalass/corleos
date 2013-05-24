<?php

/**
 * Pharmacies
 * 
 * This class has been created by MBAMBA Fabrice Damien
 * 
 * @package    epharma
 * @subpackage model
 * @author     MBAMBA Fbrice Damien
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class PharmaciesManager
{
	/**
	 * Méthode permettant d'ajouter une pharmacie
	 * @param $pharmacie Pharmacies le pharmacie à ajouter
	 * @return void
	 */
	abstract protected function add(Pharmacies $pharmacie);
	
	
	/**
	 * Méthode renvoyant le nombre de pharmacie totale
	 * @return int
	 */
	abstract public function count();
	
	/**
	 * Méthode permettant de supprimer une pharmacie
	 * @param $id int L'identifiant de la pharmacie à supprimer
	 * @return void
	 */
	abstract public function delete($id);
	
	
	/**
	 * Méthode retournant une liste de pharmacie demandée
	 * @param $debut int La première pharmacie à sélectionner
	 * @param $limite int Le nombre de pharmacie à sélectionner
	 * @return array La liste des pharmacie. Chaque entrée est une instance
		de Pharmacies.
	 */
	abstract public function getList($debut = -1, $limite = -1);
	
	
	/**
	 * Méthode retournant la liste des pharmacie approximativement au mot clé tapé
	 * 
	 * @return int
	 */
	abstract public function getApproximativeList($motcle);
	
	/**
	 * Méthode retournant la liste des pharmacie recemment ajoutée
	 * 
	 * @return int
	 */
	abstract public function getRecentList();
	
	/**
	 * Méthode retournant une pharmacie précise
	 * @param $id int L'identifient du pharmacie à récupérer
	 * @return Pharmacies Le pharmacie demandée
	 */
	abstract public function getUnique($id);
	
	/**
	 * Méthode permettant d'enregistrer une pharmacie
	 * @param $pharmacie Pharmacies le pharmacie à enregistrer
	 * @see self::add()
	 * * @see self::modify()
	 * @return void
	 */
	public function save(Pharmacies $pharmacie)
	{
		if ($pharmacie->isValid())
		{
			$pharmacie->isNew() ? $this->add($pharmacie) : $this->update($pharmacie);
		}
		else
		{
			throw new RuntimeException('La pharmacie doit être valide pour être enregistrée');
		}
	}
	/**
	 * Méthode permettant de modifier une pharmacie
	 * @param $pharmacie pharmacie la pharmacie à modifier
	 * @return void
	 */
	abstract protected function update(Pharmacies $pharmacie);

	
}