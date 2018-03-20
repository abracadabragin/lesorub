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
                            <span>Добавление отзыва</span>
                        </div>

                        <div class='card-body'>

                            @if (count($errors) > 0)
                                @foreach ($errors->all() as $error)
                                    <div class="alert alert-danger" role="alert">
                                        {{ $error }}
                                    </div>
                                @endforeach
                            @endif

                            <form action='{{route('storeFeedback')}}' method='POST' enctype="multipart/form-data">
                                {{ method_field('POST') }}
                                @csrf
                                <div class='container'>
                                    <div class="row justify-content-center">
                                        <div class='col-md-8'>

                                            <div class="form-group text-center">
                                                <label for="inputAuthorName"><b>Имя автора</b></label>
                                                <input class='form-control' id='inputAuthorName' type="text" name='author_name' placeholder='Иван Иванов' value='{{ old('author_name') }}' required>
                                            </div>

                                            <div class="form-group text-center">
                                                <label for="inputFeedbackText"><b>Текст отзыва</b></label>
                                                <textarea class='form-control' name='text' id='inputFeedbackText' rows='10' required>{{ old('text') }}</textarea>
                                            </div>

                                            <div class="form-group text-center">
                                                <label for="inputAuthorImage"><b>Фото автора</b></label>
                                                <input class="form-control-file" name='author_image' type="file" id="inputAuthorImage">
                                            </div>

                                            <div class="form-group text-center">
                                                <label for="inputPhotos"><b>Фото отзыва</b></label>
                                                <input class="form-control-file" name='photos[]' type="file" id="inputPhotos" multiple required>
                                            </div>

                                            <div class="form-group text-center">
                                                <button type="submit" class="btn btn-green">Добавить</button>
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