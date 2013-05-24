<?php

/**
 * Stock
 * 
 * This class has been created by MBAMBA Fabrice Damien
 * 
 * @package    epharma
 * @subpackage model
 * @author     MBAMBA Fbrice Damien
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 
 */
class StockManager_PDO extends StockManager
{
	protected $_db;
	
	public function __construct(PDO $db)
	{
		$this->_db=$db;
	}
	
	protected function add(Stock $stock, $prix)
	{
		$requete=$this->_db->prepare('INSERT INTO stock SET prix=:prix, disponibilite=:disponibilite, codepharmacie=:codepharmacie, heriteproduit=:heriteproduit');
		$requete->BindValue(':prix', $stock->prix());
		$requete->BindValue(':disponibilite', $stock->disponibilite());
		$requete->BindValue(':codepharmacie', $stock->codepharmacie());
		$requete->BindValue(':heriteproduit', $stock->heriteproduit());
		$requete->execute();
		$requete->closeCursor();
	}
	
	public function countProduitStockPharmacie($idpharmacie)
	{
		$requete=$this->_db->prepare('SELECT COUNT(*) FROM stock WHERE codepharmacie=:codepharmacie');
		$requete->execute(array('codepharmacie'=>(int)$idpharmacie));
		$valeur=$requete->fetchColumn();
		$requete->closeCursor();
		return $valeur;
	}
	
	public function delete($idproduit, $codepharmacie)
	{
		$requete=$this->_db->prepare('DELETE FROM stock WHERE heriteproduit =:idproduit AND codepharmacie=:codepharmacie');
		$requete->bindValue(':idproduit', (int)$idproduit, PDO::PARAM_INT);
		$requete->bindValue(':codepharmacie', (int)$codepharmacie, PDO::PARAM_INT);
		$requete->execute();
		$requete->closeCursor();
		
	}
	
	public function getPharmaProduitList($idpharmacies)
	{
		$requete=$this->_db->prepare('SELECT * FROM stock WHERE codepharmacie=:codepharmacie ');
		$requete->bindValue(':codepharmacie', (int)$idpharmacies, PDO::PARAM_INT);
		$requete->execute();
		$requete->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Stock');
		$laliste=$requete->fetchAll();
		$requete->closeCursor(); 
		return $laliste;
	}
	
	public function update(Stock $stock)
	{
		$requete=$this->_db->prepare('UPDATE stock SET prix=:prix, disponibilite=:disponibilite, heriteproduit=:heriteproduit WHERE codepharmacie=:codepharmacie ');
		$requete->BindValue(':prix', $stock->prix());
		$requete->BindValue(':disponibilite', $stock->disponibilite());
		$requete->BindValue(':codepharmacie', $stock->codepharmacie());
		$requete->BindValue(':heriteproduit', $stock->heriteproduit());
		$requete->execute();
	}

}