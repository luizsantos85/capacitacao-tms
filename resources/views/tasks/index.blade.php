@extends('layouts.panel')

@section('content-panel')

<div class="row">
    <div class="col-md-12">
        <h1 class="text-center">Tarefas Cadastradas</h1>
    </div>
</div>

<div class="row mt-3">
    <div class="col-12">
        <div class="col ml-auto p-0 text-right">
            <a href="#" class="btn btn-outline-primary">Adicionar</a>
        </div>

        <div class="d-flex col-md-12 p-0 mt-2">
            <form action="" class="d-flex col-md-8 p-0 mr-2">
                <input type="text" class="form-control mr-2" placeholder="Pesquisar tarefa">
                <button type="submit" class="btn btn-outline-info">
                    <i class="bi bi-search"></i>
                </button>
            </form>

            <form class="col ml-auto p-0 text-right" onchange="teste()">
                <select class="form-control">
                    <option value="" disabled selected>Filtrar por status</option>
                    <option value="pendente">Pendente</option>
                    <option value="concluido">Concluído</option>
                </select>
            </form>
        </div>

        <div class="card mt-3">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Título</th>
                        <th scope="col">Descrição</th>
                        <th width="80"></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($tasks as $task)
                    <tr>
                        <th scope="row">{{ $task->id }}</th>
                        <td>{{ $task->title }}</td>
                        <td>{{ $task->short_description }}</td>
                        <td>
                            <a href="#" class="mr-2"><i class="bi bi-pencil text-warning"></i></a>
                            <a href="#" onclick="deleteTask({{ $task->id }})"><i class="bi bi-trash text-danger"></i></a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center">Nenhuma tarefa cadastrada.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>


        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
    function teste() {
        alert('teste');
    }

    function deleteTask(id) {
        alert(id);
    }
</script>

@endpush
