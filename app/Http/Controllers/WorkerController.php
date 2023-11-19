<?php

namespace App\Http\Controllers;

use App\Http\Requests\Worker\IndexRequest;
use App\Http\Requests\Worker\StoreRequest;
use App\Http\Requests\Worker\UpdateRequest;
use App\Models\Worker;
use Illuminate\Http\Request;

class WorkerController extends Controller
{
    public function create() {

        return view('worker.create');
    }

    public function store(StoreRequest $request) {
        $data = $request->validated();

        $data['is_married'] = isset($data['is_married']);

        Worker::create($data);

        return redirect()->route('worker.index');


    }

    public function index(IndexRequest $request) {

        $data = $request->validated();

        $workerQuery = Worker::query();


        if( isset($data['name'])) {
            $workerQuery->where('name', 'like', "%{$data['name']}%");
        }

        if( isset($data['surname'])) {
            $workerQuery->where('name', 'like', "%{$data['surname']}%");
        }

        if( isset($data['email'])) {
            $workerQuery->where('name', 'like', "%{$data['email']}%");
        }

        if( isset($data['from'])) {
            $workerQuery->where('age', '>', $data['from']);
        }

        if( isset($data['to'])) {
            $workerQuery->where('age', '<', $data['to']);
        }
        if( isset($data['description'])) {
            $workerQuery->where('description', '<', $data['description']);
        }

        if( isset($data['is_married'])) {
            $workerQuery->where('is_married', true);
        }



        //$workers = Worker::paginate(4);

        $workers = $workerQuery->paginate(4);


       return view('worker.index', compact('workers'));

    }

    public function show(Worker $worker) {

        return view('worker.show', compact('worker'));
    }

    public function edit (Worker $worker) {

        return view('worker.edit', compact('worker'));
    }

    public function update(Worker $worker, UpdateRequest $request) {
        $data = $request->validated();
        $data['is_married'] = isset($data['is_married']);

        $worker->update($data);

        return redirect()->route('worker.edit', $worker->id);
    }

    public function delete(Worker $worker) {
        $worker->delete();
        return redirect()->route('worker.index');

    }


}
