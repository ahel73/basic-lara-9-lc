<?php

namespace App\Models;

use App\Events\Worker\CreatedEvent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Worker extends Model
{
    use HasFactory;
    protected $table = 'workers';
    protected $guarded = false;

    protected static function booted()
    {
        // $model зарезервированное слово содержащие модель созданного рабочего
        static::created(function ($model) {
            // инициализируем событие
            event(new CreatedEvent($model));

            // можно событие обработать внутри модели
            // Profile::create(['worker_id' => $model->id]);
        });
    }

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

    // Полиморфная связь 1 ко многим получаем все отзывы которые оставлены рабочему
    public function reviews()
    {
        return $this->morphMany(Review::class, 'reviewable');
    }

    // Полиморфная связь многие ко многим много рабочих у которых много тегов
    // Получаем все теги по рабочему
    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }
}
