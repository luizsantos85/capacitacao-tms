<form action="{{ isset($task) ? route('tasks.update', $task->id) : route('tasks.store') }}" method="post">
    @csrf

    @if (isset($task))
        @method('PUT')
    @endif

    <div class="card-body">
        <div class="form-group">
            <label for="title">Título</label>
            <input type="text" class="form-control" id="title" name="title"
                value="{{ old('title', isset($task) ? $task->title : '') }}" >
        </div>

        <div class="form-group">
            <label for="description">Descrição</label>
            <textarea class="form-control" id="description" name="description"
            rows="3">{{ old('description', isset($task) ? $task->description : '') }}</textarea>
        </div>

        <div class="form-group">
            <label for="status">Concluída?</label>
            <input type="checkbox" id="status" name="status" value="1" {{ isset($task) && $task->status ? 'checked' : ''
            }}>
        </div>

        <div class="d-flex justify-content-end">
            <a href="{{ route('tasks.index') }}" class="btn btn-secondary mr-2">Cancelar</a>
            <button type="submit" class="btn btn-primary">Salvar</button>
        </div>
    </div>
</form>
