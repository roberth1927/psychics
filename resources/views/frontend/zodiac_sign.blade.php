@extends('layouts.app')
@section('metas')
@parent
<link rel="canonical" href="https://www.psychics1on1.com">
<meta name="keywords" content="zodiac, the zodiac">
<meta name="description" content="Learn more about the {{ $horoscope->slug }} zodiac sign and get personal weekly horoscopes delivered to you now!">
@endsection
@section('title', $horoscope->name . ' | Free Horoscope Readings | Zodiac Signs | ')
@section('content')

<zodiac_sign :horoscope="{{json_encode($horoscope)}}" :weekhoroscope="{{$info}}" :datetoday="{{$datetoday}}" 
  :country_all="{{$country_all}}" />

@endsection
