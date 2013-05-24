<?php

/**
 * Reponsemessage
 * 
 * This class has been created by MBAMBA Fabrice Damien
 * 
 * @package    epharma
 * @subpackage model
 * @author     MBAMBA Fbrice Damien
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class Reponsemessage
{
	/**
	 * Méthode permettant d'ajouter un reponsemessage
	 * @param $reponsemessage Reponsemessage le reponsemessage à ajouter
	 * @return void
	 */
	abstract protected function add(Reponsemessage $reponsemessage);
	
	
	/**
	 * Méthode renvoyant le nombre de reponsemessage total
	 * @return int
	 */
	abstract public function count();
	
	/**
	 * Méthode permettant de supprimer une reponsemessage
	 * @param $id int L'identifiant du reponsemessage à supprimer
	 * @return void
	 */
	abstract public function delete($id);
	
	
	/**
	 * Méthode retournant une liste de reponsemessage demandée
	 * @param $debut int Le premier reponsemessage à sélectionner
	 * @param $limite int Le nombre de reponsemessage à sélectionner
	 * @return array La liste des reponsemessage. Chaque entrée est une instance
		de Reponsemessage.
	 */
	abstract public function getList($debut = -1, $limite = -1);
	
	
	
	/**
	 * Méthode retournant un reponsemessage précis
	 * @param $id int L'identifient du reponsemessage à récupérer
	 * @return Reponsemessage Le reponsemessage demandée
	 */
	abstract public function getUnique($id);
	
	/**
	 * Méthode permettant d'enregistrer un reponsemessage
	 * @param $reponsemessage Reponsemessage le reponsemessage à enregistrer
	 * @see self::add()
	 * * @see self::modify()
	 * @return void
	 */
	public function save(Reponsemessage $reponsemessage)
	{
		if ($reponsemessage->isValid())
		{
			$reponsemessage->isNew() ? $this->add($reponsemessage) : $this->update($reponsemessage);
		}
		else
		{
			throw new RuntimeException('La reponsemessage doit être valide pour être enregistré');
		}
	}
	/**
	 * Méthode permettant de modifier un reponsemessage
	 * @param $reponsemessage reponsemessage le reponsemessage à modifier
	 * @return void
	 */
	abstract protected function update(Reponsemessage $reponsemessage);

	

}