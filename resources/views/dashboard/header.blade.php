<?php // TODO: replace tihootech ?>
<header class="app-header">

    <a class="app-header__logo" href="{{url("/")}}"> Website Title </a>

    <!-- Sidebar toggle button-->
    <a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>

    <!-- Navbar Right Menu-->
    <ul class="app-nav">
        <li class="app-search">
            <input class="app-search__input" type="search" placeholder="جستجو">
            <button class="app-search__button"><i class="fa fa-search"></i></button>
        </li>
        <!--Notification Menu-->
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Show notifications"><i class="fa fa-bell-o fa-lg"></i></a>
            <ul class="app-notification dropdown-menu text-right">
                <li class="app-notification__title"> شما ناتیفیکیشن جدیدی ندارید. </li>
            </ul>
        </li>
        <!-- User Menu-->
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
            <ul class="dropdown-menu settings-menu text-right">
                <li><a class="dropdown-item" href="{{url("users/".auth()->id())}}"><i class="fa fa-user fa-lg"></i> پروفایل </a></li>
                <li>
                    <a class="dropdown-item pointer" onclick="document.getElementById('logout-form').submit();">
                        <i class="fa fa-sign-out ml-1"></i> خروج
                    </a>
                    <form id="logout-form" action="{{url("logout")}}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
            </ul>
        </li>

        <li class="nav-item">
            <a href="javascript:void" class="app-nav__item" onclick="window.history.back()"> <i class="fa fa-arrow-left"></i> </a>
        </li>
    </ul>
</header>
