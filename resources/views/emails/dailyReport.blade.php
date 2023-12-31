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
    <title></title> <!-- The title tag shows in email notifications, like Android 4.4. -->
    <style>
        @import url('https://fonts.googleapis.com/css?family=Montserrat&display=swap');
        @import url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css');
    </style>
    <!-- Web Font / @font-face : BEGIN -->
    <!-- NOTE: If web fonts are not required, lines 10 - 27 can be safely removed. -->

    <!-- Desktop Outlook chokes on web font references and defaults to Times New Roman, so we force a safe fallback font. -->
    <!--[if mso]>
    <style>
        * {
            font-family: 'Verdana', sans-serif !important;
        }
    </style>
    <![endif]-->


    <!--[if !mso]><!-->
    <!-- insert web font reference, eg:  -->
    <style>
        * {
            font-family: 'Montserrat', 'Verdana', sans-serif;
        }
    </style>
    <!--<![endif]-->

    <!-- Web Font / @font-face : END -->

    <!-- CSS Reset : BEGIN -->
    <style>
        /* What it does: Remove spaces around the email design added by some email clients. */
        /* Beware: It can remove the padding / margin and add a background color to the compose a reply window. */
        html,
        body {
            margin: 0 !important;
            padding: 0 !important;
            height: 100% !important;
            width: 100% !important;
            font-family: 'Montserrat', 'Verdana', sans-serif;
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

        /* What it does: Stops Outlook from adding extra spacing to tables. */
        table,
        td {
            mso-table-lspace: 0pt !important;
            mso-table-rspace: 0pt !important;
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

            .text_review {
                width: 100% !important;
            }
        }

        /* iPhone 6+, 7+, and 8+ */
        @media only screen and (min-device-width: 414px) {
            u~div .email-container {
                min-width: 414px !important;
            }
        }

        hr {
            border: 0;
            border-top: 1px solid #ccc;
        }

        a {
            cursor: pointer;
        }

        .padding_social {
            padding: 0px 10px !important;
        }

        .checked {
            color: orange;
        }
    </style>

    <!-- What it does: Makes background images in 72ppi Outlook render at correct size. -->
    <!--[if gte mso 9]>
    <xml>
        <o:OfficeDocumentSettings>
            <o:AllowPNG/>
            <o:PixelsPerInch>96</o:PixelsPerInch>
        </o:OfficeDocumentSettings>
    </xml>
    <![endif]-->

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

        /* Media Queries */
        @media screen and (max-width: 600px) {

            h1 {
                font-size: 25px !important;
            }

            .email-container {
                width: 100% !important;
                margin: auto !important;
            }

            /* What it does: Forces table cells into full-width rows. */
            .stack-column,
            .stack-column-center {
                display: block !important;
                width: 100% !important;
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

            .text_review {
                width: 100% !important;
            }

            .display_none_mobile {
                display: none !important;
            }

            .with_mobile_img {
                width: 30% !important;
            }

            .padding_0 {
                padding: 10 2 !important;
            }

            .display_on_mobile {
                display: block !important;
            }


        }
    </style>

    <style type="text/css">
        /* CLIENT-SPECIFIC STYLES */
        body,
        table,
        td,
        a {
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
        }

        /* Prevent WebKit and Windows mobile changing default text sizes */
        table,
        td {
            mso-table-lspace: 0pt;
            mso-table-rspace: 0pt;
        }

        /* Remove spacing between tables in Outlook 2007 and up */
        img {
            -ms-interpolation-mode: bicubic;
        }

        /* Allow smoother rendering of resized image in Internet Explorer */

        /* RESET STYLES */
        img {
            border: 0;
            height: auto;
            line-height: 100%;
            outline: none;
            text-decoration: none;
        }

        table {
            border-collapse: collapse !important;
        }

        body {
            height: 100% !important;
            margin: 0 !important;
            padding: 0 !important;
            width: 100% !important;
        }
    </style>
    <!--[if gte mso 12]>
    <style type="text/css">
        .mso-right {
            padding-left: 20px;
        }
    </style>
    <![endif]-->
    <!--[if gt mso 15]>
    <style type="text/css" media="all">
        /* Outlook 2016 Height Fix */
        table, tr, td {border-collapse: collapse;}
        tr { font-size:0px; line-height:0px; border-collapse: collapse; }
    </style>
    <![endif]-->
    <!--[if (gte mso 9)|(IE)]>
    <style type="text/css">
        table {
            border-collapse: collapse;
            border-spacing: 0; }
    </style>
    <![endif]-->
    <!-- Progressive Enhancements : END -->

</head>

<body width="100%"
    style="margin: 0; padding: 0 !important; mso-line-height-rule: exactly; background-color: #ffffff;font-family: 'Montserrat', 'Verdana', sans-serif;">
    <center style="width: 100%; background-color: #ffffff;">

        <!-- Email Body : BEGIN -->
        <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" style="margin: auto;"
            class="email-container">
            <!-- Email Header : BEGIN -->
            <tr>
                <td style="padding: 20px 0; text-align: center">
                    <img src="{{config('app.url')}}/images/site-images/logo_color.png" width="159"
                        alt="alt_text" border="0"
                        style="height: auto; background: #ffffff; font-family: sans-serif; font-size: 15px; line-height: 15px; color: #555555;">
                </td>
            </tr>

            <tr>
                <td style="padding: 20px 0; text-align: center">
                    <h1
                        style="margin: 0 0 10px; font-size: 32px; line-height: 30px; color: #A163C1; font-weight: normal;text-align: center">
                        Psychics1on1 Daily Report</h1>
                </td>
            </tr>
            <!-- Email Header : END -->
            <tr>
                <td style="background-color: #ffffff;">

                    <div style="padding: 20 0;font-family: 'Montserrat', 
                    'Verdana', sans-serif; font-size: 14px; line-height: 20px; color: #929394; font-weight: bold">
                        Total Clients: <strong>{{$totals[0]}}</strong>
                    </div>    

                    <div style="padding: 20 0; margin-bottom: 15px; font-family: 'Montserrat', 
                    'Verdana', sans-serif; font-size: 14px; line-height: 20px; color: #929394; font-weight: bold">
                        Total Psychics: <strong>{{$totals[1]}}</strong>
                    </div>

                    @foreach ($data as $date => $value)
                    <div style="padding: 20 0;font-family: 'Montserrat', 
                    'Verdana', sans-serif; font-size: 14px; line-height: 20px; font-weight: bold">
                        <strong>{{$date}}</strong>
                    </div>
                    <div style="margin-top: 5px; padding: 20 0;font-family: 'Montserrat', 
                    'Verdana', sans-serif; font-size: 14px; line-height: 20px; color: #929394; font-weight: bold">
                        Transactions: <strong>{{$value['transactions']}}</strong>
                    </div>
                    <div style="margin-top: 5px; padding: 20 0;font-family: 'Montserrat', 
                    'Verdana', sans-serif; font-size: 14px; line-height: 20px;font-weight: bold">
                        Revenue:
                    </div>
                    <div style="padding: 20 0;font-family: 'Montserrat', 
                    'Verdana', sans-serif; font-size: 14px; line-height: 20px; color: #929394; font-weight: bold">
                        Total Revenue: <strong>{{$value['revenue']}}</strong>
                    </div>
                    <div style="padding: 20 0;font-family: 'Montserrat', 
                    'Verdana', sans-serif; font-size: 14px; line-height: 20px; color: #929394; font-weight: bold">
                        Net Revenue: <strong>{{$value['net_revenue']}}</strong>
                    </div>
                    <div style="padding: 20 0;font-family: 'Montserrat', 
                    'Verdana', sans-serif; font-size: 14px; line-height: 20px; color: #929394; font-weight: bold">
                        Refund: <strong>{{$value['refund']}}</strong>
                    </div>
                    <div style="margin-top: 5px; padding: 20 0;font-family: 'Montserrat', 
                    'Verdana', sans-serif; font-size: 14px; line-height: 20px;font-weight: bold">
                        Customers:
                    </div>

                    <div style="padding: 20 0;font-family: 'Montserrat', 
                    'Verdana', sans-serif; font-size: 14px; line-height: 20px; color: #929394; font-weight: bold">
                        New Customers Revenue: <strong>{{$value['new_revenue']}}</strong>
                    </div>
                    <div style="padding: 20 0;font-family: 'Montserrat', 
                    'Verdana', sans-serif; font-size: 14px; line-height: 20px; color: #929394; font-weight: bold">
                        Aging Customers Revenue: <strong>{{$value['aging_revenue']}}</strong>
                    </div>
                    <div style="padding: 20 0;font-family: 'Montserrat', 
                    'Verdana', sans-serif; font-size: 14px; line-height: 20px; color: #929394; font-weight: bold">
                        Net New customers: <strong>{{$value['new_customer']}}</strong>
                    </div>
                    <div style="padding: 20 0;font-family: 'Montserrat', 
                    'Verdana', sans-serif; font-size: 14px; line-height: 20px; color: #929394; font-weight: bold">
                        Aging Customers: <strong>{{$value['existing_customer']}}</strong>
                    </div>
                    <div style="margin-top: 5px; padding: 20 0;font-family: 'Montserrat', 
                    'Verdana', sans-serif; font-size: 14px; line-height: 20px;font-weight: bold">
                        Clients:
                    </div>
                    <div style="padding: 20 0;font-family: 'Montserrat', 
                    'Verdana', sans-serif; font-size: 14px; line-height: 20px; color: #929394; font-weight: bold">
                        New Clients: <strong>{{$value['new_client']}}</strong>
                    </div>
                    
                    <div style="margin-top: 5px; padding: 20 0;font-family: 'Montserrat', 
                    'Verdana', sans-serif; font-size: 14px; line-height: 20px;font-weight: bold">
                        Psychics:
                    </div>
                    <div style="padding: 20 0;font-family: 'Montserrat', 
                    'Verdana', sans-serif; font-size: 14px; line-height: 20px; color: #929394; font-weight: bold">
                        New Psychics: <strong>{{$value['new_psychic']}}</strong>
                    </div>
                    
                    <div style="padding: 20 0;font-family: 'Montserrat', 
                    'Verdana', sans-serif; font-size: 14px; line-height: 20px; color: #929394; font-weight: bold">
                        Earning Psychics: <strong>{{$value['psychic_transactions']}}</strong>
                    </div>
                    <div style="width: 100%;
                    border-bottom: 1px solid #929394; margin: 10px 0px;"></div>
                    @endforeach
                </td>
            </tr>

        </table>

    </center>
</body>

</html>