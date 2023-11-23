<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $table = 'reviews';
    protected $guarded = false;

    // получаем клиента или рабочего кому оставлен отзыв
    public function reviewable()
    {
        return $this->morphTo();
    }
}
