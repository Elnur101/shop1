@foreach($children as $child)
{{--    {{$child->name}}--}}
{{--    @if($child->children->isNotEmpty())--}}
{{--        @include('includes-shop.partials.shop.shop-sub-option', ['children'=>$child->children, 'prefix'=>$prefix." -- "])--}}
{{--    @endif--}}
@endforeach
