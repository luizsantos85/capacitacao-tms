@extends('layouts.app')

@section('content')


    <div class="d-flex" id="wrapper">

        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <a class="nav-link" href="#">Dashboard</a>

                    <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                        <li class="nav-item dropdown">
                            <a class="dropdown-item" href="#">Profile</a>
                        </li>
                        <li class="nav-item dropdown">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-danger">Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="container-fluid mt-4">
                <h1 class="mt-4">Bem vindo</h1>
                <div class="row">
                    <div class="col-12">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem unde ipsam minima explicabo expedita, omnis quas, quos hic dolores consequuntur earum amet ullam! Est amet ipsam nostrum exercitationem autem nemo?
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
