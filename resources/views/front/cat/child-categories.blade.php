@foreach($children as $child)
    <option value="{{ $child->id }}">{{ $prefix }} <a href="{{ route('cat', ['selflink' => $category['selflink']]) }}">{{ $child->name }}</a></option>
    @if($child->children->isNotEmpty())
        @include('front.cat.child-categories', ['children' => $child->children, 'prefix' => $prefix.'-'])
    @endif
@endforeach
