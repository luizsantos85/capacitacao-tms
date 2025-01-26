@extends('layouts.panel')

@section('content-panel')

<div class="row">
    <div class="col-md-12">
        <h1 class="text-center">Cadastrar Tarefa</h1>
    </div>
</div>

<div class="row mt-3 d-flex justify-content-center">
    <div class="card col-md-6">
        @include('layouts.alerts')
        @include('tasks.form')
    </div>

</div>

@endsection
