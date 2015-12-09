<?php

namespace App\Http\Controllers;

use App\Models\User,
    App\Models\Student,
    App\Http\Controllers\Controller,
    App\Http\Helpers\Base,
    Illuminate\Http\Request,
    Illuminate\Support\Facades\Session,
    Mail;

/**
 * Description of AuthenticationController
 *
 * @author yusuf
 */
class AuthenticationController extends Controller {

    public function __construct()
    {
//        $this->middleware('auth');
    }

    public function login() {
        return view('auth.login');
    }

    public function loginAction(Request $request) {
        $key = $request->input('number');
        $password = Base::hashInput($request->input('password'));

        $user = User::where('email', $key)->get();

        if (sizeOf($user) > 0) {
            $user = $user[0];

            if ($user->password == $password) {

                $user_data = array(
                    'id' => $user->id,
                    'name' => $user->name,
                    'role' => $user->roles
                );

                Session::put(SESSION_LOGIN, $user_data);
                return redirect('/dashboard');
            } else {
                Session::flash('error', 'NIP / NIK / Password Anda salah!!');
                
                return redirect('/');
            }
        } else {
            Session::flash('error', 'User belum terdaftar!!');
            
            return redirect('/');
        }
    }

    public function logout() {
        Session::forget(SESSION_LOGIN);
        
        return redirect('/');
    }

    public function test() {
        var_dump(Session::get(SESSION_LOGIN));
    }

}
