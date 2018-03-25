<section class='container-fluid container_carousel'>
    <div class="carousel slide">
        <div class="carousel-inner">
            <div class="carousel-item current" data-src="{{URL::asset('img/carousel/slide1.jpg')}}">
                <div class='carousel-info'>
                    <div class='container'>
                        <div class='row mb-xl-5 pb-xl-5'>
                            <div class='col-8'></div>
                            <div class='col-4 guarantee'></div>
                        </div>
                        <div class='row justify-content-center'>
                            <div class='col-10 col-xl-12'>
                                <div class='carousel-block'>
                                    <h2 class='carousel-text'>Построено объектов — 217</h2>
                                    <h2 class='carousel-text'>Общая площадь — 10 850 м<sup>2</sup></h2>
                                    <h2 class='carousel-text'>Реализовано 3255 куб/м древесины</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="darkness"></div>
            </div>
            <div class="carousel-item" data-src="{{URL::asset('img/carousel/slide2.jpg')}}">
                <div class='carousel-info'>
                    <div class='container'>
                        <div class='row justify-content-center mt-5'>
                            <div class='col-10 col-xl-12'>
                                <div class='carousel-block'>
                                    <h2 class='carousel-text'>Выбери проект прямо сейчас и получи подарок!</h2>
                                    <h2 class='carousel-text'>Фундамент, кровлю или скидку 15%!</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="darkness"></div>
            </div>
            <div class="carousel-item" data-src="{{URL::asset('img/carousel/slide3.jpg')}}">
                <div class='carousel-info'>
                    <div class='container'>
                        <div class='row justify-content-center justify-content-md-start mt-5'>
                            <div class='col-10 col-lg-6'>
                                <div class='carousel-block'>
                                    <p class='carousel-text mb-0'>Строительная компания "Лесоруб" занимает высокую
                                        ступень рынка загородного домостроения. Компания "Лесоруб" занимается
                                        проектированием, производством и строительством домов из бруса, каркасных домов
                                        с учетом русских традиций домостроения и применения новейших технологий.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="darkness"></div>
            </div>
            <div class='carousel-caption'>
                <a class='nav-link' href='#discounts'>
                    <i class="fas fa-angle-double-down"></i>
                </a>
            </div>
        </div>
        <div class='carousel-form'>
            <div class='container'>
                <div class='row justify-content-center'>
                    <div class='col-10 offset-md-7 col-md-5 offset-xl-9 col-xl-3'>
                        <form class='contact-form' action='{{ route('sendMessage') }}' method='POST'>
                            {{ method_field('POST') }}
                            @csrf
                            <input type='hidden' name='form_type' value='1'>
                            <div class='form-group'>

                                <label for='name'>Ваше имя:</label>
                                <input class='form-control' type='text' name='name' id='name' required>

                            </div>

                            <div class='form-group'>

                                <label for='phone'>Ваш телефон:</label>
                                <input class='form-control' type='tel' name='phone' id='phone' required>

                            </div>

                            <div class='form-group'>

                                <label for='email'>Ваш e-mail:</label>
                                <input class='form-control' type='email' name='email' id='email' required>

                            </div>

                            <div class='form-group text-center'>
                                <button class='btn btn-transparent btn-send' type='submit'>Оставить заявку</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <a class="carousel-control-prev" role="button">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    </a>
    <a class="carousel-control-next" role="button">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
    </a>
</section>