<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateTaskRequest;
use App\Models\Task;
use Illuminate\Http\Request;


class TaskController extends Controller
{

    protected $totalPage = 3;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        $tasks = $user->tasks()
            ->orderBy('status','asc')
            ->paginate($this->totalPage);

        return view('tasks.index', compact('tasks','user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUpdateTaskRequest $request)
    {
        $user = auth()->user();
        $dataForm = $request->all();
        $dataForm['user_id'] = $user->id;

        if (!Task::create($dataForm)) {
            return redirect()->back()
                ->with('error', 'Falha ao cadastrar.');
        }

        return redirect()->route('tasks.index')
            ->with('success', 'Cadastro realizado com sucesso.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreUpdateTaskRequest $request, Task $task)
    {
        $dataForm = $request->all();
        $dataForm['status'] = $request->has('status') ? 1 : 0;

        if (!$task->update($dataForm)) {
            return redirect()->back()
                ->with('error', 'Falha ao atualizar.');
        }

        return redirect()->route('tasks.index')
            ->with('success', 'Atualização realizada com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        if (!$task->delete()) {
            return response()->json(['error' => 'Erro ao deletar'], 500);
        }

        return response()->json(['success' => 'Deletado com sucesso'], 200);
    }

    public function search(Request $request)
    {
        $user = auth()->user();
        $dataForm = $request->except('_token');
        $tasks = (new Task)->search($dataForm, $this->totalPage);

        return view('tasks.index', compact('tasks', 'user','dataForm'));
    }
}
