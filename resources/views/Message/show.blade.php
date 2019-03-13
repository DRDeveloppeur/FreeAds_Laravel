@extends('layouts.app')

@section('content')
    <div class="container">
    <br />
    @if (\Session::has('success'))
      <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
      </div><br />
     @endif
     <p>Send By : {{$message->user->name}}</p>
     <p>Content : {{$message->content}}</p>
  </div>
@endsection
