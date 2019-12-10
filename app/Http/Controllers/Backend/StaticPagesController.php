<?php namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

use App\StaticPage as StaticPage;

use App\Http\Controllers\Controller;

class StaticPagesController extends Controller
{
	public function index(Request $request)
	{
        $news = StaticPage::all();

		return view('backend.static-pages.index', compact('news'));
	}

	public function show($id)
	{
        $news = StaticPage::find($id);
        if ( is_null( $news ) ) {
            Session::flash('message', trans('system.have_an_error'));
            Session::flash('alert-class', 'danger');
            return back();
        }

        return view('backend.static-pages.show', compact('news'));
	}

	public function edit($id)
	{
        $news = StaticPage::find($id);
        if ( is_null( $news ) ) {
            Session::flash('message', trans('system.have_an_error'));
            Session::flash('alert-class', 'danger');
            return back();
        }

		return view('backend.static-pages.edit', compact('news'));
	}

	public function update(Request $request, $id)
	{
        $id = intval( $id );
        $request->merge(['status' => intval($request->status)]);

        $staticPage = StaticPage::find($id);
        if ( is_null( $staticPage ) ) {
            Session::flash('message', trans('system.have_an_error'));
            Session::flash('alert-class', 'danger');
            return back();
        }

        $validator = Validator::make($data = $request->only('title', 'description', 'status'), StaticPage::rules($id));

        $validator->setAttributeNames(trans('static_pages'));

        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        
        $staticPage->update($data);

        StaticPage::clearCache();

        Session::flash('message', trans('system.success'));
        Session::flash('alert-class', 'info');

        return redirect()->route('admin.static-pages.index');
	}
}