<form id="updateForm" method="POST" enctype="multipart/form-data" action="{{route('services.update',$service->id)}}">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="name" class="form-control-label">الصورة</label>
        <input type="file" id="testDrop" class="dropify" name="image" data-default-file="{{$service->image}}"/>
    </div>
    <input type="hidden" value="{{$service->id}}" name="id">

    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label for="title" class="form-control-label">العنوان</label>
                <input type="text" class="form-control" name="title" value="{{$service->title}}">
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="sub_title" class="form-control-label">العنوان الفرعي</label>
                <input type="text" class="form-control" name="sub_title" value="{{$service->sub_title}}">
            </div>
        </div>
        <div class="col-12">
            <div class="form-group">
                <label for="desc" class="form-control-label">وصف الخدمة</label>
                <textarea rows="3" class="form-control" name="desc" placeholder="شرح ووصف ما يتم توفيره في الخدمة">{{$service->desc}}</textarea>
            </div>
        </div>
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
        <button type="submit" class="btn btn-success" id="updateButton">تعديل</button>
    </div>
</form>
<script>
    $('.dropify').dropify()
</script>

