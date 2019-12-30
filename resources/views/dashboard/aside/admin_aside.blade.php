@php
    $hrefs = ['products', 'products/create'];
@endphp
<li class="treeview @if(expanded($hrefs)) is-expanded @endif">
    <a class="app-menu__item" href="#" data-toggle="treeview">
        <i class="app-menu__icon fa fa-shopping-cart"></i>
        <span class="app-menu__label"> مدیریت فروشگاه </span>
        <i class="treeview-indicator fa fa-angle-left"></i>
    </a>
    <ul class="treeview-menu">
        <li>
            <a class="treeview-item @if(active($hrefs[0])) active @endif" href="{{url($hrefs[0])}}">
                <i class="icon fa fa-eye"></i> مشاهده محصولات
            </a>
            <a class="treeview-item @if(active($hrefs[1])) active @endif" href="{{url($hrefs[1])}}">
                <i class="icon fa fa-plus"></i> اضافه کردن محصولات
            </a>
        </li>
    </ul>
</li>
