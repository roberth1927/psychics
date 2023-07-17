<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml"
    xmlns:o="urn:schemas-microsoft-com:office:office">

@include('emails.header')

<body width="100%" style="margin: 0; padding: 0 !important; mso-line-height-rule: exactly; ">

    <center role="article" aria-roledescription="email" lang="en" style="width: 100%;">

        <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="750"
            style="margin: auto; border: #EBEBEB 1px solid" class="email-container">
            <tr>
                <td>
                    <div class="hidden-sm" style="background-size: cover; background-repeat: no-repeat; background-image: url('{{config('app.url')}}/images/site-images/flash-sale-email.png'); text-align: center; height: 752px; width: 100%">
                        <div>
                            <img style="margin-top: 35px;" src="{{config('app.url')}}/images/site-images/logo.png" width="170" />
                        </div>
                        
                        <div style="margin-top: 216px">
                            <div style="font-size: 41px; color:#FDE8DD; font-weight: 500;">New Moon, New You</div>
                            <div style="font-size: 65px; color:#FFFFFF; font-weight: 600;">Get $20 Free</div>
                            <div style="font-size: 41px; color:#FDE8DD; font-weight: 500;">Use promo code: {{$promoCode ?? 'example_promo_code'}}</div>
                        </div>

                    </div>
                    <div class="show-sm" style="background-size: cover; background-repeat: no-repeat; background-image: url('{{config('app.url')}}/images/site-images/flash-sale-email-mobile.png'); text-align: center; height: 506px; width: 100%">
                        <div>
                            <img style="margin-top: 36px" src="{{config('app.url')}}/images/site-images/logo.png" width="170" />
                        </div>
                        <div style="margin-top: 138px">
                            <div style="font-size: 26px; color:#FDE8DD; font-weight: 500;">New Moon, New You</div>
                            <div style="font-size: 41px; color:#FFFFFF; font-weight: 600;">Get $20 Free</div>
                            <div style="font-size: 26px; color:#FDE8DD; font-weight: 500;">Use promo code: {{$promoCode ?? 'example_promo_code'}}</div>
                        </div>
                    </div>
                    <div style="background: #43425D; text-align: center; width: 100%; color: #FFFFFF; padding: 19px 0px; font-size: 14px; font-weight: 600;">
                        Start The Year On The Right Path
                    </div>
                    {{-- <div class="show-sm" style="width: 100%;">
                        <div style="background: #43425D; text-align: center; width: 100%; color: #FFFFFF; padding: 25px 0px; padding-bottom: 5px; font-size: 14px; font-weight: 600;">
                            Seeking Guidance In These
                        </div>
                        <div style="background: #43425D; text-align: center; width: 100%; color: #FFFFFF; padding: 25px 0px; padding-top: 25px; font-size: 14px; font-weight: 600;">
                            Uncertain Times?
                        </div>
                    </div> --}}
                </td>
            </tr>
            <tr>
                <td>
                    <div style="text-align: center; width: 100%; color: #43425D; padding: 20px 0px; padding-bottom: 5px; font-size: 14px; font-weight: 600;">
                        {{$user->userProfile->name}}
                    </div>
                <div style="text-align: center; width: 100%; color: #43425D; padding: 0px 0px; padding-top: 20px; font-size: 16px;">
                    Leave the past behind you,
                 </div>
                 <div style="text-align: center; width: 100%; color: #43425D; padding: 10px 0px; font-size: 16px">
                    stay on track with your new goals.
                 </div>
                 <div style="text-align: center; width: 100%; color: #43425D; padding: 0px 0px; padding-bottom: 5px; font-size: 16px;">
                    For one night only
                 </div>
                 <div style="text-align: center; width: 100%; color: #43425D; padding: 0px 0px; padding-bottom: 5px; font-size: 16px;">
                    <i>we are doubling your credit.</i>
                 </div>
                 <div style="text-align: center; width: 100%; color: #43425D; padding: 20px 0px; padding-bottom: 5px; font-size: 15px;">
                    Use Promo Code: <span style="font-weight: bold">{{$promoCode ?? 'example_promo_code'}}</span>
                 </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="hidden-sm" style="margin-top:20px; background: #F0F0F7; text-align: center; width: 100%; color: #43425D; padding: 20px 0px; font-size: 14px; font-weight: 600;">
                        Buy $20 And Get An Additional $20 In Free Credits
                    </div>
                    <div class="show-sm" style="width: 100%; margin-top:20px;">
                        <div style="background: #F0F0F7; text-align: center; width: 100%; color: #43425D; padding: 15px 0px; padding-bottom: 5px; font-size: 14px; font-weight: 600;">
                            Buy $20 And Get An Additional $20
                        </div>
                        <div style="background: #F0F0F7; text-align: center; width: 100%; color: #43425D; padding: 15px 0px; padding-top: 5px; font-size: 14px; font-weight: 600;">
                            In Free Credits
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td
                    style="padding-top: 25px;padding-bottom: 30px;background:#FFFFFF;text-align: center; color: #43425D;font-family: 'Montserrat',  'Verdana', sans-serif; font-size: 15px; margin: auto; display: block;">


                    <div style="font-size: 12px; color: white; margin-top: 0px;">
                        <!--[if !gte mso 9]> -->
                        <a style="font-weight: 600; display: inline-block; padding: 10px 20px;background-color: #43425D; border-radius: 20px; color:white; font-size: 12px; font-family: 'Montserrat',  'Verdana', sans-serif;"
                          href="{{route('dashboard')}}" target="blank">
                          <span style="font-family: 'Montserrat', 'Verdana', sans-serif; font-size: 14px;font-weight: 600;">Buy Credits</span>
                        </a>
                      </div>
                </td>
            </tr>
            <tr>
                <td>
                 <div style="text-align: center; width: 100%; color: #43425D; padding: 0px 0px; padding-bottom: 25px; font-size: 12px;">
                    *Up To $20 In Free Credit Per Customer
                 </div>
                </td>
            </tr>          

            @include('emails.footer')
        </table>
    </center>
</body>

</html>