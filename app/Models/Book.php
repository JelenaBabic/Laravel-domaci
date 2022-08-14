<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $table = 'books';
    public $primaryKey = 'id';
    public $timestamps = true;

    public function house(){
        return $this->belongsTo('App\Models\House');

    }

    public function author(){
        return $this->belongsTo('App\Models\Author');

    }

}

