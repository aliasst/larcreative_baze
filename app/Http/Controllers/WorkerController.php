<?php

namespace App\Http\Controllers;

use App\Http\Filters\Var1\WorkerFilter;
use App\Http\Requests\Worker\IndexRequest;
use App\Http\Requests\Worker\StoreRequest;
use App\Http\Requests\Worker\UpdateRequest;
use App\Models\Worker;
use Illuminate\Http\Request;

class WorkerController extends Controller
{
    public function create() {
        $this->authorize('create', Worker::class);
        return view('worker.create');
    }

    public function store(StoreRequest $request) {

        $this->authorize('create', Worker::class);

        $data = $request->validated();

        $data['is_married'] = isset($data['is_married']);

        Worker::create($data);

        return redirect()->route('workers.index');


    }

    public function index(IndexRequest $request) {

        $data = $request->validated();

        $workerQuery = Worker::query();

        $filter = new WorkerFilter($data);
        $filter->applyFilter($workerQuery);


        //$workers = Worker::paginate(4);

        $workers = $workerQuery->paginate(4);


       return view('worker.index', compact('workers'));

    }

    public function show(Worker $worker) {

        return view('worker.show', compact('worker'));
    }

    public function edit (Worker $worker) {
        $this->authorize('update', $worker);
        return view('worker.edit', compact('worker'));
    }

    public function update(Worker $worker, UpdateRequest $request) {
        $this->authorize('update', $worker);

        $data = $request->validated();
        $data['is_married'] = isset($data['is_married']);

        $worker->update($data);

        return redirect()->route('workers.edit', $worker->id);
    }

    public function destroy(Worker $worker) {
        $worker->delete();
        return redirect()->route('workers.index');

    }


}
