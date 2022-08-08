@extends('layouts.layout')

@section('header')
    <title>Quản lý lương</title>
@endsection
@section('content')
    
<div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Quản lý lương</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Bảng lương
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover display nowrap" style="width:100%" id="dataTable">
                            <thead>
                                <tr>
                                    <th width="5%">STT</th>
                                    <th>Mã NV</th>
                                    <th width="15%">Họ tên</th>
                                    <th >Phòng ban</th> 
                                    <th >Chức vụ</th>
                                    <th>Lương cơ bản</th>
                                    <th>Lương thưởng</th>
                                    <th>Tổng lương</th>
                                    <th>Chức năng</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (isset($user))
                                <?php $i = 1; ?>
                                    @foreach ($user as $item)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td style="color: blue;"><b> <i>{{ $item->ma_nv }}</i> </b>   </td>
                                            <td style="color: green;"> <b> <i>{{ $item->ten }}</i> </b>  </td>
                                            <td>{{ $item->phong_ban->ten }}</td>
                                            <td>{{ $item->chuc_vu->ten }}</td> 
                                            <td>{{ $item->luong_co_ban }}</td>
                                            <td>{{ $item->luong_thuong }}</td>
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
                        const {ten, dia_chi, sdt} = errObj.errors
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