@extends('layouts.master')
@section('title','Каталоги')
@section('menu')
@include('admin.menu')
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                   <div class="card-body">
                        <p>adminka </p>
                        <div>
                            <table class="table">
                                <tbody>
                                <tr>
                      <th> # </th>  <th> Название  </th> <th>  code </th> <th>  Действия </th>
                                </tr>
                                @foreach($Catalogs as $Catalog)
                        <tr>
                       <td>{{ $Catalog->id }}</td> <td>{{ $Catalog->name }}</td> <td>{{ $Catalog->code }}</td>
                                        {{--   // 'logo'--}}
                         <td>
                          <div class="btn-group" role="group">
                             <form action="{{ route('catalog.destroy', $Catalog) }}" method="POST">
                                  <a class="btn btn-success" type="button" href="{{ route('catalog.show', $Catalog) }}">Открыть</a>
                                  <a class="btn btn-warning" type="button" href="{{ route('catalog.edit', $Catalog) }}">Редактировать</a>
                                   @csrf
                                    @method('DELETE')
                                    <input class="btn btn-danger" type="submit" value="Удалить"></form>
                              </div>
                               </td>
                              </tr>
                               @endforeach
                                </tbody>
                            </table>
                            <a href="{{ route('catalog.create') }}"><button type="button" class="bth btn-success">Создать новую категорию</button></a>

                        </div>
                       {{--$Catalogs->links()--}}
                    </div></div></div></div>
@endsection
