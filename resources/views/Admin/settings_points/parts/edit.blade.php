<div class="modal-body">
    <form id="updateForm" method="POST" action="{{ route('settingPoints.update' , $settingPoint->id) }}">
        @csrf
        @method('PUT')
        <input type="hidden" value="{{ $settingPoint->id }}" name="id">
        <div class="form-group">
            <div class="row">
                <div class="col-md-6">
                    <label for="name" class="form-control-label">العنوان بالعربية</label>
                    <input type="text" class="form-control" value="{{ $settingPoint->title_ar }}" name="title_ar"/>
                </div>
                <div class="col-md-6">
                    <label for="name" class="form-control-label">العنوان بالانجليزية</label>
                    <input type="text" class="form-control" value="{{ $settingPoint->title_en }}" name="title_en"/>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        <label for="name" class="form-control-label">الوصف بالعربية</label>
                        <textarea rows="4" name="body_ar" class="form-control">{{ $settingPoint->body_ar }}</textarea>

                    </div>
                    <div class="col-md-6">
                        <label for="name" class="form-control-label">الوصف بالعربية</label>
                        <textarea rows="4" name="body_en" class="form-control">{{ $settingPoint->body_en }}</textarea>

                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
            <button type="submit" class="btn btn-success" id="updateButton">تحديث</button>
        </div>
    </form>
</div>

