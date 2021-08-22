<li class="nav-item {{ request()->routeIs('catalog.index')?'active':''}}">
    <a class="nav-link" href="{{route('catalog.index')}}">Каталоги</a>
</li>
<li class="nav-item {{ request()->routeIs('product.index')?'active':''}}">
    <a class="nav-link" href="{{route('product.index')}}">Товары</a>
</li>
<li class="nav-item {{ request()->routeIs('home')?'active':''}}">
    <a class="nav-link" href="{{route('home')}}">Вернутся на сайт</a>
</li>
<li class="nav-item {{ request()->routeIs('logout')?'active':''}}">
    <a class="nav-link" href="{{route('logout')}}">Выдти</a>
</li>
