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
    
    public static function getStaticPage()
    {
        if (!Cache::has('static_pages')) {
            $static_pages = StaticPage::where('status', 1)->get();
            $static_pages = json_encode($static_pages);
            if ($static_pages) Cache::forever( 'static_pages', $static_pages) ;
        } else {
            $static_pages = Cache::get( 'static_pages');
        }
        return json_decode($static_pages, 1);
    }
}