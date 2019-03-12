<?php


class MealModel
{
	public function listing(){

		$plat = new Database();

		$menu = $plat->query('SELECT * FROM Meal ORDER BY Id');

		return $menu;
	}
}


