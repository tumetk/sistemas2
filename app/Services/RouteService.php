<?php

namespace App\Services;

class RouteService
{
	/*
	Add here the routes which are excluded from any route list
	to give permissions.	
	*/
	public function __construct() {
		 $this->except = [
		    'auth.login',
		    'auth.logout',
		    'admin.index',
		];
	}
}