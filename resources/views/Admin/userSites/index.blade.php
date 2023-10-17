@extends('Admin/layouts/master')

@section('title')
    {{($setting->title) ?? ''}} | اعلانات المستخدمين
@endsection
@section('page_name')
    اعلانات المستخدمين
@endsection
@section('content')

    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">اعلانات المستخدمين</h3>
                    <div class="text-muted">
                        يمكنك ( تفعيل \ الغاء تفعيل ) المنتج من خلال الضغط علي كلمة (مفعل \ غير مفعل)
                    </div>
                    <div class="">
                        @if($count)
                            <button class="btn btn-danger btn-icon text-white" data-toggle="modal"
                                    data-target="#deleteAllModal">
									<span>
										<i class="fa fa-trash"></i>
									</span> حذف الكل
                            </button>
                        @endif
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <!--begin::Table-->
                        <table class="table table-striped table-bordered text-nowrap w-100" id="dataTable">
                            <thead>
                            <tr class="fw-bolder text-muted bg-light">
                                <th class="min-w-25px">#</th>
                                <th class="min-w-50px">المستخدم</th>
                                <th class="min-w-50px">عنوان المنشور</th>
                                <th class="min-w-50px">نوع المنشور</th>
                                <th class="min-w-50px">الاجمالي المطلوب</th>
                                <th class="min-w-50px">النقاط لكل مشاهدة</th>
                                <th class="min-w-50px">الحالة</th>
                                <th class="min-w-50px rounded-end">العمليات</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!--Delete MODAL -->
        <div class="modal fade" id="delete_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">حذف بيانات</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input id="delete_id" name="id" type="hidden">
                        <p>هل انت متأكد من حذف البيانات التالية <span id="title" class="text-danger"></span>؟</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal" id="dismiss_delete_modal">
                            الغاء
                        </button>
                        <button type="button" class="btn btn-danger" id="delete_btn">حذف !</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- MODAL CLOSED -->

        <!--reject MODAL -->
        <div class="modal fade bd-example-modal-lg" id="rejectModal" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="example-Modal3">سبب الرفض</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="modal-body">

                    </div>
                </div>
            </div>
        </div>
    <!-- MODAL CLOSED -->

    <!--Delete All MODAL -->
    <div class="modal fade" id="deleteAllModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">حذف كل البيانات</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input id="delete_id" name="id" type="hidden">
                    <p>هل انت متأكد من حذف كل البيانات <span id="title" class="text-danger"></span>؟</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal" id="dismiss_delete_All_Modal">
                        اغلاق
                    </button>
                    <button type="button" class="btn btn-danger" id="deleteAll">حذف !</button>
                </div>
            </div>
        </div>
    </div>
    <!-- MODAL All CLOSED -->

    </div>
    @include('Admin/layouts/myAjaxHelper')
@endsection
@section('js')
    <script>
        var columns = [
            {data: 'id', name: 'id'},
            {data: 'user_id', name: 'user_id'},
            {data: 'title', name: 'title'},
            {data: 'site_type', name: 'site_type'},
            {data: 'total_clicks_limit', name: 'total_clicks_limit'},
            {data: 'points_for_click', name: 'points_for_click'},
            {data: 'status', name: 'status'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
        showData('{{route('allPosts.index')}}', columns);
        // Delete Using Ajax
        destroyScript('{{route('postDelete')}}');
    </script>
    <script>
        // Make Better Using Ajax
        $(document).on('click', '#deleteAll', function (event) {
            $.ajax({
                type: 'POST',
                url: "{{route('deleteAllSites')}}",
                success: function (data) {
                    if (data.success === true) {
                        $('#dataTable').DataTable().ajax.reload();
                        $("#dismiss_delete_All_Modal")[0].click();
                        toastr.success('تم حذف جميع الصفوف بنجاح')
                    }
                }
            });
        });

        // ِChange Status Using Ajax
        $(document).on('click', '.statusSpan', function (event) {
            var id = $(this).data("id");
            var user = $(this).data("user");
            $.ajax({
                type: 'POST',
                url: "{{route('siteActivation')}}",
                data: {
                    '_token': "{{csrf_token()}}",
                    'id': id,
                    'user': user
                },
                success: function (data) {
                    if (data.success === true) {
                        $('#dataTable').DataTable().ajax.reload();
                        toastr.success(data.message)
                    } else {
                        toastr.error('هناك خطأ ما ...')
                    }
                }
            });
        });


        function rejectModal(routeOfEdit){
            $(document).on('click', '.reject_modal', function () {
                var id = $(this).data('id')
                var url = routeOfEdit;
                url = url.replace(':id', id)
                $('#modal-body').html(loader)
                $('#rejectModal').modal('show')

                setTimeout(function () {
                    $('#modal-body').load(url)
                }, 500)
            })
        }

        function SendScript(){
            $(document).on('submit', 'Form#sendForm', function (e) {
                e.preventDefault();
                var formData = new FormData(this);
                var url = $('#sendForm').attr('action');
                $.ajax({
                    url: url,
                    type: 'POST',
                    data: formData,
                    beforeSend: function () {
                        $('#SendButton').html('<span class="spinner-border spinner-border-sm mr-2" ' +
                            ' ></span> <span style="margin-left: 4px;">انتظر ..</span>').attr('disabled', true);
                    },
                    success: function (data) {
                        $('#SendButton').html(`ارسال`).attr('disabled', false);
                        if (data.success === true) {
                            $('#dataTable').DataTable().ajax.reload();
                            toastr.success('تم الارسال بنجاح');
                        }

                        $('#rejectModal').modal('hide')
                    },
                    error: function (data) {
                        if (data.success === false) {
                            toastr.error('هناك خطأ ما ..');
                        } else
                            toastr.error('هناك خطأ ما ..');
                        $('#SendButton').html(`ارسال`).attr('disabled', false);
                    },//end error method

                    cache: false,
                    contentType: false,
                    processData: false
                });
            });
        }

        rejectModal('{{ route('resonRject',':id') }}');
        SendScript();

    </script>

@endsection

