<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        @yield('header')

        <!-- Bootstrap Core CSS -->
    
      <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
        <!-- MetisMenu CSS -->
        <link href="{{asset('assets/css/metisMenu.min.css')}}" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="{{asset('assets/css/startmin.css')}}" rel="stylesheet">
        <!-- Custom Fonts -->
        <link href="{{asset('assets/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
        <!-- Datatable -->
        <link href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
        <link href="{{asset('assets/css/custom.css')}}" rel="stylesheet" type="text/css">


        @yield('css')

    </head>
    <body>
        <div id="wrapper">
            <!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <div class="navbar-header">
                    <a class="navbar-brand" href={{route('index')}}>QUẢN TRỊ NHÂN SỰ  </a>
                </div>

                <ul class="nav navbar-right navbar-top-links">
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user fa-fw"></i>  @if(Auth::check()) {{Auth::user()->nhan_vien->ten}}  @endif<b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="{{route('profile')}}"><i class="fa fa-user fa-fw"></i> Thông tin người dùng</a>
                            </li>
                            <li class="divider"></li>
                            <li><a href={{route('logout')}}><i class="fa fa-sign-out fa-fw"></i> Đăng xuất</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <!-- /.navbar-top-links -->

                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">
                            <li>
                                @if(Auth::check()) 
                                    <div class="info-usser">
                                        <div class="avatar">
                                            <img src={{Auth::user()->nhan_vien->anh ? Auth::user()->nhan_vien->anh : asset('assets/images/default-avatar.png')}} alt="" width="100" height="100">  
                                        </div>
                                        <a href="{{route('profile')}}" class="link-profile">{{Auth::user()->nhan_vien->ten}}</a>
                                    </div>   
                                @endif
                                <!-- /input-group -->   
                            </li>
                            <li>
                                <a href={{route('index')}} ><i class="fa fa-dashboard fa-fw"></i> Trang chính</a>
                            </li>
                            <li>
                                <a href={{route('user.index')}}><i class="fa fa-user fa-fw"></i> Quản lý tài khoản</a>
                            </li>
                            <li>
                                <a href={{route('nhanvien.index')}}><i class="fa fa-users fa-fw"></i> Quản lý hồ sơ nhân viên</a>
                            </li>
                            <li>
                                <a href={{route('phongban.index')}} ><i class="fa fa-pied-piper-pp"></i> Quản lý phòng ban</a>
                            </li>
                            <li>
                                <a href={{route('chucvu.index')}}><i class="fa fa-cubes fa-fw"></i> Quản lý chức vụ</a>
                            </li>
                            <li>
                                <a href={{route('ngaycong.index')}}><i class="fa fa-file-text fa-fw"></i> Quản lý ngày công</a>
                            </li>
                            <li>
                                <a href={{route('luong.index')}}><i class="fa fa-paragraph-text fa-paragraph"></i> Quản lý lương</a>
                            </li>
                            <li>
                                <a href={{route('index')}}><i class="fa fa-bar-chart-o fa-fw"></i> Thống kê</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <div id="page-wrapper">
                <div class="container-fluid">

                    @yield('content')

                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->
        <!-- jQuery -->
        <script src="{{ asset('assets/js/jquery.min.js')}}"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="{{ asset('assets/js/bootstrap.min.js')}}"></script>
        <!-- Metis Menu Plugin JavaScript -->
        <script src="{{ asset('assets/js/metisMenu.min.js')}}"></script>
        <!-- Custom Theme JavaScript -->
        <script src="{{ asset('assets/js/startmin.js')}}"></script>
        <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/fixedcolumns/3.3.3/js/dataTables.fixedColumns.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.1/chart.min.js"></script>

        <script src="{{ asset('assets/js/main.js')}}"></script>

        @yield('js')

    </body>
</html>
