<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml"
    xmlns:o="urn:schemas-microsoft-com:office:office">

    @include('emails.header')

<body width="100%" style="margin: 0; padding: 0 !important; mso-line-height-rule: exactly; background: #FFFFFF; background-color: #FFFFFF;">

    <center role="article" aria-roledescription="email" lang="en" style="width: 100%; background: #FFFFFF; background-color: #FFFFFF;">

        <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="750"
            style="margin: auto;  background: #FFFFFF; background-color: #FFFFFF;" class="email-container">
            <tr>
                <td class="padding-sm" style="padding-top: 40px;text-align: center; color: #43425D;font-family: sans-serif; font-size: 15px;margin: auto; display: block;
                  background-size: cover; background-repeat: no-repeat; position: relative;">
                    <center><a href="{{config('app.url')}}">
                            <img src="{{config('app.url')}}/images/site-images/logo_black.png" width="159" />
                        </a></center>
                </td>
            </tr>
            <tr>
                <td
                    style="center; color: #43425D;font-family: 'Montserrat',  'Verdana', sans-serif; font-size: 15px; margin: auto; display: block;">

                    <div class="hidden-sm"
                        style="text-transform: capitalize; margin:auto; text-align: center; font-family: 'Montserrat',  'Verdana', sans-serif; font-size: 18px; font-weight: 600;color:#43425D; text-align: center;">
                        <div
                            style="font-family: 'Montserrat', 'Verdana', sans-serif; padding: 20px; padding-bottom: 22px; line-height: 1.5; max-width: 550px; margin: auto;color:#43425D;">
                            Please Update Your Payout Info
                        </div>
                    </div>
                    <div class="show-sm"
                        style="width: 100%; padding-top: 20px; text-transform: capitalize; margin:auto; text-align: center; font-family: 'Montserrat',  'Verdana', sans-serif; font-size: 18px; font-weight: 600;color:#43425D; text-align: center;">
                        <div
                            style="font-family: 'Montserrat', 'Verdana', sans-serif; padding: 0px 20px;  line-height: 1.5; max-width: 550px; margin: auto;color:#43425D;">
                            Please Update
                        </div>
                        <div
                            style="font-family: 'Montserrat', 'Verdana', sans-serif; padding: 0px 20px; padding-bottom: 22px; line-height: 1.5; max-width: 550px; margin: auto;color:#43425D;">
                            Your Payout Info
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td
                    style="background: #43425D; text-align: center; padding:0px 24px; margin: auto; font-family: 'Montserrat',  'Verdana', sans-serif; color: #FFFFFF;font-size: 14px; height: 58px;">
                    <div style="max-width: 550px; margin: auto; font-family: 'Montserrat',  'Verdana', sans-serif; font-weight: 600; color: #FFFFFF">                        
                        Goodbye PayPal, Hello Direct Deposit
                    </div>
                </td>
            </tr>
            <tr>
                <td
                    style="padding-bottom: 20px; center; color: #43425D;font-family: 'Montserrat',  'Verdana', sans-serif; font-size: 15px; margin: auto; display: block;">

                    <div
                        style="text-transform: capitalize; margin:auto; text-align: center; font-family: 'Montserrat',  'Verdana', sans-serif; font-size: 14px; font-weight: 600;color:#43425D; text-align: center;">
                        <div
                            style="font-family: 'Montserrat', 'Verdana', sans-serif; padding: 20px; line-height: 1.5; max-width: 550px; margin: auto;color:#43425D;">
                            {{$user->userProfile->name}},
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td
                    style="text-align: center; padding:0px 24px; margin: auto; font-family: 'Montserrat',  'Verdana', sans-serif; color: #FFFFFF;font-size: 14px; height: 58px;">
                    <div style="max-width: 550px; margin: auto; font-family: 'Montserrat',  'Verdana', sans-serif; font-size: 16px; color: #43425D">                        
                        Beginning Monday, June 7, 2021, we will process all payouts through United States-based financial institutions exclusively. We no longer accept PayPal as a payout method and apologize for any inconvenience this may cause.
                    </div>
                </td>
            </tr>

            <tr>
                <td
                    style="text-align: center; padding:30px 24px; margin: auto; font-family: 'Montserrat',  'Verdana', sans-serif; color: #FFFFFF;font-size: 14px; height: 58px;">
                    <div style="max-width: 550px; margin: auto; font-family: 'Montserrat',  'Verdana', sans-serif; font-size: 16px; color: #43425D">                        
                        Our records indicate you have not updated your payout bank information. Please log in and update your payout method now to ensure your next payout is processed on-time.
                    </div>
                </td>
            </tr>
            <tr>
                <td
                    style="text-align: center; padding:20px 24px; padding-top: 0px; margin: auto; font-family: 'Montserrat',  'Verdana', sans-serif; color: #FFFFFF;font-size: 14px; height: 58px;">
                    <a style="font-weight: 600; width: 83px; height: 30px; padding: 10px 20px; background-color: #43425D; border-radius: 20px; color:#FFFFFF; font-size: 12px;font-family: 'Montserrat', 'Verdana', sans-serif;"
           href="{{config('app.url')}}/dashboard/payout" target="blank">
           <span style="color:#FFFFFF;font-family: 'Montserrat', 'Verdana', sans-serif; font-weight: 600">Update</span>
           </a>
                </td>
            </tr>

            @include('emails.footer')
        </table>
    </center>
</body>
</html>