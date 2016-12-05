<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{

    use SoftDeletes;

    /**讀取哪張表**/
    protected $table = 'articles';

    /**刪除時產生時間(若有時間表示該資料假刪除狀態)**/
    protected $dates = ['deleted_at'];

    /**設定該欄位 可以大量做新增的動作**/

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
        //return self::latest()->paginate($limit);
        //取得關聯後資料。latest:排序由新->舊 paginate:參數 顯示筆數單頁
        return self::articleWich()->latest()->paginate($limit);
    }


    /*
    * 取得文章資料，並更新點及次數
    *
    */
    public static function getArticle($id)
    {
        $Article_date = self::find($id);
        self::update_click($Article_date);

        return $Article_date->load('category', 'tag');
    }


    /**
     * 依照關鍵字搜尋
     *
     *
     */
    public static function getKeyWord($keyword)
    {
        return self::where('title', 'LIKE', "%$keyword%")->
                     orderBy('created_at', 'DESC')->paginate(7);
    }


    /**
     * [According to the conditions get Article].
     * 依照條件搜尋資料
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
     * 關聯資料表
     *
     * [Eager Loading].
     *
     * @return [Model] [Eager Loading categors、tags table]
     */
    public static function articleWich(){
        return self::with('category', 'tag','message');
    }

    /**
    * 更新article點擊數量
    *
    */
    public static function update_click($date){
        $date->click = ++$date->click;
        return $date->save();
    }

}
