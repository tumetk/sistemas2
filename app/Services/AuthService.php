<?php

namespace App\Services;

use Auth;
use App\Http\Requests\User\RegisterFormRequest;

class AuthService
{
    public function __construct() {
        $this->request = new RegisterFormRequest();
    }

	public function authenticate($data)
    {

        if (Auth::attempt($data))
            return true;
        else
            return false;
    }
    
    public static function getSessionData(){
    	if (Auth::check())
			$user = Auth::user();
		else
            $user = null;
        return $user;
    }

    protected function validator(array $data) {
        $rules = $this->request->rules();
        return Validator::make($data,$rules);
    }
}
