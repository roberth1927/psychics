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
  <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
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
                font-family: sans-serif !important;
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
      font-family: 'Montserrat', 'Verdana', sans-serif;
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
      font-family: 'Montserrat', sans-serif;
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

    .show-sm {
      display: none;
    }

    .white-div {
      background: #F0F0F7 0% 0% no-repeat padding-box;
    }

    .purple-div {
      background: #C48197 0% 0% no-repeat padding-box;
    }
    .styleBorder{
      border-radius: 0px 20px 20px 0px;
    }
    #styleCard{
      padding: 26px 80px 0px 80px;            
    }
    .viewmore {
      margin-top: 30px;
    }
    .imageHeader .content {
      width: 100%;
      height: 320px;
      background-size: cover;
      background-repeat: no-repeat;
      text-align: center;
      background-image: url('{{config('app.url')}}/images/site-images/HOROSCOPE_EMAIL_DESKTOP.gif');
    }
    /* Media Queries */
    @media screen and (max-width: 750px) {

      .viewmore {
        margin-top: 0px;
      }
      .styleBorder{
        border-radius: 20px 20px 20px 20px !important;
      }

      .positionImg{
        margin-top: 15px !important;
      }

      #styleCard{
        padding: 20px 30px !important;
      }

      .show-sm {
        display: block !important;
      }

      .hidden-sm {
        display: none !important;
      }

      /* .content-left {
        width: 100%;
        min-width: 100%;
        display: block;
      } */
      .content-left {
        width: 98px
      }

      .content-left img{
        width: 65px;
        height: 65px;
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

      /* What it does: Forces table cells into full-width rows. */
      .stack-column,
      .stack-column-center {
        /* display: block !important; */
        display: inline;
        width: 50% !important;
        max-width: 100% !important;
        direction: ltr !important;
      }

      /* And center justify these ones. */
      .stack-column-center {
        text-align: center !important;
      }

      /* What it does: Generic utility class for centering. Useful for images, buttons, and nested tables. */
      .center-on-narrow {
        text-align: center !important;
        display: block !important;
        margin-left: auto !important;
        margin-right: auto !important;
        float: none !important;
      }

      table.center-on-narrow {
        display: inline !important;
      }

      /* What it does: Adjust typography on small screens to improve readability */
      .email-container p {
        font-size: 17px !important;
      }
      .imageHeader .content {
        background-image: url('{{config('app.url')}}/images/site-images/HOROSCOPE_EMAIL_MOBILE.gif') !important;
      }
    }
  </style>
  <!-- Progressive Enhancements : END -->

