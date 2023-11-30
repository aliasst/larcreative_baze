<?php

namespace App\Console\Commands;

use App\Http\Filters\Var2\Worker\Age;
use App\Http\Filters\Var2\Worker\Name;
use App\Jobs\SomeJob;
use App\Models\Client;
use App\Models\Position;
use App\Models\Profile;
use App\Models\Project;
use App\Models\Review;
use App\Models\Worker;
use App\Http\Filters\Var1\WorkerFilter;
use Illuminate\Console\Command;
use Illuminate\Pipeline\Pipeline;

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


        request()->merge(['age' => 32, 'name' => 'Torrance Walsh']);
        $workers = app()->make(Pipeline::class)
            ->send(Worker::query())
            ->through([
                Age::class,
                Name::class,
            ])
            ->thenReturn();

        dd($workers->get());



    }







}
