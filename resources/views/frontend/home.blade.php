@extends('layouts.app')
@section('metas')
@parent
<link rel="canonical" href="https://www.psychics1on1.com">
<meta name="description" content="The clarity you seek on love, success, and life is a click away with Psychics1on1. Text, call, or video chat with top-rated online psychics in your area.">
@endsection
@section('title', 'Top-Rated Online Psychics and Mediums | ')
@section('content')

<home-list :guest="{{json_encode(\Illuminate\Support\Facades\Auth::guest())}}" :user="{{json_encode(\Illuminate\Support\Facades\Auth::user())}}" :unsubscribe="{{json_encode($unsubscribe)}}" 
    :reviews="{{json_encode($reviews)}}" />
@endsection

