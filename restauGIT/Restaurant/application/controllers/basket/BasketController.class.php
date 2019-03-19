<?php

class BasketController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {
    	$mealModel = new MealModel();
        $meals = $mealModel->listing();

        if (empty($queryFields['add'])) {
            $queryFields['add'] = 1;
        }

        $basketModel = new BasketModel();
        $basket = $basketModel->creationPanier();

        $oneModel = $mealModel->listOne($queryFields['add']);

        return ['meals' => $meals,
                'oneModel' => $oneModel,
                'basket' => $basket];
    }

    public function httpPostMethod(Http $http, array $formFields)
    {
    	$mealModel = new MealModel();
        $meals = $mealModel->listing();

        $basketModel = new BasketModel();
        $basket = $basketModel->creationPanier();

         if (empty($queryFields['add'])) {
            $queryFields['add'] = 1;
        }

        $oneModel = $mealModel->listOne($formFields['add']);

        return ['meals' => $meals,
                'oneModel' => $oneModel,
                'basket' => $basket];

    }
}