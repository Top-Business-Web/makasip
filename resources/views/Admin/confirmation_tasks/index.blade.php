@extends('Admin/layouts/master')

@section('title')
    {{ $setting->title ?? '' }} | تأكيد الطلبات
@endsection
@section('page_name')
    تأكيد الطلبات
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">تأكيد الطلبات</h3>
                    <p class="text-red mt-2" style="text-align: center; font-weight: bold;">
                        ملحوظة: يرجى التأكد من الصورة قبل تأكيد الطلب، لأنه عندما يتم تأكيد الطلب، ستحول النقاط إلى صاحب
                        الطلب ويتم حذف الطلب.
                    </p>
                    {{-- <div class="">
                        <button class="btn btn-secondary btn-icon text-white addBtn">
									<span>
										<i class="fe fe-plus"></i>
									</span> اضافة جديد
                        </button>
                    </div> --}}
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <!--begin::Table-->
                        <table class="table table-striped table-bordered text-nowrap w-100" id="dataTable">
                            <thead>
                                <tr class="fw-bolder text-muted bg-light">
                                    <th class="min-w-25px">#</th>
                                    <th class="min-w-50px">الصورة</th>
                                    <th class="min-w-50px">مستخدم</th>
                                    <th class="min-w-50px">موقع</th>
                                    <th class="min-w-125px">الحالة</th>
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

        <!-- Edit MODAL -->
        <div class="modal fade bd-example-modal-lg" id="editOrCreate" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="example-Modal3">بيانات الصورة</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="modal-body">

                    </div>
                </div>
            </div>
        </div>
        <!-- Edit MODAL CLOSED -->
    </div>
    @include('Admin/layouts/myAjaxHelper')
    <script src="https://cdn.ckeditor.com/ckeditor5/12.0.0/classic/ckeditor.js"></script>
@endsection
@section('ajaxCalls')
    <script>
        var columns = [{
                data: 'id',
                name: 'id'
            },
            {
                data: 'image',
                name: 'image'
            },
            {
                data: 'user_id',
                name: 'user_id'
            },
            {
                data: 'site_id',
                name: 'site_id'
            },
            {
                data: 'status',
                name: 'status'
            },
            {
                data: 'action',
                name: 'action',
                orderable: false,
                searchable: false
            },
        ]
        showData('{{ route('confirmation_tasks.index') }}', columns);
        // Delete Using Ajax
        deleteScript('{{ route('confirmation_tasks.destroy', ':id') }}');

        $(document).on('change', 'select[name="status"]', function() {
            var newStatus = $(this).val();
            var recordId = $(this).attr('data-record-id');
            var userId = $(this).attr('data-user-id');
            var siteId = $(this).attr('data-site-id');

            $.ajax({
                url: '{{ route('changeStatus') }}',
                type: 'POST',
                data: {
                    status: newStatus,
                    id: recordId,
                    user: userId,
                    site: siteId,
                    _token: "{{ csrf_token() }}"
                },
                success: function(data) {
                    if (data.status === 200 && newStatus == 'confirmed') {
                        toastr.success('تم تأكيد طلب بنجاح');
                        setTimeout(function() {
                            location.reload();
                        }, 3000);
                    }
                    else {
                        toastr.success('لم يتم تأكيد الطلب');
                    }
                },
                error: function(error) {
                    console.error('Status update failed');
                }
            });
        });
    </script>
@endsection
