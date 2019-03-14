<?php

class RegisterController
{
	public function httpGetMethod(Http $http, array $queryFields)
    {
		if(empty($_GET) == false) {
	
		$user = new UserModel();
		$user->addUser($queryFields);

		var_dump($queryFields);
    }
}

    public function httpPostMethod(Http $http, array $formFields)
    {
		if(empty($_POST) == false) {
	
		$user = new UserModel();
		$user->addUser($formFields);

		var_dump($formFields);
	}


}
}