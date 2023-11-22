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
}
