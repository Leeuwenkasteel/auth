<?php

namespace Leeuwenkasteel\Auth\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Leeuwenkasteel\Auth\Models\Permissions;
use Leeuwenkasteel\Helpers\Sluggable;

class Role extends Model
{
    use HasFactory;
	use SoftDeletes;
	use Sluggable;

	
	protected $fillable = [
        'name', 'slug'
    ];

	private static $sluggableConfig= [
        "slug_column" => "slug",
        "slug_from_column" => "name"
    ];
	
	public function permissions() {
		return $this->belongsToMany(Permissions::class,'roles_permissions');      
	}

	public function users() {
	   return $this->belongsToMany(User::class,'users_roles');  
	}
}