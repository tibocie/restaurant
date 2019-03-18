<?php


class MealModel
{
	public function listing(){

		$plat = new Database();

		$menu = $plat->query('SELECT * FROM Meal ORDER BY Id');

		return $menu;
	}

	public function listOne($add){

		$oneplat = new Database();

		$onemenu = $oneplat->queryOne('SELECT * FROM Meal WHERE Id = ?', [$add]);

		return $onemenu;
	}
}


