<footer class='jumbotron mb-0 pb-0' id='contacts'>

    <div class='container mb-5'>

        <div class='row justify-content-center mb-5'>

            <h3 class='section-header'>Контактная информация</h3>

        </div>

        <div class='row'>

            <div class='col-md-6 col-lg-3 mb-md-5'>

                @if (count($errors) > 0)
                    <div id='errors'>
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger" role="alert">
                            {{ $error }}
                        </div>
                    @endforeach
                    </div>
                @endif
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
                        <button class='btn btn-green btn-send' type='submit'>Оставить заявку</button>
                    </div>

                </form>

            </div>

            <div class='col-md-6 col-lg-3 text-center mb-md-5'>
                <h6><strong>Телефон:</strong></h6>
                <p><a href='tel:+73832637073'>+7 (383) 263-70-73</a></p>
                <p><a href='tel:+79039007073'>+7-903-900-70-73</a></p>
                <h6><strong>E-mail:</strong></h6>
                <p><a href="mailto:lesorubnsk@mail.ru">lesorubnsk@mail.ru</a></p>
            </div>
            <div class='col-md-6 col-lg-3 text-center'>
                <h6><strong>Наш адрес:</strong></h6>
                <address>
                    г. Новосибирск,<br> ул. Инская, 39,<br> офис 301
                </address>
                <h6><strong>Время работы:</strong></h6>
                <p>ПН-ПТ 10:00-19:00<br>СБ-ВС - по договоренности</p>
            </div>
            <div class='col-md-6 col-lg-3 text-center'>
                <h6><strong>Социальные сети</strong></h6>
                <p>Будьте на связи с нами в ваших любимых социальных сетях и получайте информацию из первых рук! Эти ссылки помогут вам.</p>
                <div class='d-flex justify-content-around'>
                    <a class='social-vk' target="_blank" title="Мы в ВК" href="https://vk.com/id424113390"><i class="fab fa-vk fa-3x"></i></a>
                    <a class='social-ok' target="_blank" title="Мы в ОК" href="https://ok.ru/profile/590566205463"><i class="fab fa-odnoklassniki fa-3x"></i></a>
                    <a class='social-instagram' target="_blank" title="Мы в Instagram" href="https://www.instagram.com/lesorubnsk/"><i class="fab fa-instagram fa-3x"></i></a>
                    <a class='social-skype' title="Мы в Skype" href="skype:Lesorub Nsk"><i class="fab fa-skype fa-3x"></i></a>
                </div>
            </div>

        </div>

    </div>
    <hr>
    <div class='container text-center py-5'>
        <small class='copyright'>© Лесоруб, 2013-2018. Все права защищены.</small>
    </div>
</footer>