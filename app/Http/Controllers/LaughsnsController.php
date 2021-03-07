<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\HTML;
use App\Laughsns;

class LaughsnsController extends Controller
{
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
        $posts = Laughsns::all()->sortByDesc('updated_at');

        if (count($posts) > 0) {
            $headline = $posts->shift();
        } else {
            $headline = null;
        }

        // laughsns/index.blade.php ファイルを渡している
        // また View テンプレートに headline、 posts、という変数を渡している
        return view('laughsns.index', ['headline' => $headline, 'posts' => $posts]);
    }
    public function index2(Request $request)
    {
        $cond_title = $request->cond_title;
        if ($cond_title != '') {
          // 検索されたら検索結果を取得する
          $posts = Laughsns::where('entertainer', $cond_title)->get();
        } else {
          // それ以外はすべてのニュースを取得する
          $posts = Laughsns::all();
        }
        return view('laughsns.index2', ['posts' => $posts, 'cond_title' => $cond_title]);
    }
}
