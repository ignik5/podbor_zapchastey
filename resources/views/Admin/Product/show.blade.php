@extends('layouts.master')
@section('title','Товар')
@section('menu')
    @include('admin.menu')
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                                    <h2>Продукт </h2>
                        <p>Название- {{$Product->name}}</p>
                        <p>Код -{{$Product->code}}</p>
                        <p>Каталог @if(isset($Product->Catalog()->name))
                                                    {{ $Product->Catalog()->name }}
                                                @else
                                                    нет каталога
                                                @endif</p>
                        <p>Артикул {{$Product->article}}</p>
                        <p>Ссылка на продукт {{$Product->link}}</p>
                        <p>Ссылка на разрыв схему {{$Product->files}}</p>
                                            <div>
                                                <table class="table">
                                                    <h2>Запчасти </h2>
                                                    <tbody>
                                                    @if(isset($Zapchasts))
                                                        @foreach($Zapchasts as $Zapchast)
                                                            <tr>
                                                                <td>{{ $Zapchast->id }}</td>
                                                                <td>{{ $Zapchast->name }}</td>
                                                                <td>{{ $Zapchast->article }}</td>
                                                                <td>@if(isset($Zapchast->product()->name))
                                                                        {{ $Zapchast->product()->name }}
                                                                    @else
                                                                        нет продукта
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    <div class="btn-group" role="group">
                                                                        <form action="{{ route('zapchast.destroy', $Zapchast) }}" method="POST">
                                                                            <a class="btn btn-success" type="button" href="{{ route('zapchast.show', $Zapchast) }}">Открыть</a>
                                                                            <a class="btn btn-warning" type="button" href="{{ route('zapchast.edit', $Zapchast) }}">Редактировать</a>
                                                                            @csrf
                                                                            @method('DELETE')
                                                                            <input class="btn btn-danger" type="submit" value="Удалить"></form>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                                @endif
                                                <a href="{{ route('zapchast.create') }}"><button type="button" class="bth btn-success">Добавить запчасть</button></a>
                                            </div>
                    </div></div></div></div>
@endsection
