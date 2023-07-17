<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml"
    xmlns:o="urn:schemas-microsoft-com:office:office">


@include('emails.header')

<body width="100%" style="margin: 0; padding: 0 !important; mso-line-height-rule: exactly; ">

    <center role="article" aria-roledescription="email" lang="en" style="width: 100%;">

        <!-- Email Body : BEGIN -->
        <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="750"
            style="margin: auto;" class="email-container">
            <!-- Email Header : BEGIN -->
            <tr>
                <td class="hidden-sm" style="width: 100%;background-size: cover; background-repeat: no-repeat; background-image: url('{{config('app.url')}}/images/site-images/psychic-reading-reading.png'); text-align: center; height: 170px">
                    <center><a href="{{config('app.url')}}">
                            <img src="{{config('app.url')}}/images/site-images/logo.png" width="159" />
                        </a>
                        <div
                        style="color: #FFFFFF;font-family: 'Montserrat', 'Verdana', sans-serif; font-size: 18px; font-weight: 600; padding-left: 25px; padding-right: 25px; line-height: 1.5; max-width: 550px; margin: auto;margin-top: 21px; ">
                        Begin Your Reading!
                    </div>
                    </center>
                </td>
                <td class="show-sm td-show-sm" style="width: 100%;background-size: cover; background-repeat: no-repeat; background-image: url('{{config('app.url')}}/images/site-images/psychic-reading-reading-mobile.png'); text-align: center; height: 170px">
                    <center><a href="{{config('app.url')}}">
                            <img src="{{config('app.url')}}/images/site-images/logo.png" width="159" />
                        </a>
                        <div
                        style="color: #FFFFFF;font-family: 'Montserrat', 'Verdana', sans-serif; font-size: 18px; font-weight: 600; padding-left: 25px; padding-right: 25px; line-height: 1.5; max-width: 550px; margin: auto;margin-top: 21px; ">
                        Begin Your Reading!
                    </div>
                    </center>
                </td>
            </tr>

            <tr>
                <td style="background-color: #ffffff; text-align: center; padding-top: 40px">
                    <a style="display: inline;">
                        <!--[if gte mso 9]>
                        <table>
                        <tr>
                        <td width="10%"></td>
                        <td width="80%">
                        <v:oval style="width:50;height:50;opacity:0;" stroked="false">
                        <v:fill src="{{$user_chat_request->model()->first()->UserProfile()->first()->haedshot_path}}" type="frame">
                        <v:/fill>
                        </v:oval>
                        </td>
                        <td width="10%"></td>
                        </tr>
                        </table>
                        <![endif]--> 
                        <!--[if !gte mso 9]> -->
                            <img style="    -webkit-backface-visibility: hidden;
                            backface-visibility: hidden;
                            display: inline;
                            overflow: hidden;
                            border-radius: 50%;
                            width: 138px;
                            height: 138px;
                            background-size: cover;
                            background-color: #8EBEF8;
                            "  src="{{$user_chat_request->model()->first()->UserProfile()->first()->haedshot_path}}"> 
                            <!--<![endif]-->
                            </a>
                </td>
            </tr>

            <tr>
                <td style="background-color: #ffffff; padding-top: 20px; text-align: center;">
                    <div style="text-align: center; color:#43425D; font-size: 16px; font-weight: 600">{{$user_chat_request->model()->first()->UserProfile()->first()->display_name}}</div>
                </td>
            </tr>

            <tr>
                <td style="background-color: #ffffff; padding-top: 20px; text-align: center;">
                    <div style="text-align: center; color:#43425D; font-size: 16px; padding-left: 24px; padding-right: 24px">
                        Join your psychic now!
                    </div>
                </td>
            </tr>

            <tr>
                <td style="background-color: #ffffff;text-align: center;">
                    <div style="font-size: 12px; color: white; margin-top: 45px; margin-bottom: 30px">
                        <!--[if !gte mso 9]> -->
                        <a style="font-weight: 600; display: inline-block; padding: 10px 20px;background-color: #43425D; border-radius: 20px; color:white; font-size: 12px; font-family: 'Montserrat',  'Verdana', sans-serif;"
                          href="{{config('app.url')}}/dashboard/appointments?r={{$user_chat_request->id}}" target="blank">
                          <span style="font-family: 'Montserrat', 'Verdana', sans-serif; font-size: 14px;font-weight: 600;">Join Now</span>
                        </a>
                      </div>
                </td>
            </tr>
            
                   
        @include('emails.footer')
        </table>
    </center>
</body>

</html>