<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{

    use SoftDeletes;

    protected $table = 'articles';

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'title',
        'body',
        'slug',
        'click',
        'user_id',
        'category_id',
        'original',
        'created_at',
    ];

    public function user()
    {
        return $this->belongsTo('App\Model\User');
    }

    public function category()
    {
        return $this->belongsTo('App\Model\Category');
    }

    public function tag()
    {
        return $this->belongsToMany('App\Model\Tag');
    }

    public function message()
    {
        return $this->hasMany('App\Model\Message');
    }

    /**
     * [get article list].
     *
     * @param [int] $limit [number of article]
     *
     * @return [LengthAwarePaginator] [latest article paginate]
     */
    public static function getArticleList($limit = 7)
    {
        return self::articleWich()->latest()->paginate($limit);
    }

    /**
     * [get Article].
     *
     * @param [int] $id [articles table id]
     *
     * @return [Collection] [articles id data]
     */
    public static function getArticle($id)
    {
        $Article_date = self::find($id);
        self::update_click($Article_date);

        return $Article_date->load('category', 'tag');
    }

    /**
     * [According to the conditions get Article].
     *
     * @param [string] $column [articles table column]
     * @param [int]    $id     [articles table id]
     *
     * @return [LengthAwarePaginator] [latest article paginate]
     */
    public static function getArticleWhere($column, $id)
    {
        return self::articleWich()->where($column, $id)->latest()->paginate(7);
    }

    /**
     * [get Article reference Tag].
     *
     * @param [string] $name [tags table name]
     *
     * @return [LengthAwarePaginator] [latest article paginate]
     */
    public static function getArticleTag($name)
    {
        return self::articleWich()->whereHas('tag',
          function ($query) use ($name) {

            $query->where('name', $name);

          })->latest()->paginate(7);
    }

    /**
     * [get Article Key Word].
     *
     * @param [string] $keyword [search Article Key Word]
     *
     * @return [LengthAwarePaginator] [latest article paginate]
     */
    public static function getKeyWord($keyword)
    {
        return self::where('title', 'LIKE', "%$keyword%")->
                     orderBy('created_at', 'DESC')->paginate(7);
    }

    /**
     * [Eager Loading].
     *
     * @return [Model] [Eager Loading categors、tags table]
     */
    public static function articleWich()
    {
        return self::with('category', 'tag','message');
    }

    /**
     * [update click].
     *
     * @param [Collection] $date [articles date]
     *
     * @return [bool] [Save status]
     */
    public static function update_click($date)
    {
        $date->click = ++$date->click;

        return $date->save();
    }

}
