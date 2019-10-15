<?php namespace App;

use Illuminate\Support\Facades\Cache;

class News extends \Eloquent {

    public static function rules($id = true) {

        return [
            'title'                 => 'required|max:255',
            'summary'               => ($id == true ? 'required' : ''). '|max:500',
            'content'               => 'required',
            'image'                 => 'max:2048|mimes:jpg,jpeg,png,gif',
            'created_by'            => 'integer',
            'category'              => 'required|integer',
        ];

    }

    public function translation($field, $locale = null) {
        if ($locale == null) {
            $locale = config('app.locales')[0];
        }
        return $this->morphMany('App\Translation', 'translatable')->where('locale', $locale)->where('name', $field); //->first();
    }

	// Don't forget to fill this array
	protected $fillable = [ 'title', 'summary', 'content', 'view_counter', 'status', 'image', 'created_by', 'featured', 'category_id' ];

    private static function increase_count( $id, $redis ) {

        //$redis = \App::make('redis');

        $redis->hincrby("product_counter_view_$id", 'counter_view_product', 1);
        $add_to_change_list = $redis->get("add_to_change_list_$id");
        if ( !$add_to_change_list || 1 ) {
            $redis->lpush("product_change_list", $id);
            $redis->setex("add_to_change_list_$id", \Config::get('products.write_count_cycle'), "change_after");
        }
    }


    public static function boot()
    {
        parent::boot();

        static::updated(function($page)
        {
            //clear cache
            Cache::forget('hotNews');
            Cache::forget('lastNews');
            Cache::tags('newsCategory')->flush();
            Cache::forget('newsImages');
        });

        static::deleted(function($page)
        {
            //clear cache
            Cache::forget('hotNews');
            Cache::forget('lastNews');
            Cache::tags('newsCategory')->flush();
            Cache::forget('newsImages');
        });

        static::saved(function($page)
        {
            //clear cache
            Cache::forget('hotNews');
            Cache::forget('lastNews');
            Cache::tags('newsCategory')->flush();
            Cache::forget('newsImages');
        });
    }

    public static function clearCache()
    {
        //clear cache
        Cache::forget('hotNews');
        Cache::forget('lastNews');
        Cache::tags('newsCategory')->flush();
        Cache::forget('newsImages');
    }

    public static function boot()
    {
        parent::boot();
        static:: created (function($news)
        {
            self::clearCache();
        });
        Static:: updated (function($news)
        {
            Self::clearCache();
        });
        Static::deleted(function($news)
        {
            Self::clearCache();
        });
        Static::saved(function($news)
        {
            Self::clearCache();
        });
    }
    public static function clearCache()
    {
        Cache:: forget ('home_news');
    }
    public static function getHomeNews()
    {
        $homeNews = [];
        if (!Cache::has('home_news')) {
            $homeNews = News::where('status', 1)->where( 'featured', 1)->select('id', 'title', ' image', 'updated_at', '
                Summary ' )->orderBy( 'updated_at', 'desc')->take(6)->get();
            $homeNews = json_encode($homeNews) ;
            if ($homeNews) Cache:: forever( 'home_news', $homeNews) ;
        } else {
            $homeNews = Cache::get( 'home_news');
        }
        return json_decode($homeNews, 1);
    }
}