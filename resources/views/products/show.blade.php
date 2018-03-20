<div class="modal fade modalShowProduct" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">

        <div class="modal-content">
            <div class='maximize-item' style='display: none;'>
                <button type="button" class="close">
                    <span>&times;</span>
                </button>
                <div class='img-block'>
                </div>
            </div>
            <div class='modal-header'>
                <h5 class="modal-title"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="row modal-product">
                    <div class="col-12 modal-photos">
                        <div class='owl-carousel owl-theme owl-drag'>
                        </div>
                    </div>
                    <div class="col-12 col-md-8">
                        <div class='text-right border-bottom mb-3'>Стоимость от <span class='modal-price' style='color:#646F4A'></span> рублей</div>
                        <div class='modal-description'></div>
                    </div>
                    <div class="col-12 col-md-4 modal-formexit mt-3 pt-3 mt-md-0 pt-md-0">
                        <form class='contact-form' action='{{ route('sendMessage') }}' method='POST'>
                            {{ method_field('POST') }}
                            @csrf
                            <input type='hidden' name='product_name' value=''>
                            <div class='form-group'>
                                <label for='name'>Ваше имя</label>
                                <input class='form-control' type='text' name='name' id='name' required>
                            </div>
                            <div class='form-group'>
                                <label for='phone'>Ваш телефон</label>
                                <input class='form-control' type='tel' name='phone' id='phone' required>
                            </div>
                            <div class='form-group'>
                                <label for='email'>Ваш e-mail</label>
                                <input class='form-control' type='email' name='email' id='email' required>
                            </div>
                            <div class='form-group text-center'>
                                <button class='btn btn-green btn-send' type='submit'>Заказать</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>