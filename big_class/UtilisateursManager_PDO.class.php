<?php

/**
 * Utilisateurs
 * 
 * This class has been created by MFD corp
 * 
 * @package    epharma
 * @subpackage model
 * @author     MBAMBA FABRICE DAMIEN
 * @version    1.0 
 */
class UtilisateursManager_PDO extends UtilisateursManager
{
	protected $_db;
	
	public function __construct(PDO $db)
	{
		$this->_db=$db;
	}
	
	public function verifdonnees($val, $val2)
	{
		
		$requete=$this->_db->prepare('SELECT email, pseudo FROM utilisateurs WHERE email=:email OR pseudo=:pseudo ');
		$requete->execute(array('email'=>$val, 'pseudo'=>$val2));
		return (bool)$requete->fetchColumn();
	}
	protected function add(Utilisateurs $utilisateur)
	{
		try
		{
			$this->_db->beginTransaction();
			
			$requete=$this->_db->prepare('INSERT INTO utilisateurs SET nom=:nom, prenom=:prenom, photo=:photo, email=:email, question=:question, reponse=:reponse, 
			 existence=\'1\', naissance=:naissance, motpass=:motpass, 
			 region=:region, ville=:ville, commune=:commune, pseudo=:pseudo, pays=:pays, secteuractivite=:secteuractivite');
			$requete->BindValue(':nom', $utilisateur->nom());
			$requete->BindValue(':prenom', $utilisateur->prenom());
			$requete->BindValue(':photo', $utilisateur->photo());
			$requete->BindValue(':email', $utilisateur->email());
			$requete->BindValue(':question', $utilisateur->question());
			$requete->BindValue(':reponse', $utilisateur->reponse());
			$requete->BindValue(':naissance', $utilisateur->naissance());
			$requete->BindValue(':motpass', $utilisateur->motpass());
			$requete->BindValue(':region', $utilisateur->region());
			$requete->BindValue(':ville', $utilisateur->ville());
			$requete->BindValue(':commune', $utilisateur->commune());
			$requete->BindValue(':pseudo', $utilisateur->pseudo());
			$requete->BindValue(':pays', $utilisateur->pays());
			$requete->BindValue(':secteuractivite', $utilisateur->secteuractivite());
			
			$requete->execute();
			
			$this->_db->commit();
		}
		catch(PDOException $e)
		{
			echo $e;
			$this->_db->rollback();
		}
		
	}
	
	public function count()
	{
		return $this->_db->query('SELECT COUNT(*) FROM utilisateurs WHERE existence=\'1\'')->fetchColumn();
	}
	
	public function delete($id)
	{
		try
		{
			$this->_db->beginTransaction();
			$requete=$this->_db->prepare('DELETE FROM utilisateurs WHERE idutilisateurs=:id');
			$requete->execute(array('id'=>$id));
			$this->_db->commit();
		}
		catch(PDOException $e)
		{
			$this->_db->rollback();
		}
	}
	
	public function getList($debut = -1, $limite = -1)
	{
		$listeutlisateurs = array();
		$sql='SELECT * FROM utlisateurs WHERE existence=\'1\' ORDER BY idutilisateurs DESC';
		
		if($debut != -1 || $limite != -1)
		{
			$sql .= ' LIMIT '.(int)strip_tags($limite).' OFFSET '.(int)strip_tags($debut);
		}
		$requete=$this->_db->query($sql);
		while($donnees=$requete->fetch(PDO::FETCH_ASSOC))
		{
			$listeutilisateurs[]=new Utilisateurs($donnees);
		}
		return $listeutilisateurs;
	}
	
	public function getApproximativeList($motcle)
	{
		$resultat=array();
		$requete=$this->_db->query('SELECT * FROM utlisateurs WHERE nom LIKE \''.$motcle.'%\' OR prenom LIKE \''.$motcle.'%\'');
		
		while($donnees=$requete->fetch(PDO::FETCH_ASSOC))
		{
			$resultat[]=new Utilisateurs($donnees);
		}
		return $resultat;
	}
	
	public function getRecentList()
	{
		$requete=$this->_db->query('SELECT * FROM utilisateurs ORDER BY idutilisateurs DESC LIMIT 0, 10');
	}
	
	public function getUnique($id)
	{
		$reponse=array();
		$requete=$this->_db->prepare('SELECT * FROM utilisateurs WHERE idutlisateur=$id');
		$requete=execute(array('id'=>$id));
		
		while($donnees=$requete->fetch(PDO::FETCH_ASSOC))
		{
			$reponse[]=new Utilisateurs($donnees);
		}
		return $reponse;
	}
	
	protected function update(Utilisateurs $utilisateur)
	{
		try
			{
				$this->_db->beginTransaction();
				
				$requete=$this->_db->prepare('UPDATE utilisateurs SET  nom=:nom, prenom=:prenom,
				 photo=:photo, email=:email, question=:question, reponse=:reponse, 
				 existence=:existence, naissance=:naissance, motpass=:motpass, 
				 region=:region, ville=:ville, commune=:commune, pseudo=:pseudo, pays=:pays,
				 secteuractivite=:secteuractivite WHERE idutlisateurs=:idutlisateurs');
				$requete->BindValue(':idutilisateurs', $utilisateur->idutilisateurs());
				$requete->BindValue(':nom', $utilisateur->nom());
				$requete->BindValue(':prenom', $utilisateur->prenom());
				$requete->BindValue(':photo', $utilisateur->photo());
				$requete->BindValue(':email', $utilisateur->email());
				$requete->BindValue(':question', $utilisateur->question());
				$requete->BindValue(':reponse', $utilisateur->reponse());
				$requete->BindValue(':existence', $utilisateur->existence());
				$requete->BindValue(':naissance', $utilisateur->naissance());
				$requete->BindValue(':motpass', $utilisateur->motpass());
				$requete->BindValue(':region', $utilisateur->region());
				$requete->BindValue(':ville', $utilisateur->ville());
				$requete->BindValue(':commune', $utilisateur->commune());
				$requete->BindValue(':pseudo', $utilisateur->pseudo());
				$requete->BindValue(':pays', $utilisateur->pays());
				$requete->BindValue(':secteuractivite', secteuractivite());
				$requete->execute();
				
				$this->_db->commit();
			}
			catch(PDOException $e)
			{
				$this->_db->rollback();
			}
		}
	
	
}