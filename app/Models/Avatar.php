<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avatar extends Model
{
    use HasFactory;

    protected $table = 'avatars';
    protected $guarded = false;

    // получаем клиента или рабочего кому принадлежит аватар
    public function avatarable()
    {
        return $this->morphTo();
    }
}
