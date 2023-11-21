<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $table = 'profiles';
    protected $guarded = false;

    // 1 к 1 обратная связь
    // получаем рабочего по профелю
    public function worker()
    {
        return $this->belongsTo(Worker::class, 'worker_id', 'id');
    }
}
