<div class="modal-body">
    <form id="" class="" method="POST" action="" >
        @csrf
        @method('put')
        <div class="row">
            <div class="col-md-3">
                <label for="title_ar" class="form-control-label">العنوان (AR)</label>
                <input type="text" class="form-control" value="{{ $siteType->title_ar }}" name="title_ar" id="title_ar" disabled>
            </div>
            <div class="col-md-3">
                <label for="title_en" class="form-control-label">العنوان (EN)</label>
                <input type="text" class="form-control" value="{{ $siteType->title_en }}" name="title_en" id="title_en" disabled>
            </div>
            <div class="col-md-3">
                <label for="main_word_ar" class="form-control-label">الكلمة الرئيسية (AR)</label>
                <input type="text" class="form-control" value="{{ $siteType->main_word_ar }}" name="main_word_ar" id="main_word_ar" disabled>
            </div>
            <div class="col-md-3">
                <label for="main_word_en" class="form-control-label">الكلمة الرئيسية (EN)</label>
                <input type="text" class="form-control" value="{{ $siteType->main_word_en }}" name="main_word_en" id="main_word_en" disabled>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label for="submain_word_ar" class="form-control-label">الكلمة الرئيسية الفرعية (AR)</label>
                <input type="text" class="form-control" value="{{ $siteType->submain_word_ar }}" name="submain_word_ar" id="submain_word_ar" disabled>
            </div><div class="col-md-6">
                <label for="submain_word_en" class="form-control-label">الكلمة الرئيسية الفرعية (EN)</label>
                <input type="text" class="form-control" value="{{ $siteType->submain_word_en }}" name="submain_word_en" id="submain_word_en" disabled>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <label for="button_word_ar" class="form-control-label">عنوان الزر (AR)</label>
                <input type="text" class="form-control" value="{{ $siteType->button_word_ar }}" name="button_word_ar" id="button_word_ar" disabled>
            </div>
            <div class="col-md-3">
                <label for="button_word_en" class="form-control-label">عنوان الزر (EN)</label>
                <input type="text" class="form-control" value="{{ $siteType->button_word_en }}" name="button_word_en" id="button_word_en" disabled>
            </div>
            <div class="col-md-6">
                <label for="time_out_seconds" class="form-control-label">المهلة بالثانية</label>
                <input type="number" class="form-control" value="{{ $siteType->time_out_seconds }}" name="time_out_seconds" id="time_out_seconds" disabled>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label class="form-label">الوصف (AR)</label>
                    <textarea rows="6" name="description_ar" id="editor" disabled>{{ $siteType->description_ar }}</textarea>
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
                    <textarea rows="6" name="description_en" id="editor1" disabled="disabled">{{ $siteType->description_en }}</textarea>
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
    </form>
</div>
