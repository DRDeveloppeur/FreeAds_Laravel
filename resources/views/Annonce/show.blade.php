@extends('layouts.app')

@section('content')
    <div class="container">
    <br />
    @if (\Session::has('success'))
      <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
      </div><br />
     @endif
     <br>

     <div class="row justify-content-center">
       <h1>{{$annonce->title}}</h1>
     </div>

     <div class="row">
       <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="width:50%;">
         @if(Auth::user()->id === $annonce->user_id)
         <form class="form-control" action="{{route('annonce.destroy', $annonce['id'])}}" method="post">
           @csrf
           <a href="{{ url('annonce/add', $annonce) }}" class="btn btn-success">Add photo</a>
           <a href="{{ route('annonce.edit', $annonce) }}" class="btn btn-warning">Edit</a>
           <input name="_method" type="hidden" value="DELETE">
           <button class="btn btn-danger" type="submit">Delete</button>
         </form>
         @endif
         <ol class="carousel-indicators">
           <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
           <?php $nbr=0; ?>
           @foreach($photos as $photo)
           <?php ++$nbr; ?>
           <li data-target="#carouselExampleIndicators" data-slide-to="{{$nbr}}"></li>
           @endforeach
         </ol>
         <div class="carousel-inner">
           <div class="carousel-item active">
             <img class="d-block w-100" src="/images/{{ $annonce->filename }}" alt="Slide">
             <div class="carousel-caption d-none d-md-block">
               <h5>{{$annonce->title}}</h5>
               <p>{{$annonce->content}}</p>
             </div>
           </div>

           @foreach($photos as $photo)
           <div class="carousel-item">
             <img class="d-block w-100" src="/images/{{ $photo->filename }}" alt="Slide">
           </div>
           @endforeach
         </div>
         <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
           <span class="carousel-control-prev-icon" aria-hidden="true"></span>
           <span class="sr-only">Previous</span>
         </a>
         <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
           <span class="carousel-control-next-icon" aria-hidden="true"></span>
           <span class="sr-only">Next</span>
         </a>
       </div>
       <div class="" style="width:50%;">
         <div class="row justify-content-center">
           <h4>Description</h4>
         </div>
         <hr>
         <div class="row justify-content-center">
           <p>{{$annonce->content}}</p>
         </div>
       </div>
     </div>

  </div>
@endsection
