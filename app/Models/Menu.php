<?php

namespace App\Models;

use Illuminate\Database\DBAL\TimestampType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post;
use APp\Models\Price;

class Menu extends Model{
    protected $fillable = ['user_id','menu','menu_id','price_id'];
    use HasFactory;
    public function post(){
        return $this->belongsToMany(Post::class,'menu_post', 'user_id', 'menu_id')->withTimestamps();
    }

    public function menuPost(){
        return $this->hasMany(menuPost::class, 'menu_id', 'id');
    }

    public function price(){
        return $this->belongsTo(Price::class, 'price_id');
    }

	/**
	 * @return mixed
	 */
	public function getFillable() {
		return $this->fillable;
	}
	
	/**
	 * @param mixed $fillable 
	 * @return self
	 */
	public function setFillable($fillable): self {
		$this->fillable = $fillable;
		return $this;
	}

}
