<label for="published">Статус</label>
<select class="form-control" name="published" id="published">
    <option value="1">Опубликовано</option>
    <option value="0">Не опубликовано</option>
</select>

<label for="title">Заголовок</label>
<input type="text" class="form-control" id="title" name="title" placeholder="Заголовок поста" value="{{$post->title ?? ''}}" required>

<label for="category_id">Категория</label>
<select class="form-control" name="category_id" id="category_id" multiple>
    @include('admin.posts.partials.categories', ['categories' => $categories])
</select>

<label for="desc_short">Краткое описание</label>
<textarea class="form-control" id="desc_short" name="desc_short">{{$post->desc_short ?? ''}}</textarea>

<label for="desc">Полное описание</label>
<textarea class="form-control" id="desc" name="desc">{{$post->desc ?? ''}}</textarea>

<label for="meta_title">SEO: Title</label>
<input type="text" class="form-control" id="meta_title" name="meta_title" placeholder="SEO: Title" value="{{$post->meta_title ?? ''}}">

<label for="meta_desc">SEO: Description</label>
<input type="text" class="form-control" id="meta_desc" name="meta_desc" placeholder="SEO: Description" value="{{$post->meta_desc ?? ''}}">

<label for="meta_key">SEO: Keywords</label>
<input type="text" class="form-control" id="meta_key" name="meta_key" placeholder="SEO: Keywords" value="{{$post->meta_key ?? ''}}">


<hr />

<input class="btn btn-primary" type="submit" value="Сохранить">