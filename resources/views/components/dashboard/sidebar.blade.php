<div class="vertical-menu">

    <!-- LOGO -->
    <div class="navbar-brand-box">
        <a href="index.html" class="logo logo-dark">
            <span class="logo-sm">
                <img src="@include('components.dashboard.logo')" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="@include('components.dashboard.logo')" alt="" height="20">
            </span>
        </a>
    </div>

    <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect vertical-menu-btn">
        <i class="fa fa-fw fa-bars"></i>
    </button>

    <div data-simplebar class="sidebar-menu-scroll">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled mt-4" id="side-menu">
                <li class="menu-title">Menu</li>
                <li>
                    <a href="/dashboard">
                        <i class="uil-star"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="uil-star"></i>
                        <span>Услуга</span>
                    </a>
                    <ul class="sub-menu mm-collapse" aria-expanded="false">
                        <li><a href="{{route('service.index')}}">Список</a></li>
                        <li><a href="{{route('service.create')}}">Создать</a></li>
                    </ul>
                </li>
                <li>
                    <a href="{{route('category.index')}}">
                        <i class="uil-star"></i>
                        <span>Категория</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('video.index')}}">
                        <i class="uil-star"></i>
                        <span>Bидео</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('voice.index')}}">
                        <i class="uil-star"></i>
                        <span>Голос</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('image.index')}}">
                        <i class="uil-star"></i>
                        <span>Изображение</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('gallary.index')}}">
                        <i class="uil-star"></i>
                        <span>Галерея</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('type.index')}}">
                        <i class="uil-star"></i>
                        <span>Тип</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('words.index')}}">
                        <i class="uil-star"></i>
                        <span>Словарь</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>