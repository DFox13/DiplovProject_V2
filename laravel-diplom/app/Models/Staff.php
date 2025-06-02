<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Staff extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'middle_name',
        'position',
        'image_path',
    ];

    /**
     * Загрузка изображения
     *
     * @param mixed $image
     * @return string|null
     */
    public function setImageAttribute($image)
    {
        if ($image) {
            // Удаляем старое изображение, если оно существует
            if ($this->image_path && Storage::exists($this->image_path)) {
                Storage::delete($this->image_path);
            }

            // Сохраняем новое изображение
            $path = $image->store('staff_images', 'public');
            $this->attributes['image_path'] = $path;
        }
    }

    /**
     * Получение URL изображения
     *
     * @return string|null
     */
    public function getImageUrlAttribute()
    {
        return $this->image_path ? asset("storage/{$this->image_path}") : null;
    }
}