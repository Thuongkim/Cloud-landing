<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

use App\Models\Step as Step;

class StepController extends Controller
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
    //     $this->fields = TranslationSetting::get(with(new Step)->getTable());

    //     \View::share('languages', $this->languages);
    //     \View::share('fields', $this->fields);
    // }

    public function index()
    {
        $steps = Step::orderBy('position')->paginate(20);
        return view('backend.steps.index', compact('steps'));
    }


    public function create()
    {
        return view('backend.steps.create');
    }

    public function store(Request $request)
    {
        $request->merge(['status' => intval($request->status)]);
        $validator = Validator::make($data = $request->all(), Step::rules());
        $validator->setAttributeNames(trans('steps'));
        if ($validator->fails())
            return redirect()->back()->withErrors($validator)->withInput();

        $data['position']   = 1;
        $sevice = Step::create($data);
        Step::where('id', "<>", $sevice->id)->increment('position');

        Session::flash('message', trans('system.success'));
        Session::flash('alert-class', 'success');

        return redirect()->route('admin.steps.index');
    }

    public function edit(Request $request, $id)
    {
        $steps = Step::find($id);
        if ( is_null( $steps ) ) {
            Session::flash('message', trans('system.have_an_error'));
            Session::flash('alert-class', 'danger');
            return back();
        }

        if ($steps->status && !$request->user()->ability(['system', 'admin'], ['steps.approve'])) {
            Session::flash('message', "Bài viết đã xuất bản, không thể sửa.");
            Session::flash('alert-class', 'danger');
            return back();
        }

        return view('backend.steps.edit', compact( 'steps'));
    }

    public function update(Request $request, $id)
    {
        $id = intval( $id );
        $request->merge(['status' => intval($request->status)]);

        $steps = Step::find($id);
        if (is_null($steps)) {
            Session::flash('message', trans('system.have_an_error'));
            Session::flash('alert-class', 'danger');
            return back();
        }

        if ($steps->status && !$request->user()->ability(['system', 'admin'], ['steps.approve'])) {
            Session::flash('message', "Bài viết đã xuất bản, không thể sửa.");
            Session::flash('alert-class', 'danger');
            return back();
        }

        $validator = Validator::make($data = $request->all(), Step::rules($id));

        $validator->setAttributeNames(trans('steps'));

        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $steps->update($data);

        Step::clearCache();

        Session::flash('message', trans('system.success'));
        Session::flash('alert-class', 'info');

        return redirect()->route('admin.steps.index');
    }

    public function delete(Request $request, $id)
    {
        $steps = Step::find($id);
        if (is_null($steps)) {
            Session::flash('message', trans('system.have_an_error'));
            Session::flash('alert-class', 'danger');
            return back();
        }

        if ($steps->status && !$request->user()->ability(['system', 'admin'], ['steps.approve'])) {
            Session::flash('message', "Bài viết đã xuất bản, không thể xoá.");
            Session::flash('alert-class', 'danger');
            return back();
        }
        Step::where('position', '>', $steps->position)->decrement('position');

        $steps->delete();
        Step::clearCache();

        Session::flash('message', trans('system.success'));
        Session::flash('alert-class', 'success');

        return redirect()->route('admin.steps.index');
    }

    public function updatePosition($id, $value)
    {
        if (!in_array($value, [-1, 1])) return back();

        $step = Step::find(intval($id));

        if(is_null($step)) return back();

        // tang len 1 vi tri
        if($value == 1) {
            if ($step->position == Step::count())
                return back();

            Step::where('position', $step->position + 1)->decrement('position');
            $step->position++;
            $step->save();
        } elseif($value == -1) {
            if ($step->position == 1)
                return back();

            Step::where('position', $step->position - 1)->increment('position');
            $step->position--;
            $step->save();
        }

        Session::flash('message', trans('system.success'));
        Session::flash('alert-class', 'success');

        return back();
    }

    public function updateBulk(Request $request)
    {
        if ($request->ajax()) {
            $return = [ 'error' => true, 'message' => trans('system.have_an_error') ];

            if (!$request->user()->ability(['system', 'admin'], ['steps.approve'])) {
                return response()->json($return, 401);
            }

            $ids = json_decode($request->input('ids'));
            if(empty($ids)) return response()->json(['error' => true, 'message' => trans('system.no_item_selected')]);

            switch ($request->input('action')) {
                case 'delete':
                    foreach ($ids as $id) {
                        foreach ($ids as $id) {
                            Step::where('id', intval($id))->delete();
                        }
                    }
                    Step::clearCache();
                    break;
                case 'active':
                    $return = ['error' => true, 'message' => trans('system.update') . ' ' . trans('system.success')];
                    foreach ($ids as $id) {
                        Step::where('id', intval($id))->update(['status' => 1]);
                    }
                    Step::clearCache();
                    break;
                case 'deactive':
                    $return = ['error' => true, 'message' => trans('system.update') . ' ' . trans('system.success')];
                    foreach ($ids as $id) {
                        Step::where('id', intval($id))->update(['status' => 0]);
                    }
                    Step::clearCache();
                    break;
                // case 'category':
                //     $return             = ['error' => true, 'message' => trans('system.update') . ' ' . trans('system.success')];
                //     $category_id        = intval($request->input('category_id', 0));
                //     $category           = StepCategory::find($category_id);
                //     if (is_null($category) || !$category->status) {
                //         $return['message'] = 'Danh mục bạn chọn không cho phép thao tác này.';
                //         return response()->json($return);
                //     }

                //     foreach ($ids as $id) {
                //         Step::where('id', intval($id))->update(['category_id' => $category_id]);
                //     }
                //     Step::clearCache();
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
