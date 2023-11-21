<?php

namespace App\Console\Commands;

use App\Models\Client;
use App\Models\Position;
use App\Models\Profile;
use App\Models\Project;
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
       //$this->prepareData();
      // $this->prepareManyToMany();
        $worker = Worker::find(1);

        /* $worker->avatar()->create([
            'path' => 'ava_1.png'
        ]);
        */

       // dd($worker->avatar->toArray());

        $client = Client::find(1);

        $client->avatar()->create([
            'path' => 'ava_2.jpg'
        ]);

        dd($client->avatar->toArray());


    }

    public function prepareData()
    {
        $position_1 = Position::create([
            'title' => 'worker'
        ]);
        $position_2 = Position::create([
            'title' => 'manager'
        ]);

        $position_3 = Position::create([
            'title' => 'trener'
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

        $workerData4 = [
            'name' => 'Test4',
            'surname' => 'Testovich4',
            'email' => 'test4@mail.ru',
            'position_id' => $position_1->id,
            'age' => 21,
            'description' => 'test4 test4',
            'is_married' => true
        ];



        $workerData5 = [
            'name' => 'Test5',
            'surname' => 'Testovich5',
            'email' => 'test5@mail.ru',
            'position_id' => $position_3->id,
            'age' => 22,
            'description' => 'test5 test5',
            'is_married' => true
        ];

        $workerData6 = [
            'name' => 'Test6',
            'surname' => 'Testovich6',
            'email' => 'test3@mail.ru',
            'position_id' => $position_1->id,
            'age' => 22,
            'description' => 'test3 test6',
            'is_married' => true
        ];

        $worker1 = Worker::create($workerData1);
        $worker2 = Worker::create($workerData2);
        $worker3 = Worker::create($workerData3);

        $worker4 = Worker::create($workerData4);
        $worker5 = Worker::create($workerData5);
        $worker6 = Worker::create($workerData6);

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

        $profileData4 = [
            'worker_id' => $worker4->id,
            'city' => 'Rostov',
            'skill' => 'css',
            'experience' => 1,
            'finished_study_at' => '2023-06-01',
        ];

        $profileData5 = [
            'worker_id' => $worker5->id,
            'city' => 'Rostov',
            'skill' => 'css',
            'experience' => 1,
            'finished_study_at' => '2023-06-01',
        ];

        $profileData6 = [
            'worker_id' => $worker6->id,
            'city' => 'Rostov',
            'skill' => 'css',
            'experience' => 1,
            'finished_study_at' => '2023-06-01',
        ];

        $profile = Profile::create($profileData);
        $profile2 = Profile::create($profileData2);
        $profile3 = Profile::create($profileData3);
        $profile4 = Profile::create($profileData4);
        $profile5 = Profile::create($profileData5);
        $profile6 = Profile::create($profileData6);


    }

    public function prepareManyToMany() {
            $workerWorker = Worker::find(1);
            $workerManager = Worker::find(2);
            $workerTrener = Worker::find(5);

            $project1 = Project::create([
                'title' => 'Project 1'
            ]);

            $project2 = Project::create([
                'title' => 'Project 2'
            ]);

            $project1->workers()->attach([
                $workerWorker->id,
                $workerManager->id,
                $workerTrener->id
            ]);

            $project2->workers()->attach([

            $workerTrener->id
        ]);

    }



}
