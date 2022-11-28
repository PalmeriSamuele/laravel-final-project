<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function category_blogs(){
        return $this->belongsTo(CategoryBlog::class);
    }
    // public function reviews(){
    //     return $this->belongsToMany(Review::class);
    // }


    
}
