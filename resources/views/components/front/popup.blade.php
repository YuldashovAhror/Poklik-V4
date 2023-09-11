{{-- =========POPUP BTN========= --}}

{{-- =========POPUP BACK========= --}}
<div class="popup__back"></div>

{{-- =========POPUP MAIN========= --}}
<div class="popup" style="display: none">
    <span class="close popup__close">
        <svg width="31" height="31" viewBox="0 0 31 31" fill="none" xmlns="http://www.w3.org/2000/svg">
            <circle cx="15.5" cy="15.5" r="15.5" transform="rotate(90 15.5 15.5)" fill="white" />
            <path d="M12.2192 18.3569L18.3569 12.2192" stroke="#323232" stroke-width="1.5" stroke-linecap="round"
                stroke-linejoin="round" />
            <path d="M18.3569 18.357L12.2192 12.2193" stroke="#323232" stroke-width="1.5" stroke-linecap="round"
                stroke-linejoin="round" />
        </svg>
    </span>
    {{-- =========POPUP FEEDBACK========= --}}
    <div class="popup__container" style="display: none">
        <h2 class="popup__title general-GR">{{__("asd.Мы вам перезвоним")}}</h2>
        <!-- /.popup__title general-lackR -->
        <p class="popup__txt general-GR">{{__("asd.Обратите внимание, что часы работы отдела продаж с 9:00 до 21: 00")}}</p>
        <!-- /.popup__txt -->
        <form action="" class="popup__form">
            <input type="text" class="general-GR" placeholder="Имя" id="first_name">
            <input type="text" id="phone" type="tel" class="form__tel general-GR" required placeholder="Номер телефона"
                pattern="^[0-9-+\s()]*$">

            <!-- /.popup__txt -->
            <button id="button" onclick="send1()" type="button" class="general-M">{{__('asd.Отправить')}} </button>
        </form>
        <!-- /.popup__form -->
    </div>
    {{-- =========POPUP STOCK========= --}}
    <div class="popup__stock" style="display: none">

        <img src="/img/popup.png" alt="Stock">
        <h2 class="title general-GR">{{__("asd.Внимание СКИДКА!")}}</h2>
        <!-- /.popup__title general-lackR -->
        <p class="txt general-GR">{{__("asd.Заполните форму ниже и получите скидку 10% на все наши услуги")}}</p>
        <!-- /.popup__txt -->
        <form action="" class="popup__form">
            <input type="text" class="general-GR" placeholder="Имя" id="first_name1">
            <input type="text" id="phone1" type="tel" class="form__tel general-GR" required placeholder="Номер телефона"
                   pattern="^[0-9-+\s()]*$">

            <!-- /.popup__txt -->
            <button id="button" onclick="send2()" type="button" class="general-GM">{{__('asd.Получить скидку')}} </button>
        </form>
        <!-- /.popup__form -->
    </div>
    {{-- =========POPUP SUCCESS========= --}}
    <div class="popup__success" style="display: none;
        position: relative;
        background-color: var(--main-color-white);
        padding: 2.5rem 1.6rem;
        text-align: center;
        border-radius: 1.7rem;">
        <h2 class="title general-GR" style="
        color: var(--main-color-one);
        padding: 0 30px;
            font-size: 30px;
            margin-bottom: 1.75rem;
            text-align: center;
            ">{{__("asd.Ваша заявка принята!")}}</h2>
        <svg width="254" height="188" viewBox="0 0 254 188" fill="none" xmlns="http://www.w3.org/2000/svg">
            <rect y="188" width="188" height="254" rx="94" transform="rotate(-90 0 188)" fill="#05734B" fill-opacity="0.1"/>
            <path d="M90 96.9013L112.464 119L112.319 118.857L163 69" stroke="#1A5551" stroke-width="15" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>

        <div class="popup__done" style="
        background-color: var(--main-color-one);
            color: var(--main-color-white);
            width: 100%;
            font-size: 16px;
            border-radius: .5rem;
            padding: 1.15rem;
            border: 2px solid transparent;
            transition: .3s all;
            cursor: pointer;
        ">{{__("asd.Закрыть")}}</div>
        <!-- /.popup__done -->
    </div>
</div>

<a href="tel:+998997079999" class="popup__calling">
    <img src="/img/icons/tel.png" alt="">
    <span class="general-GB">(99)707-99-99</span>
</a>

<div class="popup__screen">
    <div class="popup__screen-close">
        <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M13.333 13.333L26.6663 26.6663" stroke="#1A5551" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M26.6663 13.333L13.333 26.6663" stroke="#1A5551" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
    </div>
    <!-- /.popup__screen-close -->
    <p class="popup__screen-title general-GR">
        {{__("asd.Сделайте скриншот, чтобы не потерять нас")}}
    </p>
    <!-- /.popup__screen-title -->
    <img src="/img/dezphone.png" alt="" class="popup__screen-img">
    <!-- /.popup__scrren-img -->
</div>
<!-- /.popup__screen -->
<!-- /.popup__calling -->

<script>
    function send2() {
        let token = $("#token").val();
        let name = $('#first_name1').val();
        let phone = $('#phone1').val();
        let width = $('#width').val();
        let height = $('#height').val();
        let type = $('#type').val();
        $.ajax({
            token: token,
            type: "get",
            url: "/feedback",
            data: {
                name: name,
                phone: phone,
                width: width,
                height: height,
                type: type,
            },
            contentType: "application/json; charset=utf-8",
            dataType: "json",
        });

        $('.popup__stock').fadeOut('0');
        $('.popup__container').fadeOut('0');

        $('.popup').fadeIn('200');
        setTimeout(()=>{
            $('.popup__success').fadeIn('200');
        }, 500)
    }
</script>
