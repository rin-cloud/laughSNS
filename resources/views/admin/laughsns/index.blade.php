@extends('layouts.admin')
@section('title', 'ユーザーの投稿')

@section('content')
    <div class="container">
        <div class="row">
            <h2>投稿一覧</h2>
        </div>
        <div class="row">
            <div class="col-md-4">
                <a href="{{ action('Admin\LaughsnsController@add') }}" role="button" class="btn btn-primary">新規投稿</a>
            </div>
            <div class="col-md-8">
                <form action="{{ action('Admin\LaughsnsController@index') }}" method="get">
                    <div class="form-group row">
                        <label class="col-md-2">芸人名</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="cond_title" value="{{ $cond_title }}">
                        </div>
                        <div class="col-md-2">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="検索">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="list-laughsns col-md-12 mx-auto">
                <div class="row">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th width="10%">ID</th>
                                <th width="20%">芸人名</th>
                                <th width="50%">オススメポイント</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $laughsns)
                                <tr>
                                    <th>{{ $laughsns->id }}</th>
                                    <td>{{ \Str::limit($laughsns->entertainer, 100) }}</td>
                                    <td>{{ \Str::limit($laughsns->recommend, 250) }}</td>
                                    <div>
                                        <a href="{{ action('Admin\LaughsnsController@edit', ['id' => $laughsns->id]) }}">編集</a>
                                    </div>
                                    <div>
                                        <a href="{{ action('Admin\LaughsnsController@delete', ['id' => $laughsns->id]) }}">削除</a>
                                    </div>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection