<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml"
    xmlns:o="urn:schemas-microsoft-com:office:office">

<head>
    <meta charset="utf-8"> <!-- utf-8 works for most cases -->
    <meta name="viewport" content="width=device-width"> <!-- Forcing initial-scale shouldn't be necessary -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> <!-- Use the latest (edge) version of IE rendering engine -->
    <meta name="x-apple-disable-message-reformatting"> <!-- Disable auto-scale in iOS 10 Mail entirely -->
    <meta name="format-detection" content="telephone=no,address=no,email=no,date=no,url=no">
    <!-- Tell iOS not to automatically link certain text strings. -->
    <meta name="color-scheme" content="light">
    <meta name="supported-color-schemes" content="light">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600&display=swap" rel="stylesheet">
    <title></title> <!-- The title tag shows in email notifications, like Android 4.4. -->

    <!-- What it does: Makes background images in 72ppi Outlook render at correct size. -->
    <!--[if gte mso 9]>
          <xml>
              <o:OfficeDocumentSettings>
                  <o:AllowPNG/>
                  <o:PixelsPerInch>96</o:PixelsPerInch>
              </o:OfficeDocumentSettings>
          </xml>
          <![endif]-->

    <!-- Web Font / @font-face : BEGIN -->
    <!-- NOTE: If web fonts are not required, lines 23 - 41 can be safely removed. -->

    <!-- Desktop Outlook chokes on web font references and defaults to Times New Roman, so we force a safe fallback font. -->
    <!--[if mso]>
              <style>
                  * {
                      font-family: 'Montserrat', 'Verdana', sans-serif
                  }
              </style>
          <![endif]-->

    <!-- All other clients get the webfont reference; some will render the font and others will silently fail to the fallbacks. More on that here: http://stylecampaign.com/blog/2015/02/webfont-support-in-email/ -->
    <!--[if !mso]><!-->

    <!-- insert web font reference, eg: <link href='https://fonts.googleapis.com/css?family=Roboto:400,700' rel='stylesheet' type='text/css'> -->
    <!--<![endif]-->

    <!-- Web Font / @font-face : END -->

    <!-- CSS Reset : BEGIN -->
    <style>
        * {
            font-family: 'Montserrat', 'Verdana', sans-serif
        }
        @font-face {
            font-family: 'Montserrat';
            font-style: normal;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/montserrat/v25/JTUSjIg1_i6t8kCHKm459WZhyzbi.woff2) format('woff2');
            unicode-range: U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+1EA0-1EF9, U+20AB;
            }

        /* What it does: Tells the email client that only light styles are provided but the client can transform them to dark. A duplicate of meta color-scheme meta tag above. */
        :root {
            color-scheme: light;
            supported-color-schemes: light;
        }

        /* What it does: Remove spaces around the email design added by some email clients. */
        /* Beware: It can remove the padding / margin and add a background color to the compose a reply window. */
        html,
        body {
            margin: 0 auto !important;
            padding: 0 !important;
            height: 100% !important;
            width: 100% !important;
        }

        /* What it does: Stops email clients resizing small text. */
        * {
            -ms-text-size-adjust: 100%;
            -webkit-text-size-adjust: 100%;
        }

        /* What it does: Centers email on Android 4.4 */
        div[style*="margin: 16px 0"] {
            margin: 0 !important;
        }

        /* What it does: forces Samsung Android mail clients to use the entire viewport */
        #MessageViewBody,
        #MessageWebViewDiv {
            width: 100% !important;
        }

        /* What it does: Stops Outlook from adding extra spacing to tables. */
        table,
        td {
            mso-table-lspace: 0pt !important;
            mso-table-rspace: 0pt !important;
        }

        /* What it does: Replaces default bold style. */
        th {
            font-weight: normal;
        }

        /* What it does: Fixes webkit padding issue. */
        table {
            border-spacing: 0 !important;
            border-collapse: collapse !important;
            table-layout: fixed !important;
            margin: 0 auto !important;
        }

        /* What it does: Prevents Windows 10 Mail from underlining links despite inline CSS. Styles for underlined links should be inline. */
        a {
            text-decoration: none;
        }

        /* What it does: Uses a better rendering method when resizing images in IE. */
        img {
            -ms-interpolation-mode: bicubic;
        }

        /* What it does: A work-around for email clients meddling in triggered links. */
        a[x-apple-data-detectors],
        /* iOS */
        .unstyle-auto-detected-links a,
        .aBn {
            border-bottom: 0 !important;
            cursor: default !important;
            color: inherit !important;
            text-decoration: none !important;
            font-size: inherit !important;
            font-family: inherit !important;
            font-weight: inherit !important;
            line-height: inherit !important;
        }

        /* What it does: Prevents Gmail from changing the text color in conversation threads. */
        .im {
            color: inherit !important;
        }

        /* What it does: Prevents Gmail from displaying a download button on large, non-linked images. */
        .a6S {
            display: none !important;
            opacity: 0.01 !important;
        }

        /* If the above doesn't work, add a .g-img class to any image in question. */
        img.g-img+div {
            display: none !important;
        }

        /* What it does: Removes right gutter in Gmail iOS app: https://github.com/TedGoas/Cerberus/issues/89  */
        /* Create one of these media queries for each additional viewport size you'd like to fix */

        /* iPhone 4, 4S, 5, 5S, 5C, and 5SE */
        @media only screen and (min-device-width: 320px) and (max-device-width: 374px) {
            u~div .email-container {
                min-width: 320px !important;
            }
        }

        /* iPhone 6, 6S, 7, 8, and X */
        @media only screen and (min-device-width: 375px) and (max-device-width: 413px) {
            u~div .email-container {
                min-width: 375px !important;
            }
        }

        /* iPhone 6+, 7+, and 8+ */
        @media only screen and (min-device-width: 414px) {
            u~div .email-container {
                min-width: 414px !important;
            }
        }
    </style>
    <!-- CSS Reset : END -->

    <!-- Progressive Enhancements : BEGIN -->
    <style>
        /* What it does: Hover styles for buttons */
        .button-td,
        .button-a {
            transition: all 100ms ease-in;
        }

        .horoscope-title {
            text-align: left;
            font-style: normal;
            font-weight: 600;
            font-size: 16px;
            line-height: 24px;
            font-family: Montserrat;
            letter-spacing: 0px;
            color: #43425D;
            text-transform: capitalize;
            opacity: 1;
        }


        .progress-bar {
            height: 20px;
            background: #F0F0F6 0% 0% no-repeat padding-box;
            position: relative;
        }

        .progress-bar::after {
            content: "";
            display: block;
            height: 100%;
            position: absolute;
            top: 0;
            left: 0;
            background-color: #8EBEF8;
        }


        .button-td-primary:hover,
        .button-a-primary:hover {
            background: #555555 !important;
            border-color: #555555 !important;
        }

        .content-left {
            width: 136px;
        }

        .padding-sm {
            padding: 0px 20px;
            padding-top: 28px
        }

        .height-center td {
            padding: 70px 11px;
        }

        .show-sm {
            display: none;
        }

        .font-change {
            font-size: 16px
        }

        #styleCard{
            padding: 39px 80px 0px 80px;
                
            }
        .styleBorder{
            border-radius: 0px 20px 20px 0px;
        }
        .widthTitle{
            max-width: 550px;
                
            }

        /* Media Queries */
        @media screen and (max-width: 750px) {

            #styleCard{
                padding: 20px 30px !important;

            }
            .widthTitle{
                max-width: 350px !important;

            }
            .styleBorder{
            border-radius: 20px 20px 20px 20px !important;
            }
            .positionImg{
                margin-top: 15px !important;
            }

            .content-left {
                width: 100%;
                min-width: 100%;
                display: block;
            }

            .name-width {
                width: 200px;
                height: 40px;
                padding: 12px 0px;
            }

            .show-sm {
                display: inline !important;
            }

            .show-sm {
                display: inline-block !important;
            }

            .font-change {
                font-size: 14px !important;
            }

            .hidden-sm {
                display: none !important;
            }

            .content-right {
                display: block;
            }

            .padding-sm {
                padding: 0px 20px;
                padding-top: 28px
            }

            .email-container {
                width: 100% !important;
                margin: auto !important;
            }

            /* What it does: Adjust typography on small screens to improve readability */
            .email-container p {
                font-size: 17px !important;
            }

            .progress-bar {
                width: 50%;
                height: 20px;
                background-color: green;
            }

        }
    </style>
    <!-- Progressive Enhancements : END -->

