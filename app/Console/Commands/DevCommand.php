<?php

namespace App\Console\Commands;

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

        $profile = Profile::find(1);

        $workername = $profile->worker->surname;

        echo($workername);

        $worker = Worker::find(1);

        $workercity = $worker->profile->city;

        echo $workercity;

    }

    public function prepareData()
    {
        $workerData = [
            'name' => 'Test',
            'surname' => 'Testovich',
            'email' => 'test@mail.ru',
            'age' => 21,
            'description' => 'test test',
            'is_married' => true
        ];

        $worker = Worker::create($workerData);

        $profileData = [
            'worker_id' => $worker->id,
            'city' => 'Volgograd',
            'skill' => 'php',
            'experience' => 5,
            'finished_study_at' => '2020-06-01',
        ];

        $profile = Profile::create($profileData);


    }
}
