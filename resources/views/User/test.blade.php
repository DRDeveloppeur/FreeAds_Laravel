@extends('layouts.app')

@section('content')
    <div class="container">
    <br />
    @if (\Session::has('success'))
      <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
      </div><br />
     @endif
    <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Date</th>
        <th>Email</th>
        <th colspan="2">Action</th>
      </tr>
    </thead>
    <tbody>

      @foreach($user as $passport)
      @php
        $date=date('Y-m-d', $passport['date']);
      @endphp
      <tr>
        <td>{{$passport['id']}}</td>
        <td>{{$passport['name']}}</td>
        <td>{{$date}}</td>
        <td>{{$passport['email']}}</td>

        <td><a href="{{action('UserController@edit', $passport['id'])}}" class="btn btn-warning">Edit</a></td>
        <td>
          <form action="{{action('UserController@destroy', $passport['id'])}}" method="post">
            @csrf
            <input name="_method" type="hidden" value="DELETE">
            <button class="btn btn-danger" type="submit">Delete</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  </div>
@endsection
