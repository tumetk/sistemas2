<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Request;
use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use App\Repositories\GroupRepository;
use App\Repositories\PermissionRepository;
use App\Http\Requests\User\EditFormRequest;
use App\Http\Requests\User\RegisterFormRequest;
use App\Services\AuthService;


class UserController extends Controller {

	public function __construct(
		UserRepository $user_repository,
		GroupRepository $group_repository,
		PermissionRepository $permission_repository
	)
	{
		$this->user_repository       = $user_repository;
		$this->group_repository      = $group_repository;
		$this->permission_repository = $permission_repository;
		$this->SessionUser           = AuthService::getSessionData();
	}
	
	public function UsersList() {
		$users = $this->user_repository->result(Request::input('search'));
		$array = [
			'users' => $users, 
			'session_user' => $this->SessionUser
		];
		return view ('admin.users.list', $array);
	}
	
	public function getUsersCreate() {
		$array = [
			'groups'       => $this->group_repository->all(),
			'permissions'  => $this->permission_repository->all(),
			'session_user' => $this->SessionUser
		];
        return view('admin.users.create',$array);
    }

    public function postUsersCreate(RegisterFormRequest $request) {
    	$groups_selected      = json_decode(Request::input('group-elements'),true);
        $permissions_selected = json_decode(Request::input('permission-elements'),true);
        $id                   = $this->user_repository->create(Request::all())->id;
        $this->user_repository->insertPermissions($id, $permissions_selected);
        $this->user_repository->insertGroups($id, $groups_selected);
        return redirect()->route('admin.users.list');
    }

	public function getUsersEdit($id) {
		$user                   = $this->user_repository->getUser($id);
		$user_permissions       = $user->permissions;
		$user_groups            = $user->groups;
		$user_permissions_ids   = array();
		$user_groups_ids        = array();
		$groups_permissions_ids = array();
		foreach ($user_permissions as $permission)
			array_push($user_permissions_ids, $permission->id);
		foreach ($user_groups as $group) {
			array_push($user_groups_ids, $group->id);
			$group_permissions = $group->permissions;
			foreach ($group_permissions as $p) {
				array_push($groups_permissions_ids, $p->id);
			}
		}
		$array = [
			'user'               => $user,
			'groups'             => $this->group_repository->all(),
			'permissions'        => $this->permission_repository->all(),
			'session_user'       => $this->SessionUser,
			'user_permissions'   => $user_permissions_ids,
			'user_groups'        => $user_groups_ids,
			'groups_permissions' => $groups_permissions_ids
		];
		return view('admin.users.edit', $array);
	}

	public function postUsersEdit(EditFormRequest $request, $id) {
		$groups_selected      = json_decode(Request::input('group-elements'), true);
        $permissions_selected = json_decode(Request::input('permission-elements'), true);
		$this->user_repository->updateUser($id, Request::all());
		$this->user_repository->updateGroups($id, $groups_selected);
		$this->user_repository->updatePermissions($id, $permissions_selected);
		return redirect()->route('admin.users.list')->with('status', trans('messages.updated'));
	}

	public function deleteUser($id) {
		$this->user_repository->delete($id);
		return redirect()->route('admin.users.list')->with('status', trans('messages.deleted.user'));
	}
}
