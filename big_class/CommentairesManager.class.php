<?php

/**
 * Commentaires
 * 
 * This class has been created by MBAMBA Fabrice Damien
 * 
 * @package    epharma
 * @subpackage model
 * @author     MBAMBA Fbrice Damien
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z
 */
abstract class Commentaires 
{
	/**
	 * Méthode permettant d'ajouter un commentaire
	 * @param $commentaire Commentaire le commentaire à ajouter
	 * @return void
	 */
	abstract protected function add(Commentaire $commentaire);
	
	
	/**
	 * Méthode renvoyant le nombre de commentaire total
	 * @return int
	 */
	abstract public function count();
	
	/**
	 * Méthode permettant de supprimer une commentaire
	 * @param $id int L'identifiant du commentaire à supprimer
	 * @return void
	 */
	abstract public function delete($id);
	
	
	/**
	 * Méthode retournant une liste de commentaire demandée
	 * @param $debut int Le premier commentaire à sélectionner
	 * @param $limite int Le nombre de commentaire à sélectionner
	 * @return array La liste des commentaire. Chaque entrée est une instance
		de Commentaire.
	 */
	abstract public function getList($debut = -1, $limite = -1);
	
	
	
	/**
	 * Méthode retournant un commentaire précis
	 * @param $id int L'identifient du commentaire à récupérer
	 * @return Commentaire Le commentaire demandée
	 */
	abstract public function getUnique($id);
	
	/**
	 * Méthode permettant d'enregistrer un commentaire
	 * @param $commentaire Commentaire le commentaire à enregistrer
	 * @see self::add()
	 * * @see self::modify()
	 * @return void
	 */
	public function save(Commentaire $commentaire)
	{
		if ($commentaire->isValid())
		{
			$commentaire->isNew() ? $this->add($commentaire) : $this->update($commentaire);
		}
		else
		{
			throw new RuntimeException('La commentaire doit être valide pour être enregistré');
		}
	}
	/**
	 * Méthode permettant de modifier un commentaire
	 * @param $commentaire commentaire le commentaire à modifier
	 * @return void
	 */
	abstract protected function update(Commentaire $commentaire);

	
}