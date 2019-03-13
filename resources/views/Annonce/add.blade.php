@extends('layouts.app')

@section('content')
  <div class="container">
    {!! Form::open(['method' => 'put', 'url' => url('annonce/images', $annonce), 'files' => true]) !!}
    <div class="form-control row">
      <div class="col-lg-auto row justify-content-center">
        <div>
          <img id="blah" src="#" width="25%" alt="your image">
        </div>
        {!! Form::file('filename', ['class' => 'form-control', 'id' => 'imgInp']) !!}
      </div>
      <hr>
      <div class="col-lg-auto row justify-content-end">
        {!! Form::submit('Editer', ['class' => 'btn btn-outline-dark']) !!}
      </div>
    </div>
    {!! Form::close() !!}
  </div>
  <script type='text/javascript' src='http://code.jquery.com/jquery-1.9.1.js'></script>
  <script type='text/javascript'>
    $(window).load(function(){
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#imgInp").change(function(){
            readURL(this);
        });
    });

    </script>
@endsection
