@extends('components.layout')

@section('title', 'Лесоруб - Создать')
@section('nav-title', 'Панель администратора')

@section('content')
    @include('components.admin.menu')

    <main class='py-4'>
        <div class='container'>
            <div class="row justify-content-center">
                <div class='col-md-8'>
                    <div class='card'>

                        <div class='card-header text-center'>
                            <span>Изменение товара</span>
                        </div>

                        <div class='card-body'>
                            @if (count($errors) > 0)
                                @foreach ($errors->all() as $error)
                                    <div class="alert alert-danger" role="alert">
                                        {{ $error }}
                                    </div>
                                @endforeach
                            @endif
                            <form action='{{route('updateProduct', $product)}}' method='post' enctype="multipart/form-data">
                                {{ method_field('PATCH') }}
                                @csrf
                                <div class='container'>
                                    <div class="row justify-content-center">

                                        <div class='col-md-8'>
                                            <div class="form-group text-center">
                                                <label for="selectProductType"><b>Тип</b></label>
                                                <select class="form-control" name='type' id="selectProductType">
                                                    <option value='bath' @if($product['type'] === 'bath') selected @endif>Баня</option>
                                                    <option value='house' @if($product['type'] === 'house') selected @endif>Дом</option>
                                                </select>
                                            </div>

                                            <div class="form-group text-center">
                                                <label for="inputProductTitle"><b>Название</b></label>
                                                <input class='form-control' id='inputProductTitle' type="text"
                                                       name='title'
                                                       placeholder='Одноэтажная деревянная баня &laquo;Славянка&raquo;'
                                                       value='{{ $product['title'] }}'
                                                       required>
                                            </div>

                                            <div class="form-group text-center">
                                                <label for="inputProductDescription"><b>Описание</b></label>
                                                <textarea class='form-control' name='description'
                                                          id='inputProductDescription'
                                                          rows='10'
                                                          required>{{ $product['description'] }}</textarea>
                                            </div>
                                            <div class="form-check text-center">
                                                <input class='form-check-input' id='inputProductDiscount'
                                                       type="checkbox"
                                                       name='discount'
                                                        {!! $product["discount"] ? 'checked="checked"' : '' !!}>
                                                <label class='form-check-label' for="inputProductDiscount"><b>Акция?</b></label>
                                            </div>
                                            <div class='row'>
                                                <div class='col'>
                                                    <div class="form-group text-center">

                                                        <label for="inputProductPrice"><b>Цена</b></label>
                                                        <input class='form-control' id='inputProductPrice' type="text"
                                                               name='price' placeholder='150000'
                                                               value='{{ $product['price'] }}' required>

                                                    </div>
                                                </div>
                                                <div class='col'>
                                                    <div class="form-group text-center">

                                                        <label for="inputProductPrice"><b>Старая цена</b></label>
                                                        <input class='form-control' id='inputProductPrice' type="text"
                                                               name='old-price' placeholder='200000'
                                                               value='{{ $product['old-price'] }}'>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group text-center">
                                                <label for="inputProductImage"><b>Добавить изображения</b></label>
                                                <input class="form-control-file" name='photos[]' type="file"
                                                       id="inputProductImage" value='Выбрать' multiple required>
                                            </div>

                                            <div class="form-group text-center">
                                                <button type="submit" class="btn btn-green">Изменить</button>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection