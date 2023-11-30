<?php

namespace App\Console\Commands;

use App\Jobs\SomeJob;
use App\Models\Client;
use App\Models\Position;
use App\Models\Profile;
use App\Models\Project;
use App\Models\Review;
use App\Models\Worker;
use App\Http\Filters\Var1\WorkerFilter;
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

        $workerQuery = Worker::query();
        $filter = new WorkerFilter(['from' => 25]);
        $filter->applyFilter($workerQuery);
        dd($workerQuery->get());


    }







}
