<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use APp\Models\Menu;

/**
 * Summary of Price
 */
class Price extends Model
{
    use HasFactory;
    protected $fillable = ['menu_id','price_id'];

    /**
     * Summary of Menu
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Menu(){
        return $this->belongsTo(Menu::class, 'menu_id', 'price_id');
    }

    public function menuPost(){
        return $this->belongsTo(menuPost::class, 'menu_id', 'price_id');
    }
}
