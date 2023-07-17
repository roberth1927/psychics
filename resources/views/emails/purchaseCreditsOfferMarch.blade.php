<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml"
    xmlns:o="urn:schemas-microsoft-com:office:office">

@include('emails.header')
<style>
  @media screen and (max-width: 750px) {
    .email-container p {
      font-size: 16px !important;
    }
  }
</style>
<body width="100%" style="margin: 0; padding: 0 !important; mso-line-height-rule: exactly; ">

    <center role="article" aria-roledescription="email" lang="en" style="width: 100%;">

        <!-- Email Body : BEGIN -->
        <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="750"
            style="margin: auto;" class="email-container">
            <!-- Email Header : BEGIN -->
            <tr>
              <td class="show-sm" style="height:121vw;width:100vw">
                <div style="background-image: url({{config('app.url')}}/images/site-images/offer_march_header_mobile.png);
                  background-size:cover;width:100vw;padding-top:30px;height:121vw">
                  <center>
                    <a href="{{config('app.url')}}">
                      <img width="160" src="{{config('app.url')}}/images/site-images/logo.png" alt="Logo Psychic"></a>
                  </center>
                </div>
              </td>
              <td class="hidden-sm">
                <div style="background-image: url({{config('app.url')}}/images/site-images/offer_march_header_desktop.png);
                  background-size:cover;height:472px;padding-top:20px">
                  <center>
                    <a href="{{config('app.url')}}">
                      <img width="160" src="{{config('app.url')}}/images/site-images/logo.png" alt="Logo Psychic"></a>
                  </center>
                </div>
              </td>
                {{-- <td class="hidden-sm" style="width: 100%;background-size: cover; background-repeat: no-repeat; background-image: url('{{config('app.url')}}/images/site-images/10off_reading_email.png'); text-align: center; height: 170px">
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
                </td> --}}
            </tr>
            <tr>
              <td class="show-sm" style="padding-top:20px">
                <p style="width:90%;font-weight:bold;margin:20px auto 20px auto;text-align:center;">More Answers, Better Clarity, Stronger Guidance</p>
                <p style="width:90%;margin:0 auto 20px auto;text-align:center;">Whether you are looking to experience your first psychic reading or simply need guidance during a difficult time in your life, Psychics1on1’s more than 2,000 spiritual advisors are easily accessible via our innovative chat, audio, and video platform.</p>
                <p style="width:90%;font-weight:bold;margin:0 auto 20px auto;text-align:center;"
                  >Get $10 off your first reading.<br>Get the answers and advice you need for Free. Click this link to claim your offer.</p>
              </td>
              <td class="hidden-sm" style="padding-top:20px">
                <p style="width:72%;font-weight:bold;margin:20px auto 20px auto;text-align:center;">More Answers, Better Clarity, Stronger Guidance</p>
                <p style="width:72%;margin:0 auto 20px auto;text-align:center;">Whether you are looking to experience your first psychic reading or simply need guidance during a difficult time in your life, Psychics1on1’s more than 2,000 spiritual advisors are easily accessible via our innovative chat, audio, and video platform.</p>
                <p style="width:72%;font-weight:bold;;margin:0 auto 20px auto;text-align:center;"
                  >Get $10 off your first reading.Get the answers and advice you need for Free. Click this link to claim your offer.</p>
              </td>
            </tr>
            <tr>
                <td style="background-color: #ffffff;text-align: center;">
                    <div style="font-size: 12px; color: white;">
                        <a style="font-weight: 600; display: inline-block; padding: 10px 20px;background-color: #43425D; border-radius: 20px; color:white; font-size: 12px; font-family: 'Montserrat',  'Verdana', sans-serif;"
                          href="{{ route('register_10_offer') }}" target="blank">
                          <span style="font-family: 'Montserrat', 'Verdana', sans-serif; font-size: 14px;font-weight: 600;">Redeem Now</span>
                        </a>
                      </div>
                </td>
            </tr>
            <tr>
              <td class="show-sm" style="width:100%">
                <div style="margin:20px auto;width:327px;display:block">
                  <img width="327" height="204" src="{{config('app.url')}}/images/site-images/offer_march_2.png" alt="Woman see computer">
                  <p style="text-align:center">Online Psychics</p>
                  <a style="font-weight: 600; display:block;text-align:center;margin:0 auto;width:70px; padding: 10px 20px;
                    background-color: #43425D; border-radius: 20px; color:white; font-size: 12px; 
                    font-family: 'Montserrat',  'Verdana', sans-serif;width:130px;"
                    href="{{ route('register_10_offer') }}" target="blank">
                    <span style="font-family: 'Montserrat', 'Verdana', sans-serif; font-size: 14px;font-weight: 600;">Chat now</span>
                  </a>
                </div>
                <div style="margin:20px auto;width:327px;display:block">
                  <img width="327" height="204" src="{{config('app.url')}}/images/site-images/offer_march_1.png" alt="Tarot cards">
                  <p style="text-align:center">Tarot Readers</p>
                  <a style="font-weight: 600; display:block;text-align:center;margin:0 auto;width:70px; padding: 10px 20px;background-color: #43425D; border-radius: 20px; color:white; font-size: 12px; font-family: 'Montserrat',  'Verdana', sans-serif;width:130px;"
                    href="{{ route('register_10_offer') }}" target="blank">
                    <span style="font-family: 'Montserrat', 'Verdana', sans-serif; font-size: 14px;font-weight: 600;">Chat now</span>
                  </a>
                </div>
                <div style="margin:20px auto;width:327px;display:block">
                  <img width="327" height="204" src="{{config('app.url')}}/images/site-images/offer_march_3.png" alt="Tarot cards">
                  <p style="text-align:center">Available 24/7</p>
                  <a style="font-weight: 600; display:block;text-align:center;margin:0 auto;width:70px; padding: 10px 20px;background-color: #43425D; border-radius: 20px; color:white; font-size: 12px; font-family: 'Montserrat',  'Verdana', sans-serif;width:130px;"
                    href="{{ route('register_10_offer') }}" target="blank">
                    <span style="font-family: 'Montserrat', 'Verdana', sans-serif; font-size: 14px;font-weight: 600;">Chat now</span>
                  </a>
                </div>
              </td>
              <td class="hidden-sm" style="text-align:center;">
                <div style="margin:20px auto;width:181px;display:inline-block;margin-right:24px;">
                  <img width="181" height="175" style="object-fit: cover" src="{{config('app.url')}}/images/site-images/offer_march_2.png" alt="Woman see computer">
                  <p style="text-align:center">Online Psychics</p>
                  <a style="font-weight: 600; display: inline-block; padding: 10px 20px;background-color: #43425D; border-radius: 20px; color:white; font-size: 12px; font-family: 'Montserrat',  'Verdana', sans-serif;width:130px;"
                    href="{{ route('register_10_offer') }}" target="blank">
                    <span style="font-family: 'Montserrat', 'Verdana', sans-serif; font-size: 14px;font-weight: 600;">Chat now</span>
                  </a>
                </div>
                <div style="margin:20px auto;width:181px;display:inline-block">
                  <img width="181" height="175" style="object-fit: cover" src="{{config('app.url')}}/images/site-images/offer_march_1.png" alt="Tarot cards">
                  <p style="text-align:center">Tarot Readers</p>
                  <a style="font-weight: 600; display: inline-block; padding: 10px 20px;background-color: #43425D; border-radius: 20px; color:white; font-size: 12px; font-family: 'Montserrat',  'Verdana', sans-serif;width:130px;"
                    href="{{ route('register_10_offer') }}" target="blank">
                    <span style="font-family: 'Montserrat', 'Verdana', sans-serif; font-size: 14px;font-weight: 600;">Chat now</span>
                  </a>
                </div>
                <div style="margin:20px auto;width:181px;display:inline-block;margin-left:24px;">
                  <img width="181" height="175" style="object-fit: cover" src="{{config('app.url')}}/images/site-images/offer_march_3.png" alt="Tarot cards">
                  <p style="text-align:center">Available 24/7</p>
                  <a style="font-weight: 600; display: inline-block; padding: 10px 20px;background-color: #43425D; border-radius: 20px; color:white; font-size: 12px; font-family: 'Montserrat',  'Verdana', sans-serif;width:130px;"
                    href="{{ route('register_10_offer') }}" target="blank">
                    <span style="font-family: 'Montserrat', 'Verdana', sans-serif; font-size: 14px;font-weight: 600;">Chat now</span>
                  </a>
                </div>
              </td>
            </tr>
            @include('emails.footer')
        </table>
    </center>
</body>

</html>