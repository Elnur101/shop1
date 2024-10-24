@foreach($children as $child)
<li class="widget__categories--sub__menu--list">
    <a class="widget__categories--sub__menu--link d-flex align-items-center" href="#">
{{--        <img class="widget__categories--menu__img" src="{{asset('/assets/img/product/categories11.png')}}" alt="categories-img">--}}
        {{$prefix}} {{$child->name}}
        @if($child->children->isNotEmpty())
           @include('site.partials.option', ['children'=>$child->children, 'prefix'=>$prefix." -- "])
        @endif
    </a>
</li>
@endforeach