</head>
<!--
 The email background color (#222222) is defined in three places:
 1. body tag: for most email clients
 2. center tag: for Gmail and Inbox mobile apps and web versions of Gmail, GSuite, Inbox, Yahoo, AOL, Libero, Comcast, freenet, Mail.ru, Orange.fr
 3. mso conditional: For Windows 10 Mail
-->

<body width="100%" style="margin: 0; padding: 0 !important; mso-line-height-rule: exactly; ">

    <center role="article" aria-roledescription="email" lang="en" style="width: 100%;">

        <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="750"
            style="padding-bottom: 20px;margin: auto; background: #43425D;" class="email-container">

            <tr>
                <td style="text-align: center;">
                    <div class="hidden-sm"
                        style="width: 100%; height: 320px; 
                                    background-size: cover; 
                                    background-repeat: no-repeat; 
                                    background-image: url('{{ config('app.url') }}/images/site-images/HOROSCOPE_EMAIL_DESKTOP.gif');
                                    text-align: center;">

                        <div style="margin-bottom: 40px;padding-top: 40px">
                            <a href="https://www.psychics1on1.com/">
                                <img src="https://www.psychics1on1.com/images/site-images/logo.png" width="159" />
                            </a>
                        </div>
                    </div>

                    <div class="show-sm"
                        style="width: 100%; height: 350px; 
                                    background-size: cover; 
                                    background-repeat: no-repeat; 
                                    background-image: url('{{ config('app.url') }}/images/site-images/HOROSCOPE_EMAIL_MOBILE.gif');
                                    text-align: center;">

                        <div style="margin-bottom: 40px;padding-top: 40px">
                            <a href="https://www.psychics1on1.com/">
                                <img src="https://www.psychics1on1.com/images/site-images/logo.png" width="159" />
                            </a>
                        </div>
                    </div>
                </td>
            </tr>

            <tr class="hidden-sm">
                <td>

                    <div
                        style="padding-top: 20px;padding-bottom:20px; background:#F0F0F7;text-align: center;margin: auto; display: block;">
                        <span class=""
                            style="color:#43425B;font-family: 'Montserrat','Verdana',sans-serif !important; 
                                  font-style: italic; font-weight: 600; 
                                  font-size: 16px;letter-spacing: 0.32px; 
                                  line-height: 19px; max-width: 550px; 
                                  margin: auto; font-weight: 600;">
                            Discover What Your Star Sign Has In Store for You This Week
                        </span>
                    </div>


                </td>
            </tr>

            <tr class="show-sm" style="text-align: center; background:#F0F0F7; width:100%">
                <td>
                    <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0"
                        width="100%" class="center-table">
                        <tr>
                            <td>
                                <center>
                                    <div style="width: 327px;padding-top: 20px;padding-bottom:20px; background:#F0F0F7">
                                        <span class=""
                                            style="text-align: center;color:#43425B;font-family: 'Montserrat','Verdana',sans-serif !important; font-style: italic; font-weight: 600; font-size: 16px !important;letter-spacing: 0.32px; line-height: 19px;">
                                            Discover What Your Star Sign Has In Store for You This Week
                                        </span>
                                    </div>

                                </center>

                            </td>
                        </tr>
                    </table>

                </td>
            </tr>



            <tr class="hidden-sm">
                <td>
                    <div
                        style="line-height: 24px; 
                                text-align: center; 
                                padding:30px 20px; 
                                margin: auto; 
                                background: #43425D;">

                        <div class="mb-4">
                            <h1 class="font-change mb-4"
                                style="font-family: 'Montserrat', 'Verdana', sans-serif; 
                                                                padding-left: 25px;color: #FFFFFF; 
                                                                text-align: center; line-height: 1.5; 
                                                                font-weight: 600;">
                                {{ $user->zodiac }} Weekly Horoscope
                            </h1>

                        </div>

                        <div style="margin: auto;width: 550px; height: 115px;">
                            <span class="font-change mb-4"
                                style="width: 550px !important;
                                                                    height: 115px;
                                                                    text-align: center;
                                                                    font-family: 'Montserrat', 'Verdana', sans-serif !important;
                                                                    letter-spacing: 0px;
                                                                    color: #FFFFFF;
                                                                    opacity: 1;">
                                Things have been feeling a bit disappointing for you lately. But this week, you’ll
                                notice that the universe is working in your favor once again. Lean into anything that
                                speaks to your passionate, fiery side – you’ve been longing to take action that inspires
                                you to get to the next level in your life.
                            </span>

                        </div>
                    </div>
                </td>
            </tr>


            <tr class="show-sm" style="padding-top:30px">
                <td>

                    <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0"
                        width="100%" class="center-table">
                        <tr>
                            <td style="text-align: center;line-height: 24px; background: #43425D;">

                                <div>

                                    <div style="text-align: center;margin-bottom: 30px">
                                        <h1 class="mb-4"
                                            style="font-size: 18px !important;font-family: 'Montserrat', 'Verdana', sans-serif; 
                                                                            color: #FFFFFF; 
                                                                            text-align: center;
                                                                            line-height: 1.5; 
                                                                            font-weight: 600;">
                                            {{ $user->zodiac }} Weekly Horoscope
                                        </h1>

                                    </div>

                                    <div
                                        style="font-size: 16px !important;padding: 0px 40px;text-align: center; font-family: 'Montserrat', 'Verdana', sans-serif !important;
                                        letter-spacing: 0px;
                                        color: #FFFFFF;
                                        opacity: 1;">
                                        
                                            Things have been feeling a bit disappointing for you lately. But this week,
                                            you’ll
                                            notice that the universe is working in your favor once again. Lean into
                                            anything that
                                            speaks to your passionate, fiery side – you’ve been longing to take action
                                            that inspires
                                            you to get to the next level in your life.
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>


            <tr class="">
                <td>
                    <div style="margin:25px;">
                        <h1 class=""
                            style="font-size: 18px !important;
                                   font-family: 'Montserrat', 'Verdana', sans-serif; 
                                    padding-left: 20px;color: #FFFFFF; 
                                    text-align: center;
                                    margin: auto;
                                    line-height: 1.5; max-width: 550px; 
                                    font-weight: 600;">
                            {{ $user->zodiac }} Weekly Matches
                        </h1>
                    </div>

                </td>
            </tr>

            <tr class="hidden-sm">
                <td
                    style="display: flex;justify-content: center;line-height: 24px; text-align: center;margin-bottom:30px; ">


                    <table>
                        <tr>
                            <td>
                                <div style="margin-bottom: 0px;padding-top: 0px;">
                                    <a href="https://www.psychics1on1.com/search?ability=tarot-card-reading">
                                        <img class="hidden-sm imgSize"
                                            src="{{ config('app.url') }}/images/horoscopes/{{ $info->match1->slug }}.png"
                                            width="125" height="136" />
                                    </a>
                                    <div
                                        style="font-weight: 600;font-size: 12px;font-family: 'Montserrat', 'Verdana', sans-serif; 
                                            letter-spacing: 0px;
                                            color: #FFFFFF;
                                            text-transform: capitalize;
                                            opacity: 1;">
                                        {{ $info->match1->name }}
                                    </div>
                                    <div
                                        style="font-size: 12px;font-family: 'Montserrat', 'Verdana', sans-serif; 
                                            letter-spacing: 0px;
                                            color: #FFFFFF;
                                            text-transform: capitalize;
                                            opacity: 1;">
                                        {{ $info->subject1 }}
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div style="margin: 0px 80px;padding-top: 0px">
                                    <a href="https://www.psychics1on1.com/search?ability=spiritual-healer">
                                        <img class="hidden-sm imgSize"
                                            src="{{ config('app.url') }}/images/horoscopes/{{ $info->match2->slug }}.png"
                                            width="125" height="136" />
                                    </a>
                                    <div
                                        style="font-weight: 600;font-size: 12px;font-family: 'Montserrat', 'Verdana', sans-serif; 
                                            letter-spacing: 0px;
                                            color: #FFFFFF;
                                            text-transform: capitalize;
                                            opacity: 1;">
                                        {{ $info->match2->name }}
                                    </div>
                                    <div
                                        style="font-size: 12px;font-family: 'Montserrat', 'Verdana', sans-serif; 
                                            letter-spacing: 0px;
                                            color: #FFFFFF;
                                            text-transform: capitalize;
                                            opacity: 1;">
                                        {{ $info->subject2 }}
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div style="margin-bottom: 0px;padding-top: 0px;">
                                    <a href="https://www.psychics1on1.com/search?ability=astrology">
                                        <img class="hidden-sm imgSize"
                                            src="{{ config('app.url') }}/images/horoscopes/{{ $info->match3->slug }}.png"
                                            width="125" height="136" />
                                    </a>
                                    <div
                                        style="font-weight: 600;font-size: 12px;font-family: 'Montserrat', 'Verdana', sans-serif; 
                                            letter-spacing: 0px;
                                            color: #FFFFFF;
                                            text-transform: capitalize;
                                            opacity: 1;">
                                        {{ $info->match3->name }}
                                    </div>
                                    <div
                                        style="font-size: 12px;font-family: 'Montserrat', 'Verdana', sans-serif; 
                                            letter-spacing: 0px;
                                            color: #FFFFFF;
                                            text-transform: capitalize;
                                            opacity: 1;">
                                        {{ $info->subject3 }}
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </table>






                </td>
            </tr>

            <tr class="show-sm">
                <center>
                    <td
                        style="margin-left:5px;display: flex;justify-content: center;line-height: 24px; text-align: center;margin-bottom:30px;">
    
                        <table>
                            <tr>
                                <td>
                                    <div style="margin-bottom: 0px;padding-top: 0px;">
                                        <a href="#">
                                            <img class="show-sm imgSize" width="130" height="140"
                                                src="{{ config('app.url') }}/images/horoscopes/{{ $info->match1->slug }}.png" />
                                        </a>
                                        <div
                                            style="font-weight: 600;font-size: 12px;font-family: 'Montserrat', 'Verdana', sans-serif; 
                                                letter-spacing: 0px;
                                                color: #FFFFFF;
                                                text-transform: capitalize;
                                                opacity: 1;">
                                            {{ $info->match1->name }}
                                        </div>
                                        <div
                                            style="font-size: 12px;font-family: 'Montserrat', 'Verdana', sans-serif; 
                                                letter-spacing: 0px;
                                                color: #FFFFFF;
                                                text-transform: capitalize;
                                                opacity: 1;">
                                            {{ $info->subject1 }}
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div style="margin: 0px 5px;padding-top: 0px">
                                        <a href="#">
                                            <img class="show-sm imgSize" width="130" height="140"
                                                src="{{ config('app.url') }}/images/horoscopes/{{ $info->match2->slug }}.png" />
                                        </a>
                                        <div
                                            style="font-weight: 600;font-size: 12px;font-family: 'Montserrat', 'Verdana', sans-serif; 
                                                letter-spacing: 0px;
                                                color: #FFFFFF;
                                                text-transform: capitalize;
                                                opacity: 1;">
                                            {{ $info->match2->name }}
                                        </div>
                                        <div
                                            style="font-size: 12px;font-family: 'Montserrat', 'Verdana', sans-serif; 
                                                letter-spacing: 0px;
                                                color: #FFFFFF;
                                                text-transform: capitalize;
                                                opacity: 1;">
                                            {{ $info->subject2 }}
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div style="margin-bottom: 0px;padding-top: 0px;">
                                        <a href="#">
                                            <img class="show-sm imgSize" width="130" height="140"
                                                src="{{ config('app.url') }}/images/horoscopes/{{ $info->match3->slug }}.png" />
                                        </a>
                                        <div
                                            style="font-weight: 600;font-size: 12px;font-family: 'Montserrat', 'Verdana', sans-serif; 
                                                letter-spacing: 0px;
                                                color: #FFFFFF;
                                                text-transform: capitalize;
                                                opacity: 1;">
                                            {{ $info->match3->name }}
                                        </div>
                                        <div
                                            style="font-size: 12px;font-family: 'Montserrat', 'Verdana', sans-serif; 
                                                letter-spacing: 0px;
                                                color: #FFFFFF;
                                                text-transform: capitalize;
                                                opacity: 1;">
                                            {{ $info->subject3 }}
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </table>
    
    
                        
    
    
    
    
                    </td>

                </center>
            </tr>


            <tr class="hidden-sm">
                <td class="hidden-sm">
                    <div>
                        <h1 class="font-change mb-4 mt-5"
                            style="font-family: 'Montserrat', 'Verdana', sans-serif; 
                                    padding-left: 25px;
                                    color: #FFFFFF; 
                                    text-align: center; 
                                    line-height: 1.5; max-width: 550px; 
                                    margin: auto; font-weight: 600;">
                            {{ $user->zodiac }} Weekly Mood
                        </h1>
                    </div>

                    <div>

            <tr class="hidden-sm">
                <td
                    style="display: flex;justify-content: center;line-height: 24px; text-align: center; padding:15px 20px; margin-left: 72px !important; background: #43425D;">
                    <div style="width: 100px;">
                        <div
                            style="text-align: left;
                                    font-style: normal;
                                    font-weight: 600;
                                    font-size: 12px;
                                    line-height: 18px;
                                    font-family: 'Montserrat', 'Verdana', sans-serif !important;
                                    letter-spacing: 0px;
                                    color: #FFFFFF;
                                    opacity: 1;">
                            Hustle</div>
                    </div>
                    <div
                        style="background: #F0F0F6 0% 0% no-repeat padding-box;border-radius: 18px;opacity: 1;width: 458px;height: 15px;margin-top: 4px;">
                        <div
                            style="background: #8EBEF8 0% 0% no-repeat padding-box;border-radius: 18px;opacity: 1;height:100%; width: {{ $info->hustle }}%;">
                        </div>
                    </div>
                </td>
            </tr>
            <tr class="hidden-sm">
                <td
                    style="display: flex;justify-content: center;line-height: 24px; text-align: center; padding:15px 20px; margin-left: 72px !important; background: #43425D;">
                    <div style="width: 100px">
                        <div
                            style="text-align: left;
                                    font-style: normal;
                                    font-weight: 600;
                                    font-size: 12px;
                                    line-height: 18px;
                                    font-family: 'Montserrat', 'Verdana', sans-serif !important;
                                    letter-spacing: 0px;
                                    color: #FFFFFF;
                                    opacity: 1;">
                            Love</div>
                    </div>
                    <div
                        style="background: #F0F0F6 0% 0% no-repeat padding-box;border-radius: 18px;opacity: 1;width: 458px;height: 15px;margin-top: 4px;">
                        <div
                            style="background: #8EBEF8 0% 0% no-repeat padding-box;border-radius: 18px;opacity: 1;height:100%; width: {{ $info->love }}%;">
                        </div>
                    </div>
                </td>
            </tr>
            <tr class="hidden-sm">
                <td
                    style="display: flex;justify-content: center;line-height: 24px; text-align: center; padding:15px 20px; margin-left: 72px !important; background: #43425D;">
                    <div style="width: 100px">
                        <div
                            style="text-align: left;
                                    font-style: normal;
                                    font-weight: 600;
                                    font-size: 12px;
                                    line-height: 18px;
                                    font-family: 'Montserrat', 'Verdana', sans-serif !important;
                                    letter-spacing: 0px;
                                    color: #FFFFFF;
                                    opacity: 1;">
                            Outlook</div>
                    </div>
                    <div
                        style="background: #F0F0F6 0% 0% no-repeat padding-box;border-radius: 18px;opacity: 1;width: 458px;height: 15px;margin-top: 4px;">
                        <div
                            style="background: #8EBEF8 0% 0% no-repeat padding-box;border-radius: 18px;opacity: 1;height:100%; width: {{ $info->outlook }}%;">
                        </div>
                    </div>
                </td>
            </tr>
            <tr class="hidden-sm">
                <td
                    style="display: flex;justify-content: center;line-height: 24px; text-align: center; padding:15px 20px;margin-bottom: 17px; margin-left: 72px !important; background: #43425D;">
                    <div style="width: 100px;">
                        <div
                            style="text-align: left;
                                    font-style: normal;
                                    font-weight: 600;
                                    font-size: 12px;
                                    line-height: 18px;
                                    font-family: 'Montserrat', 'Verdana', sans-serif !important;
                                    letter-spacing: 0px;
                                    color: #FFFFFF;
                                    opacity: 1;">
                            Vibe</div>
                    </div>
                    <div
                        style="background: #F0F0F6 0% 0% no-repeat padding-box;border-radius: 18px;opacity: 1;width: 458px;height: 15px;margin-top: 4px;">
                        <div
                            style="background: #8EBEF8 0% 0% no-repeat padding-box;border-radius: 18px;opacity: 1;height:100%; width: {{ $info->vibe }}%;">
                        </div>
                    </div>
                </td>
            </tr>

            </div>

            </td>
            </tr>


            <tr class="show-sm">
                <td class="show-sm">
                    <div>
                        <h1 class="mb-4 mt-5"
                            style="font-family: 'Montserrat', 'Verdana', sans-serif; 
                                    margin-left:130px;
                                    color: #FFFFFF; 
                                    font-size: 18px !important;
                                    line-height: 1.5;  
                                     font-weight: 600;">
                            {{ $user->zodiac }} Weekly Mood
                        </h1>
                    </div>

                    <div>

            <tr class="show-sm">
                <td
                    style="display: flex;justify-content: center;line-height: 24px; text-align: center; padding:15px 20px;  background: #43425D;">
                    <div style="width: 100px;margin-right: 10px;">
                        <div
                            style="text-align: left;
                                    font-style: normal;
                                    font-weight: 600;
                                    font-size: 12px;
                                    padding-left:40px;
                                    line-height: 18px;
                                    font-family: 'Montserrat', 'Verdana', sans-serif !important;
                                    letter-spacing: 0px;
                                    color: #FFFFFF;
                                    opacity: 1;">
                            Hustle</div>
                    </div>
                    <div
                        style="background: #F0F0F6 0% 0% no-repeat padding-box;border-radius: 18px;opacity: 1;width: 227px;height: 15px;margin-top: 4px;">
                        <div
                            style="background: #8EBEF8 0% 0% no-repeat padding-box;border-radius: 18px;opacity: 1;height:100%; width: {{ $info->hustle }}%;">
                        </div>
                    </div>
                </td>
            </tr>
            <tr class="show-sm">
                <td
                    style="display: flex;justify-content: center;line-height: 24px; text-align: center; padding:15px 20px; background: #43425D;">
                    <div style="width: 100px;margin-right: 10px;">
                        <div
                            style="text-align: left;
                                    font-style: normal;
                                    font-weight: 600;
                                    font-size: 12px;
                                    line-height: 18px;
                                    font-family: 'Montserrat', 'Verdana', sans-serif !important;
                                    letter-spacing: 0px;
                                    color: #FFFFFF;
                                    padding-left:40px;
                                    opacity: 1;">
                            Love</div>
                    </div>
                    <div
                        style="background: #F0F0F6 0% 0% no-repeat padding-box;border-radius: 18px;opacity: 1;width: 227px;height: 15px;margin-top: 4px;">
                        <div
                            style="background: #8EBEF8 0% 0% no-repeat padding-box;border-radius: 18px;opacity: 1;height:100%; width: {{ $info->love }}%;">
                        </div>
                    </div>
                </td>
            </tr>
            <tr class="show-sm">
                <td
                    style="display: flex;justify-content: center;line-height: 24px; text-align: center; padding:10px 20px; background: #43425D;">
                    <div style="width: 100px;margin-right: 10px;">
                        <div
                            style="text-align: left;
                                    font-style: normal;
                                    font-weight: 600;
                                    font-size: 12px;
                                    padding-left:40px;
                                    line-height: 18px;
                                    font-family: 'Montserrat', 'Verdana', sans-serif !important;
                                    letter-spacing: 0px;
                                    color: #FFFFFF;
                                    opacity: 1;">
                            Outlook</div>
                    </div>
                    <div
                        style="background: #F0F0F6 0% 0% no-repeat padding-box;border-radius: 18px;opacity: 1;width: 227px;height: 15px;margin-top: 4px;">
                        <div
                            style="background: #8EBEF8 0% 0% no-repeat padding-box;border-radius: 18px;opacity: 1;height:100%; width: {{ $info->outlook }}%;">
                        </div>
                    </div>
                </td>
            </tr>
            <tr class="show-sm">
                <td
                    style="display: flex;justify-content: center;line-height: 24px; text-align: center; padding:15px 20px; background: #43425D; margin-bottom: 17px;">
                    <div style="width: 100px;margin-right: 10px;">
                        <div
                            style="text-align: left;
                                    font-style: normal;
                                    font-weight: 600;
                                    font-size: 12px;
                                    line-height: 18px;
                                    padding-left:40px;
                                    font-family: 'Montserrat', 'Verdana', sans-serif !important;
                                    letter-spacing: 0px;
                                    color: #FFFFFF;
                                    opacity: 1;">
                            Vibe</div>
                    </div>
                    <div
                        style="background: #F0F0F6 0% 0% no-repeat padding-box;border-radius: 18px;opacity: 1;width: 227px;height: 15px;margin-top: 4px;">
                        <div
                            style="background: #8EBEF8 0% 0% no-repeat padding-box;border-radius: 18px;opacity: 1;height:100%; width: {{ $info->vibe }}%;">
                        </div>
                    </div>
                </td>
            </tr>



            </div>

            </td>
            </tr>


            <tr class="">
                <td
                    style="padding-top: 20px;padding-bottom:20px; background:#F0F0F7;text-align: center; color: #FFFFFF;font-family: 'Montserrat',  'Verdana', sans-serif; font-size: 15px; margin: auto; display: block;">

                    <div class="hidden-sm"
                        style="text-transform: capitalize; margin:auto; text-align: center; font-family: 'Montserrat',  'Verdana', sans-serif; font-size: 18px;color:#43425d; text-align: center;">
                        <div class="font-change"
                            style="font-family: 'Montserrat','Verdana',sans-serif !important; font-style: italic; font-weight: 600; font-size: 16px;letter-spacing: 0.32px; line-height: 19px;">
                            Get a Personal Astrology Reading From Our Featured Astrologers
                        </div>


                    </div>

                    <div class="show-sm"
                        style="width: 327px;text-transform: capitalize; margin:auto; text-align: center; font-family: 'Montserrat',  'Verdana', sans-serif; font-size: 18px;color:#43425d; text-align: center;">
                        <div class=""
                            style="font-family: 'Montserrat','Verdana',sans-serif !important; font-style: italic; font-weight: 600; font-size: 16px;letter-spacing: 0.32px; line-height: 19px;">
                            Get a Personal Astrology Reading From Our Featured Astrologers
                        </div>


                    </div>
                </td>
            </tr>



            <!--
            @php
                $cont = 0;
            @endphp
            @foreach ($psychics as $user1)
@php
    $review = $reviewsUser[$cont++];
    $reviews = $user1->reviews()->count();
@endphp
@endforeach

            <tr class="hidden-sm">

                <td class="padding-sm"
                    style="line-height: 24px; 
                           text-align: -webkit-center; 
                           padding-top: 25px; background: #43425D;">

                    <div class="row">
                        @foreach ($psychics as $psychic)
<div class="col-md-4" style="margin-bottom: 20px;">
                                <div class="card card-custom"
                                    style="width: 590px; height: 167px; 
                                                                      background: var(---ffffff) 0% 0% no-repeat padding-box; 
                                                                      background: #FFFFFF 0% 0% no-repeat padding-box; 
                                                                      border-radius: 20px; opacity: 1; display: flex; align-items: center;">

                                    <div class="content-left hidden-sm"
                                        style="width: 136px;
                                               height: 167px;
                                               border-radius: 20px;
                                               background: #D8E4F7; 
                                               vertical-align: top; padding-top: 20px; 
                                               padding-bottom: 15px; text-align: center">

                                        <div
                                            style="background:url('{{ $psychic->userProfile->haedshot_path }}');
                                                    border-radius: 50%;
                                                    width: 95px;
                                                    height: 95px;
                                                    background-size: cover; border-radius: 50%; margin: auto">
                                        </div>
                                    </div>

                                    <div
                                        style="font-size: 14px; text-align: left !important; padding-top: 20px; padding-left: 20px;">

                                        <div style="">
                                            <span
                                                style="font-family: 'Montserrat', 'Verdana', sans-serif; line-height: 1.5; font-weight: 600; text-align: center;">
                                                {{ $psychic->userProfile->name }}
                                            </span>
                                        </div>

                                        <div style="">



                                            <div class="" style="">
                                                @for ($i = 0; $i < $review->rating; $i++)
<img src="{{ config('app.url') }}/images/site-images/star.png"
                                                        width="15" height="14.27" style="margin-right: 3px" />
@endfor
                                                <span
                                                    style="font-weight: 500; color: #43425D; 
                                                    opacity: 0.5; font-size: 12px;font-family: 'Montserrat',  'Verdana', sans-serif;">{{ $reviews }}
                                                    Reviews
                                                </span>
                                            </div>
                                        </div>


                                        <div style="width: 413px;height: 45px;">
                                            <div>
                                                {{ str_limit($psychic->userProfile->description, 100) }}
                                            </div>
                                        </div>

                                        <div style="text-align: right !important; padding-left: 20px;">
                                            <a style="font-weight: 600; display: inline-block; padding: 5px 20px; padding-right: 5px; background-color: #8EBEF8; border-radius: 20px; color:white; font-size: 12px; font-family: 'Montserrat',  'Verdana', sans-serif;"
                                                href="{{ config('app.url') }}/{{ $psychic->userProfile->profile_link }}"
                                                target="blank">
                                                <span
                                                    style="font-family: 'Montserrat', 'Verdana', sans-serif;">Profile</span>
                                                <img style="padding: 0px 8px;"
                                                    src="{{ config('app.url') }}/images/site-images/top_rate_email.png" />
                                            </a>
                                        </div>
                                    </div>



                                </div>
                            </div>
@endforeach
                    </div>

                </td>
            </tr>
            


            @foreach ($psychics as $psychic)
<tr class="show-sm">
              <td  style="background: #43425D 0% 0% no-repeat padding-box;opacity: 1;">
                
                  <tr>
                    <td style=" padding-bottom:10px">
                      <center>
                        <div class="show-sm"
                            style="
                                width: 335px;
                                height: 179px;
                                background: #FFFFFF 0% 0% no-repeat padding-box;
                                border-radius: 20px;
                                margin-top: 10px;
                                opacity: 1;">
                          <table align="center" role="presentation" cellspacing="0"
                              cellpadding="0" border="0" width="100%" class="center-table ">
                            <tr >
                              <td style="display: flex;" >
                                <div style="margin-left: 20px;margin-top: 20px;">
                                  <div
                                    style="background:url('{{ $psychic->userProfile->haedshot_path }}');
                                    border-radius: 50%;
                                    width: 60px;
                                    height: 60px;
                                    background-size: cover; border-radius: 50%; margin: auto">
                                  </div>
                                </div>
                                <div style="height: 30px;margin-top: 30px;margin-left: 12px;">
                                  <span
                                    style="font-family: 'Montserrat', 'Verdana', sans-serif; 
                                    line-height: 1.5; font-weight: 600; 
                                    text-align: center;">
                                    {{ $psychic->userProfile->name }}
                                  </span>
                                  <br>
                                  <div style="margin-top: 7px;">
                                    <span>
                                      <div style="font-weight: bold;">
                                        @for ($i = 0; $i < $review->rating; $i++)
<img src="{{ config('app.url') }}/images/site-images/star.png" width="15" height="14.27" style="margin-right: 3px" />
@endfor
                                        <span style="font-weight: 500; color: #43425D; margin-left: 10px; opacity: 0.5; font-size: 12px; font-family: 'Montserrat', 'Verdana', sans-serif;">{{ $reviews }} Reviews
                                      </div>
                                    </span>
                                  </div>
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td>
                                <div style="padding: 2px 20px;">
                                  <span
                                      style="text-align: left;
                                            font-style: normal;
                                            font-weight: normal;
                                            font-size: 12px;
                                            line-height: 18px;
                                            font-family: 'Montserrat', 'Verdana', sans-serif;
                                            letter-spacing: 0px;
                                            color: #656B72;
                                            opacity: 1;">
                                      {{ str_limit($psychic->userProfile->description, 80) }}
                                  </span>
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td>
                                <div style="text-align: right !important; padding-left: 20px;">
                                    <a style="font-weight: 600; display: inline-block; padding: 5px 20px; padding-right: 5px; background-color: #8EBEF8; border-radius: 20px; color:white; font-size: 12px; font-family: 'Montserrat',  'Verdana', sans-serif;"
                                        href="{{ config('app.url') }}/{{ $psychic->userProfile->profile_link }}"
                                        target="blank">
                                        <span
                                            style="font-family: 'Montserrat', 'Verdana', sans-serif;">Profile</span>
                                        <img style="padding: 0px 8px;"
                                            src="{{ config('app.url') }}/images/site-images/top_rate_email.png" />
                                    </a>
                                </div>

                              </td>
                            </tr>
                          </table>
                        </div>
                      </center>
                    </td>
                  </tr>
              </td>
            </tr>
@endforeach
-->

            @php
                $cont = 0;
            @endphp
            @foreach ($psychics as $user1)
                @php
                    $review = $reviewsUser[$cont++];
                    $reviews = $user1->reviews()->count();
                @endphp
               <tr>
                <td class="" id="styleCard"
                    style="height: 115px; background-color: #43425D;text-align: center; color: #5d4542;
                          font-family: sans-serif; font-size: 15px; line-height: 15px; ">
                  <div>

                      <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" height="100%" style="    border-radius: 20px;background: #ffffff;">
    
                        <tr>
                            <td class="content-left hidden-sm"
                                style="border-radius: 20px 20px 20px 20px; background: #D8E4F7; vertical-align: top; padding-top: 20px; padding-bottom: 15px; text-align: center">
                                
                                
                                <div style="background:url('{{$user1->userProfile->haedshot_path}}');
                                            border-radius: 50%;
                                            width: 95px;
                                            height: 95px;
                                            background-size: cover; border-radius: 50%; margin: auto"></div>
                            </td>
    
                            <td class="content-right styleBorder"
                                style="background-color: #FFFFFF; text-align: left; padding: 20px 20px 10px 20px; ">
                
                                <div style="color: #43425D; font-size: 16px; font-weight: 600; font-family: 'Montserrat',  'Verdana', sans-serif;">
                                    <div style="padding-right: 10px; float: left;" class="show-sm positionImg">
                                        <div style="background:url('{{$user1->userProfile->haedshot_path}}');
                                            border-radius: 50%;
                                            width: 60px;
                                            height: 60px;
                                            background-size: cover; border-radius: 50%; display: inline; display: inline-block">
                                        </div>
                                </div>

                                <div class="name-width" style="margin-top: 4px;display: inline-block; 
                                                               font-family: 'Montserrat', 'Verdana', sans-serif; 
                                                               font-size: 15px;">
                                    <div style="font-family: 'Montserrat', 'Verdana', sans-serif;width: 250px 
                                    !important">
                                        {{$user1->userProfile->display_name}}
                                    </div>

                                    <div class="" style="margin-top: 11px; margin-bottom: 6px;">
                                        @for ($i = 0; $i < $review->rating; $i++)
                                    <img src="{{config('app.url')}}/images/site-images/star.png" width="15" height="14.27"
                                        style="margin-right: 3px" />
                                    @endfor
                                    <span
                                        style="font-weight: 500; color: #43425D; opacity: 0.5; font-size: 12px;font-family: 'Montserrat',  'Verdana', sans-serif;">{{$reviews}}
                                        Reviews
                                    </span></div>
                                </div>
                                </div>
                                
                                <div style="margin: 0px; padding: 0px 0px ;">
                                        <span style="font-family: 'Montserrat', 'Verdana',      sans-serif;
                                        font-size: 13px !important; 
                                        color: #656b72; 
                                        line-height: 21px;">

                                                {{ str_limit($user1->userProfile->description, 80) }}
                                        </span>
                                </div>

                                <div style="margin-top: 6px;margin-bottom: 5px;font-size: 12px; text-align: right; color: white;">
                                        <a style="font-weight: 600; display: inline-block; padding: 10px 20px; 
                                                    padding-right: 5px; background-color: #8EBEF8; border-radius: 20px;
                                                    color:white; font-size: 12px; font-family: 'Montserrat',  'Verdana', sans-serif;"
                                                    href="{{config('app.url')}}/{{$user1->userProfile->profile_link}}" target="blank">
                                            <span style="font-family: 'Montserrat', 'Verdana', sans-serif;">Profile</span> 
                                            <img style="padding: 0px 8px;"
                                            src="{{config('app.url')}}/images/site-images/top_rate_email.png" />
                                        </a>
                                </div>
                            </td>

                        </tr>

                      </table>
                  </div>
                </td>
              </tr>
            @endforeach


            <tr>
                <td style="background: #43425D 0% 0% no-repeat padding-box;opacity: 1;">
                  <center>
                    <a href="{{ config('app.url') }}/search?ability=astrology&sort=3&sortBy=rating"
                      style="display: inline-block;" class="viewmore">
                      <div class="show-sm"
                            style="width: 116px;
                                    height: 38px;
                                    background: #98BDF3 0% 0% no-repeat padding-box;
                                    border-radius: 18px;
                                    opacity: 1;
                                    margin: 10px;
                                    margin-top: 30px !important;
                                    margin-bottom: 30px !important;">
                        <center>
                          <div style="padding-top: 8px;">
                            <span
                                style="text-align: left;
                                text-align: center;
                                font-style: normal;
                                font-weight: 600;
                                font-size: 14px;
                                line-height: 18px;
                                font-family: 'Montserrat', 'Verdana', sans-serif;
                                letter-spacing: 0px;
                                color: #FFFFFF;
                                opacity: 1;">View More</span>
                          </div>
                        </center>
                      </div>
                      <div class="hidden-sm"
                            style="width: 116px;
                                    height: 38px;
                                    background: #98BDF3 0% 0% no-repeat padding-box;
                                    border-radius: 18px;
                                    opacity: 1;
                                    margin: 10px;
                                    margin-top: 30px !important;
                                    margin-bottom: 30px !important;">
                        <center>
                          <div style="padding-top: 10px;">
                            <span
                            style="text-align: left;
                                    text-align: center;
                                    font-style: normal;
                                    font-weight: 600;
                                    font-size: 14px;
                                    line-height: 18px;
                                    font-family: 'Montserrat', 'Verdana', sans-serif;
                                    letter-spacing: 0px;
                                    color: #FFFFFF;
                                    opacity: 1;">View More</span>
                          </div>
                        </center>
                      </div>
                    </a>
                  </center>
                </td>
              </tr>


            <tr class="">
                <td
                    style="padding-top: 20px;padding-bottom:20px; background:#F0F0F7;text-align: center; color: #FFFFFF;font-family: 'Montserrat',  'Verdana', sans-serif; font-size: 15px; margin: auto; display: block;">

                    <div
                        style="text-transform: capitalize; margin:auto; text-align: center; font-family: 'Montserrat',  'Verdana', sans-serif; font-size: 18px;color:#43425d; text-align: center;">
                        <div class="widthTitle"
                            style="font-family: 'Montserrat','Verdana',sans-serif !important;    font-style: italic; 
                            font-size: 16px;
                            letter-spacing: 0.32px; 
                            line-height: 19px;  
                            margin: auto; 
                            font-weight: 600;">
                            “My reading was so awakening, true, and enlightening. I will forever be grateful.” - Sarah
                            D.
                        </div>
                    </div>
                </td>
            </tr>




            @include('emails.footer')


        </table>
    </center>
</body>

</html>
