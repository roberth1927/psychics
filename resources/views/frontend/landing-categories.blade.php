@extends('layouts.app-landing-tarot')
@section('title', 'Online Psychics | Top-Rated Online Psychics at ')

@section('content')
<tarot-reading :psychics="{{json_encode($psychics)}}" 
    :category_slug="{{json_encode($category_slug)}}"
    :user="{{json_encode(\Illuminate\Support\Facades\Auth::user())}}"
    :seo_ability="{{json_encode($seo_ability)}}"/>
@endsection