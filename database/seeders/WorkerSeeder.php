<?php

namespace Database\Seeders;

use App\Models\Worker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WorkerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Создаём связь 1 к 1 с профайлами поэтому переносим создание рабочих в сидер профайлов
        // Worker::factory(20)->create();
    }
}
