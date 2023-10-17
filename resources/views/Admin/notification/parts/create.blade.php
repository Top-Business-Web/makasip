<div class="modal-body">
    <form id="addForm" class="addForm" method="POST" enctype="multipart/form-data"
          action="{{route('notifications.store')}}">
        @csrf
        <div class="form-group">
            <div class="row">
                <div class="col-6">
                    <label for="message" class="form-control-label">العنوان</label>
                    <input type="text" class="form-control" name="message">
                </div>
                <div class="col-6">
                    <label for="message" class="form-control-label">توجيه الاشعار</label>
                    <select class="form-control" name="type" id="getOption">
                        <option value="all">الكل</option>
                        <option value="user">مستخدم</option>
                    </select>
                </div>

                <div class="col-6 mt-5 d-none" id="select-user">
                    <label for="">حدد المستخدم</label>
                    <select class="form-control" name="user_id">
                        @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->user_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-12 mt-5">
                    <label for="body" class="form-control-label">الرسالة</label>
                    <textarea name="body" class="form-control" rows="10" cols="10"></textarea>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                <button type="submit" class="btn btn-primary" id="addButton">ارسال</button>
            </div>
        </div>
    </form>
</div>
<script>
    // Show Select Box Users when You Choose User
    $(document).ready(function () {
        $("select#getOption").change(function () {
            var selectedOption = $(this).find("option:selected").val();
            if (selectedOption == "user") {
                $('#select-user').removeClass('d-none');
            } else {
                $('#select-user').addClass('d-none');
            }
        });
    });
    // End Show Select Box Users when You Choose User

</script>

