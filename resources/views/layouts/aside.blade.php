<aside class="skills aside section">
    <div class="section-inner">
        <h2 class="heading">Категории публикаций</h2>
        <div class="content">
            <div class="skillset">
                @if(!empty($categories))
                    @include('layouts.menu', ['categories' => $categories])
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