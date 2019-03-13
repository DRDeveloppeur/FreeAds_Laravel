@extends('layouts.app')

@section('content')
  <div class="container">
    {!! Form::open(['method' => 'put', 'url' => route('annonce.update', $annonce), 'files' => true]) !!}
    <div class="form-control row">
      <div class="col-lg-auto row justify-content-center">
        {!! Form::label('title') !!}
        {!! Form::text('title', $annonce->title, ['class' => 'form-control', 'value' => $annonce->title]) !!}
      </div>
      <div class="col-lg-auto row justify-content-center">
        {!! Form::label('content') !!}
        {!! Form::textarea('content', $annonce->content, ['class' => 'form-control', 'placeholder' => $annonce->content]) !!}
      </div>
      <div class="col-lg-auto row justify-content-center">
        {!! Form::label('category') !!}
        <select class="form-control" name="category">
          @foreach($categories as $category)
          <option value="{{$category->id}}">{{$category->title}}</option>
          @endforeach
        </select>
      </div>
      <div class="col-lg-auto row justify-content-center">
        {!! Form::label('prix') !!}
        {!! Form::text('prix', $annonce->prix, ['class' => 'form-control', 'placeholder' => $annonce->prix]) !!}
      </div>
      <hr>
      <div class="col-lg-auto row justify-content-end">
        {!! Form::submit('Editer', ['class' => 'btn btn-outline-dark']) !!}
      </div>
    </div>
    {!! Form::close() !!}
  </div>
@endsection
