@foreach($children as $child)
    <li class="categories__submenu--items"><a class="categories__submenu--items__text" href="#"><strong>{{$child->name}}</strong></a>
        <ul class="categories__submenu--child">
            @if($child->children->isNotEmpty())
                @include('includes-shop.partials.suboption', ['children'=>$child->children, 'prefix'=>$prefix." -- "])
            @endif
        </ul>
    </li>
@endforeach

