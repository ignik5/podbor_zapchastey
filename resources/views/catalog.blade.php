@extends('layouts.master')
@section('title','Каталог')
@section('menu')
    @include('menu')
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">


                        <h2>Каталог </h2>

                        <div>
                                @foreach($catalogs as $catalog)
                                        <a class="btn btn-secondary" type="button" width="250px" href="{{ route('catalog.product', $catalog->code) }}">{{ $catalog->name }}</a>
                                @endforeach
                        </div>
                    </div></div></div></div>
@endsection
