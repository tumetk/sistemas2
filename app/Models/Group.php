<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Permission;

class Group extends Model
{
	protected $table    = 'groups';
	protected $fillable = ['name'];

	public function users() {
		return $this->belongsToMany(User::class, 'user_groups', 'group_id', 'user_id');
	}

	public function permissions() {
		return $this->belongsToMany(Permission::class, 'group_permissions', 'group_id', 'permission_id');
	}
}
