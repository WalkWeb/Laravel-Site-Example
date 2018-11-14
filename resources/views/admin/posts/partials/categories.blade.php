@foreach ($categories as $category)

    <option value="{{$category->id ?? ''}}"

        @isset($post->id)
            @foreach($post->categories as $post_category)
                @if($category->id === $post_category->id)
                    selected="selected"
                @endif
            @endforeach
        @endisset
    >
        {!! $delimiter ?? '' !!}{{$category->title ?? ''}}
    </option>

    @if (count($category->children) > 0)
        @include('admin.posts.partials.categories', [
            'categories' => $category->children,
            'delimiter' => '&#x21b3; ' . $delimiter
        ])
    @endif
@endforeach
