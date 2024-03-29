@extends('layouts.admin')
@section('title', 'お笑いSNS')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>お笑いSNS</h2>
                <form action="{{ action('PostController@create') }}" method="post" enctype="multipart/form-data">

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
                    <input type="submit" class="btn btn-primary" value="更新">
                </form>
            </div>
        </div>
    </div>
@endsection