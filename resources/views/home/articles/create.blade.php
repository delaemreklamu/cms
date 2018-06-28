@extends('home.app')

@section('content')

<div class="container">
    <h2>Создание статьи</h2>

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

    <form method="post" action="{{ route('home.articles.store') }}">
      
            {{ csrf_field() }}

                <div class="form-group">
                  <label for="title">Заголовок:</label>
                  <input  class="form-control" id="title" name="title" value="{{ old('title') }}">
              </div>
                <div class="form-group">
                  <label for="slug">Слаг:</label>
                  <input  class="form-control" id="slug" name="slug" value="{{ old('slug') }}">
              </div>
                <div class="form-group">
                  <label for="text">Текст:</label>
                  <textarea  class="form-control" id="text" name="text">{{ old('text') }}</textarea>
              </div>
                <div class="form-group">                  
                    <input type="submit" class="btn btn-success" value="Сохранить">
              </div>
             
            </form>
</div><!-- /.container -->

@endsection


@section('scripts')
<script>
  console.log('hello');
</script>
@endsection