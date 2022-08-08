<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\NhanVien;

class LoginController extends Controller
{
    //
    public function index() {
        return view('layouts.login');
    }

    public function postLogin(Request $request) {
        if ($request->ajax()) {
            $validator = \Validator::make($request->all(), [
                'email' => 'required',
                'password' => 'required',
            ], [
                'email.required' => 'Hãy nhập email!',
                'password.required' => 'Hãy nhập password!',
            ]);

            if ($validator->fails()) {
                return response()->json(['success' => false, 'errors' => $validator->errors()], 400);
            } else {
                $respone = ['success' => false,'role'=>true ,'data' => ''];
                
                $user = User::where('email', $request->email)->first();
                if (!$user) {
                    return response()->json($respone, 200);
                } else if (md5($request->password) != $user->password){
                    return response()->json($respone, 200);
                } else {
                    //Auth::loginUsingId($user->id);
                    Auth::login($user);
                    $respone['data'] = $user;
                    $respone['success'] = true;
                    return response()->json($respone, 200);
                }
            }   
        }
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('login.index');
    }


}
