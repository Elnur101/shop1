@foreach($children as $child)
    <li class="header__mega--sub__menu_li"><a class="header__mega--sub__menu--title" href="#">{{$child->name}}</a></li>
@endforeach
