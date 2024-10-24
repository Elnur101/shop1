@foreach ($children as $child)
    <option value="{{ $child->id }}">{{ $prefix }} {{ $child->name }}</option>
    @if ($child->children->isNotEmpty())
        @include('admin.category.partials.option', ['children'=>$child->children, 'prefix'=>$prefix.'-'])
    @endif
@endforeach
