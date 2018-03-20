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
                            <span>Изменение отзыва</span>
                        </div>

                        <div class='card-body'>

                            @if (count($errors) > 0)
                                @foreach ($errors->all() as $error)
                                    <div class="alert alert-danger" role="alert">
                                        {{ $error }}
                                    </div>
                                @endforeach
                            @endif

                            <form action='{{route('updateFeedback', $feedback)}}' method='POST' enctype="multipart/form-data">
                                {{ method_field('PATCH') }}
                                @csrf
                                <div class='container'>
                                    <div class="row justify-content-center">
                                        <div class='col-md-8'>

                                            <div class="form-group text-center">
                                                <label for="inputAuthorName"><b>Имя автора</b></label>
                                                <input class='form-control' id='inputAuthorName' type="text" name='author_name' placeholder='Иван Иванов' value='{{ $feedback['author_name'] }}' required>
                                            </div>

                                            <div class="form-group text-center">
                                                <label for="inputFeedbackText"><b>Текст отзыва</b></label>
                                                <textarea class='form-control' name='text' id='inputFeedbackText' rows='10' required>{{ $feedback['text'] }}</textarea>
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