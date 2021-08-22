@extends('layouts.master')
@section('title','Товары')
@section('menu')
    @include('admin.menu')
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <p>Продукты</p>
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
                                        Code
                                    </th>

                                    <th>
                                        Каталог
                                   </th>
                                    <th>
                                        Действия
                                    </th>
                                </tr>
                                @foreach($Products as $Product)
                                    <tr>
                                        <td>{{ $Product->id }}</td>
                                        <td>{{ $Product->name }}</td>
                                        <td>{{ $Product->article }}</td>
                                        <td>{{ $Product->code }}</td>
                                        <td>@if(isset($Product->Catalog()->name))
                                          {{ $Product->Catalog()->name }}
                                               @else
                                                нет каталогов
                                          @endif</td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <form action="{{ route('product.destroy', $Product) }}" method="POST">
                                                    <a class="btn btn-success" type="button" href="{{ route('product.show', $Product) }}">Запчасти</a>
                                                    <a class="btn btn-warning" type="button" href="{{ route('product.edit', $Product) }}">Редактировать</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <input class="btn btn-danger" type="submit" value="Удалить"></form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <a href="{{ route('product.create') }}"><button type="button" class="bth btn-success">Создать новый продукт</button></a>
                        </div>
                    </div></div></div></div>
@endsection
