@extends('layouts.layout')

@section('header')
    <title>Quản lý chức vụ</title>
@endsection
@section('content')
    
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Quản lý chức vụ</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Danh sách chức vụ</b>
                </div>
                <div class="panel-body">
                    <div class="table-responsive" id="table-cv">
                        <table class="table table-striped table-bordered table-hover display nowrap" style="width:100%" id="dataTable">
                            <thead>
                                <tr>
                                    <th width="5%">STT</th>
                                    <th  style="text-align:center;">Mã chức vụ</th>
                                    <th  style="text-align:center;">Tên chức vụ</th>
                                    <th  style="text-align:center;">Chức năng</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (isset($cv))
                                <?php $i = 1; ?>
                                    @foreach ($cv as $item)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td style="color: blue;"> <b> {{ $item->ma_chuc_vu  }} </b>  </td>
                                            <td style="color: green;"> <b> {{ $item->ten }} </b>  </td>
                                            <td  style="text-align:center;">
                                                <span>
                                                    <a data-url="{{route('chucvu.getEdit', ['id'=>$item->id])}}" class="btn btn-warning btn-xs editChucVu"> <i class="fa fa-edit"></i> Cập nhật</a>
                                                    <a data-url="{{route('chucvu.delete', ['id'=>$item->id])}}" class="btn btn-danger btn-xs deleteChucVu"><i class="fa fa-trash"></i> Xoá</a>
                                                </span>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                                
                            </tbody>
                        </table>
                    </div>
                    
                </div>
            </div>
        </div>
        <div class="form-add open-form">
            <div class="col-lg-4">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        Thêm mới chức vụ
                    </div>
                    <div class="panel-body">
                        <form id="form-add-cv">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="ma_chuc_vu">Mã chức vụ</label>
                                        <input type="text" class="form-control" name="ma_chuc_vu" id="ma_chuc_vu" placeholder="Nhập mã chức vụ...">
                                        <span class="is-invalid-info" id="info-ma_chuc_vu"></span>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="ten">Tên chức vụ</label>
                                        <input type="text" class="form-control" name="ten" id="ten" placeholder="Nhập tên chức vụ...">
                                        <span class="is-invalid-info" id="info-ten"></span>
                                    </div>
                                </div>
                            </div>
                            <a id="addNewChucVu" class="btn btn-success" data-url={{route('chucvu.postAdd')}}>Thêm mới</a>
                            <button type="reset" class="btn btn-default">Nhập lại</button>
                        </form> 
                    </div>
                </div>
            </div>
        </div>
        <div class="form-edit">
            <div class="col-lg-4">
                <div class="panel panel-warning">
                    <div class="panel-heading">
                        Cập nhật chức vụ
                        <span class="close-form" id="close-form-edit" style="float: right;">X</span>
                    </div>
                    <div class="panel-body">
                        <form id="form-edit-chuc-vu">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="ma_chuc_vu_edit">Mã chức vụ</label>
                                        <input type="text" class="form-control" name="ma_chuc_vu" id="ma_chuc_vu_edit" placeholder="Nhập mã chức vụ...">
                                        <span class="is-invalid-info" id="info-ma_chuc_vu_edit"></span>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="ten_edit">Tên chức vụ</label>
                                        <input type="text" class="form-control" name="ten" id="ten_edit" placeholder="Nhập tên chức vụ...">
                                        <span class="is-invalid-info" id="info-ten_edit"></span>
                                    </div>
                                </div>
                            </div>  
                            <a id="submitEditChucVu" class="btn btn-success">Cập nhật</a>
                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
<script>
    let rowUpdate;

    $('.deleteChucVu').click(function(e) {
        e.preventDefault();

        var rowDel = $(this).parents('tr')

        Swal.fire({
            title: 'Xác nhận xoá!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Xoá ngay!',
            cancelButtonText: 'Không!',
          }).then((result) => {
            if (result.isConfirmed) {
                var type = "GET"
                var url = $(this).attr('data-url')
                $.ajax({
                    type: type,
                    url: url,
                    success: function (response) {
                        const {success} = response
                        if (success) {
                            Swal.fire({
                                title: "Xoá thành công!",
                                icon: "success",
                                showConfirmButton: true,
                            })

                            var table = $('#dataTable').DataTable();
                            table.row(rowDel).remove().draw();
                        }
                    },
                    error: function (response) {
                        Swal.fire({
                            title: "Lỗi!",
                            icon: "error",
                            showConfirmButton: true,
                        })
                    }
                })
            }
          })
        
    })

    $('.editChucVu').click(function(e) {
        e.preventDefault();
        $(".form-add").removeClass("open-form")
        $(".form-edit").addClass("open-form")

        var type = 'GET'
        var url = $(this).attr("data-url")
        rowUpdate= $(this).parents('tr')

        $.ajax({
            type: type,
            url: url,
            success: function (response) {
                const {success, data} = response
                if (success) {
                    $("#ma_chuc_vu_edit").val(data.ma_chuc_vu)
                    var urlPost = `ds-chuc-vu/cap-nhat/${data.id}`
                    $("#submitEditChucVu").attr("data-url", urlPost)
                }
                if (success) {
                    $("#ten_edit").val(data.ten)
                    var urlPost = `ds-chuc-vu/cap-nhat/${data.id}`
                    $("#submitEditChucVu").attr("data-url", urlPost)
                } else {
                    Swal.fire({
                        title: "Lỗi!",
                        icon: "error",
                        showConfirmButton: true,
                    })
                }
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

    $('#submitEditChucVu').click(function(e) {
        e.preventDefault();
        Swal.fire({
            title: 'Xác nhận cập nhật!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Cập nhật!',
            cancelButtonText: 'Không!',
          }).then((result) => {
            if (result.isConfirmed) {
            var data = $("#form-edit-chuc-vu").serialize()
            var type = 'POST';
            var url = $(this).attr("data-url");
            $.ajax({
                type: type,
                url: url,
                data: data,
                success: function (response) {
                    const {success, data} = response
                    if (success) {
                        Swal.fire({
                            title: "Cập nhật thành công!",
                            icon: "success",
                            showConfirmButton: true,
                        }).then((result) => {
                        if (result.isConfirmed) {
                            location.reload();
                        }
                    })
                    }
                },
                error: function (response) {
                    var errObj=jQuery.parseJSON(response.responseText)
                    if(errObj.errors){
                        const {ma_chuc_vu, ten} = errObj.errors
                        if (ma_chuc_vu) {
                            $("#ma_chuc_vu").addClass("is-invalid")
                            $("#info-ma_chuc_vu_edit").text(ma_chuc_vu)
                        }
                        if (ten) {
                            $("#ten").addClass("is-invalid")
                            $("#info-ten_edit").text(ten)
                        }
                    } else {
                        Swal.fire({
                            title: "Lỗi!",
                            icon: "error",
                            showConfirmButton: true,
                        })
                    }
                }
            })
        }
        })
    })

    $('#close-form-edit').click(function(e) {
        e.preventDefault();
        $(".form-add").addClass("open-form")
        $(".form-edit").removeClass("open-form")
    })


</script>
@endsection