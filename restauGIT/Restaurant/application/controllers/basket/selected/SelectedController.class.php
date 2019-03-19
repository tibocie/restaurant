<?php

class SelectedController{

	public function httpGetMethod(Http $http, array $queryFields)
    {
    	$mealModel = new MealModel();

        
        $oneModel = $mealModel->listOne($queryFields['add']);
        return ['_raw_template' => '',
        		'oneModel' => $oneModel];

    }

    public function httpPostMethod(Http $http, array $formFields)
    {
    	
    }
}