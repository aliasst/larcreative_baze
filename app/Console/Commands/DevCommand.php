<?php

namespace App\Console\Commands;

use App\Models\Client;
use App\Models\Position;
use App\Models\Profile;
use App\Models\Project;
use App\Models\Review;
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

        $worker = Worker::find(1);

        $worker->update([
            'age' => '25.000',
        ]);

    }







}
