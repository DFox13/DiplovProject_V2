<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainMenuItems extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
    ];

    public function subMenuItems()
    {
        return $this->hasMany(SubMenuItems::class, 'main_menu_item_id');
    }
}