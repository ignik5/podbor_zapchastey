@extends('layouts.master')
@section('title','Cоздание Товара')
@section('menu')
    @include('admin.menu')
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <form  enctype="multipart/form-data" method="POST"  @isset($Product)
                        action="{{ route('product.update', $Product)}}"
                               @else
                               action="{{ route('product.store') }}"
                            @endisset>
                            @isset($Product)
                                @method('PUT')
                            @endisset
                            @csrf
                            <div class="form-group">
                                <label for="name" >Название</label>
                                <input id="name" type="text" class="form-control" name="name" value="{{  $Product->name ?? old( 'name' ) }}">
                            </div>
                            <div class="form-group">
                                <label for="article" >Артикул</label>
                                <input id="article" type="text" class="form-control" name="article" value="{{ $Product->article ?? old( 'article' ) }}">
                            </div>
                                <div class="form-group">
                                    <label for="files" >Ссылка на документ</label>
                                    <input id="files" type="text" class="form-control" name="files" value="{{ $Product->files ?? old( 'files' ) }}">
                                </div>
                                <div class="form-group">
                                    <label for="catalog_id">В каталоге</label>
                                    <select id="catalog_id" class="form-control" name="catalog_id">
                                        @foreach($Catalogs as $Catalog)
                                            <option value="{{ $Catalog->id ?? 'id' }}"
                                                    @isset($Product)
                                                    @if($Product->Catalog_id == $Catalog->id)
                                                    selected
                                                @endif
                                                @endisset
                                            >{{ $Catalog->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                            <div class="form-group">
                                <button type="submit" class="form-control">
                                    Сохранить
                                </button>
                            </div>
                        </form>

                    </div></div></div></div></div>
@endsection