</head>
<!--
	The email background color (#222222) is defined in three places:
	1. body tag: for most email clients#F0F0F7
-->

<body width="100%" style="margin: 0; padding: 0 !important; mso-line-height-rule: exactly; ">
  <center role="article" aria-roledescription="email" lang="en" style="width: 100%;">

    <!-- Preview Text Spacing Hack : END -->

    <!-- Email Body : BEGIN -->
    <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="750"
      style="margin: auto;" class="email-container">

      <!-- Email Header : END -->
    <tr>
      <td class="imageHeader">
        <div class="content">
          <div style="margin-bottom: 40px;padding-top: 40px">
            <a href="https://www.psychics1on1.com/">
              <img src="https://www.psychics1on1.com/images/site-images/logo.png" width="159" />
            </a>
          </div>
          <div style="margin-bottom: 0px; padding-top: 136px">
            <a style="width: 114px; height: 38px; padding: 10px 20px; background: #43425D 0% 0% no-repeat padding-box; 
              border-radius: 20px; color:white; font-style: normal;
              font-weight: 600;
              font-size: 14px;
              line-height: 18px;
              font-family: 'Montserrat', 'Verdana', sans-serif !important;
              letter-spacing: 0px;
              color: #FFFFFF;
              opacity: 1;"
              href="{{config('app.url')}}/horoscope" target="_blank">
              Visit Hub
            </a>
          </div>
        </div>
      </td>
    </tr>
      <!-- Hero Image, Flush : BEGIN -->
          <!-- Hero Image, Flush : BEGIN -->
          <!--[if gte mso 9]>   
            <table width="30" style="background: #F0F0F7;">
            <tr height="30"></tr>
            </table> 
            <tr>
              <td width="30%" style="text-align:center;background: #F0F0F7;">
              <a href="{{config('app.url')}}">
                <img src="{{config('app.url')}}/images/site-images/logo_black.png" width="165" height="46.56"/>
              </a>
              </td>
            </tr>
             <table width="30" style="background: #F0F0F7;">
            <tr height="30"></tr>
            </table> 
          <![endif]--> 
   {{--    <tr>
        <td class="padding-sm"
          style="padding-top: 0px;background:#F0F0F7;text-align: center; color: #43425D;font-family: sans-serif; font-size: 15px; line-height: 15px; margin: auto; display: block;">
           <!--[if !gte mso 9]> -->
          <a href="{{config('app.url')}}">
            <img src="{{config('app.url')}}/images/site-images/logo_black.png" width="165" height="46.56"
              style="margin-top: 37px" />
          </a>
          <!--<![endif]-->  
          <div
          style="height: 120px; margin:auto; margin-top: 36px; text-align: center; font-family: 'Montserrat', 'Verdana', sans-serif; font-size: 18px; font-weight: 600;color:white; text-align: center;">
          <table width="100%"><tr>
              <!--[if gte mso 9]>  
      <v:rect xmlns:v="urn:schemas-microsoft-com:vml" fill="true" stroke="false" 
        style="width: 710px; height: 120px;">
        <v:fill type="tile" src="{{config('app.url')}}/images/site-images/horoscope_email/horoscope_email.png" color="#333333" />   
        <v:textbox inset="0,0,0,0">                                        
      <![endif]-->
          <td class="padding-sm" style="background:url('{{config('app.url')}}/images/site-images/horoscope_email/horoscope_email.png'); background-size: cover; height: 120px; padding-top: 0px">
         <!--[if gte mso 9]> 
          <table width="100%"><tr height="40"></tr><tr><td width="264"></td><td width="186">
          <![endif]-->
            <div style="padding: 53px 0px;"><span style="color:#FFFFFF;font-family: 'Montserrat', 'Verdana', sans-serif;text-align:center;font-weight:bold;font-size: 18px;">Weekly Horoscope</span></div>
          <!--[if gte mso 9]> 
          </td><td width="264"><td><tr></table>
          <![endif]-->
          </td>
      <!--[if gte mso 9]>
        </v:textbox>
        </v:rect>
      <![endif]-->
        </tr></table>
        </div>
        </td>
      </tr> --}}
     

      {{-- <tr>
        <td class="padding-sm"
          style="padding-top: 0px;background:#F0F0F7;text-align: center; color: #43425D;font-family: sans-serif; font-size: 15px; line-height: 15px; margin: auto; display: block;">
          <div
            style="line-height: 1.5; margin:auto; padding-top: 25px; text-align: center; font-family: 'Montserrat', 'Verdana', sans-serif; font-size: 16px;color:#43425D; text-align: center;">
            <div style="0px">Visit our expert astrologers for a live reading!</div>
          </div>
          <div style="padding-top: 42px">
            <!--[if !gte mso 9]> -->
            <a style="width: 114px; height: 38px; padding: 10px 20px; background-color: #8EBEF8; border-radius: 20px; color:white; font-size: 14px;font-family: 'Montserrat', 'Verdana', sans-serif; font-weight: 600"
              href="{{config('app.url')}}" target="blank">
              Visit Now
            </a>
            <!--<![endif]-->  
            <!--[if gte mso 9]>
            <table width="100%"><tr height="20"></tr></table>
            <v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" href="{{config('app.url')}}" style="height:38px;v-text-anchor:middle;width:108px;" arcsize="60%" opacity="0" stroke="f" fillcolor="#8EBEF8">
            <w:anchorlock/>
            <center style="color:#ffffff;font-family:sans-serif;font-size:14px;font-weight:bold;">
            Visit Now            
            </center>
            </v:roundrect>
            <![endif]--> 
          </div>
        </td>
      </tr> --}}
      <tr>
        <td>
          <div style="" class="hidden-sm">
            <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%"
              class="center-table">
              @for ($i = 0; $i < 2; $i++)
                <tr style="height: 289px;">
                @for ($i = 0; $i < 2; $i++)
                  <td style="height: 100%;" @if (($i % 2) == 0) class="white-div" @else class="purple-div" @endif>
                    <div style="
                    opacity: 1;
                    width: 375px;
                    height: 100%;
                    min-height: 289px;"
                    >
                    <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" class="center-table">
                      <tr>
                        <td style="display: flex;">
                          <div style="margin-left: 17px;
                          margin-top: 6px;">
                            <img src="{{ config('app.url') }}/images/horoscopes/{{$signs[$i]['slug']}}.png"
                              width="114" height="125" />
                          </div>
                          <div style="height: 30px;
                          margin-top: 40px;
                          margin-left: 13px;">
                            <div style="text-align: left;
                            margin-bottom:9px;
                            font-style: normal;
                            font-weight: 600;
                            font-size: 16px;
                            line-height: 24px;
                            font-family: 'Montserrat', 'Verdana', sans-serif !important;
                            letter-spacing: 0px;
                            text-transform: capitalize;
                            opacity: 1;">
                              <span @if (($i % 2) == 0) style="color: #43425D;" @else style="color: #FFFFFF;" @endif>{{$signs[$i]['name']}}</span>
                            </div>
                            <div style="margin-top: -11px;
                            text-align: left;
                            font-style: normal;
                            font-weight: 500;
                            font-size: 12px;
                            line-height: 15px;
                            font-family: 'Montserrat', 'Verdana', sans-serif !important;
                            letter-spacing: 0px;
                            text-transform: capitalize;
                            opacity: 1;">
                              <span @if (($i % 2) == 0) style="color: #43425D;" @else style="color: #FFFFFF;" @endif>{{$dates[$i]}}</span>
                            </div>
                          </div>
                       </td>
                      </tr>
                      <tr>
                        <td>
                          <div style="padding: 0px 17px 15px 17px;
                          text-align: left;
                          font-style: normal;
                          font-weight: normal;
                          font-size: 14px;
                          line-height: 21px;
                          font-family: 'Montserrat', 'Verdana', sans-serif !important;
                          letter-spacing: 0px;
                          opacity: 1;">
                            <span @if (($i % 2) == 0) style="color: #43425D;" @else style="color: #FFFFFF;" @endif>
                              {{$signs[$i]['text']}}
                            </span>
                          </div>
                        </td>
                      </tr>
                    </table>
                    </div>
                  </td>
                @endfor
                </tr>
              @endfor
              @for ($i = 2; $i < 4; $i++)
              <tr style="height: 289px;">
                @for ($i = 2; $i < 4; $i++)
                <td style="height: 100%;" @if (($i % 2) == 0) class="purple-div" @else class="white-div" @endif>
                  <div style="
                  opacity: 1;
                  width: 375px;
                  height: 100%;
                  min-height: 289px;"
                  >
                  <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" class="center-table">
                    <tr>
                      <td style="display: flex;">
                        <div style="margin-left: 17px;
                        margin-top: 6px;">
                          <img src="{{ config('app.url') }}/images/horoscopes/{{$signs[$i]['slug']}}.png"
                            width="114" height="125" />
                        </div>
                        <div style="height: 30px;
                        margin-top: 40px;
                        margin-left: 13px;">
                          <div style="text-align: left;
                          margin-bottom:9px;
                          font-style: normal;
                          font-weight: 600;
                          font-size: 16px;
                          line-height: 24px;
                          font-family: 'Montserrat', 'Verdana', sans-serif !important;
                          letter-spacing: 0px;
                          text-transform: capitalize;
                          opacity: 1;">
                            <span @if (($i % 2) == 0) style="color: #FFFFFF;" @else style="color: #43425D;" @endif>{{$signs[$i]['name']}}</span>
                          </div>
                          <div style="margin-top: -11px;
                          text-align: left;
                          font-style: normal;
                          font-weight: 500;
                          font-size: 12px;
                          line-height: 15px;
                          font-family: 'Montserrat', 'Verdana', sans-serif !important;
                          letter-spacing: 0px;
                          text-transform: capitalize;
                          opacity: 1;">
                            <span @if (($i % 2) == 0) style="color: #FFFFFF;" @else style="color: #43425D;" @endif>{{$dates[$i]}}</span>
                          </div>
                        </div>
                     </td>
                    </tr>
                    <tr>
                      <td>
                        <div style="padding: 0px 17px 15px 17px;
                          text-align: left;
                          font-style: normal;
                          font-weight: normal;
                          font-size: 14px;
                          line-height: 21px;
                          font-family: 'Montserrat', 'Verdana', sans-serif !important;
                          letter-spacing: 0px;
                          opacity: 1;">
                          <span @if (($i % 2) == 0) style="color: #FFFFFF;" @else style="color: #43425D;" @endif>
                            {{$signs[$i]['text']}}
                          </span>
                        </div>
                      </td>
                    </tr>
                  </table>
                  </div>
                </td>
                @endfor
              </tr>
            @endfor
            @for ($i = 4; $i < 6; $i++)
            <tr style="height: 289px;">
              @for ($i = 4; $i < 6; $i++)
              <td style="height: 100%;" @if (($i % 2) == 0) class="white-div" @else class="purple-div" @endif>
                <div style="
                opacity: 1;
                width: 375px;
                height: 100%;
                min-height: 289px;"
                >
                <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" class="center-table">
                  <tr>
                    <td style="display: flex;">
                      <div style="margin-left: 17px;
                      margin-top: 6px;">
                        <img src="{{ config('app.url') }}/images/horoscopes/{{$signs[$i]['slug']}}.png"
                          width="114" height="125" />
                      </div>
                      <div style="height: 30px;
                      margin-top: 40px;
                      margin-left: 13px;">
                        <div style="text-align: left;
                        margin-bottom:9px;
                        font-style: normal;
                        font-weight: 600;
                        font-size: 16px;
                        line-height: 24px;
                        font-family: 'Montserrat', 'Verdana', sans-serif !important;
                        letter-spacing: 0px;
                        text-transform: capitalize;
                        opacity: 1;">
                          <span @if (($i % 2) == 0) style="color: #43425D;" @else style="color: #FFFFFF;" @endif>{{$signs[$i]['name']}}</span>
                        </div>
                        <div style="margin-top: -11px;
                          text-align: left;
                          font-style: normal;
                          font-weight: 500;
                          font-size: 12px;
                          line-height: 15px;
                          font-family: 'Montserrat', 'Verdana', sans-serif !important;
                          letter-spacing: 0px;
                          text-transform: capitalize;
                          opacity: 1;">
                          <span @if (($i % 2) == 0) style="color: #43425D;" @else style="color: #FFFFFF;" @endif>{{$dates[$i]}}</span>
                        </div>
                      </div>
                   </td>
                  </tr>
                  <tr>
                    <td>
                      <div style="padding: 0px 17px 15px 17px;
                      text-align: left;
                      font-style: normal;
                      font-weight: normal;
                      font-size: 14px;
                      line-height: 21px;
                      font-family: 'Montserrat', 'Verdana', sans-serif !important;
                      letter-spacing: 0px;
                      opacity: 1;">
                        <span @if (($i % 2) == 0) style="color: #43425D;" @else style="color: #FFFFFF;" @endif>
                          {{$signs[$i]['text']}}
                        </span>
                      </div>
                    </td>
                  </tr>
                </table>
                </div>
              </td>
              @endfor
            </tr>
            @endfor
            </table>
          </div>
          <div class="show-sm">
            <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%"
            class="center-table">
              <tr>
                <td>
                  @for ($i = 0; $i < 6; $i++)
                  <div style="
                  opacity: 1;
                  min-height: 298px;"
                  @if (($i % 2) == 0) class="white-div" @else class="purple-div" @endif
                  >
                  <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" class="center-table">
                    <tr>
                      <td style="display: flex;">
                        <div style="margin-left: 17px;
                        margin-top: 6px;">
                          <img src="{{ config('app.url') }}/images/horoscopes/{{$signs[$i]['slug']}}.png"
                            width="114" height="125" />
                        </div>
                        <div style="height: 30px;
                        margin-top: 40px;
                        margin-left: 13px;">
                          <div style="text-align: left;
                          margin-bottom:9px;
                          font-style: normal;
                          font-weight: 600;
                          font-size: 18px;
                          line-height: 24px;
                          font-family: 'Montserrat', 'Verdana', sans-serif !important;
                          letter-spacing: 0px;
                          text-transform: capitalize;
                          opacity: 1;">
                            <span @if (($i % 2) == 0) style="color: #43425D;" @else style="color: #FFFFFF;" @endif>{{$signs[$i]['name']}}</span>
                          </div>
                          <div style="margin-top: -11px;
                          text-align: left;
                          font-style: normal;
                          font-weight: 500;
                          font-size: 14px;
                          line-height: 15px;
                          font-family: 'Montserrat', 'Verdana', sans-serif !important;
                          letter-spacing: 0px;
                          text-transform: capitalize;
                          opacity: 1;">
                            <span @if (($i % 2) == 0) style="color: #43425D;" @else style="color: #FFFFFF;" @endif>{{$dates[$i]}}</span>
                          </div>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div style="padding: 0px 17px 15px 17px;
                        text-align: left;
                        font-style: normal;
                        font-weight: normal;
                        font-size: 14px;
                        line-height: 21px;
                        font-family: 'Montserrat', 'Verdana', sans-serif !important;
                        letter-spacing: 0px;
                        opacity: 1;">
                          <span @if (($i % 2) == 0) style="color: #43425D;" @else style="color: #FFFFFF;" @endif>
                            {{$signs[$i]['text']}}
                          </span>
                        </div>
                      </td>
                    </tr>
                  </table>
                </div>
                @endfor
                </td>
              </tr>
            </table>
          </div>
        </td>
      </tr>
      <tr>
        <td style="background: #FFFFFF 0% 0% no-repeat padding-box;opacity: 1;height: 117px;">
          <div>
            <center>
              <div style="padding-bottom: 10px;">
                <span style="
                  color: #43425B;
                  opacity: 1;
                  font-style: italic;
                  font-weight: 600;
                  font-size: 16px;
                  line-height: 18px;
                  font-family: 'Montserrat', 'Verdana', sans-serif !important;">
                  Get a Personal Astrology Reading
                </span>
              </div>
              <div style="padding-top: 19px;">
                <a style="width: 114px; height: 38px; padding: 10px 20px; background: #43425D 0% 0% no-repeat padding-box; border-radius: 20px; color:white; font-style: normal;
                font-weight: 600;
                font-size: 14px;
                line-height: 18px;
                font-family: 'Montserrat', 'Verdana', sans-serif !important;
                letter-spacing: 0px;
                color: #FFFFFF;
                opacity: 1;"
                  href="{{config('app.url')}}/search?ability=astrology&sort=3&sortBy=rating" target="blank">
                  Astrologers
                </a>
              </div>
            </center>
          </div>
        </td>
      </tr>
       {{--  <td class="padding-sm"
          style=" height: 115px; background:#F0F0F7;text-align: center; color: #43425D;font-family: sans-serif; font-size: 15px; line-height: 15px; margin: auto;">
          <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%"
            height="100%">
            <tr>
              @if ($i == 0)              
                <td class="content-left"
                  style="background:url('{{config('app.url')}}/images/site-images/horoscope_email/horoscope_email3.png');background-size: cover; background-repeat: no-repeat;">
                  <!--[if gte mso 9]>
                  <table>
                    <tr>
                      <td width="20%"></td>
                      <td width="60%">
                      <v:oval style="width:83;height:83;opacity:0;" stroked="false">
                      <v:fill src="{{config('app.url')}}/images/site-images/horoscope_email/horoscope_email{{$images[$i]}}.png" type="frame">
                      <v:/fill>
                    </v:oval>
                    </td>
                      <td width="20%"></td>
                    </tr>
                  </table>
                      <![endif]--> 
                  <!--[if !gte mso 9]> -->
                  <img src="{{config('app.url')}}/images/site-images/horoscope_email/horoscope_email{{$images[$i]}}.png"
                    width="83" height="83" />
                  <!--<![endif]-->   
                </td>
              @else
                <td class="content-left" style="background: {{$backgrounds[$i]}}">
                  <!--[if gte mso 9]>
                  <table>
                    <tr>
                      <td width="20%"></td>
                      <td width="60%">
                      <v:oval style="width:83;height:83;opacity:0;" stroked="false">
                      <v:fill src="{{config('app.url')}}/images/site-images/horoscope_email/horoscope_email{{$images[$i]}}.png" type="frame">
                      <v:/fill>
                    </v:oval>
                    </td>
                      <td width="20%"></td>
                    </tr>
                  </table>
                      <![endif]--> 
                  <!--[if !gte mso 9]> -->
                  <img src="{{config('app.url')}}/images/site-images/horoscope_email/horoscope_email{{$images[$i]}}.png"
                    width="83" height="83" />
                    <!--<![endif]-->
                </td>
              @endif
                <td class="content-right" style="background-color: #FFFFFF; text-align: left; padding: 15px">
                  <span style="color: #9D61BD; font-size: 16px; font-weight: 600">{{$signs[$i]['name']}}</span><span
                    style="color: #9D61BD; font-size: 14px; margin-left:10px;">{{$dates[$i]}}</span>
                  <div style="font-size: 14px; line-height: 21px; margin: 0px; padding: 14px 0px">
                    {{$signs[$i]['text']}}
                  </div>
                </td>
              </tr>
            </table>
        </td> --}}
        </tr>
        {{-- <tr>
          <td class="padding-sm"
            style=" height: auto;background:#F0F0F7;text-align: center; color: #A163C1;font-family: sans-serif; font-size: 15px; line-height: 15px; margin: auto;;">

            <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%"
              class="center-table">
              <tr>
                <td class="content-right"
                  style="text-align: center; ">
                  <a href="{{config('app.url')}}/search?sortBy=rating" target="blank">
                    background:url('{{config('app.url')}}/images/site-images/horoscope_email/horoscope.png');background-size: cover; background-repeat: no-repeat; 
                    <img class="show-sm" src="{{config('app.url')}}/images/site-images/horoscope_email/horoscope2.png"
                    width="100%" />

                    <img class="hidden-sm" src="{{config('app.url')}}/images/site-images/horoscope_email/horoscope.png"
                    width="100%" />
                    <p
                      style="line-height: 2; font-size: 16px; font-weight: 600; margin: 0px; color: #43425D;text-align: center">
                      Seeking Clarity?
                    </p>
                    <p
                      style="line-height: 2; font-size: 16px; font-weight: 600; margin: 0px; color: #43425D;text-align: center">
                      Try Our Top Psychics!
                    </p>
                    <div style="padding-top: 32px">

                      <a style="width: 114px; height: 38px; padding: 10px 20px; background-color: #43425D; border-radius: 20px; color:white; font-size: 14px;font-family: 'Montserrat', 'Verdana', sans-serif; font-weight: 600"
                        href="{{config('app.url')}}/search?sortBy=rating" target="blank">
                        Explore
                      </a>
                    </div>
                  </a>
                </td>
              </tr>
            </table>
          </td>
        </tr> --}}
        <tr>
          <td>
            <div style="magrin: 100px; height: 500px; display:none;">

            </div>
            <div class="hidden-sm">
              <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%"
                class="center-table">
                @for ($i = 6; $i < 8; $i++)
                  <tr style="height: 289px;">
                  @for ($i = 6; $i < 8; $i++)
                    <td style="height: 100%;" @if (($i % 2) == 0) class="purple-div" @else class="white-div" @endif>
                      <div style="
                      opacity: 1;
                      width: 375px;
                      height: 100%;
                      min-height: 289px;"
                      >
                      <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" class="center-table">
                        <tr>
                          <td style="display: flex;">
                            <div style="margin-left: 17px;
                            margin-top: 6px;">
                              <img src="{{ config('app.url') }}/images/horoscopes/{{$signs[$i]['slug']}}.png"
                                width="114" height="125" />
                            </div>
                            <div style="height: 30px;
                            margin-top: 40px;
                            margin-left: 13px;">
                              <div style="text-align: left;
                              margin-bottom:9px;
                              font-style: normal;
                              font-weight: 600;
                              font-size: 16px;
                              line-height: 24px;
                              font-family: 'Montserrat', 'Verdana', sans-serif !important;
                              letter-spacing: 0px;
                              text-transform: capitalize;
                              opacity: 1;">
                                <span @if (($i % 2) == 0) style="color: #FFFFFF;" @else style="color: #43425D;" @endif>{{$signs[$i]['name']}}</span>
                              </div>
                              <div style="margin-top: -11px;
                              text-align: left;
                              font-style: normal;
                              font-weight: 500;
                              font-size: 12px;
                              line-height: 15px;
                              font-family: 'Montserrat', 'Verdana', sans-serif !important;
                              letter-spacing: 0px;
                              text-transform: capitalize;
                              opacity: 1;">
                                <span @if (($i % 2) == 0) style="color: #FFFFFF;" @else style="color: #43425D;" @endif>{{$dates[$i]}}</span>
                              </div>
                            </div>
                         </td>
                        </tr>
                        <tr>
                          <td>
                            <div style="padding: 0px 17px 15px 17px;
                            text-align: left;
                            font-style: normal;
                            font-weight: normal;
                            font-size: 14px;
                            line-height: 21px;
                            font-family: 'Montserrat', 'Verdana', sans-serif !important;
                            letter-spacing: 0px;
                            opacity: 1;">
                              <span @if (($i % 2) == 0) style="color: #FFFFFF;" @else style="color: #43425D;" @endif>
                                {{$signs[$i]['text']}}
                              </span>
                            </div>
                          </td>
                        </tr>
                      </table>
                      </div>
                    </td>
                  @endfor
                  </tr>
                @endfor
                @for ($i = 8; $i < 10; $i++)
                <tr style="height: 289px;">
                  @for ($i = 8; $i < 10; $i++)
                  <td style="height: 100%;" @if (($i % 2) == 0) class="white-div" @else class="purple-div" @endif>
                    <div style="
                    opacity: 1;
                    width: 375px;
                    height: 100%;
                    min-height: 289px;"
                    >
                    <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" class="center-table">
                      <tr>
                        <td style="display: flex;">
                          <div style="margin-left: 17px;
                            margin-top: 6px;">
                              <img src="{{ config('app.url') }}/images/horoscopes/{{$signs[$i]['slug']}}.png"
                                width="114" height="125" />
                            </div>
                            <div style="height: 30px;
                            margin-top: 40px;
                            margin-left: 13px;">
                            <div style="text-align: left;
                            margin-bottom:9px;
                            font-style: normal;
                            font-weight: 600;
                            font-size: 16px;
                            line-height: 24px;
                            font-family: 'Montserrat', 'Verdana', sans-serif !important;
                            letter-spacing: 0px;
                            text-transform: capitalize;
                            opacity: 1;">
                              <span @if (($i % 2) == 0) style="color: #43425D;" @else style="color: #FFFFFF;" @endif>{{$signs[$i]['name']}}</span>
                            </div>
                            <div style="margin-top: -11px;
                            text-align: left;
                            font-style: normal;
                            font-weight: 500;
                            font-size: 12px;
                            line-height: 15px;
                            font-family: 'Montserrat', 'Verdana', sans-serif !important;
                            letter-spacing: 0px;
                            text-transform: capitalize;
                            opacity: 1;">
                              <span @if (($i % 2) == 0) style="color: #43425D;" @else style="color: #FFFFFF;" @endif>{{$dates[$i]}}</span>
                            </div>
                          </div>
                       </td>
                      </tr>
                      <tr>
                        <td>
                          <div style="padding: 0px 17px 15px 17px;
                          text-align: left;
                          font-style: normal;
                          font-weight: normal;
                          font-size: 14px;
                          line-height: 21px;
                          font-family: 'Montserrat', 'Verdana', sans-serif !important;
                          letter-spacing: 0px;
                          opacity: 1;">
                            <span @if (($i % 2) == 0) style="color: #43425D;" @else style="color: #FFFFFF;" @endif>
                              {{$signs[$i]['text']}}
                            </span>
                          </div>
                        </td>
                      </tr>
                    </table>
                    </div>
                  </td>
                  @endfor
                </tr>
              @endfor
              @for ($i = 10; $i < 12; $i++)
              <tr style="height: 289px;">
                @for ($i = 10; $i < 12; $i++)
                <td style="height: 100%;" @if (($i % 2) == 0) class="purple-div" @else class="white-div" @endif>
                  <div style="
                  opacity: 1;
                  width: 375px;
                  height: 100%;
                  min-height: 300px;"
                  >
                  <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" class="center-table">
                    <tr>
                      <td style="display: flex;">
                        <div style="margin-left: 17px;
                          margin-top: 6px;">
                            <img src="{{ config('app.url') }}/images/horoscopes/{{$signs[$i]['slug']}}.png"
                              width="114" height="125" />
                          </div>
                          <div style="height: 30px;
                          margin-top: 40px;
                          margin-left: 13px;">
                          <div style="text-align: left;
                          margin-bottom:9px;
                          font-style: normal;
                          font-weight: 600;
                          font-size: 16px;
                          line-height: 24px;
                          font-family: 'Montserrat', 'Verdana', sans-serif !important;
                          letter-spacing: 0px;
                          text-transform: capitalize;
                          opacity: 1;">
                            <span @if (($i % 2) == 0) style="color: #FFFFFF;" @else style="color: #43425D;" @endif>{{$signs[$i]['name']}}</span>
                          </div>
                          <div style="margin-top: -11px;
                          text-align: left;
                          font-style: normal;
                          font-weight: 500;
                          font-size: 12px;
                          line-height: 15px;
                          font-family: 'Montserrat', 'Verdana', sans-serif !important;
                          letter-spacing: 0px;
                          text-transform: capitalize;
                          opacity: 1;">
                            <span @if (($i % 2) == 0) style="color: #FFFFFF;" @else style="color: #43425D;" @endif>{{$dates[$i]}}</span>
                          </div>
                        </div>
                     </td>
                    </tr>
                    <tr>
                      <td>
                        <div style="padding: 0px 17px 15px 17px;
                        text-align: left;
                        font-style: normal;
                        font-weight: normal;
                        font-size: 14px;
                        line-height: 21px;
                        font-family: 'Montserrat', 'Verdana', sans-serif !important;
                        letter-spacing: 0px;
                        opacity: 1;">
                          <span @if (($i % 2) == 0) style="color: #FFFFFF;" @else style="color: #43425D;" @endif>
                            {{$signs[$i]['text']}}
                          </span>
                        </div>
                      </td>
                    </tr>
                  </table>
                  </div>
                </td>
                @endfor
              </tr>
              @endfor
              </table>
            </div>
            <div class="show-sm">
              <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%"
              class="center-table">
                <tr>
                  <td>
                    @for ($i = 6; $i < 12; $i++)
                    <div style="
                    opacity: 1;
                    min-height: 298px;"
                    @if (($i % 2) == 0) class="purple-div" @else class="white-div" @endif
                    >
                    <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" class="center-table">
                      <tr>
                        <td style="display: flex;">
                          <div style="margin-left: 17px;
                            margin-top: 6px;">
                            <img src="{{ config('app.url') }}/images/horoscopes/{{$signs[$i]['slug']}}.png"
                            width="114" height="125" />
                          </div>
                          <div style="height: 30px;
                          margin-top: 40px;
                          margin-left: 13px;">
                            <div style="font-style: normal;
                            margin-bottom:9px;
                            font-weight: 600;
                            font-size: 18px;
                            line-height: 24px;
                            font-family: 'Montserrat', 'Verdana', sans-serif !important;
                            letter-spacing: 0px;
                            text-transform: capitalize;
                            opacity: 1;">
                              <span @if (($i % 2) == 0) style="color: #FFFFFF;" @else style="color: #43425D;" @endif>{{$signs[$i]['name']}}</span>
                            </div>
                            <div style="margin-top: -11px;
                            text-align: left;
                            font-style: normal;
                            font-weight: 500;
                            font-size: 14px;
                            line-height: 15px;
                            font-family: 'Montserrat', 'Verdana', sans-serif !important;
                            letter-spacing: 0px;
                            text-transform: capitalize;
                            opacity: 1;">
                              <span @if (($i % 2) == 0) style="color: #FFFFFF;" @else style="color: #43425D;" @endif>{{$dates[$i]}}</span>
                            </div>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div style="padding: 0px 17px 15px 17px;
                          text-align: left;
                          font-style: normal;
                          font-weight: normal;
                          font-size: 14px;
                          line-height: 21px;
                          font-family: 'Montserrat', 'Verdana', sans-serif !important;
                          letter-spacing: 0px;
                          opacity: 1;">
                            <span @if (($i % 2) == 0) style="color: #FFFFFF;" @else style="color: #43425D;" @endif>
                              {{$signs[$i]['text']}}
                            </span>
                          </div>
                        </td>
                      </tr>
                    </table>
                  </div>
                  @endfor
                  </td>
                </tr>
              </table>
            </div>
          </td>
          </tr>
          <tr class="hidden-sm">
            <td style="height: 30px; background:#C48197; width: 100%"></td>
          </tr> 
          <table style="background-color: #43425d;">

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
  
                        <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" height="100%" style="    border-radius: 20px;background: #ffffff;border-spacing: 0;">
      
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
                                  style="background-color: #FFFFFF; text-align: left; padding: 20px 20px 10px 20px;">
                  
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
                                      <div style="font-family: 'Montserrat', 'Verdana', sans-serif;">
                                          {{$user1->userProfile->display_name}}
                                      </div>
  
                                      <div class="" style="margin-top: 11px;margin-bottom:6px;">
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
                                  
                                  <div style="font-size: 12px; color: #656b72; 
                                              line-height: 21px; 
                                              margin: 0px; padding: 0px 0px ;
                                              font-family: 'Montserrat', 'Verdana', sans-serif;">
                                       {{ str_limit($user1->userProfile->description, 80) }}
                                  </div>
  
                                  <div style="font-size: 12px; text-align: right; color: white;">
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
                    margin-top: 40px !important;">
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
                    margin: 10px;">
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
          </table>
          <tr>
            <td
              style="background-color: #43425D;line-height: 24px; text-align: center; margin: auto;  font-family: 'Montserrat',  'Verdana', sans-serif; color: #FFFFFF;font-size: 16px;">
              <div style="max-width: 550px; margin: auto; padding: 0px 35px;">
                <table cellspacing="0" width="100%" style="background-color: #43425D;">
                  <tr>
                    <td
                      style="text-align: center; padding-top: 30px; color: #8EBEF8; font-family: 'Montserrat',  'Verdana', sans-serif; font-weight: 600; font-size: 16px;">
                      <div style="font-family: 'Montserrat',  'Verdana', sans-serif;" class="hidden-sm">Read the Latest Psychic News on Our Radar</div>
                      <div style="font-family: 'Montserrat',  'Verdana', sans-serif;" class="show-sm">
                        <div>Read the Latest</div>
                        <div>Psychic News on Our Radar</div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td
                      style="text-align: center;padding-top:20px; color: #ffffff; font-family: 'Montserrat',  'Verdana', sans-serif; font-size: 16px;">
                      <div style="font-family: 'Montserrat',  'Verdana', sans-serif;">
                        Check out our <a style=" color: #8EBEF8;font-family: 'Montserrat',  'Verdana', sans-serif;"
                          href="https://www.psychics1on1.com/blog">New Age Blog</a>
                        for the best spiritual and wellness stories, news and advice.
                      </div>
                    </td>
                  </tr>
    
                  <tr>
                    <td>
                      <table style="margin-top: 35px !important;" role="presentation" border="0" cellpadding="0"
                        cellspacing="0" width="100%">
                        <tr>
                          <td
                            style="font-family: 'Montserrat', 'Verdana', sans-serif; font-size: 15px; color:#ffffff; text-align: center; "
                            class="center-on-narrow">
    
                            <hr style="width:180px;margin-bottom: 19px;">
    
                            <a href="https://www.instagram.com/psychics1on1/" target="blank">
                              <img src="{{config('app.url')}}/images/icons/email/instagram_2.png">
                            </a>
                            <a href="https://www.facebook.com/Psychics1on1/" target="blank" style="margin-left:14px;">
                              <img src="{{config('app.url')}}/images/icons/email/facebook_2.png">
    
                            </a>
                            <a href="https://twitter.com/psychics1on1/" target="blank" style="margin-left:14px;">
                              <img class="padding_social" src="{{config('app.url')}}/images/icons/email/twitter_2.png">
                            </a>
                            <a href="https://www.linkedin.com/company/psychics1on1/about/" target="blank"
                              style="margin-left:14px;">
                              <img src="{{config('app.url')}}/images/icons/email/linkedin_2.png">
                            </a>
    
    
                          </td>
                        </tr>
                        <tr>
                          <td
                            style="font-family: 'Montserrat',  'Verdana', sans-serif; padding-top:15px; padding-bottom: 20px; font-size: 12px; line-height: 15px; text-align: center; color: #ffffff!important;">
                            <div style="font-family: 'Montserrat', 'Verdana', sans-serif;">
                              <a href="mailto:{{$user->email}}"> <span style="color:#FFFFFF !important; font-family: 'Montserrat', 'Verdana', sans-serif; ">Sent to <span
                                  style="color:#8EBEF8; font-family: 'Montserrat', 'Verdana', sans-serif;">{!!
                                  str_replace('.', '<span>.</span>', str_replace('@', '<span>@</span>', $user->email))
                                  !!}</span></a> because you joined our platform.
                            <br>
                            © Copyright 2021 <a target="_blank" href="1on1.com"><span
                                style="color:#8EBEF8; font-family: 'Montserrat', 'Verdana', sans-serif;"><span style="font-family: 'Montserrat', 'Verdana', sans-serif;">1on1.</span>com</span></a>, LLC</span>
                            </div>
                          </td>
                        </tr>
                      </table>
                    </td>
                  </tr>
    
                </table>
              </div>
            </td>
          </tr>
          <!-- Thumbnail Left, Text Right : END -->

    </table>
  </center>
</body>

</html>