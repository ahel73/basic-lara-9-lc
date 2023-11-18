<?php

namespace App\Console\Commands;

use App\Models\Position;
use App\Models\Profile;
use App\Models\Project;
use App\Models\ProjectWorker;
use App\Models\Worker;
use Illuminate\Console\Command;

class DevCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'develop';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Some delops';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
//        $worker = Worker::find(1);
//        dump($worker->projects->toArray());

        // Добавление связей в сводную таблицу проектов и рабочих по ним
        // $worker = Worker::find(1);
        // $project = Project::find(1);
        // $project->workers()->attach($worker->id); // Добавляем связь проекта с рабочим
        // $project->workers()->toggle($worker->id); // Если есть аналогичная связь то удаляет если нет то добавляет. Можно передать массив
        // $project->workers()->attach([1,2,3]); // Для каждого эллемента массива добавляется связь
        // $project->workers()->sync(1); // Удаляет все связи и добавляет текущую
        // $project->workers()->detach(); // Удаляет все связи
        // dd($project->workers->toArray());

        return 0;
    }

    protected static function prepareData()
    {
        $position1 = Position::create(['title' => 'Developer']);
        $position2 = Position::create(['title' => 'Manager']);
        $position3 = Position::create(['title' => 'Designer']);

        $workerData1 = [
            'name' => 'Ivan',
            'surname' => 'Ivanov',
            'email' => 'ivan@mail.ru',
            'position_id' => $position1->id,
            'age' => 20,
            'discription' => 'Some description',
            'is_married' => false,
        ];
        $workerData2 = [
            'name' => 'Karl',
            'surname' => 'Petrov',
            'email' => 'Karl@mail.ru',
            'position_id' => $position2->id,
            'age' => 28,
            'discription' => 'Some description',
            'is_married' => true,
        ];
        $workerData3 = [
            'name' => 'Kate',
            'surname' => 'Krasavina',
            'email' => 'kate@mail.ru',
            'position_id' => $position1->id,
            'age' => 18,
            'discription' => 'Some description',
            'is_married' => false,
        ];
        $workerData4 = [
            'name' => 'Kate',
            'surname' => 'Krasavina',
            'email' => 'kate@mail.ru',
            'position_id' => $position1->id,
            'age' => 26,
            'discription' => 'Some description',
            'is_married' => true,
        ];
        $workerData5 = [
            'name' => 'Sofia',
            'surname' => 'Titova',
            'email' => 'Sofia@mail.ru',
            'position_id' => $position3->id,
            'age' => 20,
            'discription' => 'Some description',
            'is_married' => false,
        ];
        $workerData6 = [
            'name' => 'Liza',
            'surname' => 'Popova',
            'email' => 'Liza@mail.ru',
            'position_id' => $position3->id,
            'age' => 19,
            'discription' => 'Some description',
            'is_married' => false,
        ];

        $worker1 = Worker::create($workerData1);
        $worker2 = Worker::create($workerData2);
        $worker3 = Worker::create($workerData3);
        $worker4 = Worker::create($workerData4);
        $worker5 = Worker::create($workerData5);
        $worker6 = Worker::create($workerData6);

        $profileData1 = [
            'worker_id' => $worker1->id,
            'city' => 'Tokio',
            'skill' => 'Coder',
            'experience' => 5,
            'finished_study_at' => '2020-06-01',
        ];
        $profileData2 = [
            'worker_id' => $worker2->id,
            'city' => 'Rio',
            'skill' => 'Frontend',
            'experience' => 5,
            'finished_study_at' => '2020-06-01',
        ];
        $profileData3 = [
            'worker_id' => $worker3->id,
            'city' => 'Oslo',
            'skill' => 'Boss',
            'experience' => 1,
            'finished_study_at' => '2021-06-01',
        ];
        $profileData4 = [
            'worker_id' => $worker4->id,
            'city' => 'Omck',
            'skill' => 'Frontend',
            'experience' => 6,
            'finished_study_at' => '2015-06-01',
        ];
        $profileData5 = [
            'worker_id' => $worker5->id,
            'city' => 'Rome',
            'skill' => 'UI designer',
            'experience' => 3,
            'finished_study_at' => '2020-06-01',
        ];
        $profileData6 = [
            'worker_id' => $worker6->id,
            'city' => 'Paris',
            'skill' => 'designer',
            'experience' => 2,
            'finished_study_at' => '2019-06-01',
        ];

        $profile1 = Profile::create($profileData1);
        $profile2 = Profile::create($profileData2);
        $profile3 = Profile::create($profileData3);
    }

    protected static function prepareManyToMany ()
    {
        $workerManager = Worker::find(2);
        $workerBackend = Worker::find(1);
        $workerDesigner1 = Worker::find(5);
        $workerDesigner2 = Worker::find(6);
        $workerFrontEnd1 = Worker::find(4);
        $workerFrontEnd2 = Worker::find(3);

        $project1 = Project::create(['title' => 'Shop']);
        $project2 = Project::create(['title' => 'Blog']);

        ProjectWorker::create(['project_id' => $project1->id, 'worker_id' => $workerManager->id]);
        ProjectWorker::create(['project_id' => $project1->id, 'worker_id' => $workerBackend->id]);
        ProjectWorker::create(['project_id' => $project1->id, 'worker_id' => $workerDesigner1->id]);
        ProjectWorker::create(['project_id' => $project1->id, 'worker_id' => $workerFrontEnd1->id]);

        ProjectWorker::create(['project_id' => $project2->id, 'worker_id' => $workerManager->id]);
        ProjectWorker::create(['project_id' => $project2->id, 'worker_id' => $workerBackend->id]);
        ProjectWorker::create(['project_id' => $project2->id, 'worker_id' => $workerDesigner2->id]);
        ProjectWorker::create(['project_id' => $project2->id, 'worker_id' => $workerFrontEnd2->id]);
    }
}
