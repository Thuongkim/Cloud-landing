<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use App\Define\Constant as Constant;

class Price extends Model
{
    public static function rules($id = 0) {

        return [
            'price'        => 'required|max:255',
            'type'         => 'required|max:255',
            'cpu'      => 'required|max:255',
            'ssd'      => 'required|max:255',
            'ram'      => 'required|max:255',
            'ip'      => 'required|max:255'
        ];

    }
    // Don't forget to fill this array
    protected $fillable = [ 'price', 'type', 'cpu', 'ram', 'ssd', 'ip', 'status', 'position'];

    public static function boot()
    {
        parent::boot();
        static:: created (function($price)
        {
            self::clearCache();
        });
        static:: updated (function($price)
        {
            self::clearCache();
        });
        static::deleted(function($price)
        {
            self::clearCache();
        });
        static::saved(function($price)
        {
            self::clearCache();
        });
    }
    public static function clearCache(){
        Cache::forget('prices');
    }

    public static function getPrice()
    {
        if (!Cache::has('prices')) {
            $prices = Price::where('status', 1)->orderBy( 'position', 'desc')->get();
            $prices = json_encode($prices) ;
            if ($prices) Cache::forever( 'prices', $prices) ;
        } else {
            $prices = Cache::get( 'prices');
        }
        return json_decode($prices, 1);
    }
}
