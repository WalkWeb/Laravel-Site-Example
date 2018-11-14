@extends('admin.layouts.app_admin')

@section('content')

    <div class="container">

        @component('admin.components.breadcrumb')
            @slot('title') Список постов @endslot
            @slot('parent') Главная @endslot
            @slot('active') Посты @endslot
        @endcomponent

        <hr />

        <a href="{{route('admin.post.create')}}" class="btn btn-primary pull-right">
            <i class="fa fa-plus-square-o"> Создать пост</i>
        </a>
        <table class="table table-striped">
            <tr>
                <td>Наименование</td>
                <td>Публикация</td>
                <td class="text-right">Действие</td>
            </tr>
            <tbody>
            @forelse($posts as $post)
                <tr>
                    <td>{{$post->title}}</td>
                    <td>{{$post->published}}</td>
                    <td>
                        <form onsubmit="if(confirm('Удалить?')){return true}else{return false}" action="{{route('admin.post.destroy', $post)}}" method="post">
                            {{csrf_field()}}
                            <input type="hidden" name="_method" value="DELETE">

                            <a href="{{route('admin.post.edit', $post)}}" class="btn btn-default"><i class="fa fa-edit"></i></a>

                            <button type="submit" class="btn"><i class="fa fa-trash-o"></i></button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center"><h2>Нет постов</h2></td>
                </tr>
            @endforelse
            </tbody>
            <tfoot>
            <tr>
                <td colspan="3">
                    <ul class="pagination pull-right">
                        {{$posts->links()}}
                    </ul>
                </td>
            </tr>
            </tfoot>
        </table>

    </div>

@endsection


