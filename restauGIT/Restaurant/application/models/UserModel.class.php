<?php

class UserModel {


	public function addUser($post) {

		$today = date("Y-m-d H:i:s");
		$birthday = $post['year'].'-'.$post['mois'].'-'.$post['jour'];
		$hashPwd = $this->hashPassword($post['password']);

		$database = new Database();

		$database->executeSql('INSERT INTO 
								User (FirstName, LastName, Email, Password, BirthDate, Address, City, ZipCode, Country, Phone, CreationTimestamp, LastLoginTimestamp) 
							   VALUES 
							   (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NULL)',  

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

		header('Location: user/login');
		exit();
	}


	public function connectUser($post) {

		$database = new Database();

		$user = $database->queryOne('SELECT * FROM User WHERE Email =?', [ $post['mail'] ]);

		var_dump($user);

		if( $user != false && $this->verifyPassword($post['password'], $user['Password']) == true ) {
			$_SESSION['Id'] = $user['Id'];
			$_SESSION['Email'] = $user['Email'];
			$_SESSION['FirstName'] = $user['FirstName'];
			$_SESSION['LastName'] = $user['LastName'];
		}


		header('Location: ../');
		exit();
	}


	private function hashPassword($password)
    {

        $salt = '$2y$11$'.substr(bin2hex(openssl_random_pseudo_bytes(32)), 0, 22);

        return crypt($password, $salt);
    }

    private function verifyPassword($password, $hashedPassword)
	{
		return crypt($password, $hashedPassword) == $hashedPassword;
	}

	public function sendMailForChangePassword($email) {

		$database = new Database();
		$user = $database->queryOne('SELECT * FROM User WHERE Email =?', [ $email ]);

		var_dump($user);

		if ($user != false) {
			$message = 'Cliquez sur le lien :<a href=changePassword.php?id="'.$user['Password'].'&mail='.$user['Email'].'">cliquez ici</a>';


			// attention on envoie toujours l'url de change sur un mail !!!!!!!

			//mail($user['email'], 'change password', $message);


			// ça c'est mal !!!!!!!!!!!
			header('Location: changePassword.php?id='.$user['Password'].'&mail='.$user['Email']);
			exit();

			return 'yes';
		} else {

			return 'no';

		}
		
	}

	 public function modifyPassword($password, $id, $email) {
    
    	$hashPwd = $this->hashPassword($password);
        
    	$database = new Database();

		$database->executeSql('UPDATE User SET Password = ? WHERE Password = ? AND Email = ?', [ $hashPwd, $id, $email ]);

		header('Location: login.php');
		exit();  
    }
}


?>