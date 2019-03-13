@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-8">
          <br />
          @if (\Session::has('success'))
          <div class="alert alert-success">
            <p>{{ \Session::get('success') }}</p>
          </div><br />
          @endif
          <a href="{{ route('annonce.create') }}" class="btn btn-outline-dark">Create new annonce</a>
          <br>
          <input class="form-control" id="myInput" type="text" placeholder="Search..">
          <br>
          <table class="table table-striped">
            <thead>
              <tr>
                <th>Titre</th>
                <th>Posted</th>
                <th>Category</th>
                <th>Filename</th>
                <th>Prix</th>
                <th>Create</th>
              </tr>
            </thead>
            <tbody id="myTable">

              @foreach($annonces as $annonce)
              <tr>
                <td> <a href="{{ route('annonce.show', $annonce) }}">{{$annonce->title}}</a></td>
                <td>{{$annonce->user->name}}</td>
                <td>{{$annonce->category->title}}</td>
                <td><img src="/images/{{ $annonce->filename }}" width="80" alt="image"></td>
                <td>{{$annonce->prix}}€</td>
                <td>{{$annonce->created_at}}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
          <div class="row justify-content-center">
            {{$annonces->links()}}
          </div>
        </div>

        <div class="col-lg-3">
          <div class="list-group">
            <a href="{{ route('annonce.index') }}" class="list-group-item">
              All
              <span class="badge">{{ $annonce->count() }}</span>
            </a>
            <div class="card-header">{{ __('Categories') }}</div>
            @foreach($categories as $category)
            <a href="{{ route('category', $category) }}" class="list-group-item">
              {{$category->title}}
              <span class="badge">{{ $category->annonce->count() }}</span>
            </a>
            @endforeach
          </div>
        </div>
      </div>

    </div>

<script>
  $(document).ready(function(){
    $("#myInput").on("keyup", function() {
      var value = $(this).val().toLowerCase();
      $("#myTable tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      });
    });
  });
  </script>
@endsection
