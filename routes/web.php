<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/dang-nhap', [LoginController::class, 'index'])->name('login.index');
Route::post('/dang-nhap', [LoginController::class, 'postLogin'])->name('login.postLogin');

Route::prefix('/')->middleware('checkAuth')->group(function () {
    Route::get('/', [PageController::class, 'index'])->name('index');

    Route::get('/thong-tin', [PageController::class, 'getProfile'])->name('profile');
    Route::post('/thong-tin/doi-mat-khau', [PageController::class, 'changePass'])->name('profile.changePass');

    Route::get('/cham-cong', [NgayCongController::class, 'add'])->name('ngaycong.add');

    Route::get('dang-xuat', [LoginController::class, 'logout'])->name('logout');

    Route::prefix('ds-user')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('user.index');

        Route::get('/them-moi', [UserController::class, 'getAdd'])->name('user.getAdd');
        Route::post('/them-moi', [UserController::class, 'postAdd'])->name('user.postAdd');

        Route::get('/cap-nhat/{id}', [UserController::class, 'getEdit'])->name('user.getEdit');
        Route::post('/cap-nhat/{id}', [UserController::class, 'postEdit'])->name('user.postEdit');

        Route::get('/xoa/{id}', [UserController::class, 'delete'])->name('user.delete');

        Route::get('/lay-lai-mat-khau/{id}', [UserController::class, 'resetPass'])->name('user.resetPass');
    });


    Route::prefix('ds-nhan-vien')->group(function () {
        Route::get('/', [NhanVienController::class, 'index'])->name('nhanvien.index');

        Route::get('/them-moi', [NhanVienController::class, 'getAdd'])->name('nhanvien.getAdd');
        Route::post('/them-moi', [NhanVienController::class, 'postAdd'])->name('nhanvien.postAdd');

        Route::get('/cap-nhat/{id}', [NhanVienController::class, 'getEdit'])->name('nhanvien.getEdit');
        Route::post('/cap-nhat/{id}', [NhanVienController::class, 'postEdit'])->name('nhanvien.postEdit');

        Route::get('/xoa/{id}', [NhanVienController::class, 'delete'])->name('nhanvien.delete');

        Route::get('/lay-lai-mat-khau/{id}', [NhanVienController::class, 'resetPass'])->name('nhanvien.resetPass');
    });

    Route::prefix('ds-phong-ban')->group(function () {
        Route::get('/', [PhongBanController::class, 'index'])->name('phongban.index');

        Route::post('/them-moi', [PhongBanController::class, 'postAdd'])->name('phongban.postAdd');

        Route::get('/cap-nhat/{id}', [PhongBanController::class, 'getEdit'])->name('phongban.getEdit');
        Route::post('/cap-nhat/{id}', [PhongBanController::class, 'postEdit'])->name('phongban.postEdit');

        Route::get('/xoa/{id}', [PhongBanController::class, 'delete'])->name('phongban.delete');
    });

    Route::prefix('ds-chuc-vu')->group(function () {
        Route::get('/', [ChucVuController::class, 'index'])->name('chucvu.index');

        Route::post('/them-moi', [ChucVuController::class, 'postAdd'])->name('chucvu.postAdd');

        Route::get('/cap-nhat/{id}', [ChucVuController::class, 'getEdit'])->name('chucvu.getEdit');
        Route::post('/cap-nhat/{id}', [ChucVuController::class, 'postEdit'])->name('chucvu.postEdit');

        Route::get('/xoa/{id}', [ChucVuController::class, 'delete'])->name('chucvu.delete');
    });

    Route::prefix('luong')->group(function () {
        Route::get('/', [LuongController::class, 'index'])->name('luong.index');

    });
    Route::prefix('ngaycong')->group(function () {
        Route::get('/', [NgayCongController::class, 'index'])->name('ngaycong.index');
        Route::get('/xoa/{id}', [NgayCongController::class, 'delete'])->name('ngaycong.delete');

    });

    Route::prefix('thong-ke')->group(function () {
        Route::get('/', [ThongKeController::class, 'index'])->name('thongke.index');

        Route::get('bieu-do', [ThongKeController::class, 'loadChart'])->name('thongke.loadChart');

        Route::get('bieu-do-2', [ThongKeController::class, 'loadChart2'])->name('thongke.loadChart2');

        Route::get('bieu-do-3', [ThongKeController::class, 'loadChart3'])->name('thongke.loadChart3');

    });
});

