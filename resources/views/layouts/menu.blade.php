
@if(!empty($categories))
    @foreach($categories as $category)
    <div class="item">
        <h3 class="level-title"><a href="{{url("/blog/category/$category->slug")}}" class="link_menu">{{$category->title}}</a></h3>
        <div class="level-bar">
            <div class="level-bar-inner" style="width: 96%;">
            </div>
        </div>
    </div>
    @endforeach
@endif
