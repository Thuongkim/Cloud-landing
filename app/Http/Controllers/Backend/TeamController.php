<?php

namespace App\Http\Controllers\Backend;

use App\Models\Team;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams = Team::orderBy('position')->get();
        return view('backend.teams.index', compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.teams.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->merge(['status' => intval($request->status)]);
        $validator = Validator::make($data = $request->all(), Team::rules());
        $validator->setAttributeNames(trans('teams'));

        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if ($request->hasFile('image')) {
            $image  = $request->image;
            $ext    = pathinfo($image->getClientOriginalName(), PATHINFO_EXTENSION);
            $image  = \Image::make($request->image)->resize(350, 350);
            //resize
            if ($image->height() > $image->width()) {
                if ($image->height() >= 350) {
                    $image->resize(null, 350, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                }
            } else {
                if ($image->height() >= 350) {
                    $image->resize(null, 350, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                }
                elseif ($image->width() >= 350) {
                    $image->resize(350, null, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                }
            }

            \File::makeDirectory('assets/media/images/teams/' .  date('dm'), 0775, true, true);
            $image->save('assets/media/images/teams/' .  date('dm') . '/' . str_slug($data['name']) . '.' .  $ext);
            $data['image'] = date('dm') . '/' . str_slug($data['name']). '.' .  $ext;
        }

        $data['position']   = 1;
        $team = team::create($data);
        Team::where('id', "<>", $team->id)->increment('position');

        Session::flash('message', trans('system.success'));
        Session::flash('alert-class', 'info');

        return redirect()->route('admin.teams.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $team = Team::find($id);
        if ( is_null( $team ) ) {
            Session::flash('message', trans('system.have_an_error'));
            Session::flash('alert-class', 'danger');
            return back();
        }

        return view('backend.teams.edit', compact( 'team' ) );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $id = intval( $id );
        $request->merge(['status' => intval($request->status)]);

        $team = Team::find($id);
        if (is_null($team)) {
            Session::flash('message', trans('system.have_an_error'));
            Session::flash('alert-class', 'danger');
            return back();
        }

        $validator = Validator::make($data = $request->all(), Team::rules($id));

        $validator->setAttributeNames(trans('teams'));

        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if ($request->hasFile('image')) {
            $image  = $request->image;
            $ext    = pathinfo($image->getClientOriginalName(), PATHINFO_EXTENSION);
            $image  = \Image::make($request->image)->resize(350, 350);
            //resize
            if ($image->height() > $image->width()) {
                if ($image->height() >= 350) {
                    $image->resize(null, 350, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                }
            } else {
                if ($image->height() >= 350) {
                    $image->resize(null, 350, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                }
                elseif ($image->width() >= 350) {
                    $image->resize(350, null, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                }
            }

            \File::makeDirectory('assets/media/images/teams/' .  date('dm'), 0775, true, true);
            if(\File::exists(asset('assets/media/images/teams/' . $Team->image))) 
                \File::delete(public_path(). '/assets/media/images/teams/' . $Team->image);
            $timestamp = time();
            $image->save('assets/media/images/teams/' .  date('dm') . '/' . str_slug($data['name']). "_" . $timestamp . '.' .  $ext);
            $data['image'] = date('dm') . '/' . str_slug($data['name']). "_" . $timestamp . '.' .  $ext;
        }

        $team->update($data);

        // Team::clearCache();

        Session::flash('message', trans('system.success'));
        Session::flash('alert-class', 'info');

        return redirect()->route('admin.teams.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request, $id)
    {
        $team = Team::find($id);
        if (is_null($team)) {
            Session::flash('message', trans('system.have_an_error'));
            Session::flash('alert-class', 'danger');
            return back();
        }

        if(\File::exists(asset('assets/media/images/teams/' . $team->image)))
            \File::delete(public_path(). '/assets/media/images/teams/' . $team->image);

        Team::where('position', '>', $team->position)->decrement('position');
        $team->delete();
        // Team::clearCache();

        Session::flash('message', trans('system.success'));
        Session::flash('alert-class', 'success');

        return redirect()->route('admin.teams.index');
    }

    public function updatePosition($id, $value)
    {
        if (!in_array($value, [-1, 1])) return back();

        $team = Team::find(intval($id));

        if(is_null($team)) return back();

        // tang len 1 vi tri
        if($value == 1) {
            if ($team->position == Team::count())
                return back();

            Team::where('position', $team->position + 1)->decrement('position');
            $team->position++;
            $team->save();
        } elseif($value == -1) {
            if ($team->position == 1)
                return back();

            Team::where('position', $team->position - 1)->increment('position');
            $team->position--;
            $team->save();
        }

        Session::flash('message', trans('system.success'));
        Session::flash('alert-class', 'success');

        return back();
    }
}
