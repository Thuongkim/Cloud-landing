<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use App\Define\Constant as Constant;

class Step extends Model
{
    public static function rules($id = 0) {

        return [
            'title'        => 'required|max:255',
            'content'      => 'required',
            'image'   => ($id == 0 ? 'required|' : '') . 'max:2048|mimes:jpg,jpeg,png,gif'
        ];

    }
        // Don't forget to fill this array
    protected $fillable = [ 'title', 'content', 'status', 'position', 'image'];

    public static function boot()
    {
        parent::boot();
        static:: created (function($step)
        {
            self::clearCache();
        });
        static:: updated (function($step)
        {
            self::clearCache();
        });
        static::deleted(function($step)
        {
            self::clearCache();
        });
        static::saved(function($step)
        {
            self::clearCache();
        });
    }
    public static function clearCache(){
        Cache::forget('steps');
    }

    public static function getStep()
    {
        if (!Cache::has('steps')) {
            $steps = Step::where('status', 1)->orderBy( 'position', 'desc')->get();
            $steps = json_encode($steps) ;
            if ($steps) Cache::forever( 'steps', $steps) ;
        } else {
            $steps = Cache::get( 'steps');
        }
        return json_decode($steps, 1);
    }
}
