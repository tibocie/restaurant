<?php

class OrderController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {
    	$mealModel = new MealModel();
        $meals = $mealModel->listing();
        
        if (empty($queryFields['add'])) {
            $queryFields['add'] = 1;
        }
        
        $oneModel = $mealModel->listOne($queryFields['add']);
        return ['meals' => $meals,
                'oneModel' => $oneModel];

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