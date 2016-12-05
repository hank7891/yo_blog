<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Model\Article;

class ArticleController extends Controller
{
	/*
	* 顯示文章內文
	* 參數: id(文章ID)
	*/
    public function show($id){
        $article_data = Article::getArticle($id);
        return View('article_show', compact('article_data'));
        //$message = Message::getMessage($article_data->id);
        //return View('show', compact('article_data', 'message'));
    }
}
