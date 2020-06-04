<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    protected $fillable = ["nameStory", "author", "chap", "status", "timeUpdate", "catelogy"];
}
