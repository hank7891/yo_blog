<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

use App\Model\Category;
use App\Model\Article;

class CategorieController extends Controller
{
    //

    /**
    * [categorie article show].
    *
    * @param [string] $name [categories table name]
    *
    * @return [view] [a categories article]
    */
   public function show($category_id)
   {
       //$category_id = Category::getCategoryId($name);
       $article_data = Article::getArticleWhere('category_id', $category_id);

       return view('index', compact('article_data'));
   }
}
