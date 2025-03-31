<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;
use App\Models\Comment;

class Post extends Model
{
    use HasFactory, SoftDeletes;
	protected $fillable = [ 
        'user_id',
		'title',
		'description',
		'file_path'
    ];
	
	public function users()
	{
		return $this->belongsTo(User::class);
	}
	
	public function commentss()
	{
		return $this->hasMany(Comment::class);
	}
	
	public function getTitleAttribute($value)
	{
		return ucwords($value);
	}
}
