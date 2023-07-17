<?php

namespace App\Http\Controllers;


class SeoController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('verifyphone');
        $this->middleware('verifield');
    }

    public function topRatedOnlinePsychics()
    {
        return view('frontend.seo.topRatedOnlinePsychics');
    }

    public function psychicsThatAcceptPaypal()
    {
        return view('frontend.seo.psychicsThatAcceptPaypal');
    }

    public function callWithAPsychic()
    {
        return view('frontend.seo.callWithAPsychic');
    }

    public function clairvoyantChat()
    {
        return view('frontend.seo.clairvoyantChat');
    }

    public function astrologyReadingOnline()
    {
        return view('frontend.seo.astrologyReadingOnline');
    }

    public function lovePsychicOnline()
    {
        return view('frontend.seo.lovePsychicOnline');
    }

    public function onlineLovePsychicReadingFree()
    {
        return view('frontend.seo.onlineLovePsychicReadingFree');
    }

    public function onlinePsychicFreeReading()
    {
        return view('frontend.seo.onlinePsychicFreeReading');
    }

    public function howToTalkToAPsychicForFree()
    {
        return view('frontend.seo.howToTalkToAPsychicForFree');
    }

    public function palmReadingOnlineFree()
    {
        return view('frontend.seo.palmReadingOnlineFree');
    }

    public function spiritualHealer()
    {
        return view('frontend.seo.spiritualHealer');
    }

    public function tarotPsychicReadings()
    {
        return view('frontend.seo.tarotPsychicReadings');
    }

    public function videoPsychic()
    {
        return view('frontend.seo.videoPsychic');
    }

    public function chakraPsychic()
    {
        return view('frontend.seo.chakraPsychic');
    }

    public function auraPsychic()
    {
        return view('frontend.seo.auraPsychic');
    }

    public function mostGiftedPsychics()
    {
        return view('frontend.seo.mostGiftedPsychics');
    }

    public function physicAdvisor()
    {
        return view('frontend.seo.physicAdvisor');
    }

    public function psychicBlog()
    {
        return view('frontend.seo.psychicBlog');
    }
}
