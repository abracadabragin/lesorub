@extends('components.layout')


@section('title')
    @if (Auth::check())
        Лесоруб - Админ
    @else
        Лесоруб
    @endif
@endsection

@section('nav-title', 'Панель администратора')


@section('content')
    <div class='preloader d-flex justify-content-center align-items-center'>
        <div class='loader'></div>
    </div>
    @if (Auth::check())
        @include('components.admin.menu')
    @else
        @include('components.visitor.menu')
        @include('components.visitor.carousel')
    @endif

    @include('components.discounts')
    <section class='stock'>
        @include('components.baths')
        @include('components.houses')
    </section>
    @if (!Auth::check())
        @include('components.visitor.advantages')
    @endif
    @include('components.feedbacks')
    @if (!Auth::check())
        @include('components.visitor.services')
        @include('components.visitor.yandex-map')
        @include('components.visitor.contacts')
    @endif
    @include('products.show')
    @include('feedbacks.show')
    @include('components.visitor.thanks')
@endsection