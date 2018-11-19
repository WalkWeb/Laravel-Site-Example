@foreach ($categories as $category)
    @if (!empty($post) && ($category->id === $post->category_id))
    <option value="{{$category->id}}" selected="selected">{{$category->title}}</option>
    @else
        <option value="{{$category->id}}">{{$category->title}}</option>
    @endif
@endforeach
