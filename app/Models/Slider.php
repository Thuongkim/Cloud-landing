<?php namespace App;

use Illuminate\Support\Facades\Cache;

class Slider extends \Eloquent
{
    protected $fillable = [ 'name', 'summary', 'content', 'sub_image', 'status', 'position', 'image' ];

    public static function rules($id = 0) {
        return [
            'name'    => 'required|max:50',
            'summary' => 'required|max:500',
            'content' => 'required',
            'image'   => ($id == 0 ? 'required|' : '') . 'max:4096|mimes:jpg,jpeg,png,gif',
            'sub_image'   => ($id == 0 ? 'required|' : '') . 'max:4096|mimes:jpg,jpeg,png,gif',
        ];
    }

    public static function boot()
    {
        parent::boot();

        static::updated(function($page)
        {
            self::clearCache();
        });

        static::deleted(function($page)
        {
            self::clearCache();
        });

        static::saved(function($page)
        {
            self::clearCache();
        });
    }

    public static function clearCache()
    {
        Cache::forget('sliders');
    }

    public static function getSlider()
    {
        if (!Cache::has('sliders')) {
            $sliders = Slider::where('status', 1)->orderBy( 'position', 'desc')->get();
            foreach ($sliders as $slider) {
                $slider->summary = preg_replace('/(<\/?p>)/', '', $slider->summary);
                $slider->content = preg_replace('/(<\/?p>)/', '', $slider->content);
            }
            $sliders = json_encode($sliders) ;
            if ($sliders) Cache::forever( 'sliders', $sliders) ;
        } else {
            $sliders = Cache::get( 'sliders');
        }
        return json_decode($sliders, 1);
    }
}