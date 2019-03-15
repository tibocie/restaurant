<?php

class OrderController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {
    	$mealModel = new MealModel();
        $meals = $mealModel->listing();
        return ['meals' => $meals];

        $orderModel = new OrderModel();
        $orderModel->creationPanier();
        $orderModel->ajouterArticle();

    }

    public function httpPostMethod(Http $http, array $formFields)
    {
    	$mealModel = new MealModel();
        $meals = $mealModel->listing();
        return ['meals' => $meals];

        $orderModel = new OrderModel();
        $orderModel->creationPanier();

    }
}