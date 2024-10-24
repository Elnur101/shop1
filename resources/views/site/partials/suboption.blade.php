@foreach($children as $child)
    <img class="widget__categories--sub__menu--img" src="{{asset('/assets/img/product/categories12.png')}}" alt="categories-img">
    <span class="widget__categories--sub__menu--text">{{$prefix}}{{$child->name}}</span>
@endforeach
