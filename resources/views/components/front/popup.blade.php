{{-- =========POPUP BTN========= --}}

{{-- =========POPUP BACK========= --}}
<div class="popup__back"></div>

{{-- =========POPUP MAIN========= --}}
<div class="popup">
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
    <div class="popup__container" style="display: ">
        <h2 class="popup__title general-lackR">{{__('asd.Biz sizga qo\'ng\'iroq qilamiz')}}</h2>
        <!-- /.popup__title general-lackR -->
        <p class="popup__txt general-R">{{__("asd.E\'tibor bering, savdo bo\'limining ish vaqti 9:00 dan 21:00 gacha")}}</p>
        <!-- /.popup__txt -->
        <form action="" class="popup__form">
            <input type="text" placeholder="Ism ">
            <input type="text" name="phone" type="tel" class="form__tel" required placeholder="Telefon raqam"
                pattern="^[0-9-+\s()]*$">

            <p class="popup__txt general-R">{{__("asd.E\'tibor bering, savdo bo\'limining ish vaqti 9:00 dan 21:00 gacha")}}</p>
            <!-- /.popup__txt -->
            <button type="submit" class="general-M">{{__('asd.Buyurtma')}} </button>
        </form>
        <!-- /.popup__form -->
    </div>
    {{-- =========POPUP SUCCESS========= --}}
    <div class="popup__success" style="display: none">
    </div>
</div>
