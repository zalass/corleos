<?php

/**
 * News
 * 
 * This class has been created by MBAMBA Fabrice Damien
 * 
 * @package    epharma
 * @subpackage model
 * @author     MBAMBA Fabrice Damien
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27
 */
class NewsManager_PDO extends NewsManager
{
	protected $_db;
	
	public function __construct(PDO $db)
	{
		$this->_db=$db;
	}
	
	protected function add(News $news)
	{
		$requete=$this->_db->prepare('INSERT INTO news SET titre =:titre, contenu =:contenu, illustration =:illustration, redacteur =:redacteur, dateajout=NOW() ');
		$requete->bindValue(':titre', $news->titre());
		$requete->bindValue(':contenu', $news->contenu());
		$requete->bindValue(':illustration', $news->illustration());
		$requete->bindValue(':redacteur', $news->redacteur());
		$requete->execute();
		$requete->closeCursor();
	}
	
	public function count()
	{
		return $this->_db->query('SELECT COUNT(*) FROM news')->fetchColumn();
	}
	
	public function countMonthAdd()
	{
		return $this->_db->query('SELECT COUNT(*) FROM news WHERE MONTH(dateajout)=MONTH(NOW())')->fetchColumn();
	}
	
	public function delete($id)
	{
		$requete=$this->_db->prepare('DELETE FROM news WHERE idnews=:id');
		$requete->execute(array('id'=>$id));
		$requete->closeCursor();
	}
	
	public function getList($debut= -1, $limite = -1)
	{
		$sql='SELECT idnews, titre, contenu, illustration, redacteur, DATE_FORMAT(dateajout, \'le %d/%m/%Y à %Hh%i\') AS dateajout FROM news ORDER BY idnews DESC';
		
		if($debut != -1 || $limite != -1)
		{
			$sql .= ' LIMIT '.(int)(htmlspecialchars($limite)).' OFFSET '.(int)(htmlspecialchars($debut));
		}
		$requete=$this->_db->query($sql);
		$requete->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'News');
		$listenews=$requete->fetchAll();
		$requete->closeCursor();
		return $listenews;
	}
	
	public function getMonthList()
	{
		$listenews = array();
		$requete=$this->_db->query('SELECT titre, contenu, illustration, redacteur, DATE_FORMAT(dateajout, \'%d/%m/%Y\') AS dateajout FROM news WHERE MONTH(dateajout)=MONTH(NOW()) ORDER BY idnews DESC');
		while($donnees = $requete->fetch(PDO::FETCH_ASSOC))
		{
			$listenews[] = new News($donnees);
		}
		return $listenews;
	}
	
	public function getUnique($id)
	{
		$requete= $this->_db->prepare('SELECT idnews, titre, contenu, illustration, redacteur, DATE_FORMAT(dateajout, \'le %d/%m/%Y à %Hh%i\') AS dateajout FROM news WHERE idnews=:id');
		$requete->bindValue(':id', (int)$id, PDO::PARAM_INT);
		$requete->execute();
		$requete->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'News');
		$lanews=$requete->fetchAll();
		$requete->closeCursor(); 
		return $lanews;
	}
	
	protected function update(News $news)
	{
		$requete=$this->_db->prepare('UPDATE news SET titre=:titre, contenu=:contenu, illustration=:illustration, redacteur=:redacteur, dateajout=:NOW() WHERE idnews=:id');
		$requete->bindValue(':titre', $news->titre());
		$requete->bindValue(':contenu', $news->contenu());
		$requete->bindValue(':illustration', $news->illustration());
		$requete->bindValue(':redacteur', $news->redacteur());
		$requete->bindValue(':id', $news->idnews());
		$requete->execute();
		$requete->closeCursor();
	}
	
	
}