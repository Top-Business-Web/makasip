<form id="addForm" class="addForm" method="POST" enctype="multipart/form-data" action="{{route('clients.store')}}">
    @csrf

    <div class="form-group">
        <label for="name" class="form-control-label">لوجو</label>
        <input type="file" class="dropify" name="image" data-default-file="{{asset('assets/uploads/empty.png')}}"
               accept="image/png,image/svg,image/webp, image/gif, image/jpeg,image/jpg">
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
        <button type="submit" class="btn btn-primary" id="addButton">اضافة</button>
    </div>
</form>
<script>
    $('.dropify').dropify()
</script>
