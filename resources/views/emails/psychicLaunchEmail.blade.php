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
            font-size: 14px
        }

        /* Media Queries */
        @media screen and (max-width: 750px) {



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
            style="margin: auto; background: #43425D;" class="email-container">
            <tr>
                <td>
                    <div class="hidden-sm"
                        style="width: 100%; height: 274px; background-size: cover; background-repeat: no-repeat; background-image: url('https://www.psychics1on1.com/images/site-images/COSMIC_REWARDS_EMAIL_DESKTOP_bg.gif'); text-align: center;">
                        <div style="margin-bottom: 0px;padding-top: 40px">
                            <a href="https://www.psychics1on1.com/">
                                <img src="https://www.psychics1on1.com/images/site-images/logo.png" width="159" />
                            </a>
                        </div>
                        <div style="margin-bottom: 0px;padding-top: 0px">
                            <a href="https://www.psychics1on1.com/">
                                <img src="https://www.psychics1on1.com/images/site-images/letterD.png" width="500" />
                            </a>
                        </div>

                    </div>
                    <div class="show-sm"
                        style="width: 100%; height: 274px; background-size: cover; background-repeat: no-repeat; background-image: url('https://www.psychics1on1.com/images/site-images/COSMIC_REWARDS_EMAIL_MOBILE_bg.gif'); text-align: center;">
                        
                        
                        <div style="margin-bottom: 20px;padding-top: 40px">
                            <a href="https://www.psychics1on1.com/">
                                <img src="https://www.psychics1on1.com/images/site-images/logo.png" width="159" />
                            </a>
                        </div>

                        
                        <div style="margin-bottom: 0px;padding-top: 0px">
                            <a href="https://www.psychics1on1.com/">
                                <img src="https://www.psychics1on1.com/images/site-images/letterM.png" />
                            </a>
                        </div>

                    </div>
                </td>
            </tr>
            <tr>
                <td
                    style="padding-top: 20px;padding-bottom:20px; background:#43425D;text-align: center; color: #FFFFFF;font-family: 'Montserrat',  'Verdana', sans-serif; font-size: 15px; margin: auto; display: block;">

                    <div
                        style="text-transform: capitalize; margin:auto; text-align: center; font-family: 'Montserrat',  'Verdana', sans-serif; font-size: 18px;color:#FFFFFF; text-align: center;">
                        <div class="font-change"
                            style=" font-size: 14px; font-family: 'Montserrat', 'Verdana', sans-serif; padding-left: 25px; padding-right: 25px; line-height: 1.5; max-width: 550px; margin: auto; font-weight: 600;">
                            The Cosmic Rewards Referral Program
                        </div>
                    </div>
                </td>
         
          
            </tr>



            <tr>
                <td
                    style="line-height: 24px; text-align: center; padding:20px 20px; margin: auto; background: #FFFFFF;">
                  

                    <div
                        style="max-width: 550px; margin: auto; font-family: 'Montserrat',  'Verdana', sans-serif; color: #43425D; font-size: 16px ">
                        Make the most from your relationships with your brand new Cosmic Rewards Referral Program. Refer new clients to Psychics1on1 and you’ll both be rewarded!
                    </div>
                
                </td>
            </tr>

            <tr>
                <td
                    style="padding-top: 14px;padding-bottom:14px; background:#F0F0F7;text-align: center; color: #FFFFFF;font-family: 'Montserrat',  'Verdana', sans-serif; font-size: 14px; margin: auto; display: block;">

                    <div
                        style="text-transform: capitalize; margin:auto; text-align: center; font-family: 'Montserrat',  'Verdana', sans-serif; font-size: 14px;color:#43425d; text-align: center;">
                        <div class="font-change"
                            style="font-size: 14px;font-family: 'Montserrat', 'Verdana', sans-serif; padding-left: 25px; padding-right: 25px; line-height: 1.5; max-width: 550px; margin: auto; font-weight: 600;">
                            Here’s How it Works
                        </div>
                    </div>
                </td>
            </tr>

            <tr>
                <td
                    style="line-height: 24px; text-align: center; padding:20px 20px; margin: auto; background: #FFFFFF;">
                  

                    <div
                        style=" padding-bottom: 14px;text-transform: capitalize; margin:auto; text-align: center; font-family: 'Montserrat',  'Verdana', sans-serif; font-size: 14px;color:#43425d; text-align: center;">
                        <div class="font-change"
                            style="font-size: 14px;font-family: 'Montserrat', 'Verdana', sans-serif; padding-left: 25px; padding-right: 25px; line-height: 1.5; max-width: 550px; margin: auto; font-weight: 600;">
                            Spread the Word
                        </div>
                    </div>

                    <div
                        style="max-width: 550px; margin: auto; font-family: 'Montserrat',  'Verdana', sans-serif; color: #43425D; font-size: 16px ">
                        Share your unique invite link right from your dashboard via email and add everywhere your network can find you like social media, your website - even your storefront.
                    </div>
                
                </td>
            </tr>

            <tr>
                <td
                    style="line-height: 24px; text-align: center; padding:20px 20px;padding-top:0; margin: auto; background: #FFFFFF;">
                  

                    <div
                        style=" padding-bottom: 14px;text-transform: capitalize; margin:auto; text-align: center; font-family: 'Montserrat',  'Verdana', sans-serif; font-size: 14px;color:#43425d; text-align: center;">
                        <div class="font-change"
                            style="font-size: 14px;font-family: 'Montserrat', 'Verdana', sans-serif; padding-left: 25px; padding-right: 25px; line-height: 1.5; max-width: 550px; margin: auto; font-weight: 600;">
                            Love Fee-Free Earning?
                        </div>
                    </div>

                    <div
                        style="max-width: 550px; margin: auto; font-family: 'Montserrat',  'Verdana', sans-serif; color: #43425D; font-size: 16px ">
                        Keep 100% of Referral earnings spent with you for a full month. Yep, you read that right. Zero fees. 30 days. For every - single - dollar referrals spend with you. If you’re currently counting your contact list in your head, we can’t wait to see your Cosmic Rewards dashboard light up with fee-free earning activity!
                    </div>
                
                </td>
            </tr>


            <tr>
                <td
                    style="line-height: 24px; text-align: center; padding:20px 20px;padding-top:0; margin: auto; background: #FFFFFF;">
                  

                    <div
                        style=" padding-bottom: 14px;text-transform: capitalize; margin:auto; text-align: center; font-family: 'Montserrat',  'Verdana', sans-serif; font-size: 14px;color:#43425d; text-align: center;">
                        <div class="font-change"
                            style="font-size: 14px;font-family: 'Montserrat', 'Verdana', sans-serif; padding-left: 25px; padding-right: 25px; line-height: 1.5; max-width: 550px; margin: auto; font-weight: 600;">
                            Treat ‘Em to a Little Something Something
                        </div>
                    </div>

                    <div
                        style="max-width: 550px; margin: auto; font-family: 'Montserrat',  'Verdana', sans-serif; color: #43425D; font-size: 16px ">
                        Anyone who joins Psychics1on1 through your personal link will get up to $10 free with their first purchase.
                    </div>
                
                </td>
            </tr>

            <tr>
                <td
                    style="padding-top: 14px;padding-bottom:14px; background:#F0F0F7;text-align: center; color: #FFFFFF;font-family: 'Montserrat',  'Verdana', sans-serif; font-size: 14px; margin: auto; display: block;">

                    <div
                        style="text-transform: capitalize; margin:auto; text-align: center; font-family: 'Montserrat',  'Verdana', sans-serif; font-size: 14px;color:#43425d; text-align: center;">
                        <div class="font-change"
                            style="font-size: 14px;font-family: 'Montserrat', 'Verdana', sans-serif; padding-left: 25px; padding-right: 25px; line-height: 1.5; max-width: 550px; margin: auto; font-weight: 600;">
                            We Could Tell You More, How About We Show You?
                        </div>
                    </div>
                </td>
            </tr>
           
     
            <tr>
                <td
                    style="line-height: 24px; text-align: center; padding:20px 20px; margin: auto; background: #FFFFFF;">

          


                    <div
                        style="max-width: 550px; margin: auto; font-family: 'Montserrat',  'Verdana', sans-serif; color: #43425D; font-size: 16px ">
                        Check out the shiny new addition to your dashboard. Quick access to Cosmic Rewards is located in your account and sidebar menus.
                    </div>
                    <div style=" margin-top: 30px; height: 30px; width: 100%;text-align:center;"><a
                            style="font-weight: 600; width: 83px; height: 30px; padding: 10px 20px; background-color: #43425D; border-radius: 20px; color:#FFFFFF; font-size: 14px;font-family: 'Montserrat', 'Verdana', sans-serif;"
                            href="https://www.psychics1on1.com/dashboard/cosmic-rewards"
                            target="blank">
                            <span style="color:#FFFFFF; font-family: 'Montserrat', 'Verdana', sans-serif;">Let’s Do This</span>
                        </a></div>

                </td>
            </tr>

            

    

            <tr>
                <td
                    style="background-color: #43425D;line-height: 24px; text-align: center; margin: auto;  font-family: 'Montserrat',  'Verdana', sans-serif; color: #FFFFFF;font-size: 16px;">
                    <div style="max-width: 550px; margin: auto; padding: 0px 35px;">
                        <table cellspacing="0" width="100%">
                            <tr>
                                <td
                                    style="text-align: center; padding-top: 30px; color: #8EBEF8; font-family: 'Montserrat',  'Verdana', sans-serif; font-weight: 600; font-size: 16px;">
                                    <div style="font-family: 'Montserrat',  'Verdana', sans-serif;" class="hidden-sm">
                                        Read the Latest Psychic News on Our Radar</div>
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
                                        Check out our <a
                                            style=" color: #8EBEF8;font-family: 'Montserrat',  'Verdana', sans-serif;"
                                            href="https://www.psychics1on1.com/blog">New Age Blog</a>
                                        for the best spiritual and wellness stories, news and advice.
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <table style="margin-top: 35px !important;" role="presentation" border="0"
                                        cellpadding="0" cellspacing="0" width="100%">
                                        <tr>
                                            <td style="font-family: 'Montserrat', 'Verdana', sans-serif; font-size: 15px; color:#ffffff; text-align: center; "
                                                class="center-on-narrow">

                                                <hr style="width:180px;margin-bottom: 19px;">

                                                <a href="https://www.instagram.com/psychics1on1/" target="blank">
                                                    <img src="https://www.psychics1on1.com/images/icons/email/instagram_2.png">
                                                </a>
                                                <a href="https://www.facebook.com/Psychics1on1/" target="blank"
                                                    style="margin-left:14px;">
                                                    <img src="https://www.psychics1on1.com/images/icons/email/facebook_2.png">

                                                </a>
                                                <a href="https://twitter.com/psychics1on1/" target="blank"
                                                    style="margin-left:14px;">
                                                    <img class="padding_social"
                                                        src="https://www.psychics1on1.com/images/icons/email/twitter_2.png">
                                                </a>
                                                <a href="https://www.linkedin.com/company/psychics1on1/about/"
                                                    target="blank" style="margin-left:14px;">
                                                    <img src="https://www.psychics1on1.com/images/icons/email/linkedin_2.png">
                                                </a>


                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                style="font-family: 'Montserrat',  'Verdana', sans-serif; padding-top:15px; padding-bottom: 20px; font-size: 12px; line-height: 15px; text-align: center; color: #ffffff!important;">
                                                <div style="font-family: 'Montserrat', 'Verdana', sans-serif;">
                                                    <a href="mailto:{{$user->email}}"> <span
                                                            style="color:#FFFFFF !important; font-family: 'Montserrat', 'Verdana', sans-serif; ">Sent
                                                            to <span
                                                                style="color:#8EBEF8; font-family: 'Montserrat', 'Verdana', sans-serif;">{!!
                                                                str_replace('.', '<span>.</span>', str_replace('@',
                                                                '<span>@</span>', $email))
                                                                !!}</span></a> 
                                                    <br>
                                                    <a target="_blank" href="1on1.com"><span
                                                            style="color:#fff; font-family: 'Montserrat', 'Verdana', sans-serif;">Psychics1on1™, LLC</span></a>
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

        </table>
    </center>
</body>

</html>