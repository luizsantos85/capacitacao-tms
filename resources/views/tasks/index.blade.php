@extends('layouts.panel')

@section('content-panel')

<div class="row">
    <div class="col-md-12">
        <h1 class="text-center">Tarefas Cadastradas</h1>
    </div>
</div>
<div class="row">
    <div class="col-12">
        @include('layouts.alerts')
    </div>
</div>
<div class="row mt-3">
    <div class="col-12">
        <div class="col ml-auto p-0 text-right">
            <a href="{{route('tasks.create')}}" class="btn btn-outline-primary">Adicionar</a>
        </div>

        <div class="col-md-12 mt-4 p-0">
            <form class="form-group d-flex align-items-center justify-content-between" action="{{ route('tasks.search') }}" method="POST">
                <div class="form-group mr-2 col-md-8 p-0">
                    <input type="text" class="form-control mr-2" placeholder="Pesquisar tarefa" name="searchTitle">
                </div>
                <div class="form-group mr-2 col-md-3 p-0">
                    <select class="form-control" name="filterStatus">
                        <option value="" disabled selected>Filtrar por status</option>
                        <option value="0">Pendente</option>
                        <option value="1">Concluído</option>
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-outline-info btn-sm">
                        <i class="bi bi-search"></i>
                    </button>
                </div>
            </form>
        </div>

        <div class="card mt-3">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Título</th>
                        <th scope="col">Descrição</th>
                        <th scope="col">Status</th>
                        <th scope="col">Data de criação</th>
                        <th width="80">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($tasks as $task)
                    <tr>
                        <th scope="row">{{ $task->id }}</th>
                        <td>{{ $task->title }}</td>
                        <td>{{ $task->short_description }}</td>
                        <td>{{ $task->status ? 'Concluída' : 'Pendente' }}</td>
                        <td>{{ $task->created_at->format('d/m/Y') }}</td>
                        <td>
                            <a href="{{route('tasks.edit', $task->id)}}" class="mr-2"><i
                                    class="bi bi-pencil text-warning"></i></a>
                            <a href="#" onclick="deleteTask({{ $task->id }})"><i
                                    class="bi bi-trash text-danger"></i></a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center">Nenhuma tarefa cadastrada.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-2">
            @if (isset($dataForm))
            {!! $tasks->appends($dataForm)->links('pagination::bootstrap-4') !!}
            @else
            {!! $tasks->links('pagination::bootstrap-4') !!}
            @endif
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
    function deleteTask(id) {
        if (confirm('Deseja realmente excluir esta tarefa?')) {
            $.ajax({
                url: `/panel/tasks/${id}/delete`,
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    _method: 'DELETE'
                },
                success: function(result) {
                    alert(result.success);
                    window.location.href = `/panel/tasks`;
                },
                error: function(err) {
                    alert('Erro ao excluir a tarefa!');
                }
            });
        }
        return;
    }
</script>

@endpush
