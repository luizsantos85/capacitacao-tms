@extends('layouts.app')

@section('content')
<div class="d-flex">
    <div class="bg-dark border-right vh-100 d-flex flex-column">
        <div class="sidebar-heading text-white my-4">Dashboard</div>

        <div class="list-group list-group-flush flex-grow-1">
            <a href="{{route('panel.index')}}" class="list-group-item list-group-item-action bg-dark text-white">
                Home
            </a>
            <a href="{{ route('tasks.index')}}" class="list-group-item list-group-item-action bg-dark text-white">
                Tasks
            </a>
        </div>


        <form action="{{ route('logout') }}" method="POST" class="mt-auto">
            @csrf
            <button type="submit" class="list-group-item list-group-item-action bg-light">Logout</button>
        </form>
    </div>

    <!-- Page Content -->
    <div class="flex-grow-1 overflow-auto">
        <div class="container-fluid mt-4">

            @yield('content-panel')

        </div>
    </div>
</div>

@endsection
