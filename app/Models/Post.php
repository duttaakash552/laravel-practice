<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;

class Post extends Model
{
    use HasFactory, SoftDeletes;
	protected $fillable = [ 
        'user_id',
		'title',
		'description'
    ];
	
	public function users()
	{
		return $this->belongsTo(User::class);
	}
	
	public function getTitleAttribute($value)
	{
		return ucwords($value);
	}
}
