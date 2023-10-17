<div class="slideBar">
    <div class="iconHomeNav">
        <div class="iconHome">
            <a href="{{route('homepage')}}" class=""><i class="fa-solid fa-house"></i></a>
        </div>
        <div class="iconHome">
            <a href="{{route('profile')}}"><i class="fa-solid fa-user"></i></a>
        </div>
        <div class="iconHome">
            <a href="{{route('buyPoints')}}"><i class="fa-solid fa-cart-plus"></i></a>
        </div>
        <div class="iconHome" id="messageDiv">
            <a href="{{route('messagesIndex')}}"><i class="fa-solid fa-message"></i></a>
            <?php $notiy = DB::table('notifications')->where('user_id',auth()->user()->id)->where('seen','0')->get();?>
            @if($notiy->count() > 0)
            <span class="position-absolute start-100 translate-middle badge rounded-pill bg-danger">
                {{ $notiy->count() }}
            </span>
            @endif
        </div>
        <div class="iconHome">
            <a href="{{route('logout')}}"><i class="fa-solid fa-arrow-right-from-bracket"></i></a>
        </div>
    </div>
</div>

<script src="{{asset('assets/site/JS')}}/jquery-3.6.0.min.js"></script>

<script>
    // var auto_refresh = setInterval(
    //     function () {
    //        $('#messageDiv').reload();
    //     }, 5000); // refresh every 10000 milliseconds

    // function autoRefresh_div() {
    //     $("#messageDiv").();
    // }
    // setInterval(autoRefresh_div, 5000); // every 5 seconds
    // autoRefresh_div(); // on load
</script>
