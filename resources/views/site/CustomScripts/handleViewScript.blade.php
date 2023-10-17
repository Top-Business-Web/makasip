<script>
    $("#navbar-toggler").on("click", function() {
        $(".navTop").toggleClass("active")
    })
    var frameOfPage = $("#frame");
    // Attach the function to the click event of .myShareBtn
    $(".myShareBtn").click(function() {
        var siteId = $(this).attr('data-site-id');
        var userId = $(this).attr('data-user-id');
        $('#uploadImage').modal('show');

        // Add an event listener to the "Save" button within the modal
        $('#saveImage').click(function() {
            var image = $('#image')[0].files[0];
            var formData = new FormData();
            formData.append('image', image);
            formData.append('siteId', siteId); // Include siteId in the formData
            formData.append('userId', userId); // Include userId in the formData

            $.ajax({
                url: '{{ route('uploadImage') }}', // Replace with your Laravel route
                method: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(data) {
                    if (data.status === 200) {
                        toastr.success('{{ trans('site.your_request_has_been') }}');
                        setTimeout(function() {
                            location.reload();
                        }, 3000);
                    }
                },
                error: function(data) {
                    // Handle any errors
                    console.error(error);
                }
            });
        });
    });


    $('.StartBtn').on('click', function(e) {
        {{-- var time = {{@$siteType->time_out_seconds}}; --}}
        var time = 1;
        var elem = $(this);
        var url = $(this).attr('data-url');

        window.open(url, "_blank");

        setTimeout(function() {
            toastr.error('تخطيت الوقت المسموح .. برجاء المحاولة مره اخري', {
                timeout: 1500
            });
            setTimeout(function() {
                window.location.reload();
            }, 2000)
        }, {{ (@$siteType->time_out_seconds + 10) * 1000 }})

        var timerId = setInterval(countdown, 1000);

        function countdown() {
            if (time == -1) {
                // clearTimeout(timerId);
                elem.addClass('d-none');
                elem.next('button').removeClass('d-none');
            } else {
                elem.html(' @lang('site.Wait') ' + time);
                elem.prop('disabled', true);
                time--;
            }
        }
    })


    $(".shareBtn").click(function() {
        var url = $(this).attr('data-url'),
            siteId = $(this).attr('data-site-id');
        frameOfPage.attr("src", url);
        CheckView(siteId, frameOfPage.attr('src'));
    });


    function HideFrame(row_id, btn_src) {
        var frameSrc = frameOfPage.attr('src');
        $("#row" + row_id).fadeOut();
        if (frameSrc === btn_src) {
            frameOfPage.attr("src", '');
        }
        // toastr.success('تم تخطي المنشور');
    }

    function CheckView(site_id, frame_src) {
        setTimeout(ajaxStoreView, {{ @$siteType->time_out_seconds * 1000 }}); //10000 MS == 10 seconds
        function ajaxStoreView() {
            var frameSrc = frameOfPage.attr('src');
            if (frameSrc == frame_src) {
                //do AJAX
                $.ajax({
                    url: "{{ route('checkUserView') }}",
                    type: 'POST',
                    data: {
                        "site_id": site_id
                    },
                    success: function(data) {
                        if (data.status === 200) {
                            toastr.success(`تم اضافة ${data.points} نقطة لرصيدك`);
                            // window.location.href = data.btn_src;
                            HideFrame(data.row_id, data.btn_src);
                        } else {
                            toastr.error('هناك خطأ ما..');
                        }

                    },
                    error: function(data) {
                        if (data.status === 500) {
                            toastr.error('هناك خطأ ما..');
                        } else if (data.status === 422) {
                            var errors = $.parseJSON(data.responseText);
                            $.each(errors, function(key, value) {
                                if ($.isPlainObject(value)) {
                                    $.each(value, function(key, value) {
                                        toastr.error(value, key);
                                    });
                                }
                            });
                        } else {
                            toastr.error('هناك خطأ ما..');
                        }
                    }, //end error method
                });
            }

        }
    }
</script>