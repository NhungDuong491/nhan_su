@extends('layouts.layout')

@section('header')
    <title>Cập nhật nhân viên</title>
@endsection
@section('content')
    
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Cập nhật nhân viên</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
        <div class="col-lg-12">
            <p>
                <a class="btn btn-primary" href={{route('nhanvien.index')}}> <i class="fa fa-chevron-circle-left"></i> Quay lại</a>
            <p>
        </div>
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Cập nhật nhân viên
                </div>
                <div class="panel-body">
                    <form method="post" id="edit-user">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="ten">Họ và tên</label>
                                    <input type="text" class="form-control" name="ten" id="ten" placeholder="Nhập họ và tên..." value="{{$nhanVien ? $nhanVien->ten : ''}}">
                                    <span class="is-invalid-info" id="info-ten"></span>
                                </div>
                            </div>
                            <div class="col-lg-12"> 
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Nhập địa chỉ email..." value="{{$nhanVien && $nhanVien->user ? $nhanVien->user->email : ''}}">
                                    <span class="is-invalid-info" id="info-email"></span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="gioi_tinh">Giới tính</label>
                                    <select name="gioi_tinh" id="gioi_tinh" class="form-control">
                                        <option value="1">Nam</option>
                                        <option value="0" {{$nhanVien && !$nhanVien->gioi_tinh ? 'selected' : ''}}>Nữ</option>
                                    </select>
                                    <span class="is-invalid-info" id="info-gioi_tinh"></span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="ngay_sinh">Ngày sinh</label>
                                    <input type="date" class="form-control" name="ngay_sinh" id="ngay_sinh" placeholder="Nhập họ và tên..." value="{{$nhanVien ? $nhanVien->ngay_sinh :''}}">
                                    <span class="is-invalid-info" id="info-ngay_sinh"></span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group" style="">
                                    <label for="sdt">Số điện thoại</label>
                                    <input type="text" class="form-control" name="sdt" id="sdt" placeholder="Nhập số điện thoại..." value="{{$nhanVien ? $nhanVien->sdt :''}}">
                                    <span class="is-invalid-info" id="info-sdt"></span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group" style="">
                                    <label for="cccd">Số Căn cước công dân</label>
                                    <input type="text" class="form-control" name="cccd" id="cccd" placeholder="Nhập số căn cước công dân..." value="{{$nhanVien ? $nhanVien->cccd :''}}">
                                    <span class="is-invalid-info" id="info-cccd"></span>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="dia_chi">Địa chỉ</label>
                                    <input type="text" class="form-control" name="dia_chi" id="dia_chi" placeholder="Nhập địa chỉ..." value="{{$nhanVien ? $nhanVien->dia_chi :''}}">
                                    <span class="is-invalid-info" id="info-dia_chi"></span>
                                </div>
                            </div>
                        </div>  
                        <a id="editUser" class="btn btn-success" data-url={{route('nhanvien.postEdit', ['id'=>$nhanVien->id])}}>Cập nhật</a>
                        <button type="reset" class="btn btn-default">Nhập lại</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Lấy lại mật khẩu
                </div>
                <div class="panel-body">
                    <a id="resetPassword" class="btn btn-warning" data-url={{route('nhanvien.resetPass', ['id'=>$nhanVien->id])}}>Lấy lại mật khẩu</a>
                    <label for="">(Mật khẩu sau khi lấy lại mặc định là <span style="color:red;">ngày/tháng/năm</span>  sinh!)</label>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        
    </script>
@endsection