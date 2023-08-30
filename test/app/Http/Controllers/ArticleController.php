<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    //
	public function create(){
		//	リッチテキストエディタに戻る
		return view('article.create');
	}

	public function store(Request $request){
		//	記事のモデルのインスタンスを作成
		$article = new Article();
		
		//	fill()：モデルの複数のカラムを更新することができる。
		$article->fill([
			'title'=>request('title'),
			'body'=>request('body')
		]);

		//	データベースへの保存
		$article->save();

		//	記事作成の画面にメッセージ付きで返す。
		return back()->with('message','Article Submit is Success');
	}
}
