<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $table = 'authors';
    public $primaryKey = 'id';
    public $timestamps = true;

    public function books(){
        return $this->hasMany('App\Models\Book');
    }

    public function user(){
        return $this->belongsTo('App\Models\User');

    }
}
