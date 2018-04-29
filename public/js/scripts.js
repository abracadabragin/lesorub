$(document).ready(function () {

    var $carousel_block = $(".carousel-inner");
    var $items = $(".carousel-item");
    var $wHeight = $(window).height();
    var carousel_prev = $('.carousel-control-prev');
    var carousel_next = $('.carousel-control-next');
    var outerHeightMenu = $('#navbar-main').outerHeight();

    $('.carousel-info').css('padding-top', outerHeightMenu);
    $carousel_block.height($wHeight);

    $items.each(function() {
        var $src = $(this).data('src');
        $(this).css('background-image', 'url(' + $src + ')');
        $(this).addClass('');
    });

    $(window).on('resize', function (){
        $wHeight = $(window).height();
        $carousel_block.height($wHeight);
        outerHeightMenu = $('#navbar-main').outerHeight();
        $('.carousel-info').css('padding-top', outerHeightMenu);
    });

    var carousel_timer = null;
    var restartTimer = function () {

        if (carousel_timer) {
            clearInterval(carousel_timer);
        }

        carousel_timer = setInterval(function () {
            carousel_next.click();
        }, 7000);

    };

    carousel_prev.click(function () {

        restartTimer();

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

        restartTimer();

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

    $('.nav-collapse').scrollspy({
        offset: outerHeightMenu
    });

    $('.nav-link').click(function () {

        var scrollPos = $('body').find($(this).attr('href')).offset().top - outerHeightMenu;
        $('body,html').animate({
            scrollTop: scrollPos
        }, 500);

        if($('.navbar-collapse').hasClass('show')) {
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
        autoplay: true,
        autoplayTimeout: 5000,
        autoplayHoverPause: true,
        rewind: true,
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
            }).get();
        $('.card-body .card-title').css('min-height', Math.max.apply(null, heights));

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
    var showDescription = function (self) {

        var $url = window.location.href + "products/" + self.data('id') + "/show";
        $.ajax({
            url: $url,
            type: 'GET',
            async: false
        }).done(function (data) {
            var product = data['product'];
            var photos = product['photos'];
            var modal = $('.modalShowProduct');

            photos.forEach(function (item) {
                var img = $('<img>').attr('src', item);
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
            var prevBtn = $('.maximize-prev');
            var nextBtn = $('.maximize-next');
            $owl.find('.owl-item').on('click', function () {
                var next = $(this).next('.owl-item').find('img').attr('src');
                var prev = $(this).prev('.owl-item').find('img').attr('src');
                if (next) {
                    nextBtn.show();
                    nextBtn.attr('data-src', next);
                }
                else {
                    nextBtn.hide();
                }
                if (prev) {
                    prevBtn.show();
                    prevBtn.attr('data-src', prev);
                }
                else {
                    prevBtn.hide();
                }
                prevBtn.attr('data-src', prev);
                nextBtn.attr('data-src', next);
                var current_image = $(this).find('img').clone().addClass('img-fluid');
                maximizeModal.find('.img-block').find('img').remove();
                maximizeModal.find('.img-block').append(current_image);
                maximizeModal.show();
            });
            maximizeModal.find('.close').click(function () {
                maximizeModal.find('.img-block').find('img').remove();
                maximizeModal.hide();
            });

            var change_image = function () {
                var img = $('.modal-photos').find('[src="' + $(this).attr('data-src') + '"]');
                var owl_item = img.closest('.owl-item');
                var next = owl_item.next('.owl-item').find('img').attr('src');
                var prev = owl_item.prev('.owl-item').find('img').attr('src');
                if (next) {
                    nextBtn.show();
                    nextBtn.attr('data-src', next);
                } else {
                    nextBtn.hide();
                }
                if (prev) {
                    prevBtn.show();
                    prevBtn.attr('data-src', prev);
                } else {
                    prevBtn.hide();
                }
                maximizeModal.find('.img-block').find('img').remove();
                maximizeModal.find('.img-block').append(img.clone().addClass('img-fluid'));
            };
            nextBtn.on('click', change_image);
            prevBtn.on('click', change_image);
            $('body').keydown(function(e) {
                if (maximizeModal.is(':visible')) {
                    if(e.keyCode === 37) { // left
                        if (prevBtn.is(':visible'))
                            prevBtn.click();
                    }
                    else if(e.keyCode === 39) { // right
                        if (nextBtn.is(':visible'))
                            nextBtn.click();
                    }
                }
            });
        });

        return false;
    };

    /*var clickTimeout;
    $('.show-description').click(function(){
        if (!clickTimeout) {
            clickTimeout = setTimeout(function () {  }, 500);
            showDescription($(this));
        }
    }).on('dblclick', function(event) {
        event.preventDefault();
        clearTimeout(clickTimeout);
    });*/
    $('.show-description').click(function(){
        showDescription($(this));
    });

    $('.modalShowProduct').on('hide.bs.modal', function () {
        $('.maximize-item').hide();
    });

    $('.modalShowProduct').on('hidden.bs.modal', function () {
        $('.maximize-prev').off().removeAttr('data-src');
        $('.maximize-next').off().removeAttr('data-src');
        $('.owl-item').off();
        $('body').off();
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

    $('.feeback-more').click(function () {

        var self = $(this).closest('.card-body');
        var blockquote = self.find('.blockquote');

        if (blockquote.hasClass('blockquote-collapse')) {

            blockquote.removeClass('blockquote-collapse');
            $(this).text('Свернуть');

        } else {

            blockquote.addClass('blockquote-collapse');
            $(this).text('Читать полностью');

        }

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

        restartTimer();
        $('.preloader').fadeOut(1000);

        setTimeout(function () {
            $('.preloader').removeClass('d-flex');
        }, 900);
    }, 500);

    ymaps.ready(init);

    var myMap, myPlacemark;
    function init(){
        myMap = new ymaps.Map("yandex-map", {
            center: [55.012438, 82.930995],
            zoom: 13,
            ScrollZoom: false
        });

        myPlacemark = new ymaps.Placemark([55.012438, 82.930995], {
            hintContent: 'Строительная компания "Лесоруб"',
            balloonContent: 'ул. Инская, 39, офис 301.<br><b>Время работы:</b><br>Будние дни с 10:00 до 19:00<br>Выходные дни по договоренности'
        });

        myMap.geoObjects.add(myPlacemark);
        myMap.behaviors.disable('scrollZoom');

    }
});