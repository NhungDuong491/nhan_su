<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        <title>Đăng nhập Quản trị nhân sự</title>

        <!-- Bootstrap Core CSS -->
        <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
        <!-- MetisMenu CSS -->
        <link href="{{asset('assets/css/metisMenu.min.css')}}" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="{{asset('assets/css/startmin.css')}}" rel="stylesheet">
        <!-- Custom Fonts -->
        <link href="{{asset('assets/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('assets/css/custom.css')}}" rel="stylesheet" type="text/css">

    </head>
    <body>

        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <div class="login-panel panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Đăng nhập</h3>
                        </div>
                        <div class="panel-body">
                            <form role="form">
                                <fieldset>
                                    <div class="form-group">
                                        <input class="form-control"  placeholder="E-mail" id="email" name="email" type="email" autofocus>
                                        <span class="is-invalid-info" id="info-email"></span>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Mật khẩu" id="password" name="password" type="password" value="">
                                        <span class="is-invalid-info" id="info-password"></span>
                                    </div>
                                    <!-- Change this to a button or input when using this as a form -->
                                    <a id="submitLogin" class="btn btn-lg btn-success btn-block" data-url={{route('login.postLogin')}} data-home={{route('index')}}>Đăng nhập</a>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- jQuery -->
        <script src="{{ asset('assets/js/jquery.min.js')}}"></script>
        <!-- Bootstrap Core JavaScript -->
        <script src="{{ asset('assets/js/bootstrap.min.js')}}"></script>
        <!-- Metis Menu Plugin JavaScript -->
        <script src="{{ asset('assets/js/metisMenu.min.js')}}"></script>
        <!-- Custom Theme JavaScript -->
        <script src="{{ asset('assets/js/startmin.js')}}"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            $(document).ready(function() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                    }
                });

                $('#email').keydown(function(){
                    $(this).removeClass('is-invalid')
                    $("#info-email").text('')
                }) 
                $('#password').keydown(function(){
                    $(this).removeClass('is-invalid')
                    $("#info-password").text('')
                }) 

                $('#submitLogin').click(function(e) {
                    e.preventDefault();
                    var email = $('#email').val()
                    var password = $('#password').val()
                    var type = "POST"
                    var url = $(this).attr('data-url')
                    var urlHome = $(this).attr('data-home')
                    $.ajax({
                        type: type,
                        url: url,
                        data: {
                            email: email,
                            password: password,
                        },
                        dataType: 'json',
                        success: function (response) {
                            const {success, role} = response
                            console.log(success, role)
                            if (success && role) {
                                Swal.fire({
                                    title: "Đăng nhập thành công!",
                                    icon: "success",
                                    showConfirmButton: false,
                                })
                                setTimeout(function() {
                                    window.location.href=urlHome
                                }, 1300)
                                return
                            }
                            if (!role) {
                                Swal.fire({
                                    title: "Tài khoản không có quyền truy cập!",
                                    icon: "error",
                                    showConfirmButton: true,
                                })
                            }
                            else {
                                Swal.fire({
                                    title: "Tài khoản hoặc mật khẩu sai!",
                                    text: "Hãy kiểm tra lại tài khoản hoặc mật khẩu của bạn!",
                                    icon: "error",
                                    showConfirmButton: true,
                                })
                            }
                        },
                        error: function (response) {
                            var errObj=jQuery.parseJSON(response.responseText)
                            if(errObj.errors){
                                const {email, password} = errObj.errors

                                if (email) {
                                    $("#email").addClass("is-invalid")
                                    $("#info-email").text(email)
                                }
                                if (password) {
                                    $("#password").addClass("is-invalid")
                                    $("#info-password").text(password)
                                }
                            }
                        }
                    })
                })
            })

        </script>

    </body>
</html>
