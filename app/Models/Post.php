<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Post extends Model
{
    

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = array('id');

    // 以下を追記
    public static $rules = array(
        'entertainer' => 'required',
        'recommend' => 'required',
    );
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    
    public function getUserTimeLine(Int $user_id)
    {
        return $this->where('user_id', $user_id)->orderBy('created_at', 'DESC')->paginate(50);
    }

    public function getPostCount(Int $user_id)
    {
        return $this->where('user_id', $user_id)->count();
    }
    
    public function getTimeLines(Int $user_id, Array $follow_ids)
    {
        // 自身とフォローしているユーザIDを結合する
        $follow_ids[] = $user_id;
        return $this->whereIn('user_id', $follow_ids)->orderBy('created_at', 'DESC')->paginate(50);
    }
    
        // 詳細画面
    public function getPost(Int $post_id)
    {
        return $this->with('user')->where('id', $post_id)->first();
    }
    
    public function postStore(Int $user_id, Array $data)
    {
        $this->user_id = $user_id;
        $this->entertainer= $data['entertainer'];
        $this->recommend = $data['recommend'];
        $this->save();

        return;
    }
    
    public function getEditPost(Int $user_id, Int $post_id)
    {
        return $this->where('user_id', $user_id)->where('id', $post_id)->first();
    }
    
    public function postUpdate(Int $post_id, Array $data)
    {
        $this->id = $post_id;
        $this->text = $data['recommend'];
        $this->update();

        return;
    }
    
    public function postDestroy(Int $user_id, Int $post_id)
    {
        return $this->where('user_id', $user_id)->where('id', $post_id)->delete();
    }
}