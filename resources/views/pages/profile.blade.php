@extends('layouts.layout')

@section('header')
    <title>Thông tin nhân viên</title>
@endsection
@section('content')
    
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Thông tin nhân viên</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Thông tin chung
                </div>
                <div class="panel-body">
                    <table style="width:100%">
                        <tr>
                            <th style="width:8%;">Phòng ban:</th>
                            <td>{{Auth::user()->phong_ban->ten}}</td>
                        </tr>
                        <tr>
                            <th style="width:8%;">Chức vụ:</th>
                            <td>{{Auth::user()->chuc_vu->ten}}</td>
                        </tr>
                        <tr>
                            <th style="width:8%;">Trạng thái:</th>
                            <td>{{Auth::user()->nhan_vien->trang_thai}}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Chi tiết tài khoản
                </div>
                <div class="panel-body">
                    <form method="post" id="edit-profile">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="ten">Họ và tên</label>
                                    <input type="text" class="form-control" name="ten" id="ten" placeholder="Nhập họ và tên..." value="{{Auth::user()->nhan_vien->ten}}" disabled>
                                    <span class="is-invalid-info" id="info-ten"></span>
                                </div>
                            </div>
                            <div class="col-lg-12"> 
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Nhập địa chỉ email..." value="{{Auth::user()->email}}" disabled>
                                    <span class="is-invalid-info" id="info-email"></span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="gioi_tinh">Giới tính</label>
                                    <select name="gioi_tinh" id="gioi_tinh" class="form-control" disabled>
                                        <option value="1">Nam</option>
                                        <option value="0" {{!Auth::user()->nhan_vien->gioi_tinh ? 'selected' : ''}}>Nữ</option>
                                    </select>
                                    <span class="is-invalid-info" id="info-gioi_tinh"></span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="ngay_sinh">Ngày sinh</label>
                                    <input type="date" class="form-control" name="ngay_sinh" id="ngay_sinh" placeholder="Nhập họ và tên..." value="{{Auth::user()->nhan_vien->ngay_sinh}}" disabled>
                                    <span class="is-invalid-info" id="info-ngay_sinh"></span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group" style="">
                                    <label for="sdt">Số điện thoại</label>
                                    <input type="text" class="form-control" name="sdt" id="sdt" placeholder="Nhập số điện thoại..." value="{{Auth::user()->nhan_vien->sdt}}" disabled>
                                    <span class="is-invalid-info" id="info-sdt"></span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group" style="">
                                    <label for="cccd">Số Căn cước công dân</label>
                                    <input type="text" class="form-control" name="cccd" id="cccd" placeholder="Nhập số căn cước công dân..." value="{{Auth::user()->nhan_vien->cccd}}" disabled>
                                    <span class="is-invalid-info" id="info-cccd"></span>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="dia_chi">Địa chỉ</label>
                                    <input type="text" class="form-control" name="dia_chi" id="dia_chi" placeholder="Nhập địa chỉ..." value="{{Auth::user()->nhan_vien->dia_chi}}" disabled>
                                    <span class="is-invalid-info" id="info-dia_chi"></span>
                                </div>
                            </div>
                        </div>  
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Đặt lại mật khẩu
                </div>
                <div class="panel-body">
                    <form method="post" id="change-password">
                        <div class="row">
                            <div class="col-lg-12"> 
                                <div class="form-group">
                                    <label for="oldPassword">Mật khẩu cũ</label>
                                    <input type="password" class="form-control" name="oldPassword" id="oldPassword" placeholder="Nhập mật khẩu cũ...">
                                    <span class="is-invalid-info" id="info-oldPassword"></span>
                                </div>
                            </div>
                            <div class="col-lg-12"> 
                                <div class="form-group">
                                    <label for="newPassword">Mật khẩu mới</label>
                                    <input type="password" class="form-control" name="newPassword" id="newPassword" placeholder="Nhập mật khẩu mới...">
                                    <span class="is-invalid-info" id="info-newPassword"></span>
                                </div>
                            </div>
                            <div class="col-lg-12"> 
                                <div class="form-group">
                                    <label for="confirmPassword">Xác nhận mật khẩu mới</label>
                                    <input type="password" class="form-control" name="confirmPassword" id="confirmPassword" placeholder="Xác nhận mật khẩu mới...">
                                    <span class="is-invalid-info" id="info-confirmPassword"></span>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <a id="changePassword" class="btn btn-warning" data-url={{route('profile.changePass')}}>Đổi mật khẩu</a>
                            </div>
                        </div>  
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        
    </script>
@endsection