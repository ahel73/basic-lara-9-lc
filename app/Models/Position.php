<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;
    protected $table = 'positions';
    protected $guarded = false;

    // Отношение один ко многим получаем всех рабочих по должности
    public function workers()
    {
        return $this->hasMany(Worker::class, 'position_id', 'id');
    }

    // отношение один ко многим обратная связь
    // получаем депортамент к которому привязана должность
    public function dapartment()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }
}
