<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Laughsns;

class LaughsnsController extends Controller
{
    public function add()
    {
        return view('admin.laughsns.create');
    }
    public function create(Request $request)
    {
        $this->validate($request, Laughsns::$rules);
    
        $laughsns = new Laughsns;
        $form = $request->all();
        
        if (isset($form['image'])) {
            $path = $request->file('image')->store('public/image');
            $laughsns->image_path = basename($path);
        } else {
          $laughsns->image_path = null;
        }
        // フォームから送信されてきた_tokenを削除する
        unset($form['_token']);
        // フォームから送信されてきたimageを削除する
        unset($form['image']);
        // データベースに保存する
        $laughsns->fill($form);
        $laughsns->save();
        return redirect('admin/laughsns/create');
    }
    
    public function index(Request $request)
    {
        $cond_title = $request->cond_title;
        if ($cond_title != '') {
          // 検索されたら検索結果を取得する
          $posts = Laughsns::where('entertainer', $cond_title)->get();
        } else {
          // それ以外はすべてのニュースを取得する
          $posts = Laughsns::all();
        }
        return view('admin.laughsns.index', ['posts' => $posts, 'cond_title' => $cond_title]);
    }
    
    
    public function edit(Request $request)
        {
          //  Modelからデータを取得する
          $laughsns = Laughsns::find($request->id);
          if (empty($laughsns)) {
            abort(404);    
          }
          return view('admin.laughsns.edit', ['laughsns_form' => $laughsns]);
        }


    public function update(Request $request)
        {
          // Validationをかける
          $this->validate($request, Laughsns::$rules);
          //  Modelからデータを取得する
          $laughsns = Laughsns::find($request->id);
          // 送信されてきたフォームデータを格納する
          $laughsns_form = $request->all();
          unset($laughsns_form['_token']);
          unset($laughsns_form['remove']);
          unset($laughsns_form['_token']);
    
          return redirect('admin/laughsns');
        }
    
      // 以下を追記　　
    public function delete(Request $request)
        {
          $laughsns = Laughsns::find($request->id);
          // 削除する
          $laughsns->delete();
          return redirect('admin/laughsns/');
        }  
}
