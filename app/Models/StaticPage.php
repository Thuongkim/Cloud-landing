<?php namespace App;

use Illuminate\Support\Facades\Cache;

class StaticPage extends \Eloquent
{
    protected $fillable = [ 'slug', 'title', 'description', 'status' ];

    public static function rules($id = 0) {
        return [
            'title'                 => 'required|max:255',
            'description'           => 'required',
        ];

    }
    public static function boot()
    {
        parent::boot();
        static:: created (function($staticpage)
        {
            self::clearCache();
        });
        static:: updated (function($staticpage)
        {
            self::clearCache();
        });
        static::deleted(function($staticpage)
        {
            self::clearCache();
        });
        static::saved(function($staticpage)
        {
            self::clearCache();
        });
    }
    public static function clearCache()
    {
        Cache::forget('static_pages');
    }
    
    // public static function getStaticPage()
    // {
    //     if (!Cache::has('static_pages')) {
    //         $static_pages = StaticPage::where('status', 1)->get();
    //         $static_pages = json_encode($static_pages);
    //         if ($static_pages) Cache::forever( 'static_pages', $static_pages) ;
    //     } else {
    //         $static_pages = Cache::get( 'static_pages');
    //     }
    //     return json_decode($static_pages, 1);
    // }

    public static function getStaticPage()
    {
        $staticPages = [];
        if (!Cache::has('static_pages')) {
            $staticPagess = StaticPage::where('status', 1)->get();
            $tmp = [];
            foreach ($staticPagess as $staticPage) {
                $trans = $staticPage->title;
                $tmp[$staticPage->slug]['title'] = is_null($trans) ? '' : $trans;
                $trans = $staticPage->description;
                $tmp[$staticPage->slug]['description'] = is_null($trans) ? '' : $trans;
                // dd($tmp);
                $staticPages = json_encode($tmp);
            }
           if ($staticPages) Cache:: forever( 'static_pages', $staticPages) ; 
        } else {
            $staticPages = Cache::get('static_pages');
        }
        // dd(json_decode($staticPages, 1));
        return json_decode($staticPages, 1);
    }
}