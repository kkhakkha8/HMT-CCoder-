<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Blog extends Model
{
    use HasFactory;
   //allow everycolumn in blogs table
   protected $guarded=[];
   //allow specific column in blogs table
   // protected $fillable=['title','intro','body'];
   protected $with=['category','author'];


   public function scopeFilter($query, $filter){ // Blog::latest()->filter()->get();
        $query->when($filter['search']??false,function($query,$search){
            $query->where('title','LIKE','%'. $search . '%')
                  ->orWhere('body','LIKE','%'. $search . '%');
                  return $query;
        });
   }
    public function category(){
        return  $this->belongsTo(Category::class);
    }
    public function author(){
        return $this->belongsTo(User::class,'user_id');
    }
}
