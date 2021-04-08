<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;

class LaughsnsController extends Controller
{
    public function add()
    {
        return view('laughsns.create');
    }
    public function create(Request $request)
    {
        $this->validate($request, Post::$rules);
    
        $posts = new Post;
        $form = $request->all();
        
        if (isset($form['image'])) {
            $path = $request->file('image')->store('public/storage/profile_image');
            $posts->image_path = basename($path);
        } else {
          $posts->image_path = null;
        }
        unset($form['_token']);
        unset($form['image']);
        $posts->fill($form);
        $posts->user_id = $request->user()->id;
        $posts->save();
        return redirect('laughsns/create');
    }
    
    public function index(Request $request)
    {
        $cond_title = $request->cond_title;
        if ($cond_title != '') {
          // 検索されたら検索結果を取得する
          $posts = Post::where('entertainer', $cond_title)->get();
        } else {
          $posts = Post::all();
        }
        return view('laughsns.index', ['posts' => $posts, 'cond_title' => $cond_title]);
    }    
    public function edit(Request $request)
        {
          //  Modelからデータを取得する
          $posts = Post::find($request->id);
          if (empty($posts)) {
            abort(404);    
          }
          return view('laughsns.edit', ['posts_form' => $posts]);
        }
    public function update(Request $request)
        {
          // Validationをかける
          $this->validate($request, Post::$rules);
          //  Modelからデータを取得する
          $posts = Post::find($request->id);
          $posts_form = $request->all();
          unset($posts_form['_token']);
          unset($posts_form['remove']);
          unset($posts_form['_token']);
    
          return redirect('laughsns');
        }
}
