<div class="row">
    <div class="col-md-12 my-1">
        @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{session('success')}}
        </div>
        @endif

        @if (session()->has('error'))
        <div class="alert alert-danger" role="alert">
            {{session('error')}}
        </div>
        @endif

        @if (isset($errors) && $errors->any())
        <ul class="list-group">
            @foreach ($errors->all() as $error)
            <li class="list-group-item list-group-item-danger text-white">{{$error}}</li>
            @endforeach
        </ul>
        @endif

    </div>
</div>
