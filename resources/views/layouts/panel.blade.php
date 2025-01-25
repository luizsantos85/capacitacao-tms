@extends('layouts.app')

@section('content')
<div class="d-flex" id="wrapper">
    <div class="bg-dark border-right vh-100 d-flex flex-column" id="sidebar-wrapper">
        <div class="sidebar-heading text-white my-4">Dashboard</div>

        <div class="list-group list-group-flush flex-grow-1">
            <a href="{{route('panel.index')}}"
                class="list-group-item list-group-item-action bg-dark text-white">Home</a>
            <a href="#" class="list-group-item list-group-item-action bg-dark text-white">Tasks</a>
        </div>

        
        <form action="{{ route('logout') }}" method="POST" class="mt-auto">
            @csrf
            <button type="submit" class="list-group-item list-group-item-action bg-dark text-white">Logout</button>
        </form>
    </div>

    <!-- Page Content -->
    <div id="page-content-wrapper">
        <div class="container-fluid mt-4">

            @yield('content-panel')

        </div>
    </div>
</div>

@endsection
