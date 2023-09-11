"use strict";
var preloader    = $('.preloader'),
    imagesCount  = $('img').length,
    dBody        = $('body'),
    percent      = 100 / imagesCount,
    progress     = 0,
    imgSum       = $('img').length,
    loadedImg    = 0;


for (var i = 0; i < imagesCount; i++) {
    var img_copy        = new Image();
    img_copy.src        = document.images[i].src;
    img_copy.onload     = img_load;
    img_copy.onerror    = img_load;
}

function img_load () {
    progress += percent;
    loadedImg++;
    if (progress >= 100 || loadedImg == imagesCount) {

        setTimeout(function () {
            preloader.delay(100).slideUp('slow');
        }, 5000)
        dBody.css('overflow', '');
    }
}


$(window).on('load', function () {
    $('.callback, .popup__btn').click( (event)=> {
        $('.popup__success').fadeOut('0');
        event.preventDefault();
        $('.popup__back').slideDown('200')
        setTimeout(()=> {
            $('.popup').fadeIn('200');
            $('.popup__stock').fadeIn('200');
        }, 250)
    });

    $('.popup__close, .popup__done').click(()=> {
        $('.popup').fadeOut('200');
        $('.popup__stock').fadeOut('200');
        $('.popup__container').fadeOut('200');
        setTimeout(()=> {
            $('.popup__back').slideUp('200');
            $('.popup__success').fadeOut('0');
        }, 250)
    })

    $('.menu__cat').click(function (event) {
        event.preventDefault();
        $(this).parent().toggleClass('active')
        $(this).parent().children('.box__links').slideToggle('200')
    })
    $('.menu__container a').click(function () {
        $('.menu').slideUp();
    })

    setTimeout(function () {
        $('.popup__screen').css({
            'right': 0,
            'opacity': 1
        })
    }, 3000)

    $('.popup__screen-close').click(function (e) {
        e.preventDefault();
        $('.popup__screen').css({
            'right': '-120%',
            'opacity': 0
        })
    })

    $('button.header__menu').click(function (event) {
        event.preventDefault();
        $('.menu').slideToggle();
        $(this).toggleClass('active');
        $('.menu__box .box').removeClass('active');
    })

    let container = $('.count');
    let scrollStep = 260; // Количество пикселей для прокрутки

    // Прокрутка вправо
    $('.count__next').on('click', function() {
        container.scrollLeft(container.scrollLeft() + scrollStep);
    });

    // Прокрутка влево
    $('.count__prev').on('click', function() {
        container.scrollLeft(container.scrollLeft() - scrollStep);
    });

    const animItems = document.querySelectorAll(`.anima-blocks`)
    if (animItems.length > 0) {
        window.addEventListener(`scroll`, animOnScroll)

        function animOnScroll() {
            for (let index = 0; index < animItems.length; index++) {
                const animItem = animItems[index]
                const animItemHeight = animItem.offsetHeight
                const animItemOffSet = offset(animItem).top
                const animStart = 4;
                let animItemPoint = window.innerHeight - animItemHeight / animStart
                if (animItemHeight > window.innerHeight) {
                    animItemPoint = window.innerHeight - window.innerHeight / animStart
                }
                if ((pageYOffset > animItemOffSet - animItemPoint) && pageYOffset < (animItemOffSet + animItemHeight)) {
                    animItem.classList.add(`anima-active`)
                } else {
                    if (!(animItem.classList.contains(`_anim-no-hide`))) {
                        // animItem.classList.remove(`anima-active`)
                    }
                }
            }
        }

        function offset(el) {
            const rect = el.getBoundingClientRect()
            let scrollLeft = window.pageXOffset || document.documentElement.scrollLeft
            let scrollTop = window.pageYOffset || document.documentElement.scrollTop
            return {top: rect.top + scrollTop, left: rect.left + scrollLeft}
        }

        setTimeout(() => {
            animOnScroll()
        }, 1000)
    }


    AOS.init({
        // Global settings:
        disable: false, // accepts following values: 'phone', 'tablet', 'mobile', boolean, expression or function
        startEvent: 'DOMContentLoaded', // name of the event dispatched on the document, that AOS should initialize on
        initClassName: 'aos-init', // class applied after initialization
        animatedClassName: 'aos-animate', // class applied on animation
        useClassNames: false, // if true, will add content of `data-aos` as classes on scroll
        disableMutationObserver: false, // disables automatic mutations' detections (advanced)
        debounceDelay: 50, // the delay on debounce used while resizing window (advanced)
        throttleDelay: 99, // the delay on throttle used while scrolling the page (advanced)


        // Settings that can be overridden on per-element basis, by `data-aos-*` attributes:
        offset: 120, // offset (in px) from the original trigger point
        delay: 0, // values from 0 to 3000, with step 50ms
        duration: 400, // values from 0 to 3000, with step 50ms
        easing: 'ease', // default easing for AOS animations
        once: true, // whether animation should happen only once - while scrolling down
        mirror: false, // whether elements should animate out while scrolling past them
        anchorPlacement: 'top-bottom', // defines which position of the element regarding to window should trigger the animation

    });
    let selector = document.getElementsByClassName("form__tel");
    let im = new Inputmask("+\\9\\98(99)999-99-99");
    im.mask(selector);

});
