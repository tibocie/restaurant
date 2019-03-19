<?php

class AccountModel
{
	public function listAccount(){

		$data = new Database();

		$users = $data->query('SELECT * FROM User ORDER BY Id');

		return $users;
	}

	public function listOneAccount($x){

		$data = new Database();

		$user = $data->queryOne('SELECT * FROM User WHERE Id = ?', [$x]);

		return $user;
	}

	public function refreshUser($post) {

		$today = date("Y-m-d H:i:s");
		$birthday = $post['year'].'-'.$post['mois'].'-'.$post['jour'];
		$hashPwd = $this->hashPassword($post['password']);

		$database = new Database();

		$database->executeSql('UPDATE
								User 
							   SET FirstName, LastName, Email, Password, BirthDate, Address, City, ZipCode, Country, Phone, CreationTimestamp, LastLoginTimestamp 
							   VALUES 
							   (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NULL)
							   WHERE Id=$_SESSION["Id"]',   

								[ 
									$post['nom'], 
									$post['prenom'],
									$post['mail'],
									$hashPwd,
									$birthday,
									$post['adresse'],
									$post['ville'],
									$post['zip'],
									$post['country'],
									$post['tel'],
									$today
								]);

		header('Location: user/account');
		exit();
	}
}