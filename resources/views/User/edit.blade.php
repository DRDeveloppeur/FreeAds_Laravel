@extends('layouts.app')

@section('content')
  <div class="container">
    {!! Form::open(['method' => 'put', 'url' => route('user.update', $user)]) !!}
    <div class="form-control row">
      <div class="col-lg-auto row justify-content-center">
        {!! Form::label('name') !!}
        {!! Form::text('name', $user->name, ['class' => 'form-control', 'value' => $user->name]) !!}
      </div>
      <div class="col-lg-auto row justify-content-center">
        {!! Form::label('email') !!}
        {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => $user->email]) !!}
      </div>
      <div class="col-lg-auto row justify-content-center">
        {!! Form::label('password') !!}
        {!! Form::password('password', ['class' => 'form-control', 'placeholder' => $user->password]) !!}
      </div>
      <hr>
      <div class="col-lg-auto row justify-content-end">
        {!! Form::submit('Editer', ['class' => 'btn btn-outline-dark']) !!}
      </div>
    </div>
    {!! Form::close() !!}
  </div>
@endsection
