<?php

namespace Leeuwenkasteel\Auth\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Terms extends Model
{
    use HasFactory;
	
	protected $table    = "terms";
    protected $fillable = ["date","terms"];
    protected $dates    = ['created_at', 'updated_at' ,"date"];
}