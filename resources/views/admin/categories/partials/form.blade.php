<label for="published">Статус</label>
<select class="form-control" name="published" id="published">
    @if (isset($category->id))
        <option value="0" @if ($category->published === 0) selected="" @endif>Не опубликовано</option>
        <option value="1" @if ($category->published === 1) selected="" @endif>Опубликовано</option>
    @else
        <option value="0">Не опубликовано</option>
        <option value="1">Опубликовано</option>
    @endif
</select>

<label for="title">Наименование</label>
<input type="text" class="form-control" id="title" name="title" placeholder="Заголовок категории" value="{{$category->title ?? ''}}" required>


<label for="slug">URL</label>
<input type="text" class="form-control" name="slug" placeholder="Автоматическая генерация" value="{{$category->slug ?? ''}}" readonly="">

<label for="parend_id">Родительская категория</label>
<select class="form-control" name="parend_id" id="parend_id">
    <option value="0">Без родительской категории</option>
    @include('admin.categories.partials.categories', ['categories' => $categories])
</select>

<hr />

<input class="btn btn-primary" type="submit" value="Сохранить">