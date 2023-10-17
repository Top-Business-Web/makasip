<div class="modal-body">
    <form id="addForm" class="addForm" method="POST" enctype="multipart/form-data" action="{{route('siteType.store')}}" >
        @csrf
        <div class="form-group">
            <div class="row">
                <div class="col-md-3">
                    <label for="title_ar" class="form-control-label">العنوان (AR)</label>
                    <input type="text" class="form-control" name="title_ar" id="title_ar">
                </div>
                <div class="col-md-3">
                    <label for="title_en" class="form-control-label">العنوان (EN)</label>
                    <input type="text" class="form-control" name="title_en" id="title_en">
                </div>
                <div class="col-md-3">
                    <label for="main_word_ar" class="form-control-label">الكلمة الرئيسية (AR)</label>
                    <input type="text" class="form-control" name="main_word_ar" id="main_word_ar">
                </div>
                <div class="col-md-3">
                    <label for="main_word_en" class="form-control-label">الكلمة الرئيسية (EN)</label>
                    <input type="text" class="form-control" name="main_word_en" id="main_word_en">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="submain_word_ar" class="form-control-label">الكلمة الرئيسية الفرعية (AR)</label>
                    <input type="text" class="form-control" name="submain_word_ar" id="submain_word_ar">
                </div><div class="col-md-6">
                    <label for="submain_word_en" class="form-control-label">الكلمة الرئيسية الفرعية (EN)</label>
                    <input type="text" class="form-control" name="submain_word_en" id="submain_word_en">
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <label for="button_word_ar" class="form-control-label">عنوان الزر (AR)</label>
                    <input type="text" class="form-control" name="button_word_ar" id="button_word_ar">
                </div>
                <div class="col-md-3">
                    <label for="button_word_en" class="form-control-label">عنوان الزر (EN)</label>
                    <input type="text" class="form-control" name="button_word_en" id="button_word_en">
                </div>
                <div class="col-md-6">
                    <label for="time_out_seconds" class="form-control-label">المهلة بالثانية</label>
                    <input type="text" class="form-control" name="time_out_seconds" id="time_out_seconds">
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="form-label">الوصف (AR)</label>
                        <textarea rows="6" name="description_ar" id="editor">{!! ($row->desc_ar) ?? '' !!}</textarea>
                        <script>
                            ClassicEditor
                                .create(document.querySelector('#editor'))
                                .catch(error => {
                                    console.error(error);
                                });
                        </script>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="form-label">الوصف (EN)</label>
                        <textarea rows="6" name="description_en" id="editor1">{!! ($row->desc_ar) ?? '' !!}</textarea>
                        <script>
                            ClassicEditor
                                .create(document.querySelector('#editor1'))
                                .catch(error => {
                                    console.error(error);
                                });
                        </script>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
            <button type="submit" class="btn btn-primary" id="addButton">اضافة</button>
        </div>
    </form>
</div>

