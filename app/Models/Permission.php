<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Group;

class Permission extends Model
{
	protected $table    = 'permissions';
	protected $fillable = ['name', 'route'];

	public function users() {
		return $this->belongsToMany(User::class, 'user_permissions', 'permission_id', 'user_id');
	}

	public function groups() {
		return $this->belongsToMany(Group::class, 'group_permissions', 'permission_id', 'group_id');
	}
}
