$(document).ready(function () {

    var $items = $(".carousel-item");
    var $wHeight = $(window).height();
    var $wWidth = $(window).width();
    var carousel_prev = $('.carousel-control-prev');
    var carousel_next = $('.carousel-control-next');

    $items.height($wHeight);

    if ($wWidth > 576) {
        $items.each(function() {
            var $src = $(this).data('src');
            $(this).css('background-image', 'url(' + $src + ')');
        });
    } else {
        //$('.darkness').remove();
        carousel_next.remove();
        carousel_prev.remove();
        $items.each(function(index) {
            if(index > 0) {
                $(this).remove();
            }
        });
        // $items.first().css('background-color', '#fff');
    }

    $(window).on('resize', function (){
        $wHeight = $(window).height();
        $items.height($wHeight);
    });

    carousel_prev.click(function () {

        $items.each(function ($index) {

            if($(this).hasClass("current")) {
                $(this).removeClass("current");

                if ($index === 0 ) {
                    $items.last().addClass('current');

                } else {
                    $items.eq($index - 1).addClass('current');
                }
                return false;
            }
        });

    });
    carousel_next.click(function () {

        $items.each(function ($index) {

            if($(this).hasClass("current")) {
                $(this).removeClass("current");
                if ($index === $items.length - 1) {
                    $items.first().addClass('current');
                } else {
                    $items.eq($index + 1).addClass('current');
                }
                return false;
            }
        });

    });
    // -- end carousel
    // -- begin nav
    var offsetHeight = $('#navbar-main').height();

    $('.nav-collapse').scrollspy({
        offset: offsetHeight
    });

    $('.nav-link').click(function () {

        var scrollPos = $('body').find($(this).attr('href')).offset().top - offsetHeight;
        $('body,html').animate({
            scrollTop: scrollPos
        }, 500);

        if($('.navbar-toggler').css('display') !== 'none') {
            $('.navbar-toggler').click();
        }

        return false;
    });
    // -- end nav
    // -- begin owlcarousels
    var owlParams = {
        item: 3,
        margin: 10,
        lazyLoad: true,
        responsive:{
            0:{
                items:1
            },
            768:{
                items: 3
            }
        }
    };
    $('.card-img-top').first().on('load', function () {
        $('.card-img-top').height($(this).height());
        var heights = $(".card-body .card-title").map(function ()
            {
                return $(this).outerHeight();
            }).get(),
            maxHeight = Math.max.apply(null, heights);
        $('.card-body .card-title').css('min-height', maxHeight);
    });

    $("#discounts .owl-carousel").owlCarousel(owlParams);
    $("#baths .owl-carousel").owlCarousel(owlParams);
    $("#houses .owl-carousel").owlCarousel(owlParams);

    $('#discounts .owl-prev').click(function () {
        $("#discounts .owl-carousel").trigger('prev.owl.carousel', [400]);
    });
    $('#discounts .owl-next').click(function () {
        $("#discounts .owl-carousel").trigger('next.owl.carousel', [400]);
    });
    $('#baths .owl-prev').click(function () {
        $("#baths .owl-carousel").trigger('prev.owl.carousel', [400]);
    });
    $('#baths .owl-next').click(function () {
        $("#baths .owl-carousel").trigger('next.owl.carousel', [400]);
    });
    $('#houses .owl-prev').click(function () {
        $("#houses .owl-carousel").trigger('prev.owl.carousel', [400]);
    });
    $('#houses .owl-next').click(function () {
        $("#houses .owl-carousel").trigger('next.owl.carousel', [400]);
    });

    $('.btn-description').click(function(){

        var $url = window.location.href + "products/" + $(this).data('id') + "/show";
        $.ajax({
           url: $url,
           type: 'GET'
        }).done(function (data) {
            var product = data['product'];
            var photos = product['photos'];
            var modal = $('.modalShowProduct');

            photos.forEach(function (item) {
                var img = $('<img>').attr('data-src', item).addClass('owl-lazy');
                img.appendTo(modal.find('.owl-carousel'));
            });
            modal.find('.modal-title').text(product['title']);
            modal.find('input[name="product_name"]').val(product['title']);
            modal.find('.modal-price').text(product['price']);
            modal.find('.modal-old-price').text(product['old-price']);
            modal.find('.modal-description').text(product['description']);

            var $owl = modal.find('.owl-carousel');
            var items = photos.length < 5 ? photos.length : 5;
            $owl.owlCarousel({
                lazyLoad: true,
                margin: 10,
                autoHeight: true,
                responsive:{
                    0:{
                        items:3
                    },
                    768:{
                        items: items
                    }
                }
            });
            modal.modal('show');
            var maximizeModal = $('.maximize-item');
            $owl.find('.owl-item').on('click', function () {
                maximizeModal.find('.img-block').html($(this).find('img').clone().addClass('img-fluid'));
                maximizeModal.show();
            });
            maximizeModal.on('click', function () {
                maximizeModal.hide();
            });

        });

        return false;
    });
    $('.modalShowProduct').on('hidden.bs.modal', function () {
        $(this).find('.owl-carousel').trigger('destroy.owl.carousel').removeClass('owl-loaded');
        $(this).find('.owl-carousel').html("");
    });
    // -- end owlcarousels
    // -- begin feedbacks

    $('.btn-feedback').click(function () {

        var $url = window.location.href + "feedbacks/" + $(this).data('id') + "/show";
        $.ajax({
            url: $url,
            type: 'GET'
        }).done(function(data) {
            var feedback = data['feedback'];
            var photos = feedback['photos'];
            var modal = $('.modalShowFeedback');

            photos.forEach(function (item) {
                var img = $('<img>').attr('data-src', item).addClass('owl-lazy');
                img.appendTo(modal.find('.owl-carousel'));
            });

            var $owl = modal.find('.owl-carousel');

            var items = photos.length < 3 ? photos.length : 3;
            $owl.owlCarousel({
                lazyLoad: true,
                margin: 10,
                autoHeight: true,
                responsive:{
                    0:{
                        items:1
                    },
                    768:{
                        items: items
                    }
                }
            });

            modal.modal('show');
        });

    });
    $('.modalShowFeedback').on('hidden.bs.modal', function () {
        $(this).find('.owl-carousel').trigger('destroy.owl.carousel').removeClass('owl-loaded');
        $(this).find('.owl-carousel').html("");
    });
    // -- end feedbacks
    // -- begin forms
    $("input[name='phone']").mask("+7(999) 999-99-99");
    $('.contact-form').submit(function (event) {

        event.preventDefault();
        event.stopPropagation();
        var btn = $(this).find('.btn-send');
        var btn_text = btn.text();
        var $url = $(this).attr('action');
        var token = $(this).find("input[name='_token']").attr('value');
        var name = $(this).find('#name').val();
        var phone = $(this).find('#phone').val();
        var email = $(this).find('#email').val();
        var product_name = $(this).find("input[name='product_name']").attr('value');
        var form_type = $(this).find("input[name='form_type']").attr('value');
        btn.text("Отправка...");
        $.ajax({
            url: $url,
            type: 'POST',
            data: {
                _token: token,
                name: name,
                phone: phone,
                email: email,
                product_name: product_name,
                form_type: form_type
            }
        }).done(function() {
            var thanks_modal = $('.modalThanks');
            thanks_modal.find('.modal-title').text("Спасибо за заявку, " + name);
            $('.modalShowProduct').modal('hide');
            thanks_modal.modal('show');
            btn.text(btn_text);
        }).fail(function (xhr) {
            console.log(xhr);
        });

    });
    // -- end forms
    // -- begin preloader
    setTimeout(function() {
        $('.preloader').fadeOut(1000);
        setTimeout(function () {
            $('.preloader').removeClass('d-flex');
        }, 900);
    }, 500);



});