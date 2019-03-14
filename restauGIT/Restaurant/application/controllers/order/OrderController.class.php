<?php

class OrderController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {

    	$mealModel = new MealModel();
        $meals = $mealModel->listing();
        return ['meals' => $meals];

        $orderModel = new OrderModel();
        $orders = $orderModel->listing();
        return ['orders' => $orders];

    }

    public function httpPostMethod(Http $http, array $formFields)
    {
    	$mealModel = new MealModel();
        $meals = $mealModel->listing();
        return ['meals' => $meals];

        $orderModel = new OrderModel();
        $orders = $orderModel->listing();
        return ['orders' => $orders];
    }
}