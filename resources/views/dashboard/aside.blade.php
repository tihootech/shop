<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <div class="app-sidebar__user text-center">
        <div class="">
            <p class="app-sidebar__user-name">{{auth()->user()->name}}</p>
            <p class="app-sidebar__user-designation"> داشبورد {{translate(auth()->user()->type)}} </p>
        </div>
    </div>
    <ul class="app-menu">
        <li>
            <a class="app-menu__item @if(active('home')) active @endif" href="{{url("home")}}">
                <i class="app-menu__icon fa fa-dashboard"></i>
                <span class="app-menu__label">داشبورد</span>
            </a>
        </li>

        @include('dashboard.aside.'.auth()->user()->type.'_aside')

    </ul>
</aside>
