<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\AuthService;

class AdminController extends Controller
{
	public function __construct() {
		$this->SessionUser = AuthService::getSessionData();
	}

	public function index() {
        $session_user = $this->SessionUser;
        if (is_null($session_user)) {
        	return response('Unauthorized.', 401);
        }
        $user_permissions = $session_user->permissions;
        $user_groups      = $session_user->groups;
        dd($session_user->toArray());
        foreach ($user_groups as $group) {
            $group_permissions = $group->permissions;
            foreach ($group_permissions as $permission) {
                $user_permissions->push($permission);
            }
        }
        return view('admin.index', ['session_user' => $session_user]);
        //dd($this->SessionUser->permissions->toArray());
    }
}