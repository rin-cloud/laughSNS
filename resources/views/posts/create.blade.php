@extends('layouts.app')

@section('content')
    <div class="container">
        <hr color="#c0c0c0">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <a class="navbar-brand" href="#">お笑いSNS</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
                <a class="nav-link" href="{{ action('LaughsnsController@index', ['id' => Auth::user()->id])}}">Home <span class="sr-only">(current)</span> </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ action('UsersController@show', ['id' => Auth::user()->id]) }}">マイページ</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ action('PostController@create', ['id' => Auth::user()->id])}}">新規投稿</a>
              </li>
            </ul>
          </div>
        </nav>
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>お笑いSNS</h2>
                <form action="{{ action('PostController@store') }}" method="post" enctype="multipart/form-data">

                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2">芸人名</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="entertainer" value="{{ old('entertainer') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">おすすめポイント</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="recommend" rows="20">{{ old('recommend') }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">画像</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control-file" name="image">
                        </div>
                    </div>
                    {{ csrf_field() }}
                        <div class="form-group row mb-0">
                            <div class="col-md-12 text-right">
                                <button type="submit" class="btn btn-primary">
                                      投稿する
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