<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Blog extends Model
{
    use HasFactory;
    protected $fillable = ['title','intro','body'];
    //protected $guarded = [];

    //eager loading
    //protected $with=['category','author'];
    //protected $without = ['category'];

    public function category(){
        return  $this->belongsTo(Category::class);
    }
    public function author(){
        return $this->belongsTo(User::class,'user_id');
    }
}
