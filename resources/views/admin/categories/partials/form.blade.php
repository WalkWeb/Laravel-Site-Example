<label for="published">Статус</label>
<select class="form-control" name="published" id="published">
    <option value="1">Опубликовано</option>
    <option value="0">Не опубликовано</option>
</select>

<label for="title">Название</label>
<input type="text" class="form-control" id="title" name="title" placeholder="Заголовок категории" value="{{$category->title ?? ''}}" required>
<hr />

<input class="btn btn-primary" type="submit" value="Сохранить">