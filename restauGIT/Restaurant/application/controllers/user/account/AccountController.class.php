<?php

class AccountController {

    public function httpGetMethod(Http $http, array $queryFields)
    {
    	$accountModel = new AccountModel();
        $users = $accountModel->listAccount();

        $user = $accountModel->listOneAccount($_SESSION['Id']);
        return ['users' => $users,
                'user' => $user];

        if(empty($_GET) == false) {
	
			$refreshuser = new AccountModel();
			$refreshuser->refreshUser($queryFields);
		}
    }

    public function httpPostMethod(Http $http, array $formFields)
    {       
    	$accountModel = new AccountModel();
        $users = $accountModel->listAccount();

        $user = $accountModel->listOneAccount($_SESSION['Id']);
        return ['users' => $users,
                'user' => $user];

        if(empty($_GET) == false) {
	
			$refreshuser = new AccountModel();
			$refreshuser->refreshUser($formFields);
		}
    }
}