<div class="modal-body">
    <form id="updateForm" method="POST" enctype="multipart/form-data" action="{{ route('users.update',$user->id) }}" >
        @csrf
        @method('PUT')
        <input type="hidden" value="{{$user->id}}" name="id">
        <div class="form-group">
            <label for="name" class="form-label">{{ trans('site.change_account') }}</label>
            <input type="number" value="{{ $user->balance }}" name="balance" class="from-input"/>
        </div>
        <div>
            <button type="submit" class="btn btn-primary">تحديث</button>
        </div>
    </form>
</div>
<script>
    $('.dropify').dropify()
</script>
