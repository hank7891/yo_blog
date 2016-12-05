<?php

namespace App\Http\Controllers;

use App\Model\Article;
//use Illuminate\Http\Request;
//use App\Http\Requests;
use Request;

class IndexController extends Controller
{
    public function index(){
    	//執行MODEL Article->getArticleList  參數:單頁顯示筆數
        $article_data = Article::getArticleList(7);
        return view('index', compact('article_data'));
    }

     /**
     * 搜尋關鍵字
     * [search keyword article].
     * @return [view] [keyword article]
     */
    public function search()
    {
    	//取得關鍵字
        $search_key = Request::get('search_key');
        $article_data = Article::getKeyWord($search_key);
        return view('index', compact('article_data'));
    }
}
