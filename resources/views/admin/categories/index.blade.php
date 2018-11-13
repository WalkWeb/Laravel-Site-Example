@extends('admin.layouts.app_admin')

@section('content')

    <div class="container">

        @component('admin.components.breadcrumb')
            @slot('title') Список категорий @endslot
            @slot('parent') Список категорий @endslot
            @slot('active') Список категорий @endslot
        @endcomponent

        <hr />

        <a href="{{route('admin.category.create')}}" class="btn btn-primary pull-right">
            <i class="fa fa-plus-square-o"> Создать категорию</i>
        </a>
        <table class="table table-striped">
            <tr>
                <td>Наименование</td>
                <td>Публикация</td>
                <td class="text-right">Действие</td>
            </tr>
            <tbody>
                @forelse($categories as $category)
                    <tr>
                        <td>{{$category->title}}</td>
                        <td>{{$category->published}}</td>
                        <td>
                            <form onsubmit="if(confirm('Удалить?')){return true}else{return false}" action="{{route('admin.category.destroy', $category)}}" method="post">
                                {{csrf_field()}}
                                <input type="hidden" name="_method" value="DELETE">

                                <a href="{{route('admin.category.edit', $category)}}" class="btn btn-default"><i class="fa fa-edit"></i></a>

                                <button type="submit" class="btn"><i class="fa fa-trash-o"></i></button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="text-center"><h2>Нет категорий</h2></td>
                    </tr>
                @endforelse
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3">
                        <ul class="pagination pull-right">
                            {{$categories->links()}}
                        </ul>
                    </td>
                </tr>
            </tfoot>
        </table>

    </div>

@endsection


