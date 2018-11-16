

@foreach($categories as $category)
<div class="item">
    <h3 class="level-title"><a href="{{url("/blog/category/$category->slug")}}" class="link_menu">{{$category->title}}</a></h3>
    <div class="level-bar">
        <div class="level-bar-inner" style="width: 96%;">
        </div>
    </div>
</div>
@endforeach



{{--@foreach($categories as $category)--}}
    {{--@if($category->children->where('published', 1)->count())--}}
        {{--<li class="dropdown">--}}
            {{--<a href="{{url("/blog/category/$category->slug")}}" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">--}}
                {{--{{$category->title}} <span class="caret"></span>--}}
            {{--</a>--}}
            {{--<ul class="dropdown-menu" role="menu">--}}
                {{--@include('layouts.top_menu', ['categories' => $category->children])--}}
            {{--</ul>--}}
        {{--</li>--}}
    {{--@else--}}
        {{--<li>--}}
            {{--<a href="{{url("/blog/category/$category->slug")}}">{{$category->title}}</a>--}}
        {{--</li>--}}
    {{--@endif--}}
{{--@endforeach--}}