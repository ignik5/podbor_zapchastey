@extends('layouts.master')
@section('title','Товар  ')
@section('menu')
    @include('menu')
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <a class="btn btn-light" type="button" width="250px"  href="{{ URL::previous() }}" >Назад </a>
                        <h2>Товар :  {{ $product->name }}</h2>
                        <div>
                            <iframe src=" {{ $product->files }}" width="100%" height="700" >
                                Ваш браузер не поддерживает плавающие фреймы!
                            </iframe>
                            <h2>Запчасти </h2>
                                <table class="table">
                                    <tr>
                                        <th>
                                            Наименование
                                        </th>
                                        <th>
                                            Артикул
                                        </th>

                                        <th>
                                            Посмотреть на сайте
                                        </th>
                                    </tr>
                                    <tbody>
                                    @if(isset($zapchasts))
                                        @foreach($zapchasts as $Zapchast)
                                            <tr>
                                                <td>{{ $Zapchast->name }}</td>
                                                <td>{{ $Zapchast->article }}</td>

                                                <td>
                                                    <div class="btn-group" role="group">
                                                        <a class="btn btn-secondary"
                                                           href="{{ $Zapchast->link }}" target="_blank">открыть на сайте</a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                @endif
                        </div>
                    </div></div></div></div>
@endsection
