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
                        <h2>Каталог :  {{ $catalog->name }}</h2>
                        <div>
                            @foreach($products as $product)
                            <a class="btn btn-secondary" type="button"     style="min-width: 150px;"
                                     href="{{ route('product.zapchast', [$catalog->code, $product->code]) }}">{{ $product->name }}</a>
                            @endforeach
                        </div>
                    </div></div></div></div>
@endsection
