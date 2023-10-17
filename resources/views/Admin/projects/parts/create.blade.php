<form id="addForm" class="addForm" method="POST" enctype="multipart/form-data" action="{{route('projects.store')}}">
    @csrf

    <div class="form-group">
        <label for="name" class="form-control-label">صورة او فيديو</label>
        <input type="file" class="dropify" name="image" data-default-file="{{asset('assets/uploads/empty.png')}}"
               accept="image/png,image/svg,image/webp, image/gif, image/jpeg,image/jpg,video/*"/>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="form-group">
                <label for="title" class="form-control-label">الخدمة</label>
                <select class="form-control" data-placeholder="Choose Service" name="service_id">
                    @foreach($services as $service)
                        <option value="{{$service->id}}">{{$service->title}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
        <button type="submit" class="btn btn-primary" id="addButton">اضافة</button>
    </div>
</form>
<script>
    $('.dropify').dropify()
</script>
