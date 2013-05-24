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
abstract class Stock
{
	/**
	 * Méthode permettant d'ajouter un stock
	 * @param $stock Stock le stock à ajouter
	 * @return void
	 */
	abstract protected function add(Stock $stock);
	
	
	/**
	 * Méthode renvoyant le nombre de stock total
	 * @return int
	 */
	abstract public function count();
	
	
	/**
	 * Méthode renvoyant le nombre de produit total dans le stock d'une pharmacie
	 * @return int
	 */
	abstract public function countProduitStockPharmacie($idpharmacie);
	
	
	/**
	 * Méthode permettant de supprimer un stock
	 * @param $id int L'identifiant du stock à supprimer
	 * @return void
	 */
	abstract public function delete($id);
	
	
	/**
	 * Méthode retournant un stock précis
	 * @param $id int L'identifient du stock à récupérer
	 * @return Stock Le stock demandé
	 */
	abstract public function getUnique($id);
	
	
	/**
	 * Méthode renvoyant la liste de produit pour une pharmacie donnée
	 * @return int
	 */
	abstract public function getPharmaProduitlist($idpharmacie);
	
	
	/**
	 * Méthode permettant d'enregistrer un stock
	 * @param $stock Stock le stock à enregistrer
	 * @see self::add()
	 * * @see self::modify()
	 * @return void
	 */
	public function save(Stock $stock)
	{
		if ($stock->isValid())
		{
			$stock->isNew() ? $this->add($stock) : $this->update($stock);
		}
		else
		{
			throw new RuntimeException('Le stock doit être valide pour être enregistré');
		}
	}
	
	
	/**
	 * Méthode permettant de modifier un stock
	 * @param $stock stock le stock à modifier
	 * @return void
	 */
	abstract protected function update(Stock $stock);

	
}