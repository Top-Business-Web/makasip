@component('mail::message')
    @php
        $user=auth()->user();
    @endphp
    <h1>{{trans('site.make_point_money')}} </h1>
    <div class="form-group"><label>  {{trans('site.user_name')}}</label> : {{$user->user_name}} </div>
    <div class="form-group"><label>  {{trans('site.email')}}</label> : {{$user->email}} </div>
    <div class="form-group"><label>  {{trans('site.phone')}}</label> : {{$user->phone}} </div>


    @component('mail::panel')
        <div class="form-group"><label>  {{trans('site.balance')}}</label> :  {{$user->balance}} </div>
    @endcomponent

    <p>The allowed duration of the code is one hour from the time the message was sent</p>
@endcomponent
