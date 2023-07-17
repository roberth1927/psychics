@extends('layouts.app')
@section('metas')
@parent

<link rel="canonical" href="https://www.psychics1on1.com">
<meta name="description" content="Join our psychic community where you can access our top-rated psychics and receive secret knowledge and helpful life tips. Sign up today for free!">
@endsection
@section('title', 'Sign Up For Free! | ')

@section('content')

<signuppage  :country_all="{{json_encode($country_all)}}" :link_psychic="{{json_encode($link_psychic)}}"/>

@endsection