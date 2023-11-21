<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $table = 'departments';
    protected $guarded = false;

    // Получить руководителя депортамента, через его должность которая привзяна к депортманту
    // 1 к 1 через общую сущность
    public function boss()
    {
        return $this->hasOneThrough(
            Worker::class,
            Position::class,
            'department_id',
            'position_id',
            'id',
            'id'
        )
        ->where('title', 'Boss');
    }

    // Получить всех работников из депортамента по их должностям которые привязаны к депортаменту
    // Один ко многим через общую сущность
    public function workers()
    {
        return $this->hasManyThrough(
            Worker::class,
            Position::class,
            'department_id' ,
            'position_id',
            'id',
            'id');
    }
}
