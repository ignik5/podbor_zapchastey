@extends('layouts.master')
@section('title','Создание Каталога')
@section('menu')
    @include('admin.menu')
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <form  enctype="multipart/form-data" method="POST"  @isset($Catalog)
                               action="{{ route('catalog.update', $Catalog)}}"
                               @else
                               action="{{ route('catalog.store') }}"
                            @endisset>
                           @isset($Catalog)
                                @method('PUT')
                            @endisset
                            @csrf
                            <div class="form-group">
                                <label for="name" >Название каталога</label>
                                <input id="name" type="text" class="form-control" name="name" value="{{ $Catalog->name ?? old( 'name' ) }}">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="form-control">
                                   Сохранить
                                </button>
                            </div>
                        </form>
                    </div></div></div></div></div>
@endsection





