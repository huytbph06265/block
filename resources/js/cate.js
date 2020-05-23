
    $(document).ready(function () {
        $("#table_post").DataTable({
            processing: true,
            serverSide: true,
            paging: true,
            ordering: true,
            filter: true,
            ajax: {
                url: "/admin/postData",
                dataType: "json",
                type: "POST",
                data:  {_token: $('meta[name="csrf-token"]').attr('content')}
            },
            columns: [
                {data: 'id', 'class': 'text-center'},
                {data: 'id', 'class': 'text-center'},
                {data: 'id', 'class': 'text-center'},
                {data: 'id', 'class': 'text-center'},
                {data: 'id', 'class': 'text-center'},
                {data: 'id', 'class': 'text-center'},
                {data: 'id', 'class': 'text-center'},
            ],
            columnDefs: [
                {
                    targets:0 , render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },
                {
                    targets: 1, render: function (value, type, object, meta) {
                        console.log(object)
                        return object.title
                    }
                },
                {
                    targets: 2, render: function (value, type, object, meta) {
                        return object.category['name'];
                    }
                },
                {
                    targets: 3, render: function (value, type, object, meta) {
                        return object.user['name'];
                    }
                },
                {
                    targets: 4, render: function (value, type, object, meta) {
                        return '<img name="picture" id="imageTarget" class="img-responsive" src="/'+object.image+'" width="100%" required="" aria-required="true">';
                    }
                },
                {
                    targets: 5, render: function (value, type, object, meta) {
                        return object.summary;
                    }
                },
                {
                    targets: 6, render: function (value, type, object, meta) {
                        return object.publish_date;
                    }
                },
                {
                    targets: 7, render: function (value, type, object, meta) {
                        return object.view;
                    }
                },
                {
                    targets: 8, render: function (value, type, object, meta) {
                        return object.update == 0 ? '' : '<button type="button" name="edit" id="'+object.id+'" class="edit btn btn-primary btn-sm">Edit</button>'
                               object.delete == 0 ? '' : '<button type="button" name="delete" id="'+object.id+'" class="delete btn btn-danger btn-sm">Delete</button>';
                    }
                },
            ],
            responsive: true,
            searching: true,
            length: 5,
            // dom: "<'row'<'col-sm-12'tr>>\n\t\t\t<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 dataTables_pager'lp>>",
            lengthMenu: [5, 10, 25, 50],
            pageLength: 10,
        });
    })

    $("#create_post").click(function () {
    $('#formModal').modal('show');
    $("#form_post")[0].reset();
    $('#action').val('add');
    $('#action_button').val('add');
});

    $(document).on('click', '.edit', function () {
    var id = $(this).attr('id');
    console.log(id);
    $("#success").html('');
    $.ajax({
        url:"post/edit/"+id,
        dataType:"json",
        success:function (html) {
            $("")
            $("#title").val(html.data.title);
            $("#cate").val(html.data.category['name']);
            $("#author").val(html.data.user['name']);
            $("#summary").val(html.data.summary);
            $("#publish_date").val(html.data.publish_date);
            $("#content").val(html.data.content);
            $("#hidden_id").val(html.data.id);
            $("#imageTarget").attr("src","/"+html.data.image);
            $("#h").attr("src","/"+html.data.image);
            $("#formModal").modal('show');
            $("#action").val('edit');
            $("#action_button").val('edit');
        }
    })
})

    $("#form_post").on('submit', function (event) {
    event.preventDefault();
    if ($('#action').val() == 'add')
    {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "post/add",
            method: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            dataType: "json",
            success:function (data) {
                data._token = "{{ csrf_token() }}";
                var html='';
                if(data.success)
                {
                    html = '<div class="alert alert-success">' + data.success + '</div>'
                    $("#form_post")[0].reset();
                    $("#table_post").DataTable().ajax.reload();
                    $("#success").html(html);
                }
            }
        })
    }
    if($("#action").val() == 'edit')
    {
        var id = $("#hidden_id").val();
        $.ajax({
            url:"post/edit/"+id,
            method: "POST",
            data:new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            dataType:"json",
            success:function (data) {
                var html='';
                if(data.success){
                    html = '<div class="alert alert-success">' + data.success + '</div>'
                    $("#form_post")[0].reset();
                    $("#table_post").DataTable().ajax.reload();
                    $("#success").html(html);
                }
            }
        })
    }
})

    $(document).on('click','.delete', function () {
        var id = $(this).attr('id');
        swal({
            title: "Cảnh báo",
            text: "Bạn có chắc chắn muốn xoá không?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url:"post/detroy/"+id,
                        success:function (data) {
                            var html='';
                            html = '<strong>Well done!</strong> Xóa thành công.'
                            $("#table_post").DataTable().ajax.reload();
                            $("#msg").html(html);
                        }
                    })
                }
            });
    })

    $(document).ready(function () {
        function getBase64(file, selector) {
            var reader = new FileReader();
            reader.readAsDataURL(file);
            reader.onload = function () {
                $(selector).attr('src', reader.result);
            };
            reader.onerror = function (error) {
                console.log('Error: ', error);
            };
        }

        var img = document.querySelector('#image');
        img.onchange = function () {
            var file = this.files[0];

            if (file == undefined) {
                $('#imageTarget').attr('src', "{{asset('/admin/dist/img/photo1.png')}}");
            } else {
                getBase64(file, '#h');
            }
        }
    });

    $("#form_post").validate({
        rules:{
            title:{
                required: true,
                minlength: 10
            },
            publish_date:{
                required: true,
                dateISO: true,

            },
            summary:{
                required: true,
                minlength: 10
            },
            content:{
                required: true,
                minlength: 10
            },
        },
        messages:{
            title: {
                required: "Tiêu đề không được bỏ trống!",
                minlength: "Tiêu đề phải trên 10 kí tự!",
            },
            publish_date:{
                required: "Ngày công khai không được bỏ trống!",
            },
            summary: {
                required: "Tóm tắt không được bỏ trống!",
                minlength: "Tóm tắt phải trên 10 kí tự!",
            },
            content:{
                required: "Nội dung không được bỏ trống!",
                minlength: "Nội dung phải trên 10 kí tự!",
            },
        }
    })




