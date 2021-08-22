@extends('layouts.master')
@section('title','Каталог')
@section('menu')
    @include('admin.menu')
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <p>Каталог {{ $Catalog->name }} </p>
                        <div>
                                        <p>ID   -   {{ $Catalog->id }}</p>
                                        <p>Название   -  {{ $Catalog->name }}</p>
                                        <p>Код каталога    -  {{ $Catalog->code }}</p>
                    </div></div></div></div>
@endsection
