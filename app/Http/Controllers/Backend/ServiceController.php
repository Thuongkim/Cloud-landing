<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

use App\Models\Service as Service;

class ServiceController extends Controller
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
    //     $this->fields = TranslationSetting::get(with(new Service)->getTable());

    //     \View::share('languages', $this->languages);
    //     \View::share('fields', $this->fields);
    // }

    public function index()
    {
        $services = Service::orderBy('position')->paginate(20);
        return view('backend.services.index', compact('services'));
    }


    public function create()
    {
        return view('backend.services.create');
    }

    public function store(Request $request)
    {
        $request->merge(['status' => intval($request->status)]);
        $validator = Validator::make($data = $request->all(), Service::rules());
        $validator->setAttributeNames(trans('services'));
        if ($validator->fails())
            return redirect()->back()->withErrors($validator)->withInput();

        $data['position']   = 1;
        $sevice = Service::create($data);
        Service::where('id', "<>", $sevice->id)->increment('position');

        Session::flash('message', trans('system.success'));
        Session::flash('alert-class', 'success');

        return redirect()->route('admin.services.index');
    }

    public function edit(Request $request, $id)
    {
        $services = Service::find($id);
        if ( is_null( $services ) ) {
            Session::flash('message', trans('system.have_an_error'));
            Session::flash('alert-class', 'danger');
            return back();
        }

        if ($services->status && !$request->user()->ability(['system', 'admin'], ['services.approve'])) {
            Session::flash('message', "Bài viết đã xuất bản, không thể sửa.");
            Session::flash('alert-class', 'danger');
            return back();
        }

        return view('backend.services.edit', compact( 'services'));
    }

    public function update(Request $request, $id)
    {
        $id = intval( $id );
        $request->merge(['status' => intval($request->status)]);

        $services = Service::find($id);
        if (is_null($services)) {
            Session::flash('message', trans('system.have_an_error'));
            Session::flash('alert-class', 'danger');
            return back();
        }

        if ($services->status && !$request->user()->ability(['system', 'admin'], ['services.approve'])) {
            Session::flash('message', "Bài viết đã xuất bản, không thể sửa.");
            Session::flash('alert-class', 'danger');
            return back();
        }

        $validator = Validator::make($data = $request->all(), Service::rules($id));

        $validator->setAttributeNames(trans('services'));

        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $services->update($data);

        Service::clearCache();

        Session::flash('message', trans('system.success'));
        Session::flash('alert-class', 'info');

        return redirect()->route('admin.services.index');
    }

    public function delete(Request $request, $id)
    {
        $services = Service::find($id);
        if (is_null($services)) {
            Session::flash('message', trans('system.have_an_error'));
            Session::flash('alert-class', 'danger');
            return back();
        }

        if ($services->status && !$request->user()->ability(['system', 'admin'], ['services.approve'])) {
            Session::flash('message', "Bài viết đã xuất bản, không thể xoá.");
            Session::flash('alert-class', 'danger');
            return back();
        }
        Service::where('position', '>', $services->position)->decrement('position');

        $services->delete();
        Service::clearCache();

        Session::flash('message', trans('system.success'));
        Session::flash('alert-class', 'success');

        return redirect()->route('admin.services.index');
    }

    public function updatePosition($id, $value)
    {
        if (!in_array($value, [-1, 1])) return back();

        $service = Service::find(intval($id));

        if(is_null($service)) return back();

        // tang len 1 vi tri
        if($value == 1) {
            if ($service->position == Service::count())
                return back();

            Service::where('position', $service->position + 1)->decrement('position');
            $service->position++;
            $service->save();
        } elseif($value == -1) {
            if ($service->position == 1)
                return back();

            Service::where('position', $service->position - 1)->increment('position');
            $service->position--;
            $service->save();
        }

        Session::flash('message', trans('system.success'));
        Session::flash('alert-class', 'success');

        return back();
    }

    public function updateBulk(Request $request)
    {
        if ($request->ajax()) {
            $return = [ 'error' => true, 'message' => trans('system.have_an_error') ];

            if (!$request->user()->ability(['system', 'admin'], ['services.approve'])) {
                return response()->json($return, 401);
            }

            $ids = json_decode($request->input('ids'));
            if(empty($ids)) return response()->json(['error' => true, 'message' => trans('system.no_item_selected')]);

            switch ($request->input('action')) {
                case 'delete':
                    foreach ($ids as $id) {
                        foreach ($ids as $id) {
                            Service::where('id', intval($id))->delete();
                        }
                    }
                    Service::clearCache();
                    break;
                case 'active':
                    $return = ['error' => true, 'message' => trans('system.update') . ' ' . trans('system.success')];
                    foreach ($ids as $id) {
                        Service::where('id', intval($id))->update(['status' => 1]);
                    }
                    Service::clearCache();
                    break;
                case 'deactive':
                    $return = ['error' => true, 'message' => trans('system.update') . ' ' . trans('system.success')];
                    foreach ($ids as $id) {
                        Service::where('id', intval($id))->update(['status' => 0]);
                    }
                    Service::clearCache();
                    break;
                // case 'category':
                //     $return             = ['error' => true, 'message' => trans('system.update') . ' ' . trans('system.success')];
                //     $category_id        = intval($request->input('category_id', 0));
                //     $category           = ServiceCategory::find($category_id);
                //     if (is_null($category) || !$category->status) {
                //         $return['message'] = 'Danh mục bạn chọn không cho phép thao tác này.';
                //         return response()->json($return);
                //     }

                //     foreach ($ids as $id) {
                //         Service::where('id', intval($id))->update(['category_id' => $category_id]);
                //     }
                //     Service::clearCache();
                //     break;
                default:
                    $return['message']  = trans('system.no_action_selected');
                    return response()->json($return);
            }

            $return['error']    = false;
            $return['message']  = trans('system.success');
            Session::flash('message', $return['message']);
            Session::flash('alert-class', 'success');
            return response()->json($return);
        }
    }
    
}
