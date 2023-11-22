<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Worker extends Model
{
    use HasFactory;
    protected $table = 'workers';
    protected $guarded = false;

    // 1 к 1
    // Получить профиль рабочего
    public function profile()
    {
        return $this->hasOne(Profile::class, 'worker_id', 'id');
    }

    // Одношение один ко многим обратная связи
    // Рабочий получает свою должность
    public function position()
    {
        return $this->belongsTo(Position::class, 'position_id', 'id' );
    }

    // Отношение многие ко многим
    // Рабочий получает проекты в которых работает
    public function projects()
    {
        return $this->belongsToMany(Project::class, 'project_workers', 'worker_id', 'project_id', );
    }

    // Полиморфная связь 1 к 1 рабочий и его аватарка
    public function avatar()
    {
        return $this->morphOne(Avatar::class, 'avatarable');
    }
}
