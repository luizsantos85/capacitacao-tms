@extends('layouts.panel')

@section('content-panel')

    <h1>Bem-vindo, {{ substr($user->name, 0, strpos($user->name, ' ')) }}</h1>



@endsection
