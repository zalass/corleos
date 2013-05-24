<?php

/**
 * Messages
 * 
 * This class has been created by MBAMBA Fabrice Damien
 * 
 * @package    epharma
 * @subpackage model
 * @author     MBAMBA Fbrice Damien
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z
 */
class Messages 
{
	/**
	 * Méthode permettant d'ajouter un message
	 * @param $message Message le message à ajouter
	 * @return void
	 */
	abstract protected function add(Message $message);
	
	
	/**
	 * Méthode renvoyant le nombre de message total
	 * @return int
	 */
	abstract public function count();
	
	/**
	 * Méthode permettant de supprimer une message
	 * @param $id int L'identifiant du message à supprimer
	 * @return void
	 */
	abstract public function delete($id);
	
	
	/**
	 * Méthode retournant une liste de message demandée
	 * @param $debut int Le premier message à sélectionner
	 * @param $limite int Le nombre de message à sélectionner
	 * @return array La liste des message. Chaque entrée est une instance
		de Message.
	 */
	abstract public function getList($debut = -1, $limite = -1);
	
	
	
	/**
	 * Méthode retournant un message précis
	 * @param $id int L'identifient du message à récupérer
	 * @return Message Le message demandée
	 */
	abstract public function getUnique($id);
	
	/**
	 * Méthode permettant d'enregistrer un message
	 * @param $message Message le message à enregistrer
	 * @see self::add()
	 * * @see self::modify()
	 * @return void
	 */
	public function save(Message $message)
	{
		if ($message->isValid())
		{
			$message->isNew() ? $this->add($message) : $this->update($message);
		}
		else
		{
			throw new RuntimeException('La message doit être valide pour être enregistré');
		}
	}
	/**
	 * Méthode permettant de modifier un message
	 * @param $message message le message à modifier
	 * @return void
	 */
	abstract protected function update(Message $message);
	
}