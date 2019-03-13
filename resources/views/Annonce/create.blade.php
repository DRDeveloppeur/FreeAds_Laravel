@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('annonce.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" autofocus>

                                @if ($errors->has('title'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="category" class="col-md-4 col-form-label text-md-right">{{ __('Category') }}</label>

                            <div class="col-md-6">
                              <select class="form-control" name="category_id">
                                @foreach($categories as $category)
                                  <option value="{{$category->id}}">{{$category->title}}</option>
                                @endforeach
                              </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="content" class="col-md-4 col-form-label text-md-right">{{ __('Content') }}</label>

                            <div class="col-md-6">
                              <textarea id="content" rows="3" cols="30" class="form-control{{ $errors->has('content') ? ' is-invalid' : '' }}" name="content" autofocus>
                              </textarea>

                                @if ($errors->has('content'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('content') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                          <label for="filename" class="col-md-4 col-form-label text-md-right">{{ __('Photos') }}</label>

                          <div class="col-md-6">
                            <input id="filename" type="file" class="form-control{{ $errors->has('filename') ? ' is-invalid' : '' }}" name="filename" autofocus>

                            @if ($errors->has('filename'))
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('filename') }}</strong>
                            </span>
                            @endif
                          </div>
                        </div>

                        <div class="form-group row">
                          <label for="prix" class="col-md-4 col-form-label text-md-right">{{ __('Prix') }}</label>

                          <div class="col-md-6">
                            <input id="prix" type="float" class="form-control{{ $errors->has('filename') ? ' is-invalid' : '' }}" name="prix" autofocus>

                            @if ($errors->has('prix'))
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('prix') }}</strong>
                            </span>
                            @endif
                          </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-outline-dark">
                                    {{ __('Create') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
