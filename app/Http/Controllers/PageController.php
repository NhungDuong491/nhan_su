<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\NhanVien;
use App\Models\NgayCong;
use App\Models\User;
use App\Models\ChucVu;
use App\Models\Luong;
use App\Models\PhongBan;
class PageController extends Controller
{
    //
    public function index() {
        $isChamCong = false;
        $dateNow = date('Y-m-d', strtotime(\Carbon\Carbon::now()));
        $chamCong = NgayCong::where('nhan_vien_id', Auth::user()->nhan_vien->id)->where('ngay_cham_cong', $dateNow)->first();
        if ($chamCong) {
            $isChamCong = true;
        }

        $phongBan = Auth::user()->phong_ban_id;

        $nhanVien = User::count();
        $pb = PhongBan::count();
        $cv = ChucVu::count();
        $luong = Luong::count();
        $user = User::count();
       
        return view('index', compact('nhanVien', 'pb', 'cv', 'luong', 'user','isChamCong'));
    }

    public function getProfile () {
        return view('pages.profile');
    }

    public function changePass(Request $request) {
        if ($request->ajax()) {

            $validator = \Validator::make($request->all(), [
                'oldPassword' => 'required',
                'password' => 'required|confirmed|min:8',
                'password_confirmation' => 'required',
            ], [
                'oldPassword.required' => 'Hãy nhập mật khẩu cũ!',
                'password.required' => 'Hãy nhập mật khẩu mới!',
                'password.confirmed' => 'Xác nhận mật khẩu mới sai!',
                'password.min' => 'Độ dài mật khẩu lớn hơn 8!',
                'password_confirmation.required' => 'Hãy xác nhận mật khẩu mới!',
            ]);

            if ($validator->fails()) {
                return response()->json(['success' => false, 'errors' => $validator->errors()], 400);
            } else {
                $respone = ['success' => false];

                $user = User::find(Auth::user()->id);
                if($user->password != md5($request->oldPassword)) {
                    $respone['isOld'] = 'Mật khẩu cũ sai!';
                    return response()->json($respone, 200);
                } else if ($user->password == md5($request->password)){
                    $respone['isNew'] = 'Mật khẩu mới trùng mật khẩu cũ!';
                    return response()->json($respone, 200);
                } else {
                    $user->password = md5($request->password);
                    $user->update();
                    $respone['success'] = true;
                    return response()->json($respone, 200);
                }
            }   
        }
    }

    
}
