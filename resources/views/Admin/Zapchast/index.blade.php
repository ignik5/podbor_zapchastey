@extends('layouts.master')
@section('title','Запчасти')
@section('menu')
    @include('admin.menu')
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <p>Запчасти </p>
                        <div>
                            <table class="table">
                                <tbody>
                                <tr>
                                    <th>
                                        #
                                    </th>
                                    <th>
                                        Название
                                    </th>
                                    <th>
                                        Артикул
                                    </th>
                                    <th>
                                        Для товара
                                    </th>
                                    <th>
                                        Действия
                                    </th>
                                </tr>
                                @foreach($Zapchasts as $Zapchast)
                                    <tr>
                                        <td>{{ $Zapchast->id }}</td>
                                        <td>{{ $Zapchast->name }}</td>
                                        <td>{{ $Zapchast->article }}</td>
                                        <td>@if(isset($Zapchast->product()->name))
                                          {{ $Zapchast->product()->name }}
                                               @else
                                                нет продукта
                                          @endif</td>
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
                            <a href="{{ route('zapchast.create') }}"><button type="button" class="bth btn-success">Создать нового сотрудника</button></a>

                        </div>
                    </div></div></div></div>
@endsection
