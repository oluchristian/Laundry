@if (session()->has('message'))
    <div class="alert alert-success col-md-6 col-xl-6 offset-3 my-4">
        {{ session('message') }}
    </div>
 @endif

@if ($errors->any())
    <div class="alert alert-danger">
    <ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
    </ul>
    </div>
@endif