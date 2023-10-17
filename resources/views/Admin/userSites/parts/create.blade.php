<form id="sendForm" class="sendForm" method="POST" enctype="multipart/form-data" action="{{ route('reasonSend') }}">
    @csrf
    <input type="hidden" name="site_id" value="{{ $post->id }}">
    <input type="hidden" name="user_id" value="{{ $post->user_id }}">
    <div class="row">
        <div class="col-12">
            <div class="form-group">
                <label for="btn_title_ar" class="form-control-label">سبب الرفض</label>
                <textarea required rows="10" class="form-control" name="reason"></textarea>
            </div>
        </div>
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
        <button type="submit" class="btn btn-primary" id="SendButton">ارسال</button>
    </div>
</form>
<script>
    $('.dropify').dropify()
</script>

