<?php

class OrderModel
{
	public function order(){

		$data = new Database();

		$order = $data->query('SELECT * FROM Order, OrderLine ORDER BY Id');

		return $order;
	}
}