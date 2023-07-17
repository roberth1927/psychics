<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-70981211-10"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-70981211-10');
    </script>

    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-MJX4LDW');
    </script>
    <!-- End Google Tag Manager -->
    <meta charset="utf-8">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0,user-scalable=no">
    <meta name="theme-color" content="#A163C1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @section('metas')
    <title>@yield('title')Psychics1on1</title>
    <link rel="shortcut icon" type="image/png" href="/images/site-images/favicon.png">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ env('APP_URL') }}/images/pwa/logo152.png" />
    <!-- Scripts -->
    <script rel="preload" as="script" src="{{ asset('frontend/js/app.js') }}" defer></script>

    <!-- Web Manifest -->
    <link rel="manifest" href="{{ env('APP_URL') }}/manifest.json">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="preload" as="style" onload="this.rel = 'stylesheet'" href="https://fonts.googleapis.com/css?family=Montserrat:500&display=swap">

    <!-- Styles -->
    <link rel="preload" as="style" onload="this.rel = 'stylesheet'" href="https://cdn.jsdelivr.net/npm/@mdi/font@5.x/css/materialdesignicons.min.css">
    <link rel="preload" as="style" onload="this.rel = 'stylesheet'" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">
    <link rel="preload" as="style" onload="this.rel = 'stylesheet'" href="{{ asset('frontend/css/app.css') }}">
    <link rel="preload" as="style" onload="this.rel = 'stylesheet'" href="{{ asset('css/custom_splash.css') }}">
    <link rel="preload" as="style" onload="this.rel = 'stylesheet'" href="{{ asset('css/main-styles-splash.css') }}">
    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
        var Tawk_API = Tawk_API || {},
            Tawk_LoadStart = new Date();
        (function() {
            var s1 = document.createElement("script"),
                s0 = document.getElementsByTagName("script")[0];
            s1.async = true;
            s1.src = 'https://embed.tawk.to/5e1762b027773e0d832cbc32/default';
            s1.charset = 'UTF-8';
            s1.setAttribute('crossorigin', '*');
            s0.parentNode.insertBefore(s1, s0);
        })();
    </script>
    <!--End of Tawk.to Script-->
    <!--Start Service Worker Script-->
    <script type="text/javascript">
        if ('serviceWorker' in navigator) {
            window.addEventListener('load', function() {
                navigator.serviceWorker.register("{{ asset('/service-worker.js') }}").then(function(registration) {
                    // Registration was successful
                    console.log('ServiceWorker registration successful with scope: ', registration.scope);
                }, function(err) {
                    // registration failed
                    console.log('ServiceWorker registration failed: ', err);
                });
            });
        }
    </script>
    <!--End of Service Worker Script-->
    <script rel="preload" as="script" src="https://www.google.com/recaptcha/api.js?render={{ env('RECAPTCHA_SITE_KEY') }}"></script>

    <link rel="preload" as="style" onload="this.rel = 'stylesheet'" href="{{ asset('css/style.css') }}">
    <link rel="preload" as="style" onload="this.rel = 'stylesheet'" href="{{ asset('css/faq-style.css') }}">
    <style>
        .sticky-top{
            font-size: 15px;
            font-weight: bolder;
            color: #ffffff;
            line-height: 30px;
        }
        /* .content{
            margin-top: 30px;
        } */
    </style>
</head>

<body>
    <noscript>You need to enable JavaScript to run this app.</noscript>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MJX4LDW" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <div id="app">

        <v-app light>
            <!-- <section class="top-sticky">
                <a href="https://www.psychics1on1.com/search?ability=tarot-card-reading">
                    <div class="container p-0">
                        <div class="row">
                            <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12 sticky-top">
                                $10 Free With Your First Reading
                            </div>
                        </div>
                    </div>
                </a>
            </section> -->
            <div class="container--fluid p-0 content">
                @yield('content')
            </div>
            <div class="container--fluid p-0">
                <p-footer :guest="{{json_encode(\Illuminate\Support\Facades\Auth::guest())}}"></p-footer>
            </div>
        </v-app>

    </div>

</body>

</html>