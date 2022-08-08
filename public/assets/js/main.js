$(document).ready(function() {

    const loadChart = () => {
        let url = 'thong-ke/bieu-do'
        console.log(url);
        $.ajax({
            type: 'GET',
            url: url,
            dataType: 'json',
            success: function(response) {
                showChart(response.times, response.values);
            },
        })

    }
    loadChart()

    const loadChart2 = () => {
        let url = 'thong-ke/bieu-do-2'
        console.log(url);
        $.ajax({
            type: 'GET',
            url: url,
            dataType: 'json',
            success: function(response) {
                showChart2(response.times, response.values);
            },
        })

    }
    loadChart2()

    const loadChart3 = () => {
        let url = 'thong-ke/bieu-do-3'
        console.log(url);
        $.ajax({
            type: 'GET',
            url: url,
            dataType: 'json',
            success: function(response) {
                showChart3(response.times, response.values);
            },
        })

    }
    loadChart3()

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    });

    var table = $('#dataTable').DataTable({
        "scrollX": true,
        "language": {
            "decimal": "",
            "emptyTable": "Không có dữ liệu!",
            "info": "Hiển thị _START_ tới _END_ của _TOTAL_ dòng dữ liệu",
            "infoEmpty": "Hiển thị 0 tới 0 của 0 dòng dữ liệu",
            "infoFiltered": "(lọc ra từ _MAX_ tổng số dữ liệu)",
            "infoPostFix": "",
            "thousands": ",",
            "lengthMenu": "Hiển thị _MENU_ dòng dữ liệu",
            "loadingRecords": "Đang tải...",
            "processing": "Đang tiến hành xử lý...",
            "search": "Tìm kiếm:",
            "zeroRecords": "Không có dữ liệu!",
            "paginate": {
                "first": "Đầu tiên",
                "last": "Cuối cùng",
                "next": "Kế tiếp",
                "previous": "Trở lại"
            },
            "aria": {
                "sortAscending": ": kích hoạt để sắp xếp cột tăng dần",
                "sortDescending": ": kích hoạt để sắp xếp cột giảm dần"
            },

        },

    });

    //change selectboxes to selectize mode to be searchable
    $(".select-search").select2();

    $('#email').keydown(function() {
        $(this).removeClass('is-invalid')
        $("#info-email").text('')
    })
    $('#gioi_tinh').change(function() {
        $(this).removeClass('is-invalid')
        $("#info-gioi_tinh").text('')
    })
    $('#ngay_sinh').keydown(function() {
        $(this).removeClass('is-invalid')
        $("#info-ngay_sinh").text('')
    })
    $('#ngay_sinh').change(function() {
        $(this).removeClass('is-invalid')
        $("#info-ngay_sinh").text('')
    })
    $('#dia_chi').keydown(function() {
        $(this).removeClass('is-invalid')
        $("#info-dia_chi").text('')
    })
    $('#sdt').keydown(function() {
        $(this).removeClass('is-invalid')
        $("#info-sdt").text('')
    })
    $('#cccd').keydown(function() {
        $(this).removeClass('is-invalid')
        $("#info-cccd").text('')
    })
    $('#ten').keydown(function() {
        $(this).removeClass('is-invalid')
        $("#info-ten").text('')
    })
    $('#oldPassword').keydown(function() {
        $(this).removeClass('is-invalid')
        $("#info-oldPassword").text('')
    })
    $('#newPassword').keydown(function() {
        $(this).removeClass('is-invalid')
        $("#info-newPassword").text('')
    })
    $('#confirmPassword').keydown(function() {
        $(this).removeClass('is-invalid')
        $("#info-confirmPassword").text('')
    })
    $('#phong_ban_id').keydown(function() {
        $(this).removeClass('is-invalid')
        $("#info-phong_ban_id").text('')
    })
    $('#chuc_vu_id').keydown(function() {
        $(this).removeClass('is-invalid')
        $("#info-chuc_vu_id").text('')
    })
    $('#hinh_anh').keydown(function() {
        $("#info-hinh_anh").text('')
    })

    $('#addNewUser').click(function(e) {
        e.preventDefault();
        var email = $('#email').val()
        var ten = $('#ten').val()
        var gioi_tinh = $('#gioi_tinh').val()
        var ngay_sinh = $('#ngay_sinh').val()
        var dia_chi = $('#dia_chi').val()
        var sdt = $('#sdt').val()
        var cccd = $('#cccd').val()
        var phong_ban_id = $('#phong_ban_id').val()
        var chuc_vu_id = $('#chuc_vu_id').val()
        var type = "POST"
        var url = $(this).attr('data-url')
        $.ajax({
            type: type,
            url: url,
            data: {
                email: email,
                ten: ten,
                gioi_tinh: gioi_tinh,
                ngay_sinh: ngay_sinh,
                dia_chi: dia_chi,
                sdt: sdt,
                cccd: cccd,
                phong_ban_id: phong_ban_id,
                chuc_vu_id: chuc_vu_id,

            },
            dataType: 'json',
            success: function(response) {
                const { success } = response
                if (success) {
                    Swal.fire({
                        title: "Thêm mới thành công!",
                        icon: "success",
                        showConfirmButton: true,
                    })
                    $('#email').val('')
                    $('#ten').val('')
                    $('#gioi_tinh').val(1)
                    $('#ngay_sinh').val('')
                    $('#dia_chi').val('')
                    $('#sdt').val('')
                    $('#cccd').val('')
                    $('#phong_ban_id').val('')
                    $('#chuc_vu_id').val('')

                }
            },
            error: function(response) {
                var errObj = jQuery.parseJSON(response.responseText)
                if (errObj.errors) {
                    const { email, ten, gioi_tinh, ngay_sinh, dia_chi, sdt, cccd, phong_ban_id, chuc_vu_id } = errObj.errors
                    if (email) {
                        $("#email").addClass("is-invalid")
                        $("#info-email").text(email)
                    }
                    if (ten) {
                        $("#ten").addClass("is-invalid")
                        $("#info-ten").text(ten)
                    }
                    if (gioi_tinh) {
                        $("#gioi_tinh").addClass("is-invalid")
                        $("#info-gioi_tinh").text(gioi_tinh)
                    }
                    if (ngay_sinh) {
                        $("#ngay_sinh").addClass("is-invalid")
                        $("#info-ngay_sinh").text(ngay_sinh)
                    }
                    if (dia_chi) {
                        $("#dia_chi").addClass("is-invalid")
                        $("#info-dia_chi").text(dia_chi)
                    }
                    if (sdt) {
                        $("#sdt").addClass("is-invalid")
                        $("#info-sdt").text(sdt)
                    }
                    if (cccd) {
                        $("#cccd").addClass("is-invalid")
                        $("#info-cccd").text(cccd)
                    }
                    if (phong_ban_id) {
                        $("#phong_ban_id").addClass("is-invalid")
                        $("#info-phong_ban_id").text(phong_ban_id)
                    }
                    if (chuc_vu_id) {
                        $("#chuc_vu_id").addClass("is-invalid")
                        $("#info-chuc_vu_id").text(chuc_vu_id)
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
    })

    $('#editUser').click(function(e) {
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
                var ten = $('#ten').val()
                var email = $('#email').val()
                var gioi_tinh = $('#gioi_tinh').val()
                var ngay_sinh = $('#ngay_sinh').val()
                var dia_chi = $('#dia_chi').val()
                var sdt = $('#sdt').val()
                var cccd = $('#cccd').val()
                var phong_ban_id = $('#phong_ban_id').val()
                var chuc_vu_id = $('#chuc_vu_id').val()
                var type = "POST"
                var url = $(this).attr('data-url')
                $.ajax({
                    type: type,
                    url: url,
                    data: {
                        ten: ten,
                        email: email,
                        gioi_tinh: gioi_tinh,
                        ngay_sinh: ngay_sinh,
                        dia_chi: dia_chi,
                        sdt: sdt,
                        cccd: cccd,
                        phong_ban_id: phong_ban_id,
                        chuc_vu_id: chuc_vu_id,
                    },
                    dataType: 'json',
                    success: function(response) {
                        const { success } = response
                        if (success) {
                            Swal.fire({
                                title: "Cập nhật thành công!",
                                icon: "success",
                                showConfirmButton: true,
                            })
                        }
                    },
                    error: function(response) {
                        var errObj = jQuery.parseJSON(response.responseText)
                        if (errObj.errors) {
                            const { email, ten, gioi_tinh, ngay_sinh, dia_chi, sdt, cccd, phong_ban_id, chuc_vu_id } = errObj.errors
                            if (email) {
                                $("#email").addClass("is-invalid")
                                $("#info-email").text(email)
                            }
                            if (ten) {
                                $("#ten").addClass("is-invalid")
                                $("#info-ten").text(ten)
                            }
                            if (gioi_tinh) {
                                $("#gioi_tinh").addClass("is-invalid")
                                $("#info-gioi_tinh").text(gioi_tinh)
                            }
                            if (ngay_sinh) {
                                $("#ngay_sinh").addClass("is-invalid")
                                $("#info-ngay_sinh").text(ngay_sinh)
                            }
                            if (dia_chi) {
                                $("#dia_chi").addClass("is-invalid")
                                $("#info-dia_chi").text(dia_chi)
                            }
                            if (sdt) {
                                $("#sdt").addClass("is-invalid")
                                $("#info-sdt").text(sdt)
                            }
                            if (cccd) {
                                $("#cccd").addClass("is-invalid")
                                $("#info-cccd").text(cccd)
                            }
                            if (phong_ban_id) {
                                $("#phong_ban_id").addClass("is-invalid")
                                $("#info-phong_ban_id").text(phong_ban_id)
                            }
                            if (chuc_vu_id) {
                                $("#chuc_vu_id").addClass("is-invalid")
                                $("#info-chuc_vu_id").text(chuc_vu_id)
                            }
                        }
                    }
                })
            }
        })
    })


    $('#addNewPhongBan').click(function(e) {
        e.preventDefault();
        var data = $("#form-add-pb").serialize()
        var type = 'POST';
        var url = $(this).attr("data-url");
        $.ajax({
            type: type,
            url: url,
            data: data,
            success: function(response) {
                const { success, data } = response
                if (success) {
                    Swal.fire({
                        title: "Thêm mới thành công!",
                        icon: "success",
                        showConfirmButton: true
                    }).then((result) => {
                        if (result.isConfirmed) {
                            location.reload();
                        }
                    })
                }
            },
            error: function(response) {
                var errObj = jQuery.parseJSON(response.responseText)
                if (errObj.errors) {
                    const { ma_phong_ban, ten } = errObj.errors
                    if (ten) {
                        $("#ma_phong_ban").addClass("is-invalid")
                        $("#info-ma_phong_ban").text(ma_phong_ban)
                    }
                    if (ten) {
                        $("#ten").addClass("is-invalid")
                        $("#info-ten").text(ten)
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
    })

    $('#addNewChucVu').click(function(e) {
        e.preventDefault();
        var data = $("#form-add-cv").serialize()
        var type = 'POST';
        var url = $(this).attr("data-url");
        $.ajax({
            type: type,
            url: url,
            data: data,
            success: function(response) {
                const { success, data } = response
                if (success) {
                    Swal.fire({
                        title: "Thêm mới thành công!",
                        icon: "success",
                        showConfirmButton: true
                    }).then((result) => {
                        if (result.isConfirmed) {
                            location.reload();
                        }
                    })
                }
            },
            error: function(response) {
                var errObj = jQuery.parseJSON(response.responseText)
                if (errObj.errors) {
                    const { ma_chuc_vu, ten } = errObj.errors
                    if (ma_chuc_vu) {
                        $("#ma_chuc_vu").addClass("is-invalid")
                        $("#info-ma_chuc_vu").text(ma_chuc_vu)
                    }
                    if (ten) {
                        $("#ten").addClass("is-invalid")
                        $("#info-ten").text(ten)
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
    })

    $('#resetPassword').click(function(e) {
        e.preventDefault();
        Swal.fire({
            title: 'Xác nhận lấy lại mật khẩu!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Có!',
            cancelButtonText: 'Không!',
        }).then((result) => {
            var type = 'GET';
            var url = $(this).attr("data-url");
            $.ajax({
                type: type,
                url: url,
                success: function(response) {
                    const { success, data } = response
                    if (success) {
                        Swal.fire({
                            title: "Mật khẩu đã được đặt lại!",
                            icon: "success",
                            showConfirmButton: true
                        })
                    } else {
                        Swal.fire({
                            title: "Lỗi!",
                            icon: "error",
                            showConfirmButton: true
                        })
                    }
                },
                error: function(response) {
                    Swal.fire({
                        title: "Lỗi!",
                        icon: "error",
                        showConfirmButton: true
                    })
                }
            })
        })
    })

    $('#changePassword').click(function(e) {
        e.preventDefault();
        Swal.fire({
            title: 'Xác nhận đổi lại mật khẩu!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Có!',
            cancelButtonText: 'Không!',
        }).then((result) => {
            if (result.isConfirmed) {
                var password = $('#oldPassword').val()
                var newPassword = $('#newPassword').val()
                var confirmPassword = $('#confirmPassword').val()
                var type = "POST"
                var url = $(this).attr('data-url')
                $.ajax({
                    type: type,
                    url: url,
                    data: {
                        oldPassword: password,
                        password: newPassword,
                        password_confirmation: confirmPassword,
                    },
                    dataType: 'json',
                    success: function(response) {
                        const { success, isOld, isNew } = response
                        if (success && !isOld && !isNew) {
                            Swal.fire({
                                title: "Đổi mật khẩu thành công!",
                                icon: "success",
                                showConfirmButton: true,
                            })
                            $("#oldPassword").val("")
                            $("#newPassword").val("")
                            $("#confirmPassword").val("")
                        } else if (!success && isOld) {
                            $("#oldPassword").addClass("is-invalid")
                            $("#info-oldPassword").text(isOld)
                        } else if (!success && isNew) {
                            $("#newPassword").addClass("is-invalid")
                            $("#info-newPassword").text(isNew)
                        } else {
                            Swal.fire({
                                title: "Lỗi!",
                                icon: "error",
                                showConfirmButton: true,
                            })
                        }
                    },
                    error: function(response) {
                        var errObj = jQuery.parseJSON(response.responseText)
                        console.log(errObj)
                        if (errObj.errors) {
                            const { oldPassword, password, password_confirmation } = errObj.errors
                            if (oldPassword) {
                                $("#oldPassword").addClass("is-invalid")
                                $("#info-oldPassword").text(oldPassword)
                            }
                            if (password) {
                                $("#newPassword").addClass("is-invalid")
                                $("#info-newPassword").text(password)
                            }
                            if (password_confirmation) {
                                $("#confirmPassword").addClass("is-invalid")
                                $("#info-confirmPassword").text(password_confirmation)
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

});