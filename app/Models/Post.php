<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Facades\Auth;
use App\Models\Menu;
use App\Models\menuPost;

class Post extends Model{
    use HasFactory;

    public function user(){
        return $this->belongstoMany(User::class);
    }

    public function menu(){
        return $this->belongsToMany(Menu::class, 'menu_post', 'post_id', 'menu_id')
                    ->withPivot('price_id')
                    ->withTimestamps();
    }
    
    public function menuPost(){
        return $this->hasMany(MenuPost::class)->select(['menu_id', 'price_id', 'fee']);
    }

}
