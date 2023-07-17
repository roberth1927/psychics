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
        <td class="hidden-sm" style="height:270px;background-size:cover;background-repeat:no-repeat;vertical-align:top;
          background-position:center;background-image:url('{{config('app.url')}}/images/emails/clients_financial_desktop.png')">
            <center style="padding-top:5px;padding-bottom: 50px">
              <a href="{{config('app.url')}}">
                <img src="{{config('app.url')}}/images/site-images/logo.png" width="159" /></a>
              </center>
              <span style="color:#43425D;font-family:'Abril Fatface',cursive;font-size:28px;display:block;
                text-align:right;padding-right:25px;"
              >Financial Advice From A Psychic</span>
        </td>
        <td class="show-sm td-show-sm" style="height:230px;background-size:cover;background-repeat:no-repeat;vertical-align:top;
          background-position:center;background-image:url('{{config('app.url')}}/images/emails/clients_financial_mobile.png')">
            <center style="padding-top:5px;padding-bottom: 55px">
              <a href="{{config('app.url')}}">
                <img src="{{config('app.url')}}/images/site-images/logo.png" width="159" /></a>
              </center>
              <span style="color:#43425D;font-family:'Abril Fatface',cursive;font-size:20px;display:block;
                text-align:right;padding-right:35px;"
              >Financial Advice <br> From A Psychic</span>
        </td>
      </tr>
      <tr>
        <td style="padding-top: 20px;background:#43425D;">
            <div style="font-size:18px; text-align: center;font-weight: 600;color:#FFFFFF;">Invest In Yourself</div>
          </div>
        </td>
      </tr>
      <tr>
        <td style="background:#43425D; padding: 30px 20px 20px 20px">
          <div style="line-height: 24px; text-align: center; font-size: 16px; color:#FFFFFF;max-width: 550px; margin: 0 auto">
            Being financially independent brings a lot of uncertainty. It can be very daunting and overwhelming to decide your next fate. Luckily, you don’t have to make this huge decision alone. Let our experienced psychics guide you with your next decision.
          </div>
        </td>
      </tr>
      <tr>
        <td style="padding-top: 20px; background:#F0F0F7;">
          <div style="text-align: center; font-size: 16px; color:#43425D; font-weight: 600; ">
            Our Top Financial Psychic Picks
          </div>
        </td>
      </tr>
      
      @foreach ($users as $user1)
      <tr>
        <td style="background:#F0F0F7; padding: 20px 20px 0 20px;">
          <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%"
            height="100%">
            <tr style="height: 169px">
              <td class="content-left hidden-sm" style="background: #D8E4F7; vertical-align: top; padding-top: 20px; width:136px">
                <!--[if gte mso 9]>
                <table>
                  <tr>
                    <td width="20%"></td>
                     <td width="60%">
                     <v:oval style="width:85;height:85;opacity:0;" stroked="false">
                     <v:fill src="{{config('app.url')}}/images/emails/profile/{{$user1['image']}}" type="frame">
                    <v:/fill>
                   </v:oval>
                   </td>
                    <td width="20%"></td>
                  </tr>
                 </table>
                    <![endif]-->
                  <!--[if !gte mso 9]> -->
                  <img src="{{config('app.url')}}/images/emails/profile/{{$user1['image']}}" width="95px" height="95px" 
                    style="border-radius: 50%;margin: 0 auto;display:block">
                <!--<![endif]-->
              </td>
              <td class="content-right" style="background-color: #FFFFFF; text-align: left; padding: 20px 20px 10px 18px;">
                <div style="display:flex; align-items:center">
                  <div style="padding-right: 10px;" class="show-sm">
                    <img src="{{config('app.url')}}/images/emails/profile/{{$user1['image']}}" width="60px" height="60px" 
                      style="border-radius: 50%;display: inline-block">
                  </div>
                  <div>
                    <div style="font-size:15px;font-weight:600;color:#43425D">{{$user1['name']}}
                    </div>
                    <div class="show-sm" style="margin-top: 10px;">
                      <div style="display:flex; align-items:center;">
                        @for ($i = 0; $i < 5; $i++)
                        <img src="{{config('app.url')}}/images/site-images/star.png" width="15" height="14.27"
                          style="margin-right: 3px" />
                        @endfor
                        <span style="font-weight: 500; color: #43425D; opacity: 0.5; font-size: 12px;
                          font-family: 'Montserrat',  'Verdana', sans-serif;margin-left:10px;">
                          {{$user1['reviews']}} Reviews
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="hidden-sm" style="color: #9D61BD; font-size: 14px; padding-top: 10px;display:flex; align-items:center">
                  @for ($i = 0; $i < 5; $i++)
                  <img src="{{config('app.url')}}/images/site-images/star.png" width="15" height="14.27"
                    style="margin-right: 3px" />
                  @endfor
                  <span class="hidden-sm" style="font-weight: 500; color: #43425D; opacity: 0.5; padding-left: 12px; font-size: 12px;">
                    {{$user1['reviews']}} Reviews
                  </span>
                </div>
                <div class="hidden-sm" style="font-size: 12px; color: #656b72; line-height: 21px; margin: 0px; padding: 9px 0px;">
                  {{$user1['description']}}
                </div>
                <div class="show-sm" style="font-size: 12px; color: #656b72; line-height: 21px; margin: 0px; padding: 9px 0px;">
                  {{ substr($user1['description'], 0, 90) . '...' }}
                </div>
                <div style="font-size: 12px; text-align: right; color: white;">
                  <!--[if !gte mso 9]> -->
                  <a style="font-weight: 600; display: inline-block; padding: 10px 20px; padding-right: 5px; background-color: #8EBEF8; border-radius: 20px; color:white; font-size: 12px; font-family: 'Montserrat',  'Verdana', sans-serif;"
                    href="{{$user1['link']}}" target="blank">
                    <span style="font-family: 'Montserrat', 'Verdana', sans-serif;">Profile</span> <img style="padding: 0px 8px;"
                      src="{{config('app.url')}}/images/site-images/top_rate_email.png" />
                  </a>
                  <!--<![endif]-->
                  <!--[if gte mso 9]>
                 <v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" href="{{$user1['link']}}" style="height:35px;v-text-anchor:middle;width:92px;" arcsize="60%" opacity="0" stroke="f" fillcolor="#8EBEF8">
                  <w:anchorlock/>
                   <center style="color:#ffffff;font-family: 'Montserrat',  'Verdana', sans-serif;font-size:14px;font-weight:bold;">
                  Profile
                  <img style="padding: 0px 8px;" src="{{config('app.url')}}/images/site-images/top_rate_email.png" />
               </center>
               </v:roundrect>
                   <![endif]-->
                </div>
              </td>
            </tr>
          </table>
        </td>
      </tr>
      @endforeach
      <tr>
        <td>
          <div style="height: 30px; background:#F0F0F7; width: 100%"></div>
        </td>
      </tr>

            @include('emails.footer')
    </table>
  </center>
</body>

</html>