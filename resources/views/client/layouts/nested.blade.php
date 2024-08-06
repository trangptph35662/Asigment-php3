<li class="nav-item dropdown">
    <a class="nav-link" href="{{ route('post_category', $category) }}">{{ $each }} {{ $category->name }} </a>

</li>



@if ($category->children)

    @php($each .= '-')

    @foreach ($category->children as $child)
        @include('client.layouts.nested', ['category' => $child])
    @endforeach

    @endif


    @foreach($categories as $parent)

    @php($each = "")

    @include('client.layouts.nested', ['category' => $parent])

@endforeach