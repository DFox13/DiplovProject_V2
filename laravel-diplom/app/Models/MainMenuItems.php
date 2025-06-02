<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainMenuItems extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'image',
        'show_on_home', 
        'show_on_services', 
        'show_on_dentists',
    ];

    public function subMenuItems()
    {
        return $this->hasMany(SubMenuItems::class, 'main_menu_item_id');
    }
}