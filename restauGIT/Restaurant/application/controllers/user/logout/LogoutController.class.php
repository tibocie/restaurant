<?php

class LogoutController {

    public function httpGetMethod(Http $http, array $queryFields)
    {
    	session_unset(); 
		session_destroy();

		header('Location: ../..');
    }

    public function httpPostMethod(Http $http, array $formFields)
    {       
    	
    }
}