<?php

/**
 * Utilisateurs
 * 
 * This class has been created by MFD corp
 * 
 * @package    epharma
 * @subpackage model
 * @author     MBAMBA Fbrice Damien
 * @version    1.0
 */
abstract class UtilisateursManager
{
	/**
	 * Méthode permettant d'ajouter un utilisateurs
	 * @param $utilisateurs Utilisateurs le utilisateurs à ajouter
	 * @return void
	 */
	abstract protected function add(Utilisateurs $utilisateurs);
	
	
	/**
	 * Méthode renvoyant le nombre de utilisateurs total
	 * @return int
	 */
	abstract public function count();
	
	/**
	 * Méthode permettant de supprimer une utilisateurs
	 * @param $id int L'identifiant du utilisateurs à supprimer
	 * @return void
	 */
	abstract public function delete($id);
	
	
	/**
	 * Méthode retournant une liste de utilisateurs demandée
	 * @param $debut int Le premier utilisateurs à sélectionner
	 * @param $limite int Le nombre de utilisateurs à sélectionner
	 * @return array La liste des utilisateurs. Chaque entrée est une instance
		de Utilisateurs.
	 */
	abstract public function getList($debut = -1, $limite = -1);
	
	/**
	 * Méthode retournant la liste des utilisateurs approximativement au mot clé tapé
	 * 
	 * @return int
	 */
	abstract public function getApproximativeList($motcle);
	
	/**
	 * Méthode retournant la liste des utilisateurs recemment ajoutée
	 * 
	 * @return int
	 */
	abstract public function getRecentList();
	
	
	/**
	 * Méthode retournant un utilisateurs précis
	 * @param $id int L'identifient du utilisateurs à récupérer
	 * @return Utilisateurs Le utilisateurs demandée
	 */
	abstract public function getUnique($id);
	
	/**
	 * Méthode permettant d'enregistrer un utilisateurs
	 * @param $utilisateurs Utilisateurs le utilisateurs à enregistrer
	 * @see self::add()
	 * * @see self::modify()
	 * @return void
	 */
	public function save(Utilisateurs $utilisateurs)
	{
		if ($utilisateurs->isValid())
		{
			$utilisateurs->isNew() ? $this->add($utilisateurs) : $this->update($utilisateurs);
		}
		else
		{
			 throw new RuntimeException(' L\'utilisateurs doit être valide pour être enregistré ');
		}
	}
	/**
	 * Méthode permettant de modifier un utilisateurs
	 * @param $utilisateurs utilisateurs le utilisateurs à modifier
	 * @return void
	 */
	abstract protected function update(Utilisateurs $utilisateurs);

	
}