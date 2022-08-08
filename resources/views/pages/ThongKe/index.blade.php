@extends('layouts.layout')

@section('header')
    <title>Thống kê</title>
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                <div class="row">
                    <div class="col-lg-10">
                        Thống kê
                    </div>
                </div>
            </h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-bar-chart-o fa-fw"></i> Thống kê tổng tiền hoá đơn nhập theo ngày</b>
                </div>
                <div class="panel-body">
                    <div class="chartWrapper">
                        <div class="chartAreaWrapper">
                            <canvas id="myChart"></canvas>
                        </div>
                    </div>
                    <script src="{{ asset('assets/js/chart.js') }}"></script>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-bar-chart-o fa-fw"></i> Thống kê số lượng phiếu xuất theo ngày</b>
                </div>
                <div class="panel-body">
                    <div class="chartWrapper">
                        <div class="chartAreaWrapper">
                            <canvas id="myChart2"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-bar-chart-o fa-fw"></i> Thống kê số lượng hàng tồn theo Loại sản phẩm</b>
                </div>
                <div class="panel-body">
                    <div class="chartWrapper">
                        <div class="chartAreaWrapper">
                            <canvas id="myChart3"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection