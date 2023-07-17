<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml"
    xmlns:o="urn:schemas-microsoft-com:office:office">

@include('emails.header')

<body width="100%" style="margin: 0; padding: 0 !important; mso-line-height-rule: exactly; ">

    <center role="article" aria-roledescription="email" lang="en" style="width: 100%;">

        <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="750"
            style="margin: auto; background: #43425D;" class="email-container">
            <tr>
                <td style="background-size: cover; background-repeat: no-repeat; background-image: url('{{config('app.url')}}/images/site-images/reset-password.png'); text-align: center; height: 170px">
                    <center><a href="{{config('app.url')}}">
                            <img src="{{config('app.url')}}/images/site-images/logo.png" width="159" />
                        </a>
                        <div
                        style="color: #FFFFFF;font-family: 'Montserrat', 'Verdana', sans-serif; font-size: 18px; font-weight: 600; padding-left: 25px; padding-right: 25px; line-height: 1.5; max-width: 550px; margin: auto;margin-top: 21px; ">
                        Hit Reset
                    </div>
                    </center>
                </td>
            </tr>
            <tr>
                <td
                    style="padding-top: 25px;padding-bottom: 30px;background:#FFFFFF;text-align: center; color: #FFFFFF;font-family: 'Montserrat',  'Verdana', sans-serif; font-size: 15px; margin: auto; display: block;">

                    <div
                        style="text-transform: capitalize; margin:auto; text-align: center; font-family: 'Montserrat',  'Verdana', sans-serif; font-size: 18px; font-weight: 600;color:#FFFFFF; text-align: center;">
                        <div
                            style="font-size: 14px; font-weight: 600; font-family: 'Montserrat', 'Verdana', sans-serif; padding-left: 25px; padding-right: 25px; line-height: 1.5; max-width: 550px; margin: auto; color: #43425D">
                            Forgot Your Password?
                        </div>
                    </div>

                    <div style="font-size: 12px; color: white; margin-top: 40px;">
                        <!--[if !gte mso 9]> -->
                        <a style="font-weight: 600; display: inline-block; padding: 10px 20px;background-color: #43425D; border-radius: 20px; color:white; font-size: 12px; font-family: 'Montserrat',  'Verdana', sans-serif;"
                          href="{{url('password/reset/'.$token.'?email='.$user->email)}}" target="blank">
                          <span style="font-family: 'Montserrat', 'Verdana', sans-serif; font-size: 14px;font-weight: 600;">Reset</span>
                        </a>
                      </div>
                </td>
            </tr>            

            @include('emails.footer')
        </table>
    </center>
</body>

</html>