<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml"
    xmlns:o="urn:schemas-microsoft-com:office:office">

@include('emails.header')
<link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap" rel="stylesheet"> 

<body width="100%" style="margin: 0; padding: 0 !important; mso-line-height-rule: exactly; ">

    <center role="article" aria-roledescription="email" lang="en" style="width: 100%;">

        <!-- Email Body : BEGIN -->
        <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="750"
            style="margin: auto;" class="email-container">
            <!-- Email Header : BEGIN -->
            
            <tr>
            <td class="hidden-sm" style="width: 100%;background-size:cover;background-repeat:no-repeat;text-align:center;
              background-image: url('{{config('app.url')}}/images/emails/COSMIC_REWARDS_EMAIL_DESKTOP2.png'); height: 275px">
            </td>
            <td class="show-sm td-show-sm" style="width: 100%;background-size:cover;background-repeat:no-repeat;text-align:center;
              background-image: url('{{config('app.url')}}/images/emails/COSMIC_REWARDS_EMAIL_MOBILE2.jpg'); height: 135px">
            </td>
            </tr>
            <tr>
                <td style="background-color:#43425D;text-align:center;">
                  <p style="color:white;font-weight:600;font-size:14px;text-align:center;margin: 20px 0">
                    The Cosmic Rewards Referral Program
                    </p>
                </td>
            </tr>
            <tr>
                <td style="background-color: #ffffff; padding-top: 20px; text-align: center; padding-bottom: 20px;">
                    <div style="text-align: center; max-width:530px;margin:0 auto; padding: 0 24px; color:#43425D; font-size: 16px;
                        word-break: break-word; hyphens: none;">
                      Receive a reward every time you refer a client to our site. After they sign up using your referral link, both of you will receive <b>$10</b>.
                    </div>
                </td>
            </tr>
            <tr>
                <td style="background-color:#F0F0F7;text-align:center;">
                    <p style="color:white;font-weight:600;font-size:14px;text-align:center;margin: 20px 0; color:#43425D;">
                      We Could Tell You More,<br class="show-sm td-show-sm"> How About We Show You?
                      
                    </p>
                </td>
            </tr>
            <tr>
              <td style="background-color: #ffffff; padding-top: 20px; text-align: center;">
                  <div style="text-align: center; color:#43425D; font-size: 14px; font-weight: 600">
                    Spread the Word
                  </div>
              </td>
          </tr>
            <tr>
                <td style="background-color: #ffffff; padding-top: 20px; text-align: center;">
                    <div style="text-align: center; max-width:535px;margin:0 auto; padding: 0 24px; color:#43425D; font-size: 16px;
                        word-break: break-word; hyphens: none;">
                      Check out the shiny new addition to your dashboard. Quick access to Cosmic Rewards is located in your account and sidebar menus.
                    </div>
                </td>
            </tr>
            <tr>
                <td style="background-color: #ffffff; padding-top: 20px;text-align: center;">
                  <div style="font-size: 12px; color: white; margin-top: 20px; margin-bottom: 30px">
                    <a style="font-weight: 600; display: inline-block; padding: 10px 20px;background-color: #43425D; border-radius: 20px; color:white; font-size: 12px; font-family: 'Montserrat',  'Verdana', sans-serif;"
                    href="{{config('app.url')}}/dashboard/cosmic-rewards" target="blank">
                      <span style="font-family: 'Montserrat', 'Verdana', sans-serif; font-size: 14px;font-weight: 600;">
                        Let’s Do This
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