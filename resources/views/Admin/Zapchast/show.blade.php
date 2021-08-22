@extends('layouts.master')
@section('title','Запчасть')
@section('menu')
    @include('admin.menu')
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                                    <h2>Запчасть </h2>
                                    <p>Название- {{$Zapchast->name}}</p>
                                    <p>Код -{{$Zapchast->code}}</p>
                                    <p>Для товара  @if(isset($Zapchast->Product()->name))
                                            {{ $Zapchast->Product()->name }}
                                        @else
                                            нет товара
                                        @endif</p>
                                    <p>Артикул {{$Zapchast->article}}</p>
                                                <div class="btn-group" role="group">
                                                    <form action="{{ route('zapchast.destroy', $Zapchast) }}" method="POST">
                                                        <a class="btn btn-success" type="button" href="{{ route('zapchast.show', $Zapchast) }}">Открыть</a>
                                                        <a class="btn btn-warning" type="button" href="{{ route('zapchast.edit', $Zapchast) }}">Редактировать</a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <input class="btn btn-danger" type="submit" value="Удалить"></form>
                                                </div>
                                <a href="{{ route('zapchast.create') }}"><button type="button" class="bth btn-success">Создать нового сотрудника</button></a>
                        </div>
                    </div></div></div></div>
@endsection
