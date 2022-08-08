@extends('layouts.layout')

@section('header')
    <title>Quản lý ngày công</title>
@endsection
@section('content')
    
<div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Quản lý ngày công</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Danh sách làm việc
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover display nowrap" style="width:100%" id="dataTable">
                            <thead>
                                <tr>
                                    <th width="5%" style="text-align:center;">STT</th>
                                    <th width="5%" style="text-align:center;">Mã NV</th>
                                    <th style="text-align:center;">Họ tên</th>
                                    <th style="text-align:center;">Ngày chấm công</th>
                                    <th style="text-align:center;">Chức năng</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (isset($nc))
                                    <?php $i = 1; ?>
                                    @foreach ($nc as $item)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td style="color: blue;"><b> <i>{{ $item->nhan_vien->ma_nv }}</i> </b>   </td>
                                            <td style="color: green;"> <b> <i>{{ $item->nhan_vien->ten }}</i> </b>  </td>
                                            <td>{{ $item->ngay_cham_cong }}</td>
                                            <td style="text-align:center;">
                                                <span>
                                                    @if($item->id != Auth::user()->id)
                                                        <a data-url={{route('ngaycong.delete', ['id'=>$item->id])}} class="btn btn-danger btn-xs deleteNgayCong"><i class="fa fa-trash"></i> Xoá</a>
                                                    @endif
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
            $('.deleteNgayCong').click(function(e) {
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
                        dataType: 'json',
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
    </script>
@endsection