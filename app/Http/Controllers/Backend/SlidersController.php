<?php namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

use App\Slider as Slider;
use App\TranslationSetting as TranslationSetting;

use App\Http\Controllers\Controller;

class SlidersController extends Controller
{
    // private $languages;
    // private $language;
    // private $fields;

    // public function __construct()
    // {
    //     $locales = config('app.locales');
    //     $this->language = $locales[0];
    //     unset($locales[0]);
    //     $this->languages = array_flip($locales);
    //     $this->fields = TranslationSetting::get(with(new Slider)->getTable());

    //     \View::share('languages', $this->languages);
    //     \View::share('fields', $this->fields);
    // }

	public function index(Request $request)
	{
        $sliders = Slider::orderBy('position')->get();
		return view('backend.sliders.index', compact('sliders'));
	}

	public function create()
	{
		return view('backend.sliders.create');
	}

	public function store(Request $request)
	{
        $request->merge(['status' => intval($request->status)]);

        $validator = Validator::make($data = $request->all(), Slider::rules());
		$validator->setAttributeNames(trans('sliders'));

		if ($validator->fails())
            return redirect()->back()->withErrors($validator)->withInput();

        if ($request->hasFile('image')) {
            $image  = $request->image;
            $ext    = pathinfo($image->getClientOriginalName(), PATHINFO_EXTENSION);
            $image  = \Image::make($request->image)->resize(1399, 787);
            //resize
            if ($image->height() > $image->width()) {
                if ($image->height() >= 787) {
                    $image->resize(null, 787, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                }
            } else {
                if ($image->height() >= 787) {
                    $image->resize(null, 787, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                }
                elseif ($image->width() >= 1399) {
                    $image->resize(1399, null, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                }
            }

        \File::makeDirectory('assets/media/images/sliders/', 0775, true, true);
        $fileName = str_slug($data['name']). "-" . time() . '.' .  $ext;
        $image->save('assets/media/images/sliders/' . $fileName);
        $data['image'] = 'assets/media/images/sliders/' . $fileName;

    }

    if ($request->hasFile('sub_image')) {
            $image  = $request->sub_image;
            $ext    = pathinfo($image->getClientOriginalName(), PATHINFO_EXTENSION);
            $image  = \Image::make($image)->resize(460, 381);
            //resize
            if ($image->height() > $image->width()) {
                if ($image->height() >= 381) {
                    $image->resize(null, 381, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                }
            } else {
                if ($image->height() >= 381) {
                    $image->resize(null, 381, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                }
                elseif ($image->width() >= 460) {
                    $image->resize(460, null, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                }
            }

        \File::makeDirectory('assets/media/images/sliders/', 0775, true, true);
        $fileName = "sub_". str_slug($data['name']). "-" . time() . '.' .  $ext;
        $image->save('assets/media/images/sliders/' . $fileName);
        $data['sub_image'] = 'assets/media/images/sliders/' . $fileName;

    }
        $data['position']   = 1;
        $slider = Slider::create($data);
        Slider::where('id', "<>", $slider->id)->increment('position');

        Slider::clearCache();

        Session::flash('message', trans('system.success'));
        Session::flash('alert-class', 'info');

        return redirect()->route('admin.sliders.index');
	}

	public function edit($id)
	{
        $slider = Slider::find($id);
        if ( is_null( $slider ) ) {
            Session::flash('message', trans('system.have_an_error'));
            Session::flash('alert-class', 'danger');
            return back();
        }

		return view('backend.sliders.edit', compact( 'slider' ) );
	}

	public function update(Request $request, $id)
	{
        $id = intval( $id );
        $request->merge(['status' => intval($request->status)]);

        $slider = Slider::find($id);
        if ( is_null( $slider ) ) {
            Session::flash('message', trans('system.have_an_error'));
            Session::flash('alert-class', 'danger');
            return back();
        }

        $validator = Validator::make($data = $request->all(), Slider::rules($id));

        $validator->setAttributeNames(trans('sliders'));

        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if ($request->hasFile('sub_image')) {
            if (\File::exists(public_path() . '/' . $slider->image)) \File::delete(public_path() . '/' . $slider->image);
            $image  = $request->sub_image;
            $ext    = pathinfo($image->getClientOriginalName(), PATHINFO_EXTENSION);
            $image  = \Image::make($image)->resize(460, 381);
            //resize
            if ($image->height() > $image->width()) {
                if ($image->height() >= 381) {
                    $image->resize(null, 381, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                }
            } else {
                if ($image->height() >= 381) {
                    $image->resize(null, 381, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                }
                elseif ($image->width() >= 460) {
                    $image->resize(460, null, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                }
            }
            \File::makeDirectory('assets/media/images/sliders/' .  date('dm'), 0775, true, true);
            if(\File::exists(asset('assets/media/images/sliders/' . $slider->sub_image))) \File::delete(public_path(). '/assets/media/images/sliders/' . $slider->sub_image);
            $timestamp = time();
            $image->save('assets/media/images/sliders/' .  date('dm') . '/' . "sub_" . str_slug($data['name']). "_" . $timestamp . '.' .  $ext);
            $data['sub_image'] = 'assets/media/images/sliders/' .  date('dm') . '/' .  "sub_" . str_slug($data['name']). "_" . $timestamp . '.' .  $ext;
        }

        if ($request->hasFile('image')) {
            if (\File::exists(public_path() . '/' . $slider->image)) \File::delete(public_path() . '/' . $slider->image);
            $image  = $request->image;
            $ext    = pathinfo($image->getClientOriginalName(), PATHINFO_EXTENSION);
            $image  = \Image::make($request->image)->resize(1399, 787);
            //resize
            if ($image->height() > $image->width()) {
                if ($image->height() >= 787) {
                    $image->resize(null, 787, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                }
            } else {
                if ($image->height() >= 787) {
                    $image->resize(null, 787, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                }
                elseif ($image->width() >= 1399) {
                    $image->resize(1399, null, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                }
            }
            \File::makeDirectory('assets/media/images/sliders/' .  date('dm'), 0775, true, true);
            if(\File::exists(asset('assets/media/images/sliders/' . $slider->image))) \File::delete(public_path(). '/assets/media/images/sliders/' . $slider->image);
            $timestamp = time();
            $image->save('assets/media/images/sliders/' .  date('dm') . '/' . str_slug($data['name']). "_" . $timestamp . '.' .  $ext);
            $data['image'] = 'assets/media/images/sliders/' .  date('dm') . '/' . str_slug($data['name']). "_" . $timestamp . '.' .  $ext;
        }

        $slider->update($data);

        Slider::clearCache();

        Session::flash('message', trans('system.success'));
        Session::flash('alert-class', 'info');

        return redirect()->route('admin.sliders.index');
	}

	public function delete($id)
	{
        $slider = Slider::find($id);
        if ( is_null( $slider ) ) {
            Session::flash('message', trans('system.have_an_error'));
            Session::flash('alert-class', 'danger');
            return back();
        }
        Slider::where('position', '>', $slider->position)->decrement('position');
        if (\File::exists(public_path() . '/' . $slider->sub_image)) \File::delete(public_path() . '/' . $slider->sub_image);
        if (\File::exists(public_path() . '/' . $slider->image)) \File::delete(public_path() . '/' . $slider->image);
        $slider->delete();
        Slider::clearCache();

		Session::flash('message', trans('system.success'));
        Session::flash('alert-class', 'success');

		return redirect()->route('admin.sliders.index');
	}

    public function updatePosition($id, $value)
    {
        if (!in_array($value, [-1, 1])) return back();

        $slider = Slider::find(intval($id));

        if(is_null($slider)) return back();

        // tang len 1 vi tri
        if($value == 1) {
            if ($slider->position == Slider::count())
                return back();

            Slider::where('position', $slider->position + 1)->decrement('position');
            $slider->position++;
            $slider->save();
        } elseif($value == -1) {
            if ($slider->position == 1)
                return back();

            Slider::where('position', $slider->position - 1)->increment('position');
            $slider->position--;
            $slider->save();
        }

        Session::flash('message', trans('system.success'));
        Session::flash('alert-class', 'success');

        return back();
    }
}