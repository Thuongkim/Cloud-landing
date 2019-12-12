<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class HomeController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    public function index(Request $request)
    {
        return view('backend.pages.home');
    }

    public function validation(Request $request)
    {
        return view('backend.pages.email_validation');
    }

    public function validate(Request $request)
    {
        $response = ['message' => trans('system.have_an_error')];
        $statusCode = 200;
        if($request->ajax()) {
            try {
                $request->merge(['only_gmail' => $request->input('only_gmail', 0), 'only_format' => $request->input('only_format', 0)]);
                $email_lists = trim($request->email_lists);
                if (!$email_lists){
                    $statusCode = 400;
                    throw new \Exception("Danh sách email không được bỏ trống.", 1);
                }
                $results = [];
                $failure_formats = "Sai format: ";
                $counter = $total = 0;
                $emails = EmailValidation::pluck('status', 'email')->toArray();
                foreach (explode("\n", $email_lists) as $email) {
                    $total++;
                    $email     = strtolower(trim($email));
                    $sender    = 'canhbd.hte@gmail.com';
                    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        if ('true' == $request->only_gmail) {
                            $domain = explode("@", $email);
                            if (isset($domain[1]) && $domain[1] == 'gmail.com') {
                                if ('true' == $request->only_format) {
                                    $counter++;
                                    array_push($results, $email);
                                } else {
                                    if (isset($emails[$email])) {
                                        array_push($results, $email);
                                        $counter++;
                                    } else {
                                        $validator = new SmtpEmailValidator($email, $sender);
                                        $result = $validator->validate();
                                        if (isset($result[$email])) {
                                            if ($result[$email]) {
                                                array_push($results, $email);
                                                $counter++;
                                            }
                                            EmailValidation::create([
                                                'email'         => $email,
                                                'domain'        => $domain[1],
                                                'source'        => 'admin',
                                                'status'        => $result[$email],
                                                'created_by'    => $request->user()->id,
                                            ]);
                                        }
                                    }
                                }
                            }
                        } else {
                            if ('true' == $request->only_format) {
                                array_push($results, $email);$counter++;
                            } else {
                                if (isset($emails[$email])) {
                                    array_push($results, $email);
                                    $counter++;
                                } else {
                                    $validator = new SmtpEmailValidator($email, $sender);
                                    $result = $validator->validate();
                                    if (isset($result[$email])) {
                                        if ($result[$email]) {
                                            array_push($results, $email);
                                            $counter++;
                                        }
                                        $domain = explode("@", $email);
                                        EmailValidation::create([
                                            'email'         => $email,
                                            'domain'        => $domain[1],
                                            'source'        => 'admin',
                                            'created_by'    => $request->user()->id,
                                        ]);
                                    }
                                }
                            }
                        }
                    } else {
                        $failure_formats .= ($email ? ($email . ",") : "");
                    }
                }
                // array_push($results, $failure_formats);
                $response['results'] = $results;
                $response['message'] = "Kết quả {$counter} emails/{$total} dòng. " . $failure_formats;
            } catch (\Exception $e) {
                if ($statusCode == 200) $statusCode = 500;
                $response['message'] = $e->getMessage();
            } finally {
                return response()->json($response, $statusCode);
            }
        } else {
            $statusCode = 405;
            return response()->json($response, $statusCode);
        }
    }

    public function webhooksMailgun(Request $request)
    {
        $data = $request->all();
        \DB::table('mailguns')->insert(['content' => json_encode($data), 'time' => \Carbon\Carbon::now(), 'status' => 0]);
        return 1;
    }

    public function webhooksSendgrid(Request $request)
    {
        $data = $request->all();
        \DB::table('sendgrids')->insert(['content' => json_encode($data), 'time' => \Carbon\Carbon::now(), 'status' => 0]);
        return 1;
    }

    public function webhooksSes(Request $request)
    {
        $data = $request->all();
        \DB::table('ses')->insert(['content' => ($request->getContent()), 'time' => \Carbon\Carbon::now(), 'status' => 0]);
        return 1;
    }

    public function getLogin()
    {
        if(\Auth::guard('admin')->check()) return redirect()->route('admin.home');
        return view('backend.pages.login');
    }

    public function postLogin(Request $request)
    {
        $request->merge(['remember' => $request->input('remember', 0)]);
        $rules = [
            'email'     => 'required|email|min:10|max:50',
            'password'  => 'required|min:6|max:25',
            //'g-recaptcha-response' => 'required|captcha',
        ];

        $this->validate($data = $request, $rules);
        $errors = new \Illuminate\Support\MessageBag;
        try {
            if (\Auth::guard('admin')->attempt(['email' => $request->input('email'), 'password' => $request->input('password')], $data['remember'])) {
                if (Session::get('loginRedirect_admin', '') == '') {
                    return redirect()->route('admin.home');
                }
                return redirect()->intended(Session::get('loginRedirect_admin', route('admin.home')));
            }
            $errors->add('invalid', "Invalid email/password.");
        } catch (\Exception $e) {
            $errors->add('error', $e->getMessage());
        }
        return back()->withErrors($errors)->withInput();
    }

    public function getLogout()
    {
        if(\Auth::guard('admin')->check())
            \Auth::guard('admin')->logout();
        return redirect()->route('admin.home');
    }

    public function get403()
    {
        return view('backend.pages.403');
    }

    public function get404()
    {
        return view('backend.pages.404');
    }

    public function changePassword()
    {
        return view('backend.pages.change_password');
    }

    public function account()
    {
        $user = \Auth::guard('admin')->user();
        return view('backend.pages.account', compact('user'));
    }

    public function postChangePassword(Request $request)
    {
        $validator = \Validator::make($request->all(), array(
            'current_password'  => 'required|min:6|max:25',
            'new_password'      => 'required|min:6|max:25',
            're_password'       => 'same:new_password'
            ));

        $validator->setAttributeNames(trans('users'));
        if($validator->fails()) return back()->withErrors($validator)->withInput();

        $user = \Auth::guard('admin')->user();
        if ( !\Hash::check($request->input('current_password'), $user->password)) {
            $errors = new \Illuminate\Support\MessageBag;
            $errors->add('editError', 'Mật khẩu hiện tại không đúng');
            return back()->withErrors($errors);
        }

        $user->attemptResetPassword('', $request->input('new_password'));
        $user->save();
        \Sentry::logout();
        return redirect()->route('admin.home');
    }

    public function postAccount(Request $request)
    {
        $request->merge(['menu_is_collapse' => $request->input('menu_is_collapse', 0)]);
        $validator = \Validator::make($request->all(), array(
            'fullname'          => 'required|min:6|max:30',
            'menu_is_collapse'  => 'required|in:0,1',
            ));

        $validator->setAttributeNames(trans('users'));
        if($validator->fails()) return back()->withErrors($validator)->withInput();

        $user = \Auth::guard('admin')->user();
        $user->fullname         = $request->input('fullname');
        $user->menu_is_collapse = $request->input('menu_is_collapse');
        $user->save();

        \Session::flash('message', trans('system.success'));
        \Session::flash('alert-class', 'success');

        return redirect()->route('admin.home');
    }

    public function contacts(Request $request)
    {
        $contacts = \App\Contact::orderBy('updated_at', 'DESC')->paginate(\App\Define\Constant::PAGE_NUM_20);

        return view('backend.contacts.index', compact('contacts'));
    }

    public function contact(Request $request, $id)
    {
        $id = intval($id);
        $contact = \App\Contact::find($id);
        if (is_null($contact))
            return redirect()->route('admin.contacts.index');

        return view('backend.contacts.show', compact('contact'));
    }

    public function flushCache()
    {
        echo 123; exit;
        \Redis::flushall();
        dd('done');
    }

    public function storeMedia(Request $request)
    {
        //return response()->json(['data' => ["type" => "image", "src" => asset("assets/backend/img/logo.png"), "height" => "350", "weight" => "250"]], 200);

        $response = ['type' => 'error', 'message' => trans('system.have_an_error'), 'data' => []];
        $statusCode = 200;
        if($request->ajax()) {
            try {
                $imageRules = [
                    'images'     => 'required',
                    'images.*'   => 'required|mimes:jpg,jpeg,png,gif'
                ];//array|
                $validator = \Validator::make($request->only('images'), $imageRules);
                $validator->setAttributeNames(trans('system'));
                if ($validator->fails()) throw new \Exception($validator->messages()->first());

                $rootPath = str_pad($request->user()->id, 5, '0', STR_PAD_LEFT) . '/' . date('dmy');
                $directory = Storage::directories($rootPath);
                if (empty($directory)) {
                    Storage::makeDirectory("public/" . $rootPath, 8, 1);
                    $directory = Storage::directories($rootPath);
                }
                // only image
                $images = [];
                $counter = 0;
                foreach ($request->images as $img) {
                    $filename = $img->getClientOriginalName();
                    $ext = pathinfo($filename, PATHINFO_EXTENSION);
                    $filename = date("His") . '_' . str_slug(substr($filename, 0, strlen($filename)-strlen($ext)-1), '_') . '.' . str_slug($ext);
                    $img->storeAs('public/' . $rootPath, $filename);
                    $width = $height = 0;
                    list($width, $height) = getimagesize($img);
                    if ($width && $height) {
                        array_push($images, ["type" => "image", "height" => $height, "width" => $width, 'src' => asset( 'storage/' . $rootPath . '/' . $filename)]);
                        $counter++;
                    }
                }
                if ($counter == count($request->images)) {
                    $response['type'] = 'success';
                    $response['message'] = trans('system.upload_image_success') . ' ' . $counter . ' ' . trans('system.image_lower');
                } else {
                    $response['type'] = 'warning';
                    $response['message'] = trans('system.upload_image_success') . ' ' . $counter . '/' . count($request->images) . ' ' . trans('system.image_lower');;
                }
                $response['data'] = $images;
            } catch (\Exception $e) {
                if ($statusCode == 200) $statusCode = 500;
                $response['message'] = $e->getMessage();
            } finally {
                return response()->json($response, $statusCode);
            }
        } else {
            $statusCode = 405;
            return response()->json($response, $statusCode);
        }
    }

    public function genGALink(Request $request)
    {
        $response = [ 'message' => trans('system.have_an_error') ];
        $statusCode = 200;
        if($request->ajax()) {
            try {
                $rules = [
                    "utm_campaign"  => 'required|max:100|regex:/^[a-zA-Z0-9_]+([_.][a-zA-Z0-9_]+)*$/',
                    'url'           => 'required|url|max:150',
                    'utm_medium'    => 'max:100|regex:/^[a-zA-Z0-9_]+([_.][a-zA-Z0-9_]+)*$/',
                    'utm_content'   => 'max:100|regex:/^[a-zA-Z0-9_]+([_.][a-zA-Z0-9_]+)*$/',
                    'utm_source'    => 'max:100|regex:/^[a-zA-Z0-9_]+([_.][a-zA-Z0-9_]+)*$/',
                ];
                $validator = \Validator::make($data = $request->all(), $rules);
                $validator->setAttributeNames(trans('campaigns'));
                if ($validator->fails()) {
                    $statusCode = 400;
                    throw new \Exception($validator->messages()->first(), 1);
                }
                $other = '';
                $other .= $data['utm_medium'] ? ('&utm_medium=' . $data['utm_medium']) : '';
                $other .= $data['utm_content'] ? ('&utm_content=' . $data['utm_content']) : '';
                $other .= $data['utm_source'] ? ('&utm_source=' . $data['utm_source']) : '';

                if (strpos($data['url'], '?') !== false) {
                    $data['url'] .= ("&utm_campaign={$data['utm_campaign']}" . ($other ? $other : ''));
                } else {
                    $data['url'] .= ("?utm_campaign={$data['utm_campaign']}" . ($other ? $other : ''));
                }
                $response['message'] = $data['url'];
            } catch (\Exception $e) {
                if ($statusCode == 200) $statusCode = 500;
                $response['message'] = $e->getMessage();
            } finally {
                return response()->json($response, $statusCode);
            }
        } else {
            $statusCode = 405;
            return response()->json($response, $statusCode);
        }
    }

    public function getDistrictByProvince(Request $request)
    {
        $response = [ 'message' => trans('system.have_an_error') ];
        $statusCode = 200;
        if($request->ajax()) {
            try {
                $districts = \App\Library\Giaohangtietkiem::getActiveDistrictByProvince($request->province);
                //$districts = \App\Library\Giaohangnhanh::getDistrictByProvince($request->province);
                if (!$districts['success']) {
                    $statusCode = 404;
                    throw new \Exception($districts['message'], 1);
                }
                $response['message'] = $districts['message'];
            } catch (\Exception $e) {
                if ($statusCode == 200) $statusCode = 500;
                $response['message'] = $e->getMessage();
            } finally {
                return response()->json($response, $statusCode);
            }
        } else {
            $statusCode = 405;
            return response()->json($response, $statusCode);
        }
    }
}