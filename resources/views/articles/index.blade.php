@extends('layout')

@section('content')

<div class="container">
    <h2>Статьи <a class="btn btn-primary pull-right" href=" {{ route( 'articles.create') }}">Создать</a></h2>
    
    @if (\Session::has('success'))
    <div class="alert alert-success">
      <p>{{ \Session::get('success')}}</p>
    </div>
    @endif

    
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Заголовок</th>
                <th>Слаг</th>
                <th>Действие</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($articles as $article)
                <tr>
                    <td>{{ $article->title }}</td>
                    <td>{{ $article->slug }}</td>
                    <td>
                        <a class="btn btn-warning" href=" {{ route( 'articles.edit', compact('article') ) }}">Редактировать</a>
                    </td>
                    
                </tr>
            @endforeach
        </tbody>
    </table>
</div><!-- /.container -->

@endsection