<?php

namespace App\Http\Controllers;

use App\Models\ChucVu;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\NhanVien;
use App\Models\PhongBan;
use App\Models\Luong;

class ThongKeController extends Controller
{
    //
    public function index() {
        return view('pages.ThongKe.index');
    }

    public function loadChart() {
        $respone = ['success' => true,'data' => ''];
        $hdn = NhanVien::orderBy('created_at', 'desc')->take(20)->get();
        foreach ($hdn as $item) {
            $respone['times'][] = date('d-m-Y', strtotime($item->updated_at));
            $respone['values'][] = $item->tong_tien;
        }
        return response()->json($respone, 200);
    }

    public function loadChart2() {
        $respone = ['success' => true,'data' => ''];
        $px = PhongBan::select('ma_phong_ban', \DB::raw('count(*) as total'))->groupBy('ma_phong')->pluck('total','ngay_xuat')->all();

        foreach($px as $key => $value) {
            $respone['times'][] = date('d-m-Y', strtotime($key));
            $respone['values'][] = $value;
        }
        return response()->json($respone, 200); 
    }
    
    public function loadChart3() {
        $respone = ['success' => true,'data' => ''];
        $sp = ChucVu::select('loai_san_pham_id', \DB::raw('count(*) as total'))->groupBy('loai_san_pham_id')->pluck('total','loai_san_pham_id')->all();

        foreach($sp as $key => $value) {
            $respone['times'][] = ChucVu::find($key)->ten;
            $respone['values'][] = $value;
        }
        return response()->json($respone, 200);
    }
}
