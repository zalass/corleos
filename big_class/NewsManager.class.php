<?php

/**
 * News
 * 
 * This class has been created by MBAMBA Fabrice Damien
 * 
 * @package    epharma
 * @subpackage model
 * @author     MBAMBA Fbrice Damien
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27
 */
abstract class NewsManager
{
	/**
	 * Méthode permettant d'ajouter une news
	 * @param $news News la news à ajouter
	 * @return void
	 */
	abstract protected function add(News $news);
	
	
	/**
	 * Méthode renvoyant le nombre de news total
	 * @return int
	 */
	abstract public function count();
	
	/**
	 * Méthode permettant de supprimer unee news
	 * @param $id int L'identifiant de la news à supprimer
	 * @return void
	 */
	abstract public function delete($id);
	
	
	/**
	 * Méthode retournant une liste de news demandées
	 * @param $debut int le premier news à sélactionner
	 * @param $limite int le nombre de news à sélactionner
	 * @return array La liste des news. Chaque entrée est unee instance
		de News.
	 */
	abstract public function getList($debut = -1, $limite = -1);
	
	
	/**
	 * Méthode retournant une news précise
	 * @param $id int L'identifient de la news à récupérer
	 * @return News la news demandée
	 */
	abstract public function getUnique($id);
	
	/**
	 * Méthode permettant d'enregistrer une news
	 * @param $news News la news à enregistrer
	 * @see self::add()
	 * * @see self::modify()
	 * @return void
	 */
	public function save(News $news)
	{
		if ($news->isValid())
		{
			$news->isNew() ? $this->add($news) : $this->update($news);
		}
		else
		{
			throw new RunetimeException('La news doit être valide pour être enregistrée');
		}
	}
	/**
	 * Méthode permettant de modifier une news
	 * @param $news news la news à modifier
	 * @return void
	 */
	abstract protected function update(News $news);

	
}