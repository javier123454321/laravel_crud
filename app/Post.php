<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //eloquent assumes that the table is called posts based on the name of class
    //I am telling it otherwise here.
    // protected $table = 'posts_table';

    //eloquent asks which values to you want to be able to mass assign
    //or the inverse is which values to guard through the $guarded param
    // protected $guarded = [];
    protected $fillable = ['name', 'body', 'slug'];//Now we can use the ::create method with these values
    
    public function author(){
        return $this->belongsTo(User::class, 'user_id');//Overriding the key column name in the db that the post has 
    }

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }
}
