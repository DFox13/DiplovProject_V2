<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubMenuItems extends Model
{
    use HasFactory;

    protected $fillable = [
        'main_menu_item_id',
        'title',
    ];

    public function mainMenuItem()
    {
        return $this->belongsTo(MainMenuItems::class, 'main_menu_item_id');
    }
}