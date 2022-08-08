<?php

namespace App\Http\Controllers;

use App\Models\ChucVu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\NhanVien;
use App\Models\PhongBan;
use App\Models\User;

class UserController extends Controller
{
    //
    public function index() {
        $user = NhanVien::all();
        return view('pages.User.index', compact('user'));
    }

    public function getAdd() {
        $pb = PhongBan::all();
        $cv = ChucVu::all();
        return view('pages.User.add', compact('pb', 'cv'));
    }

    public function getEdit($id) {
        $user = NhanVien::find($id);
        $pb = PhongBan::all();
        $cv = ChucVu::all();
        return view('pages.User.edit', compact('user','pb', 'cv'));
    }

    public function postAdd(Request $request) {
        if ($request->ajax()) {
            $validator = \Validator::make($request->all(), [
                'email' => 'required|email|unique:users,email',
                'ten' => 'required',
                'gioi_tinh' => 'required',
                'ngay_sinh' => 'required',
                'sdt' => 'required',
                'cccd' => 'required',
                'dia_chi' => 'required',
                'phong_ban_id' => 'required',
                'chuc_vu_id' => 'required',
            ], [
                'email.required' => 'Hãy nhập email!',
                'email.unique' => 'Địa chỉ email đã tồn tại!',
                'email.email' => 'Email không đúng định dạng!',
                'ten.required' => 'Hãy nhập đẩy đủ họ tên!',
                'gioi_tinh.required' => 'Hãy chọn giới tính!',
                'ngay_sinh.required' => 'Hãy chọn ngày sinh!',
                'sdt.required' => 'Hãy nhập số điện thoại!',
                'cccd.required' => 'Hãy nhập số Căn cước công dân!',
                'dia_chi.required' => 'Hãy nhập địa chỉ!',
                'phong_ban_id.required' => 'Hãy chọn phòng ban!',
                'chuc_vu_id.required' => 'Hãy chọn chức vụ!',
            ]);

            if ($validator->fails()) {
                return response()->json(['success' => false, 'errors' => $validator->errors()], 400);
            } else {
                $respone = ['success' => true];

                $user = new User;
                $user->email = $request->email;
                $user->password = md5(date('d/m/Y', strtotime($request->ngay_sinh)));
                $user->chuc_vu_id = $request->chuc_vu_id;
                $user->phong_ban_id = $request->phong_ban_id;
                $user->save();

                $nhanVien = new NhanVien;
                $nhanVien->user_id = $user->id;
                $nhanVien->ten = $request->ten;
                $nhanVien->gioi_tinh = $request->gioi_tinh;
                $nhanVien->ngay_sinh = $request->ngay_sinh;
                $nhanVien->dia_chi = $request->dia_chi;
                $nhanVien->sdt = $request->sdt;
                $nhanVien->cccd = $request->cccd;
                $nhanVien->trang_thai = 'Đang làm việc';
                $nhanVien->save();
                $nhanVien->ma_nv = $user->phong_ban->ten.$nhanVien->id;
                $nhanVien->save();

                return response()->json($respone, 200);
            }   
        }
    }

    public function postEdit(Request $request, $id) {
        if ($request->ajax()) {
            $nhanVien = NhanVien::find($id);
            $user = User::find($nhanVien->user_id);

            $validator = \Validator::make($request->all(), [
                'email' => 'required|email|unique:users,email,'.$user->id,
                'ten' => 'required',
                'gioi_tinh' => 'required',
                'ngay_sinh' => 'required',
                'sdt' => 'required',
                'cccd' => 'required',
                'dia_chi' => 'required',
                'phong_ban_id' => 'required',
                'chuc_vu_id' => 'required',
            ], [
                'email.required' => 'Hãy nhập email!',
                'email.unique' => 'Địa chỉ email đã tồn tại!',
                'email.email' => 'Email không đúng định dạng!',
                'ten.required' => 'Hãy nhập đẩy đủ họ tên!',
                'gioi_tinh.required' => 'Hãy chọn giới tính!',
                'ngay_sinh.required' => 'Hãy chọn ngày sinh!',
                'sdt.required' => 'Hãy nhập số điện thoại!',
                'cccd.required' => 'Hãy nhập số Căn cước công dân!',
                'dia_chi.required' => 'Hãy nhập địa chỉ!',
                'phong_ban_id.required' => 'Hãy chọn phòng ban!',
                'chuc_vu_id.required' => 'Hãy chọn chức vụ!',
            ]);

            if ($validator->fails()) {
                return response()->json(['success' => false, 'errors' => $validator->errors()], 400);
            } else {
                $respone = ['success' => true];

                $user->email = $request->email;
                $user->chuc_vu_id = $request->chuc_vu_id;
                $user->phong_ban_id = $request->phong_ban_id;
                $user->update();

                $nhanVien->ten = $request->ten;
                $nhanVien->anh = $request->anh;
                $nhanVien->gioi_tinh = $request->gioi_tinh;
                $nhanVien->ngay_sinh = $request->ngay_sinh;
                $nhanVien->dia_chi = $request->dia_chi;
                $nhanVien->sdt = $request->sdt;
                $nhanVien->cccd = $request->cccd;
                $nhanVien->update();

                return response()->json($respone, 200);
            }   
        }
    }


    public function delete($id) {
        $respone = ['success' => false];

        $nhanVien = NhanVien::find($id);
        $user = User::destroy($nhanVien->user_id);
        $delete = $nhanVien->delete();
        if ($delete && $user) {
            $respone['success'] = true;
            return response()->json($respone, 200);
        } 
        return response()->json($respone, 400);
    }

    public function resetPass($id) {
        $respone = ['success' => false];
        $user = User::find($id);
        if($user) {
            $ngaySinh = md5(date('d/m/Y', strtotime($user->nhan_vien->ngay_sinh)));
            $user->password = $ngaySinh;
            $user->update();

            $respone['success'] = true;
            return response()->json($respone, 200);
        } else {
            return response()->json($respone, 200);
        }

        return response()->json($respone, 400);
    }

}
