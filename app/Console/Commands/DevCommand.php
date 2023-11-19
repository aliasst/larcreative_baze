<?php

namespace App\Console\Commands;

use App\Models\Position;
use App\Models\Profile;
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
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
      // $this->prepareData();
        $worker = Worker::find(3);
       // dd($worker->position->title);

        $position = Position::find(2);
        $workers = $position->workers;
        dd($workers->toArray());



    }

    public function prepareData()
    {
        $position_1 = Position::create([
            'title' => 'worker'
        ]);
        $position_2 = Position::create([
            'title' => 'manager'
        ]);

        $workerData1 = [
            'name' => 'Test',
            'surname' => 'Testovich',
            'email' => 'test@mail.ru',
            'position_id' => $position_1->id,
            'age' => 21,
            'description' => 'test test',
            'is_married' => true
        ];



        $workerData2 = [
            'name' => 'Test2',
            'surname' => 'Testovich2',
            'email' => 'test2@mail.ru',
            'position_id' => $position_2->id,
            'age' => 22,
            'description' => 'test2 test2',
            'is_married' => true
        ];

        $workerData3 = [
            'name' => 'Test3',
            'surname' => 'Testovich3',
            'email' => 'test3@mail.ru',
            'position_id' => $position_1->id,
            'age' => 22,
            'description' => 'test3 test3',
            'is_married' => true
        ];

        $worker1 = Worker::create($workerData1);
        $worker2 = Worker::create($workerData2);
        $worker3 = Worker::create($workerData3);

        $profileData = [
            'worker_id' => $worker1->id,
            'city' => 'Volgograd',
            'skill' => 'php',
            'experience' => 5,
            'finished_study_at' => '2020-06-01',
        ];

        $profileData2 = [
            'worker_id' => $worker2->id,
            'city' => 'Samara',
            'skill' => 'html',
            'experience' => 1,
            'finished_study_at' => '2023-06-01',
        ];

        $profileData3 = [
            'worker_id' => $worker3->id,
            'city' => 'Rostov',
            'skill' => 'css',
            'experience' => 1,
            'finished_study_at' => '2023-06-01',
        ];

        $profile = Profile::create($profileData);
        $profile2 = Profile::create($profileData2);
        $profile3 = Profile::create($profileData3);


    }
}
