<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Model\Article;

class TagController extends Controller
{
    /**
     * [tag article show].
     *
     * @param [string] $name [tags table name]
     *
     * @return [view] [a tag article]
     */
    public function show($name)
    {
        $article_data = Article::getArticleTag($name);

        return view('index', compact('article_data'));
    }

}
