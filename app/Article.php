<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['title', 'content', 'author'];

        // protected $fillable = [/*'img',*/ 'title', 'content', 'author'];

}
