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
            <td class="hidden-sm" style="width: 100%;background-size:cover;background-repeat:no-repeat;vertical-align:initial;
              background-image: url('{{config('app.url')}}/images/site-images/DC-$10_OFF_desktop.png'); height: 270px">
                <a href="{{config('app.url')}}">
                    <img src="{{config('app.url')}}/images/site-images/logo.png" width="165" style="padding-top:14px;padding-left:85px;" />
                </a>
            </td>
            <td class="show-sm td-show-sm" style="width: 100%;background-size:cover;background-repeat:no-repeat;vertical-align:initial;
              background-image: url('{{config('app.url')}}/images/site-images/DC-$10_OFF_mobile.png'); height: 270px">
                <a href="{{config('app.url')}}">
                    <img src="{{config('app.url')}}/images/site-images/logo.png" width="165" style="padding-top:14px;padding-left:30px;" />
                </a>
            </td>
            </tr>
            <tr>
                <td style="background-color:#43425D;text-align:center;">
                  <p style="color:white;font-weight:600;font-size:14px;text-align:center;margin: 20px 0">
                    A Gift From Psychics1on1
                    {{-- <br class="show-sm td-show-sm">  --}}
                    </p>
                </td>
            </tr>

            <tr>
              <td style="background-color: #ffffff; padding-top: 20px; text-align: center;">
                  <div style="text-align: center; color:#43425D; font-size: 14px; font-weight: 600">
                    {{ $user['name'] }}
                  </div>
              </td>
          </tr>
            <tr>
                <td style="background-color: #ffffff; padding-top: 20px; text-align: center; padding-bottom: 20px;">
                    <div style="text-align: center; max-width:530px;margin:0 auto; padding: 0 24px; color:#43425D; font-size: 16px;
                        word-break: break-word; hyphens: none;">
                      Are you afraid of commitment? Try our site risk-free. Enjoy our <b>$10</b> credit to get the clarity you desire.
                    </div>
                </td>
            </tr>
            <tr>
                <td style="background-color:#F0F0F7;text-align:center;">
                    <p style="color:white;font-weight:600;font-size:14px;text-align:center;margin: 20px 0; color:#43425D;">
                        Let Us Guide You.
                    </p>
                </td>
            </tr>
            <tr>
                <td style="background-color: #ffffff; padding-top: 20px; text-align: center;">
                    <div style="text-align: center; max-width:485px;margin:0 auto; padding: 0 24px; color:#43425D; font-size: 16px;
                        word-break: break-word; hyphens: none;">
                      Don’t tackle your life's dilemmas alone. Let us be your support system.
                    </div>
                </td>
            </tr>
            <tr>
                <td style="background-color: #ffffff; padding-top: 20px;text-align: center;">
                  <div style="font-size: 12px; color: white; margin-top: 20px; margin-bottom: 30px">
                    <a style="font-weight: 600; display: inline-block; padding: 10px 20px;background-color: #43425D; border-radius: 20px; color:white; font-size: 12px; font-family: 'Montserrat',  'Verdana', sans-serif;"
                    href="{{config('app.url')}}/loginoffer10" target="blank">
                      <span style="font-family: 'Montserrat', 'Verdana', sans-serif; font-size: 14px;font-weight: 600;">
                        Redeem Now
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