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
              <td class="show-sm">
                <div style="background-image: url({{config('app.url')}}/images/site-images/COSMIC_REWARDS_EMAIL_MOBILE.png);
                  background-size:cover;width:100vw;padding-top:30px;height:82vw">
                    <a href="{{config('app.url')}}" style="display:block;">
                      <img width="160" src="{{config('app.url')}}/images/site-images/logo.png" alt="Logo Psychic" 
                        style="display:block;margin:0 auto;"></a>
                    <div style="width:50%;">
                      <p style="width:90%;font-weight:600;font-size:35px !important;text-align:center;margin-left:auto;color:#F0F0F7;">Let's <br>Celebrate <br>You!</p>
                    </div>
                </div>
              </td>
              <td class="hidden-sm">
                <div style="background-image: url({{config('app.url')}}/images/site-images/COSMIC_REWARDS_EMAIL_DESKTOP.png);
                  background-size:cover;height:472px;padding-top:20px">
                    <a href="{{config('app.url')}}" style="display:block;">
                      <img width="160" src="{{config('app.url')}}/images/site-images/logo.png" alt="Logo Psychic" 
                        style="display:block;margin:0 auto;"></a>
                    <div style="width:50%;">
                      <p style="width:80%;font-weight:600;font-size:62px !important;text-align:center;margin-left:auto;color:#F0F0F7;">Let's <br>Celebrate <br>You!</p>
                    </div>
                </div>
              </td>
            </tr>
            <tr>
                <td style="background-color:#43425D;text-align:center;width:100%">
                  <p style="color:white;font-weight:600;font-size:14px !important;text-align:center;width:100%;margin: 20px 0">
                    You Deserve Something Special.</p>
                </td>
            </tr>

            <tr>
                <td style="background-color: #ffffff; padding-top: 20px; text-align: center;">
                    <div style="text-align: center; color:#43425D; font-size: 18px; font-weight: 600">
                      {{ $user['name'] }}
                    </div>
                </td>
            </tr>
            <tr>
                <td style="background-color: #ffffff; padding-top: 20px; text-align: center;">
                    <div style="text-align: center; max-width:485px;margin:0 auto; padding: 0 24px; color:#43425D; font-size: 16px;">
                      They say it’s your birthday. Here is <b>$10</b> from Psychics1on1.com for a special birthday reading.
                    </div>
                </td>
            </tr>
            <tr>
                <td style="background-color: #ffffff;text-align: center;">
                  <div style="font-size: 12px; color: white; margin-top: 40px; margin-bottom: 30px">
                    <a style="font-weight: 600; display: inline-block; padding: 10px 20px;background-color: #43425D; border-radius: 20px; color:white; font-size: 12px; font-family: 'Montserrat',  'Verdana', sans-serif;"
                    href="{{config('app.url')}}/dashboard/appointments" target="blank">
                      <span style="font-family: 'Montserrat', 'Verdana', sans-serif; font-size: 14px;font-weight: 600;">
                        Redeem Gift
                      </span>
                    </a>
                  </div>
                </td>
            </tr>
            

            @include('emails.footer')
        </table>
    </center>
</body>

</html>