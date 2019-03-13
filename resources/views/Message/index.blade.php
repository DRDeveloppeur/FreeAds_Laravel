@extends('layouts.app')

@section('content')
    <div class="container">
    <br />
    @if (\Session::has('success'))
      <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
      </div><br />
     @endif
    <a href="{{ route('message.create') }}" class="btn btn-outline-dark">Send new message</a>
    <table class="table table-striped">
    <thead>
      <tr>
        <th>Send by</th>
        <th>Sended the</th>
        <th></th>
        <th colspan="2">Action</th>
      </tr>
    </thead>
    <tbody>

      @foreach($messages as $message)
      <tr>
        <td>{{$message->user->name}}</td>
        <td>{{$message->created_at}}</td>
        <td>{{$message->read?'':'New'}}</td>

        <td><a href="{{ route('message.show', $message) }}" class="btn btn-warning">View</a></td>
        <td>
          <form action="{{route('message.destroy', $message['id'])}}" method="post">
            @csrf
            <input name="_method" type="hidden" value="DELETE">
            <button class="btn btn-danger" type="submit">Delete</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  {{$messages->links()}}
  </div>
@endsection
