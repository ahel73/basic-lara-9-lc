<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $table = 'clients';
    protected $guarded = false;

    // Полиморфная связь 1 к 1 рабочий и его аватарка
    public function avatar()
    {
        return $this->morphOne(Avatar::class, 'avatarable');
    }

    // Полиморфная связь 1 ко многим получаем все отзывы которые оставлены слиенту
    public function reviews()
    {
        return $this->morphMany(Review::class, 'reviewable');
    }

    // Полиморфная связь многие ко многим много клиентов у которых много тегов
    // Получаем все теги по рабочему
    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }
}
