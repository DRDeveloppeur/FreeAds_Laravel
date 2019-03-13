@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Send messages') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('message.store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="id_user" class="col-md-4 col-form-label text-md-right">{{ __('For') }}</label>
                            <div class="col-md-6">
                              <select id="id_user" class="form-control{{ $errors->has('id_user') ? ' is-invalid' : '' }}" name="id_user">
                                @foreach($users as $user)
                                <option value="{{$user->id}}">{{$user->name}}</option>
                                @endforeach
                              </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="content" class="col-md-4 col-form-label text-md-right">{{ __('Message') }}</label>
                            <div class="col-md-6">
                              <textarea class="form-control" id="content" name="content" rows="3" cols="80"></textarea>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-outline-dark">
                                    {{ __('Send') }}
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
