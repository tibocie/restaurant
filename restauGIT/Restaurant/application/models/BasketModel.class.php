<?php

class BasketModel
{

	public function creationPanier(){

	    if (!isset($_SESSION['panier'])){
	      $_SESSION['panier']=array();
	      $_SESSION['panier']['Id'] = array();
	      $_SESSION['panier']['QuantityOrdered'] = array();
	      $_SESSION['panier']['SalePrice'] = array();
	      $_SESSION['panier']['verrou'] = false;
	   	}
	   	return true;
		}

	public function ajouterArticle($Id,$QuantityOrdered,$PriceEach){

   		if (creationPanier() && !isVerrouille()){

      		$positionProduit = array_search($Id,  $_SESSION['panier']['Id']);

      		if ($positionProduit !== false){

         	$_SESSION['panier']['QuantityOrdered'][$positionProduit] += $QuantityOrdered ;
      		}

      		else{

		    array_push( $_SESSION['panier']['Id'],$Id);
		    array_push( $_SESSION['panier']['QuantityOrdered'],$QuantityOrdered);
		    array_push( $_SESSION['panier']['PriceEach'],$PriceEach);
      		}
   		}

   		else
   		echo "Un problème est survenu, veuillez recommencer.";

	}

	public function supprimerArticle($Id){

	   if (creationPanier() && !isVerrouille())
	   {
	      $tmp=array();
	      $tmp['Id'] = array();
	      $tmp['QuantityOrdered'] = array();
	      $tmp['PriceEach'] = array();
	      $tmp['verrou'] = $_SESSION['panier']['verrou'];

	      for($i = 0; $i < count($_SESSION['panier']['Id']); $i++)
	      {
	         if ($_SESSION['panier']['Id'][$i] !== $Id)
	         {
	            array_push( $tmp['Id'],$_SESSION['panier']['Id'][$i]);
	            array_push( $tmp['QuantityOrdered'],$_SESSION['panier']['QuantityOrdered'][$i]);
	            array_push( $tmp['PriceEach'],$_SESSION['panier']['PriceEach'][$i]);
	         }

	      }
	      
	      $_SESSION['panier'] =  $tmp;
	      unset($tmp);
	   }
	   else
	   echo "Un problème est survenu, veuillez recommencer.";
	}

	public function modifierQTeArticle($Id,$QuantityOrdered){

	   if (creationPanier() && !isVerrouille())
	   {
	      if ($QuantityOrdered > 0)
	      {
	         $positionProduit = array_search($Id,  $_SESSION['panier']['Id']);

	         if ($positionProduit !== false)
	         {
	            $_SESSION['panier']['QuantityOrdered'][$positionProduit] = $QuantityOrdered ;
	         }
	      }
	      else
	      supprimerArticle($Id);
	   }
	   else
	   echo "Un problème est survenu, veuillez recommencer";
	}

	public function supprimePanier(){
   		unset($_SESSION['panier']);
		}

	public function isVerrouille(){
	   if (isset($_SESSION['panier']) && $_SESSION['panier']['verrou'])
	   return true;
	   else
	   return false;
	}

	public function MontantGlobal(){
	   $total=0;

	   for($i = 0; $i < count($_SESSION['panier']['Id']); $i++)
	   {
	      $total += $_SESSION['panier']['QuantityOrdered'][$i] * $_SESSION['panier']['PriceEach'][$i];
	   }
	   return $total;
		}
 

}