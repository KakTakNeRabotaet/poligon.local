@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-mb-12">
                <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
                    <a class="btn btn-primary" href="{{route('blog.admin.posts.create')}}">Добавить</a>
                </nav>
                <div class="card">
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Автор</th>
                                <th>Категории</th>
                                <th>Заголовок</th>
                                <th>Дата публикации</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($paginate as $item)
                                @php /** @var \App\Models\BlogPost $item */ @endphp
                                <tr @if(!$item->is_published) style="background-color: cyan;" @endif>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->user->name}}</td>
                                    <td>{{$item->category->title}}</td>
                                    <td>
                                        <a href="{{route('blog.admin.posts.edit', $item->id)}}">
                                            {{$item->title}}
                                        </a>
                                    </td>
                                    <td>
                                        {{$item->published_at ? \Carbon\Carbon::parse($item->published_at)->format('d.M H:i'): ''}}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @if($paginate->total() > $paginate->count())
            <br>
            <div class="row justify-content-center">
                <div class="col-mb-12">
                    <div class="card">
                        <div class="card-body">
                            {{ $paginate->links() }}
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
