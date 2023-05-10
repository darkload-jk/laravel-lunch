<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class menuPost extends Model{
    use HasFactory;

    protected $table = "menu_post";
    protected $fillable = ['user_id','menu_id', 'post_id', 'price_id'];
    
    public function post(){
        return $this->belongsToMany(Post::class);
    }

    public function menu(){
        return $this->belongsTo(Menu::class,'menu_id');
    }

}
