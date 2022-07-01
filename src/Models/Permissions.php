<?php

namespace Leeuwenkasteel\Auth\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Permissions extends Model
{
    use HasFactory;
	use SoftDeletes;
	
	protected $fillable = [
        'name', 'slug'
    ];
	
	public function roles() {
		return $this->belongsToMany(Role::class,'roles_permissions');     
	}

	public function users() {
	   return $this->belongsToMany(User::class,'users_permissions');   
	}
}