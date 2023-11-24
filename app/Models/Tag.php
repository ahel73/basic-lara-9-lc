<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $table = 'tags';
    protected $guarded = false;

    // Полиморфные отношения многие ко многим получаем всех рабочих по тегу
    public function workers()
    {
        return $this->morphedByMany(Worker::class, 'taggable');
    }

    // Полиморфные отношения многие ко многим получаем всех клиентов по тегу
    public function clients()
    {
        return $this->morphedByMany(Client::class, 'taggable');
    }
}
