@extends('layouts.app')
@section('metas')
@parent
{{-- <link rel="canonical" href="https://www.psychics1on1.com/horoscope">
<meta name="keywords" content="zodiac, the zodiac">
<meta name="description" content="Select your zodiac sign for your free weekly horoscope delievered to you today!"> --}}
@endsection
{{-- @section('title', 'Free Horoscope Readings | Astrology, Zodiac Signs | ') --}}
@section('content')
<weekly-horoscope :blogs="{{ $blogs }}" ></weekly-horoscope>
@endsection