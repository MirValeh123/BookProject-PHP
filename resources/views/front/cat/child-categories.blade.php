@foreach($children as $child)
    <option value="{{ $child->id }}">{{ $prefix }} {{ $child->name }}</option>
    @if($child->children->isNotEmpty())
        @include('front.cat.child-categories', ['children' => $child->children, 'prefix' => $prefix.'-'])
    @endif
@endforeach
