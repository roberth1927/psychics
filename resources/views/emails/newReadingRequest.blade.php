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
                <td class="hidden-sm" style="width: 100%;background-size: cover; background-repeat: no-repeat; background-image: url('{{config('app.url')}}/images/site-images/client-reading-reading.png'); text-align: center; height: 170px">
                    <center><a href="{{config('app.url')}}">
                            <img src="{{config('app.url')}}/images/site-images/logo.png" width="159" />
                        </a>
                        <div
                        style="color: #FFFFFF;font-family: 'Montserrat', 'Verdana', sans-serif; font-size: 18px; font-weight: 600; padding-left: 25px; padding-right: 25px; line-height: 1.5; max-width: 550px; margin: auto;margin-top: 21px; ">
                        New Reading Request
                    </div>
                    </center>
                </td>
                <td class="show-sm td-show-sm" style="width: 100%;background-size: cover; background-repeat: no-repeat; background-image: url('{{config('app.url')}}/images/site-images/client-reading-reading-mobile.png'); text-align: center; height: 170px">
                    <center><a href="{{config('app.url')}}">
                            <img src="{{config('app.url')}}/images/site-images/logo.png" width="159" />
                        </a>
                        <div
                        style="color: #FFFFFF;font-family: 'Montserrat', 'Verdana', sans-serif; font-size: 18px; font-weight: 600; padding-left: 25px; padding-right: 25px; line-height: 1.5; max-width: 550px; margin: auto;margin-top: 21px; ">
                        New Reading Request
                    </div>
                    </center>
                </td>
            </tr>

            <tr>
                <td style="background-color: #ffffff; padding-top: 20px; text-align: center;">
                    <div style="text-align: center; color:#43425D; font-size: 16px; font-weight: 600">{{ $appointment->user()->first()->UserProfile()->first()->name}}</div>
                </td>
            </tr>
            
            <tr>
                <td style="background-color: #ffffff; padding-top: 20px; text-align: center;">
                    <div style="text-align: center; color:#43425D; font-size: 16px; padding-left: 24px; padding-right: 24px">
                        Would like a {{$appointment->service()->first()->name}} reading ASAP.
                    </div>
                </td>
            </tr>

            <tr>
                <td style="background-color: #ffffff;text-align: center;">
                    <div style="font-size: 12px; color: white; margin-top: 45px; margin-bottom: 30px">
                        <!--[if !gte mso 9]> -->
                        <a style="font-weight: 600; display: inline-block; padding: 10px 20px;background-color: #43425D; border-radius: 20px; color:white; font-size: 12px; font-family: 'Montserrat',  'Verdana', sans-serif;"
                          href="{{config('app.url')}}/dashboard/appointments" target="blank">
                          <span style="font-family: 'Montserrat', 'Verdana', sans-serif; font-size: 14px;font-weight: 600;">Start Now</span>
                        </a>
                      </div>
                </td>
            </tr>


            <tr>
                <!--[if !gte mso 9]> -->
                <td
            style="height: 38px;background:#8EBEF8;text-align: center;font-family: 'Montserrat',  'Verdana', sans-serif; font-size: 14px; margin: auto; display: block;">
            <div
              style="margin:auto; text-align: center;  font-family: 'Montserrat',  'Verdana', sans-serif; ; color:#FFFFFF; max-width: 550px; padding: 10px 15px">
              <a target="blank"
                style="color: #FFFFFF; font-size: 14px; font-weight: 600; font-family: 'Montserrat', 'Verdana', sans-serif;"
                href="https://psychics1on1.zendesk.com/hc/en-us/articles/360045794071-Online-Offline-Response-Time-Rules-">
                Tap Here to Visit Our Help Center for Tips!</a>
            </div>
          </td>
            </tr>
            

            @include('emails.footer')
        </table>
    </center>
</body>

</html>