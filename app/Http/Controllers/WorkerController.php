<?php

namespace App\Http\Controllers;

use App\Http\Requests\Worker\IndexRequest;
use App\Http\Requests\Worker\StoreRequest;
use App\Http\Requests\Worker\UpdataRequest;
use App\Models\Worker;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Isset_;

class WorkerController extends Controller
{
    public function index(IndexRequest $request)
    {
        $data = $request->validated();
        $workerQuery = Worker::query();

        if (isset($data['name'])) {
            $workerQuery->where('name', 'like', "%{$data['name']}%");
        }
        if (isset($data['surname'])) {
            $workerQuery->where('surname', 'like', "%{$data['surname']}%");
        }
        if (isset($data['email'])) {
            $workerQuery->where('email', 'like', "%{$data['email']}%");
        }
        if (isset($data['from'])) {
            $workerQuery->where('age', '>', $data["from"]);
        }
        if (isset($data['to'])) {
            $workerQuery->where('age', '<', $data["to"]);
        }
        if (isset($data['discription'])) {
            $workerQuery->where('discription', 'like', "%{$data['name']}%");
        }
        if (isset($data['is_married'])) {
            $workerQuery->where('is_married', true);
        }

        $workers = $workerQuery->paginate(4);
        return view('worker.index', compact('workers'));
    }

    public function show(Worker $worker)
    {
        return view('worker.show', compact('worker'));
    }

    public function create()
    {
        $this->authorize('create', Worker::class);
        return view('worker.create');
    }

    public function store(StoreRequest $request)
    {
        $this->authorize('create', Worker::class);

        $data = $request->validated();
        $data['is_married'] = isset($data['is_married']);
        Worker::create($data);
        return redirect()->route('workers.index');
    }

    public function edit(Worker $worker)
    {
        $this->authorize('create', $worker);
        return view('worker.edit', compact('worker'));
    }

    public function update(UpdataRequest $request, Worker $worker)
    {
        $this->authorize('update', $worker);
        $data = $request->validated();
        $data['is_married'] = isset($data['is_married']);
        $worker->update($data);
        return redirect()->route('workers.show', $worker->id);
    }

    public function destroy(Worker $worker)
    {
        $this->authorize('delete', $worker);
        $worker->delete();
        return redirect()->route('workers.index');
    }
}
