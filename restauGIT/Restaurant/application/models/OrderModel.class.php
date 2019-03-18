<?php

class OrderModel
{

	public function creationPanier(){

	    if (!isset($_SESSION['panier'])){
	      $_SESSION['panier']=array();
	      $_SESSION['panier']['Name'] = array();
	      $_SESSION['panier']['QuantityOrdered'] = array();
	      $_SESSION['panier']['SalePrice'] = array();
	      $_SESSION['panier']['verrou'] = false;
	   	}
	   	return true;
		}

	public function ajouterArticle($libelleProduit,$qteProduit,$prixProduit){

   		if (creationPanier() && !isVerrouille()){

      		$positionProduit = array_search($libelleProduit,  $_SESSION['panier']['Id']);

      		if ($positionProduit !== false){

         	$_SESSION['panier']['qteProduit'][$positionProduit] += $qteProduit ;
      		}

      		else{

		    array_push( $_SESSION['panier']['libelleProduit'],$libelleProduit);
		    array_push( $_SESSION['panier']['qteProduit'],$qteProduit);
		    array_push( $_SESSION['panier']['prixProduit'],$prixProduit);
      		}
   		}

   		else
   		echo "Un problème est survenu, veuillez recommencer.";

	}

	public function supprimerArticle($libelleProduit){

	   if (creationPanier() && !isVerrouille())
	   {
	      $tmp=array();
	      $tmp['libelleProduit'] = array();
	      $tmp['qteProduit'] = array();
	      $tmp['prixProduit'] = array();
	      $tmp['verrou'] = $_SESSION['panier']['verrou'];

	      for($i = 0; $i < count($_SESSION['panier']['libelleProduit']); $i++)
	      {
	         if ($_SESSION['panier']['libelleProduit'][$i] !== $libelleProduit)
	         {
	            array_push( $tmp['libelleProduit'],$_SESSION['panier']['libelleProduit'][$i]);
	            array_push( $tmp['qteProduit'],$_SESSION['panier']['qteProduit'][$i]);
	            array_push( $tmp['prixProduit'],$_SESSION['panier']['prixProduit'][$i]);
	         }

	      }
	      
	      $_SESSION['panier'] =  $tmp;
	      unset($tmp);
	   }
	   else
	   echo "Un problème est survenu, veuillez recommencer.";
	}

	public function modifierQTeArticle($libelleProduit,$qteProduit){

	   if (creationPanier() && !isVerrouille())
	   {
	      if ($qteProduit > 0)
	      {
	         $positionProduit = array_search($libelleProduit,  $_SESSION['panier']['libelleProduit']);

	         if ($positionProduit !== false)
	         {
	            $_SESSION['panier']['qteProduit'][$positionProduit] = $qteProduit ;
	         }
	      }
	      else
	      supprimerArticle($libelleProduit);
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





	
	public function order(){
			
		if(isset($_POST['add']) && $_POST['quantity']>0) {

			$data = new Database();

			$database->executeSql('INSERT INTO 
									Order (QuantityOrdered, Meal_Id, Order_Id, PriceEach) 
							   		VALUES 
							   		(?, ?, ?, ?)',  
								[ 
									$post['quantity'], 
									$post[''],
									$post[''],
									$post['']
								]);

		}
	}


}