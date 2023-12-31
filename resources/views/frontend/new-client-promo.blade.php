@extends('layouts.app')
@section('metas')
@parent
<link rel="canonical" href="https://www.psychics1on1.com/new-client-promo">
<meta name="description" content="Discover hundreds of top-rated online psychics and spiritual advisors at Psychics1on1™. Enjoy personal psychic readings online and get $5 off your first reading!">
@endsection
@section('title', 'Online Psychics | Top-Rated Online Psychics at ')
@section('content')

<new-client-promo :guest="{{json_encode(\Illuminate\Support\Facades\Auth::guest())}}" :user="{{json_encode(\Illuminate\Support\Facades\Auth::user())}}" />
@endsection

