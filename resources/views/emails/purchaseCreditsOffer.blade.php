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
                <td class="hidden-sm" style="width: 100%;background-size: cover; background-repeat: no-repeat; background-image: url('{{config('app.url')}}/images/site-images/10off_reading_email.png'); text-align: center; height: 170px">
                    <center><a href="{{config('app.url')}}">
                            <img src="{{config('app.url')}}/images/site-images/logo.png" width="159" />
                        </a>
                        <div
                    </center>
                </td>
                <td class="show-sm td-show-sm" style="width: 100%;background-size: cover; background-repeat: no-repeat; background-image: url('{{config('app.url')}}/images/site-images/10off_reading_email_mobile.png'); text-align: center; height: 170px">
                    <center><a href="{{config('app.url')}}">
                            <img src="{{config('app.url')}}/images/site-images/logo.png" width="159" />
                        </a>
                    </center>
                </td>
            </tr>

            <tr>
                <td style="background-color: #ffffff; padding-top: 20px; text-align: center;">
                    <div style="text-align: center; color:#43425D; font-size: 16px; font-weight: 600">
                      Hi {{ $user->UserProfile()->first()->name }},
                    </div>
                </td>
            </tr>
            <tr>
                <td style="background-color: #ffffff; padding-top: 20px; text-align: center;">
                  <img style="-webkit-backface-visibility: hidden;
                  backface-visibility: hidden;
                  display: inline;
                  overflow: hidden;
                  border-radius: 50%;
                  width: 100px;
                  height: 100px;
                  background-size: cover;
                  background-color: #8EBEF8;"                                                            "  
                  src="{{config('app.url')}}/images/site-images/email_offer.png"> 
                </td>
            </tr>
            <tr>
                <td style="background-color: #ffffff; padding-top: 20px; text-align: center;">
                    <div style="text-align: center; color:#43425D; font-size: 16px; padding-left: 24px; padding-right: 24px;
                        max-width:550px;margin:0 auto;word-break: break-word; hyphens: none;}">
                      Psychic Sage has offered you a <b>$10 OFF</b> your first reading. Get the answers and advice you need for <b>Free</b>. Click 
                      <a href="{{ route('login_offer_10') }}" target="_blank" style="color:#8EBEF8;text-decoration:underline">this link </a>
                      to claim this exclusive offer.
                    </div>
                </td>
            </tr>
            <tr>
                <td style="background-color: #ffffff;text-align: center;">
                    <div style="font-size: 12px; color: white; margin-top: 45px; margin-bottom: 30px">
                        <!--[if !gte mso 9]> -->
                        <a style="font-weight: 600; display: inline-block; padding: 10px 20px;background-color: #43425D; border-radius: 20px; color:white; font-size: 12px; font-family: 'Montserrat',  'Verdana', sans-serif;"
                          href="{{ route('login_offer_10') }}" target="blank">
                          <span style="font-family: 'Montserrat', 'Verdana', sans-serif; font-size: 14px;font-weight: 600;">Redeem Now</span>
                        </a>
                      </div>
                </td>
            </tr>
            

            @include('emails.footer')
        </table>
    </center>
</body>

</html>