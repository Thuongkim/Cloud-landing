<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use App\Define\Constant as Constant;

class Service extends Model
{
    public static function rules($id = 0) {

        return [
            'title'        => 'required|max:255',
            'icon'         => 'required|max:255',
            'content'      => 'required',
        ];

    }
    // Don't forget to fill this array
    protected $fillable = [ 'title', 'content', 'status', 'position', 'icon'];

    public static function boot()
    {
        parent::boot();
        static:: created (function($service)
        {
            self::clearCache();
        });
        static:: updated (function($service)
        {
            self::clearCache();
        });
        static::deleted(function($service)
        {
            self::clearCache();
        });
        static::saved(function($service)
        {
            self::clearCache();
        });
    }
    public static function clearCache(){
        Cache::forget('services');
    }

    public static function getService()
    {
        if (!Cache::has('services')) {
            $services = Service::where('status', 1)->orderBy( 'position', 'desc')->get();
            $services = json_encode($services) ;
            if ($services) Cache::forever( 'services', $services) ;
        } else {
            $services = Cache::get( 'services');
        }
        return json_decode($services, 1);
    }
}
