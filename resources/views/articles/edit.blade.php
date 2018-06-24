@extends('layout')

@section('content')

<div class="container">
    <h2>Редактирование статьи</h2>

    {{-- Ошибки формы --}}
    @if ($errors->any())
    <div class="alert alert-danger">
      <strong>Ошибка</strong>
      <br>
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    @endif

    @if (\Session::has('success'))
    <div class="alert alert-success">
      <p>{{ \Session::get('success')}}</p>
    </div>
    @endif


    <form method="post" action="{{action('ArticleController@update', $id)}}">
      
            {{ csrf_field() }}
            {{ method_field('PATCH') }}

                <div class="form-group">
                  <label for="title">Заголовок:</label>
                  <input  class="form-control" id="title" name="title" value="{{$article->title}}">
              </div>
                <div class="form-group">
                  <label for="slug">Слаг:</label>
                  <input  class="form-control" id="slug" name="slug" value="{{$article->slug}}">
              </div>
                <div class="form-group">
                  <label for="text">Текст:</label>
                  <textarea  class="form-control" id="text" name="text">{{$article->text}}</textarea>
              </div>
                <div class="form-group">                  
                    <input type="submit" class="btn btn-success" value="Сохранить">
                    <form action="{{action('ArticleController@destroy', $article['id'])}}" method="post">
                        {{csrf_field()}}
                        <input name="_method" type="hidden" value="DELETE">
                        <button class="btn btn-danger pull-right" type="submit">Delete</button>
                      </form>
                  </div>
             
            </form>
</div><!-- /.container -->

@endsection


@section('scripts')
<script>
  console.log('hello');
</script>
@endsection