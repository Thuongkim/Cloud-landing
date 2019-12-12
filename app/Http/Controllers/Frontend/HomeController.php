<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Define\Constant as Constant;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Cache;

use App\Slider;
use App\StaticPage;
use App\Models\Step;
use App\Models\Team;
use App\Models\Price;
use App\Models\Service;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
class HomeController extends Controller
{
	public function __construct()
    {
        \View::share('staticPages', StaticPage::getStaticPage());
    }

    public function index(Request $request)
    {
        $services = Service::getService();
        $sliders  = Slider::getSlider();
        $steps    = Step::getStep();
        $teams    = Team::getTeam();
        $prices    = Price::getPrice();
        return view('frontend.pages.home', compact('sliders', 'services', 'steps', 'teams', 'prices'));
    }
}
