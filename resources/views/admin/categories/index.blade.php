@extends('admin.layouts.app_admin')

@section('content')

    <div class="container">
        <section class="experience section">
            <div class="section-inner">

                <h2>Категории</h2>

                <a href="{{route('admin.category.create')}}" class="btn btn-primary pull-right">Создать категорию</a>

                <table class="table table-striped">
                    <tr>
                        <td>Название</td>
                        <td>Видимость</td>
                        <td>Действие</td>
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
        </section>
    </div>

@endsection


