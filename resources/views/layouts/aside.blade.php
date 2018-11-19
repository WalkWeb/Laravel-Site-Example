<aside class="skills aside section">
    <div class="section-inner">
        <h2 class="heading">Категории публикаций</h2>
        <div class="content">
            <div class="skillset">
                @if(!empty($categories))
                    @foreach($categories as $category)
                        <div class="item">
                            <h3 class="level-title"><a href="{{url("/blog/category/$category->id")}}" class="link_menu">{{$category->title}}</a></h3>
                            <div class="level-bar">
                                <div class="level-bar-inner" style="width: 100%;">
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</aside>

<aside class="credits aside section">
    <div class="section-inner">
        <h2 class="heading">Ссылки</h2>
        <div class="content">
            <ul class="list-unstyled">
                <li>&#10138; <a href="https://github.com/WalkWeb" target="_blank"><i class="fa fa-external-link"></i>GitHub</a></li>
                <li>&#10138; <a href="https://hh.ru/resume/efaa11baff031292940039ed1f5a454563624d" target="_blank"><i class="fa fa-external-link"></i>hh.ru</a></li>
            </ul>
        </div>
    </div>
</aside>