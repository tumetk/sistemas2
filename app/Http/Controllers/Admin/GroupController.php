<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Request;
use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use App\Repositories\GroupRepository;
use App\Repositories\PermissionRepository;
use App\Http\Requests\Group\EditFormRequest;
use App\Http\Requests\Group\RegisterFormRequest;
use App\Services\AuthService;


class GroupController extends Controller {
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

	public function GroupsList()
	{
		$groups = $this->group_repository->result(Request::input('search'));
		$array  = [
			'groups'       => $groups,
			'session_user' => $this->SessionUser
		];
		return view('admin.groups.list', $array);
	}

	public function getGroupsCreate()
	{
		$array = [
			'users'        => $this->user_repository->all(),
			'permissions'  => $this->permission_repository->all(),
			'session_user' => $this->SessionUser
		];
		return view('admin.groups.create',$array);
	}

	public function postGroupsCreate(RegisterFormRequest $Request)
	{
		$users_selected       = json_decode(Request::input('user-elements'),true);
		$permissions_selected = json_decode(Request::input('permission-elements'),true);
		$id                   = $this->group_repository->create(Request::all())->id;
		$this->group_repository->insertUsers($id, $users_selected);
		$this->group_repository->insertPermissions($id, $permissions_selected);
		return redirect()->route('admin.groups.list');
	}

	public function getGroupsEdit($id)
	{
		$group                 = $this->group_repository->getGroup($id);
		$group_users           = $group->users;
		$group_permissions     = $group->permissions;
		$group_users_ids       = array();
		$group_permissions_ids = array();
		foreach ($group_users as $g)
			array_push($group_users_ids, $g->id);
		foreach ($group_permissions as $permission)
			array_push($group_permissions_ids, $permission->id);
		$array = [
			'group'             => $group,
			'users'             => $this->user_repository->all(),
			'permissions'       => $this->permission_repository->all(),
			'session_user'      => $this->SessionUser,
			'group_users'       => $group_users_ids,
			'group_permissions' => $group_permissions_ids
		];
		return view('admin.groups.edit', $array);
	}

	public function postGroupsEdit(EditFormRequest $request, $id)
	{
		$users_selected       = json_decode(Request::input('user-elements'),true);
		$permissions_selected = json_decode(Request::input('permission-elements'),true);
		$this->group_repository->updateGroup($id, Request::all());
		$this->group_repository->updateUsers($id, $users_selected);
		$this->group_repository->updatePermissions($id, $permissions_selected);
		return redirect()->route('admin.groups.list')->with('status', trans('messages.updated'));
	}

	public function deleteGroup($id) {
		$this->group_repository->delete($id);
		return redirect()->route('admin.groups.list')->with('status', trans('messages.deleted.group'));
	}
}
