<!DOCTYPE HTML>
<head>
    <meta  charset="utf-8">
    <title>страница @yield('title')</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <meta name="csrf-token" content="{{csrf_token()}}">
</head>
<body>
<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
               @yield('menu')
            </ul>
            <ul class="navbar-nav ml-auto">
            </ul>
        </div>
    </div>
</nav>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="list-unstyled">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if (session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{session('success')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="close">
        <span aria-hidden="true"></span>
    </button>
</div>
@endif
<main class="py-4">
    @yield('content')
</main>
<script src="{{ asset('js/app.js')}}" defer></script>
</body>
</html>
