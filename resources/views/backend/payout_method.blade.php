@extends('layouts.app-dashboard')
@section('content')



<div class="container container-gray-area p-0" style="background: #f0f0f7;">
    <p-payout-tab :payout_details="{{json_encode($payout_details)}}"
                  :countries="{{json_encode($countries)}}"
                  :years="{{json_encode($years)}}"
                  :country_all="{{json_encode($country_all)}}"
                  :states="{{json_encode($states)}}"
                  :cards="{{json_encode($methods)}}"
                  :payout_logs="{{json_encode($payout_logs)}}"
                  :name="{{json_encode($name)}}"
                  :user="{{Auth::user()}}">
    </p-payout-tab>
</div>

@endsection