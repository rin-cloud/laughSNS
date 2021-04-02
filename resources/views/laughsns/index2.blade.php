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
                <a class="nav-link" href="https://3bd9d0cc6665453aaa89c82261c0c97c.vfs.cloud9.us-east-2.amazonaws.com/">Home <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="https://3bd9d0cc6665453aaa89c82261c0c97c.vfs.cloud9.us-east-2.amazonaws.com/index">マイページ</a>
              </li>
              <li class="nav-item active">
                <a class="nav-link disabled" href="https://3bd9d0cc6665453aaa89c82261c0c97c.vfs.cloud9.us-east-2.amazonaws.com/create">新規投稿</a>
              </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
              <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
          </div>
        </nav>
        <hr color="#c0c0c0">
        <div class="card">
            <img src="{{  secure_asset('storage/profile_image' . $post->image_path) }}">
            <div class="card-body">
                <h4 class="card-title"></h4>
                <p class="card-text">
                    
                </p>
                <a href="https://3bd9d0cc6665453aaa89c82261c0c97c.vfs.cloud9.us-east-2.amazonaws.com/index" class="btn btn-primary"></a>
            </div>
        </di>
    </div>
    </div>
@endsection