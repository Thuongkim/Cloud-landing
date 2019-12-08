<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use App\Define\Constant as Constant;

class Team extends Model
{
    public static function rules($id = 0) {

        return [
            'name'        => 'required|max:255',
            'duty'         => 'required|max:255',
            'content'      => 'required|max:255',
            'image'   => ($id == 0 ? 'required|' : '') . 'max:4096|mimes:jpg,jpeg,png,gif'
        ];

    }
    // Don't forget to fill this array
    protected $fillable = [ 'name', 'content', 'status', 'position', 'duty', 'image'];

    public static function boot()
    {
        parent::boot();
        static:: created (function($team)
        {
            self::clearCache();
        });
        static:: updated (function($team)
        {
            self::clearCache();
        });
        static::deleted(function($team)
        {
            self::clearCache();
        });
        static::saved(function($team)
        {
            self::clearCache();
        });
    }
    public static function clearCache(){
        Cache::forget('teams');
    }

    public static function getTeam()
    {
        if (!Cache::has('teams')) {
            $teams = Team::where('status', 1)->orderBy( 'position', 'desc')->get();
            $teams = json_encode($teams) ;
            if ($teams) Cache::forever( 'teams', $teams) ;
        } else {
            $teams = Cache::get( 'teams');
        }
        return json_decode($teams, 1);
    }
}
