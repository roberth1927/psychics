<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0,user-scalable=0">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('backend/js/app.js') }}" defer></script>

    <!-- Styles -->
	
    <link href="{{ asset('backend/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" rel="stylesheet">

</head>

<body class="body-dashboard">
<div id="app">
    <v-app light class="app_dashboard">
        <div class="container--fluid p-0">
            <div id="the_top_bar">
                <div class="layout-container">
                    <div class="row row-top-bar m-0">
                        <div class="col logo_container text-center" style="max-width: 268px;">
                            <a href="/dashboard">
                                <img src="/images/site-images/logo.png" class="logo" />
                            </a>
                        </div>

                        <div class="col" id="stats-row">
                            <div id="top-bar" class="row">
                                <div class="col-3 px-5">
                                    <div class="inner">
                        <span class="d-none d-md-block">
                            <span class="words">Total Earnings</span>
                            <span class="number  d-none d-md-block">$1,999</span>
                        </span>

                                        <span class="d-block d-sm-block d-md-none">
                            <span class="words">Earn</span>
                            <span class="number">$1.9k</span>


                        </span>

                                    </div>
                                </div>

                                <div class="col-3 px-5" style="border-left: solid 1px #C7C7C7;border-right: solid 1px #C7C7C7;">
                                    <div class="inner">
                                        <span class="words d-none d-md-block">Reviews</span>
                                        <span class="words d-block d-sm-block d-md-none">Favs</span>

                                        <span class="number">
                            <span class="d-none d-md-inline-block">6,300</span>
                            <span class="d-inline-block d-sm-inline-block d-md-none">6.3k</span>

                            <span class="up">
                                <i class="fas fa-sort-up"></i> <span>123</span>
                            </span>
                        </span>
                                    </div>
                                </div>

                                <div class="col-3 px-5">
                                    <div class="inner">
                                        <span class="words d-none d-md-block">Profile Views</span>
                                        <span class="words d-block d-sm-block d-md-none">Subs</span>
                                        <span class="number">
                            <span class="d-none d-md-inline-block">900</span>
                            <span class="d-inline-block d-sm-inline-block d-md-none">0.9k</span>

                            <span class="down">
                                <i class="fas fa-sort-down"></i> <span>3</span>
                            </span>
                        </span>

                                    </div>
                                </div>





                                <div class="col-3 pt-2">

                                    <div class="col-1">
                                        <a href="/chat">
                                            <i style="color: #8c9eff;" class="far fa-comments fa-2x"></i>
                                            <!-- <div  v-if="text_chat_notifications" class="text_notifications" ></div>-->
                                            <span class="badge badge-primary badge-pill">5</span>
                                        </a>
                                    </div>



                                    <v-menu offset-y left>
                                        <template v-slot:activator="{ on }">
                                            <a  v-on="on" class="ml-3">
                                                <div class="user_avatar_sm" style="background-image: url({{Auth::user()->userProfile->haedshot_path}})">

                                                </div>
                                            </a>
                                        </template>
                                        <v-card :min-width="300" :min-height="150">
                                            <v-list dense>
                                                <v-list-item href="/dashboard" dense>
                                                    <div><i class="fas fa-tachometer-alt fa-lg mr-3"></i> Dashboard</div>
                                                </v-list-item>
                                                <v-list-item href="/dashboard/post" dense>
                                                    <div><i class="fas fa-list fa-lg mr-3"></i> Posts</div>
                                                </v-list-item>
                                                <v-list-item href="/dashboard/post" dense>
                                                    <div><i class="fas fa-cog fa-lg mr-3"></i> Settings</div>
                                                </v-list-item>
                                                <v-list-item @click="" dense>
                                                    <div><i class="far fa-credit-card fa-lg mr-2"></i> Payment</div>
                                                </v-list-item>
                                                <v-list-item @click="" dense>
                                                    <div><i class="far fa-user fa-lg mr-3"></i> Profile</div>
                                                </v-list-item>


                                                <v-divider class="m-2"></v-divider>
                                                <v-list-item @click="logout()" dense>
                                                    <div ><i class="fas fa-power-off fa-lg mr-3"></i> Log Out</div>
                                                </v-list-item>

                                            </v-list>
                                        </v-card>
                                    </v-menu>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!--Navbar-->
                    <nav class="navbar" id="mobile-nav">

                        <a class="navbar-brand" href="/dashboard"> <img src="/images/site-images/logo.png" class="logo-menu" /> </a>


                        <button class="navbar-toggler toggler-example" type="button" data-toggle="collapse" data-target="#navbarSupportedContent1"
                                aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation" style="float: right; margin-top: 5px;"><span class="dark-blue-text"><i class="fas fa-bars fa-1x"></i></span></button>

                        <span style="float: right;  padding: 0.25rem 0.75rem; margin-top: 5px;">
                              <i class="sexy-icon-messages" style=""></i>
                            </span>
                    </nav>
                    <!--/.Navbar-->
                </div>

            </div>

            <!-- Collapsible content --><nav class="navbar" id="mobile-nav-2">
                <div class="collapse navbar-collapse" id="navbarSupportedContent1">

                    <!-- Links -->
                    <ul class="navbar-nav mr-auto">

                        <li class="nav-item">
                            <a href="/dashboard/profile">
                                <img src="{{ Auth::user()->userProfile->getHeadshotUrl() }}" id="mobile-profile">
                            </a>

                            <!-- <img src="https://via.placeholder.com/64X64" id="mobile-profile"> -->

                            <span style="font-weight: 600; font-size: 18px; color: #1F1E34;">{{Auth::user()->userProfile()->first()->name}}</span>

                            <i class="fas fa-times" data-toggle="collapse" data-target="#navbarSupportedContent1" style="float: right; font-size: 24px; position: relative; top: 20px; right: 15px; color: #1F1E34; cursor: pointer;"></i>

                            <div class="clearfix"></div>
                        </li>
                        <li class="nav-item">
                            <div id="mobile-under-profile">
                                <div class="row">
                                    <div class="col-6">
                                        <a href="">
                                            <i class="sexy-icon-messages"></i><br>
                                            Notifications
                                        </a>
                                    </div>
                                    <div class="col-6">
                                        <a href="/dashboard/profile">
                                            <i class="sexy-icon-pencil"></i><br>
                                            Edit Profile
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <dashboard-sidebar-menu></dashboard-sidebar-menu>

                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Accounts Settings</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Help Center</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" style="color: rgba(31, 30, 52, .6);">Logout</a>
                        </li>
                    </ul>
                    <!-- Links -->

                </div></nav>
            <!-- Collapsible content -->

            <div class='linear-layout-wrapper'>
                <div id="dashboard-layout" class="layout-container" style="">
                    <div id="sidebar">
                        <div id="profile" class="text-center p-3 pb-1">
                            <div class="user_avatar_2x" style="background-image: url({{Auth::user()->userProfile->haedshot_path}})">
                                <div class="hover">
                                    <a href="/dashboard/profile">
                                        <i class="fas fa-camera mt-3"></i>
                                        <br>
                                        Update
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div id="under-profile" class="text-center pb-5">
                                <a href="/dashboard/profile" >
                                    <i class="fas fa-pencil-alt"></i><br>
                                    Edit Profile
                                </a>
                            </div>
                        </div>
                        {{-- <div id="profile">
                             <img src="{{ Auth::user()->userProfile->haedshot_path }}" />
                             <div class="hover">
                                 <a href="{{ Auth::user()->userProfile->profile_link }}">
                                     <br><br>
                                     <i class="fas fa-eye"></i>
                                     <br>
                                     Preview
                                 </a>

                                 <br><br>

                                 <a href="/dashboard/profile">
                                     <br><br>
                                     <i class="fas fa-camera"></i>
                                     <br>
                                     Change
                                 </a>
                             </div>
                         </div>--}}



                        <div id="sidebar-scroll-away" class="py-5">
                            <dashboard-sidebar-menu></dashboard-sidebar-menu>
                        </div>
                    </div>

                    <div id="main" class="p-lg-4">
                        <div>
                            @yield('content')
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </v-app>
</div>
</body>

</html>
