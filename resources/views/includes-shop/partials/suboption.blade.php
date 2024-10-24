@foreach($children as $child)
    <li class="categories__submenu--child__items"><a class="categories__submenu--child__items--link" href="#">{{$child->name}} </a></li>
@endforeach
