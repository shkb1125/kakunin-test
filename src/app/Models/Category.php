<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'content'
    ];


    public function contacts()
    {
        return $this->hasMany('App\Models\Contact');
    }

    public function getContent()
    {
        return $this->content;
    }
}

