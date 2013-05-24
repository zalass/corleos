<?php

/**
 * Produits
 * 
 * This class has been created by MBAMBA Fabrice Damien
 * 
 * @package    epharma
 * @subpackage model
 * @author     MBAMBA Fbrice Damien
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class ProduitsManager
{
	/**
	 * Méthode permettant d'ajouter un produit
	 * @param $produit Produit le produit à ajouter
	 * @return void
	 */
	abstract protected function add(Produits $produit);
	
	
	/**
	 * Méthode renvoyant le nombre de produit total
	 * @return int
	 */
	abstract public function count();
	
	/**
	 * Méthode permettant de supprimer une produit
	 * @param $id int L'identifiant du produit à supprimer
	 * @return void
	 */
	abstract public function delete($id);
	
	
	/**
	 * Méthode retournant une liste de produit demandée
	 * @param $debut int Le premier produit à sélectionner
	 * @param $limite int Le nombre de produit à sélectionner
	 * @return array La liste des produit. Chaque entrée est une instance
		de Produit.
	 */
	abstract public function getList($debut = -1, $limite = -1);
	
	/**
	 * Méthode retournant la liste des produits approximativement au mot clé tapé
	 * 
	 * @return int
	 */
	abstract public function getApproximativeList($motcle);
	
	/**
	 * Méthode retournant la liste des produits recemment ajoutée
	 * 
	 * @return int
	 */
	abstract public function getRecentList();
	
	
	/**
	 * Méthode retournant un produit précis
	 * @param $id int L'identifient du produit à récupérer
	 * @return Produit Le produit demandée
	 */
	abstract public function getUnique($id);
	
	/**
	 * Méthode permettant d'enregistrer un produit
	 * @param $produit Produit le produit à enregistrer
	 * @see self::add()
	 * * @see self::modify()
	 * @return void
	 */
	public function save(Produits $produit)
	{
		if ($produit->isValid())
		{
			$produit->isNew() ? $this->add($produit) : $this->update($produit);
		}
		else
		{
			throw new RuntimeException('La produit doit être valide pour être enregistré');
		}
	}
	/**
	 * Méthode permettant de modifier un produit
	 * @param $produit produit le produit à modifier
	 * @return void
	 */
	abstract protected function update(Produits $produit);

	
}