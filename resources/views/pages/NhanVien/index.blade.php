@extends('layouts.layout')

@section('header')
    <title>Quản lý hồ sơ nhân viên</title>
@endsection
@section('content')
    
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Quản lý hồ sơ nhân viên</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Danh sách nhân viên
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover display nowrap" style="width:100%" id="dataTable">
                            <thead>
                                <tr>
                                    <th width="5%">STT</th>
                                    <th>Mã NV</th>
                                    <th width="15%">Họ tên</th>
                                    <th  style="text-align:center;">Hình ảnh</th>
                                    {{-- <th >Phòng ban</th>
                                    <th >Chức vụ</th> --}}
                                    <th>Giới tính</th>
                                    <th>Ngày sinh</th>
                                    <th >Số điện thoại</th>
                                    <th >Số CCCD</th>
                                    <th >Địa chỉ</th>
                                    <th>Trạng thái</th>
                                    <th>Chức năng</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (isset($nhanVien))
                                    <?php $i = 1; ?>
                                    @foreach ($nhanVien as $item)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td style="color: blue;"><b> <i>{{ $item->ma_nv }}</i> </b>   </td>
                                            <td style="color: green;"> <b> <i>{{ $item->ten }}</i> </b>  </td>
                                            <td  style="text-align:center;"> <img src="{{$item->hinh_anh ? $item->hinh_anh : asset('assets/images/no-image.jpg')}}" alt="{{ $item->ten }}" width="200px" height="120px"> </td>
                                            {{-- <td>{{ $item->phong_ban->ten }}</td> --}}
                                            {{-- <td>{{ $item->chuc_vu->ten }}</td> --}}
                                            <td>{{ $item->gioi_tinh ? 'Nam' : 'Nữ' }}</td>
                                            <td>{{date('d-m-Y', strtotime($item->ngay_sinh))}}</td>
                                            <td>{{ $item->sdt }}</td>
                                            <td>{{ $item->cccd }}</td>
                                            <td>{{ $item->dia_chi }}</td>
                                            <td>{{ $item->trang_thai }}</td>
                                            <td style="text-align:center;">
                                                <span>
                                                    <a href="{{route('user.getEdit', ['id'=>$item->id])}}" class="btn btn-warning btn-xs"> <i class="fa fa-edit"></i> Cập nhật</a>
                                                    @if($item->id != Auth::user()->id)
                                                        <a data-url={{route('nhanvien.delete', ['id'=>$item->id])}} class="btn btn-danger btn-xs deleteUser"><i class="fa fa-trash"></i> Xoá</a>
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
            $('.deleteUser').click(function(e) {
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