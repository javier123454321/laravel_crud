<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //eloquent assumes that the table is called posts based on the name of class
    //I am telling it otherwise here.
    // protected $table = 'posts_table';

    //eloquent asks which values to you want to be able to mass assign
    protected $fillable = ['name', 'body', 'slug'];//Now we can use the ::create method with these values
    
}
