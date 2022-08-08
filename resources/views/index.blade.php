@extends('layouts.layout')

@section('header')
    <title>Quản trị nhân sự</title>
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                <div class="row">
                    <div class="col-lg-10">
                        Trang chính
                    </div>
                    <div class="col-lg-2" style="">
                        <a class="btn btn-success btn-lg" id="btnDiemDanh" data-url={{route('ngaycong.add')}} {{$isChamCong ? 'disabled' : ''}} > <i class="fa fa-edit"></i> Chấm công</a>
                    </div>
                </div>
                
            </h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-cube fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">@if (isset($pb))
                                {{$pb}}
                            @endif</div>
                            <div>Phòng ban</div>
                        </div>
                    </div>
                </div>
                <a href={{route('phongban.index')}}>
                    <div class="panel-footer">
                        <span class="pull-left">Xem chi tiết</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-green">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-user fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">@if (isset($cv))
                                {{$cv}}
                            @endif</div>
                            <div>Chức vụ</div>
                        </div>
                    </div>
                </div>
                <a href={{route('chucvu.index')}}>
                    <div class="panel-footer">
                        <span class="pull-left">Xem chi tiết</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-yellow">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-users fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">
                                @if (isset($nhanVien))
                                    {{$nhanVien}}
                                @endif
                            </div>
                            <div>Nhân viên</div>
                        </div>
                    </div>
                </div>
                <a href={{route('nhanvien.index')}}>
                    <div class="panel-footer">
                        <span class="pull-left">Xem chi tiết</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-red">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-paragraph fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">
                                @if (isset($luong))
                                    {{$luong}}
                                @endif
                            </div>
                            <div>Lương</div>
                        </div>
                    </div>
                </div>
                <a href={{route('luong.index')}}>
                    <div class="panel-footer">
                        <span class="pull-left">Xem chi tiết</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
    </div>

@endsection

@section('js')

    <script>
        $("#btnDiemDanh").click(function(e){
            e.preventDefault()
            var type = "GET"
            var url = $(this).attr('data-url')
            $.ajax({
                type: type,
                url: url,
                success: function (response) {
                    const {success} = response
                    if (success) {
                        Swal.fire({
                            title: "Điểm danh thành công!",
                            icon: "success",
                            showConfirmButton: true,
                        })
                    } else {
                        Swal.fire({
                            title: "Bạn đã điểm danh rồi!",
                            icon: "error",
                            showConfirmButton: true,
                        })
                    }

                    $("#btnDiemDanh").attr('disabled', true)
                },
                error: function (response) {
                    Swal.fire({
                        title: "Lỗi!",
                        icon: "error",
                        showConfirmButton: true,
                    })
                }
            })
        })
    </script>

@endsection