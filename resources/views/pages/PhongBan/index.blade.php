@extends('layouts.layout')

@section('header')
    <title>Quản lý phòng ban</title>
@endsection
@section('content')
    
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Quản lý phòng ban</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Danh sách phòng ban</b>
                </div>
                <div class="panel-body">
                    <div class="table-responsive" id="table-pb">
                        <table class="table table-striped table-bordered table-hover display nowrap" style="width:100%" id="dataTable">
                            <thead>
                                <tr>
                                    <th width="5%">STT</th>
                                    <th  style="text-align:center;">Mã phòng ban</th>
                                    <th  style="text-align:center;">Tên phòng ban</th>
                                    <th  style="text-align:center;">Chức năng</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (isset($pb))
                                <?php $i = 1; ?>
                                    @foreach ($pb as $item)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td style="color: blue;"> <b> {{ $item->ma_phong_ban }} </b>  </td>
                                            <td style="color: green;"> <b> {{ $item->ten }} </b>  </td>
                                            <td  style="text-align:center;">
                                                <span>
                                                    <a data-url="{{route('phongban.getEdit', ['id'=>$item->id])}}" class="btn btn-warning btn-xs editPhongBan"> <i class="fa fa-edit"></i> Cập nhật</a>
                                                    <a data-url="{{route('phongban.delete', ['id'=>$item->id])}}" class="btn btn-danger btn-xs deletePhongBan"><i class="fa fa-trash"></i> Xoá</a>
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
                        Thêm mới phòng ban
                    </div>
                    <div class="panel-body">
                        <form id="form-add-pb">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="ma_phong_ban">Mã phòng ban</label>
                                        <input type="text" class="form-control" name="ma_phong_ban" id="ma_phong_ban" placeholder="Nhập mã phòng ban...">
                                        <span class="is-invalid-info" id="info-ma_phong_ban"></span>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="ten">Tên phòng ban</label>
                                        <input type="text" class="form-control" name="ten" id="ten" placeholder="Nhập tên phòng ban...">
                                        <span class="is-invalid-info" id="info-ten"></span>
                                    </div>
                                </div>
                            </div>
                            <a id="addNewPhongBan" class="btn btn-success" data-url={{route('phongban.postAdd')}}>Thêm mới</a>
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
                        Cập nhật phòng ban
                        <span class="close-form" id="close-form-edit" style="float: right;">X</span>
                    </div>
                    <div class="panel-body">
                        <form id="form-edit-phong-ban">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="ma_phong_ban_edit">Mã phòng ban</label>
                                        <input type="text" class="form-control" name="ma_phong_ban" id="ma_phong_ban_edit" placeholder="Nhập mã phòng ban...">
                                        <span class="is-invalid-info" id="info-ma_phong_ban_edit"></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="ten_edit">Tên phòng ban</label>
                                        <input type="text" class="form-control" name="ten" id="ten_edit" placeholder="Nhập tên phòng ban...">
                                        <span class="is-invalid-info" id="info-ten_edit"></span>
                                    </div>
                                </div>
                            </div>  
                            <a id="submitEditPhongBan" class="btn btn-success">Cập nhật</a>
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

    $('.deletePhongBan').click(function(e) {
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

    $('.editPhongBan').click(function(e) {
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
                    $("#ma_phong_ban_edit").val(data.ma_phong_ban)
                    var urlPost = `ds-phong-ban/cap-nhat/${data.id}`
                    $("#submitEditPhongBan").attr("data-url", urlPost)
                }
                if (success) {
                    $("#ten_edit").val(data.ten)
                    var urlPost = `ds-phong-ban/cap-nhat/${data.id}`
                    $("#submitEditPhongBan").attr("data-url", urlPost)
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

    $('#submitEditPhongBan').click(function(e) {
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
            var data = $("#form-edit-phong-ban").serialize()
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
                        const {ma_phong_ban, ten} = errObj.errors
                        if (ma_phong_ban) {
                            $("#ma_phong_ban").addClass("is-invalid")
                            $("#info-ma_phong_ban_edit").text(ma_phong_ban)
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