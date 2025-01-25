@extends('layouts.app')

@section('content')

<div class="row justify-content-center align-items-center vh-100">
    <div class="col-md-6">
        <div class="card shadow-sm">
            <div class="card-body p-4">
                <h2 class="text-center mb-4"> {{$title ?? 'Criar usuário'}} </h2>

                @include('layouts.alerts')
                
                <form method="POST" action="{{route('user.store')}}">
                    @csrf
                    @include('user.form')
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
