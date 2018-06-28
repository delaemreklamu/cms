@extends('home.app')

@section('content')

<div class="container">
    <h2>Редактирование статьи <a class="btn btn-warning pull-right" href=" {{ route('home.articles.index') }}">Выход</a>
                    
    </h2>
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


    <form method="post" action="{{ route('home.articles.update', compact('article')) }}">
      
            {{ csrf_field() }}
            {{ method_field('PATCH') }}

                <div class="form-group">
                  <label for="title">Заголовок:</label>
                  <input  class="form-control" id="title" name="title" value="{{ old('title', $article->title)}}">
              </div>
                <div class="form-group">
                  <label for="slug">Слаг:</label>
                  <input  class="form-control" id="slug" name="slug" value="{{ old('slug', $article->slug) }}">
              </div>
                <div class="form-group">
                  <label for="text">Текст:</label>
                  <textarea  class="form-control" id="text" name="text">{{ old('text', $article->text) }}</textarea>
              </div>
                <div class="form-group">                  
                    <input type="submit" class="btn btn-success" value="Сохранить">                    
                    
                  </form>
                    <form action="{{ route('home.articles.destroy', compact('article')) }}" method="post">
                        {{ csrf_field() }}
                        <input name="_method" type="hidden" value="DELETE">
                        <button class="btn btn-danger pull-right" type="submit">Удалить</button> 
                      </form>
                      
                  </div>
             
            
</div><!-- /.container -->

@endsection


@section('scripts')
<script>
  console.log('hello');
</script>
@endsection