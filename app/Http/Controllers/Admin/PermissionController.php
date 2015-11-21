<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Request;
use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use App\Repositories\GroupRepository;
use App\Repositories\PermissionRepository;
use Illuminate\Routing\Router;
use App\Http\Requests\Permission\EditFormRequest;
use App\Http\Requests\Permission\RegisterFormRequest;
use App\Services\AuthService;
use App\Services\RouteService;

class PermissionController extends Controller {
	public function __construct(
		UserRepository $user_repository,
		GroupRepository $group_repository,
		PermissionRepository $permission_repository,
		RouteService $route_service
	)
	{
		$this->user_repository       = $user_repository;
		$this->group_repository      = $group_repository;
		$this->permission_repository = $permission_repository;
		$this->SessionUser           = AuthService::getSessionData();
		$this->route_service         = $route_service;
	}

	public function PermissionsList()
	{
		$permissions = $this->permission_repository->result(Request::input('search'));
		$array       = [
			'permissions'  => $permissions,
			'session_user' => $this->SessionUser
		];
		return view('admin.permissions.list', $array);
	}

	public function getPermissionsCreate()
	{
		$invalid_routes = $this->route_service->except;
		$list = array();
		$valid_routes = \Route::getRoutes()->getRoutes();
		$i = 0;
		foreach ($valid_routes as $v) {
			if (isset($valid_routes[$i]) && $v->getMethods()[0] != 'GET' && $v->getMethods()[0] != null) {
				unset($valid_routes[$i]);
			}
			array_push($list, $v->getName());
			$i++;
		}
		foreach ($invalid_routes as $invalid) {
			while ($index = array_search($invalid, $list)) {
				unset($list[$index]);
				unset($valid_routes[$index]);
			}
		}
		$array = [
			'users'        => $this->user_repository->all(),
			'groups'       => $this->group_repository->all(),
			'table_routes' => $this->permission_repository->allRoutes(),
			'app_routes'   => $valid_routes,
			'session_user' => $this->SessionUser
		];
		return view('admin.permissions.create',$array);
	}

	public function postPermissionsCreate(RegisterFormRequest $Request)
	{
		$users_selected  = json_decode(Request::input('user-elements'),true);
		$groups_selected = json_decode(Request::input('group-elements'),true);
		$id              = $this->permission_repository->create(Request::all())->id;
		$this->permission_repository->insertUsers($id, $users_selected);
		$this->permission_repository->insertGroups($id, $groups_selected);
		return redirect()->route('admin.permissions.list');
	}

	public function getPermissionsEdit($id)
	{
		$permission            = $this->permission_repository->getPermission($id);
		$permission_users      = $permission->users;
		$permission_groups     = $permission->groups;
		$permission_users_ids  = array();
		$permission_groups_ids = array();
		$groups_users_ids      = array();
		foreach ($permission_users as $u)
			array_push($permission_users_ids, $u->id);
		foreach ($permission_groups as $group) {
			array_push($permission_groups_ids, $group->id);
			$permission_group_users = $group->users;
			foreach ($permission_group_users as $usr) {
				array_push($groups_users_ids, $usr->id);
			}
		}
		$array = [
			'permission'                  => $permission,
			'users'                       => $this->user_repository->all(),
			'groups'                      => $this->group_repository->all(),
			'permissions'                 => $this->permission_repository->all(),
			'session_user'                => $this->SessionUser,
			'permission_users'            => $permission_users_ids,
			'permission_groups'           => $permission_groups_ids,
			'inherited_permissions_users' => $groups_users_ids
		];
		return view('admin.permissions.edit', $array);
	}

	public function postPermissionsEdit(EditFormRequest $request, $id) {
		$users_selected  = json_decode(Request::input('user-elements'),true);
		$groups_selected = json_decode(Request::input('group-elements'),true);
		$this->permission_repository->updatePermission($id, Request::all());
		$this->permission_repository->updateUsers($id, $users_selected);
		$this->permission_repository->updateGroups($id, $groups_selected);
		return redirect()->route('admin.permissions.list')->with('status', trans('messages.updated'));
	}

	public function deletePermission($id) {
		$this->permission_repository->delete($id);
		return redirect()->route('admin.permissions.list')->with('status', trans('messages.deleted.permission'));
	}
}
