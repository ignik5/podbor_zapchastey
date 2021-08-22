@extends('layouts.master')
@section('title','Cоздание Запчасти')
@section('menu')
    @include('admin.menu')
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <form  enctype="multipart/form-data" method="POST"  @isset($Zapchast)
                        action="{{ route('zapchast.update', $Zapchast)}}"
                               @else
                               action="{{ route('zapchast.store') }}"
                            @endisset>
                            @isset($Zapchast)
                                @method('PUT')
                            @endisset
                            @csrf
                            <div class="form-group">
                                <label for="name" >Название </label>
                                <input id="name" type="text" class="form-control" name="name" value="{{ $Zapchast->name ?? old( 'name' ) }}">
                            </div>

                            <div class="form-group">
                                <label for="article" >Артикул</label>
                                <input id="article" type="text" class="form-control" name="article" value="{{ $Zapchast->article ?? old( 'article' ) }}">
                            </div>
                                <div class="form-group">
                                    <label for="Product"> Для товара</label>
                                    <select id="Product" class="form-control" name="product_id">
                                        @foreach($Products as $Product)
                                            <option value="{{ $Product->id ?? 'product_id' }}"
                                                    @isset($Zapchast)
                                                    @if($Zapchast->Product_id == $Product->id)
                                                    selected
                                                @endif
                                                @endisset
                                            >{{ $Product->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            <div class="form-group">
                                <label for="link" >Ссылка</label>
                                <input id="link" type="text" class="form-control" name="link" value="{{ $Zapchast->link ?? old( 'link' ) }}">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="form-control">
                                    Сохранить
                                </button>
                            </div>
                        </form>
                    </div></div></div></div></div>
@endsection





