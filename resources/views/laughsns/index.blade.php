@extends('layouts.front')

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
              <li class="nav-item active">
                <a class="nav-link" href="{{ action('PostController@index', ['id' => Auth::user()->id])}}">最新投稿 <span class="sr-only">(current)</span> </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ action('UsersController@show', ['id' => Auth::user()->id]) }}">マイページ</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ action('PostController@create', ['id' => Auth::user()->id])}}">新規投稿</a>
              </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
              <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search" name="cond_title">
              <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
          </div>
        </nav>
        <div class="row">
          @foreach($posts as $post)
            <div class="col-sm-6">
              <div class="card">
                <img src="{{ secure_asset('storage/profile_image/' . $post->image_path) }}">
                <div class="card-body">
                  <h4 class="card-title">{{$post->entertainer}}</h4>
                  <p class="card-text">{{str_limit($post->recommend, 150) }}</p>
                  <a href="#"></a>
                </div>
              </div>  
            </div>
          @endforeach  
        </div>
    </div>
@endsection