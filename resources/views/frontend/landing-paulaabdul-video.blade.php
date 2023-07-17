@extends('layouts.app')
@section('title', 'Online Psychics | Paula Abdul')

@section('content')
<landing_paulaabdul_video
    :user="{{json_encode(\Illuminate\Support\Facades\Auth::user())}}"
    :guest="{{json_encode(\Illuminate\Support\Facades\Auth::guest())}}"
    :top_psychics="{{json_encode($top_psychics)}}"
    :top_rated_psychics="{{json_encode($top_rated_psychics)}}"
    :reviews="{{json_encode($reviews)}}"/>
@endsection