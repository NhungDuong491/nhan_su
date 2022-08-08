<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PhongBan;
class PhongBanController extends Controller
{
    //
    public function index() {
        $pb = PhongBan::all();
        return view('pages.PhongBan.index', compact('pb'));
    }

    public function postAdd(Request $request) {
        if ($request->ajax()) {
            $validator = \Validator::make($request->all(), [
                'ma_phong_ban' => 'required|unique:phong_ban,ma_phong_ban',
                'ten' => 'required|unique:phong_ban,ten',
            ], [
                'ma_phong_ban.required' => 'Hãy nhập mã phòng ban!',
                'ma_phong_ban.unique' => 'Mã phòng ban đã tồn tại!',
                'ten.required' => 'Hãy nhập tên phòng ban!',
                'ten.unique' => 'Phòng ban đã tồn tại!',
            ]);

            if ($validator->fails()) {
                return response()->json(['success' => false, 'errors' => $validator->errors()], 400);
            } else {
                $respone = ['success' => true];

                $pb = new PhongBan();
                $pb->ma_phong_ban = $request->ma_phong_ban;
                $pb->ten = $request->ten;
                
                $pb->save();

                return response()->json($respone, 200);
            }
        }
    }

    public function getEdit($id) {
        $respone = ['success' => false, 'data' => ''];

        $pb = PhongBan::find($id);

        if ($pb) {
            $respone['success'] = true;
            $respone['data'] = $pb;
        }
        
        return response()->json($respone, 200);
    }

    public function postEdit(Request $request, $id) {
        if ($request->ajax()) {
            $validator = \Validator::make($request->all(), [
                'ma_phong_ban' => 'required:phong_ban,ma_phong_ban',
                'ten' => 'required:phong_ban,ten',
            ], [
                'ma_phong_ban.required' => 'Hãy nhập mã phòng ban!',
                'ten.required' => 'Hãy nhập tên phòng ban!',
                
            ]);

            if ($validator->fails()) {
                return response()->json(['success' => false, 'errors' => $validator->errors()], 400);
            } else {
                $respone = ['success' => true, 'data' => ''];

                $pb = PhongBan::find($id);
                $pb->ma_phong_ban = $request->ma_phong_ban;
                $pb->ten = $request->ten;
               
                $pb->save();

                $respone['data'] = $pb;

                return response()->json($respone, 200);
            }
        }
    }

    public function delete($id) {
        $respone = ['success' => false];

        $delete = PhongBan::destroy($id);
        if ($delete) {
            $respone['success'] = true;
            return response()->json($respone, 200);
        } 
        return response()->json($respone, 400);
    }

}
