<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateTaskRequest;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        $tasks = $user->tasks;

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

        if (Task::create($dataForm))
            return redirect()->route('tasks.index')
            ->with('success', 'Cadastro realizado com sucesso.');
        else
            return redirect()->back()
                ->with('error', 'Falha ao cadastrar.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        //
    }
}
