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
              <td class="hidden-sm">
                  <a href="{{config('app.url')}}" style="display:block;max-height:472px;overflow:hidden;">
                    <img src="{{config('app.url')}}/images/site-images/birthday_email.png" style=";display:block;width:100%" />
                  </a>
              </td>
              <td class="show-sm td-show-sm">
                  <a href="{{config('app.url')}}" style="display:block;max-height:535px;overflow:hidden;">
                    <img src="{{config('app.url')}}/images/site-images/birthday_email_mobile.png" style="display:block;width:100%" />
                  </a>
              </td>
            </tr>
            <tr>
                <td style="background-color:#43425D;text-align:center;">
                  <p style="color:white;font-weight:600;font-size:16px;text-align:center;margin: 20px 0">
                    Get Ready For Your Next<br class="show-sm td-show-sm"> Exclusive Offer!</p>
                </td>
            </tr>

            <tr>
                <td style="background-color: #ffffff; padding-top: 20px; text-align: center;width:100%">
                    <div style="text-align: center; color:#43425D; font-size: 18px; font-weight: 600;width:100%">
                      {{ $user['name'] }}
                    </div>
                </td>
            </tr>
            <tr>
                <td style="background-color: #ffffff; padding-top: 20px; text-align: center;">
                    <div style="text-align: center; max-width:485px;margin:0 auto; padding: 0 24px; color:#43425D; font-size: 16px;
                        word-break: break-word; hyphens: none;">
                      We'd love to send you our best wishes and a special gift on your birthday.
                    </div>
                </td>
            </tr>
            <tr>
                <td style="background-color: #ffffff;text-align: center;">
                  <div style="font-size: 12px; color: white; margin-top: 20px; margin-bottom: 30px">
                    <a style="font-weight: 600; display: inline-block; padding: 10px 20px;background-color: #43425D; border-radius: 20px; color:white; font-size: 12px; font-family: 'Montserrat',  'Verdana', sans-serif;"
                    href="{{config('app.url')}}/dashboard/user/profile" target="blank">
                      <span style="font-family: 'Montserrat', 'Verdana', sans-serif; font-size: 14px;font-weight: 600;">
                        Share
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