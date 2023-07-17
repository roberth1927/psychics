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
        <td class="hidden-sm" style="height: 343px; background-size: cover; background-repeat: no-repeat; vertical-align: top;
          background-position: center;background-image: url('{{config('app.url')}}/images/emails/clients_medium_desktopn.png')">
            <center style="padding-top:25px;">
              <a href="{{config('app.url')}}">
                <img src="{{config('app.url')}}/images/site-images/logo.png" width="159" /></a>
              </center>
              <div style="
                float: right;
                max-width: 336px;
                margin-right: 10%;
              ">
                <p style="
                  text-align: center;
                  font-size: 48px;
                  line-height: 56px;
                  font-weight: bold;
                  font-family: 'Montserrat', 'Verdana', sans-serif !important;
                  letter-spacing: 0px;
                  margin: 0px;
                  margin-bottom: 15px;
                  color: #FBF6F6;"
                >Find Your<br/> Inner Peace<br/></p>
                <p style="
                  text-align: center;
                  font-size: 24px;
                  line-height: 56px;
                  font-weight: 600;
                  font-family: 'Montserrat', 'Verdana', sans-serif !important;
                  letter-spacing: 0px;
                  color: #FBF6F6;
                  margin: 0px;
                  margin-bottom: 5px;
                "
                >$10 OFF Your Next Reading</p>
                <div style="
                  margin: auto;
                  background: #8EBEF8 0% 0% no-repeat padding-box;
                  border-radius: 18px;
                  padding: 10px 10px;
                  width: 138px;
                  text-align: center;
                  font-style: normal;
                  font-weight: 600;
                  font-stretch: normal;
                  font-size: 14px;
                  line-height: 18px;
                  font-family: 'Montserrat', 'Verdana', sans-serif !important;
                  letter-spacing: 0px;
                  color: #FFFFFF;
                  opacity: 1;
                ">
                  Redeem Now
                </div>
              </div>
        </td>
        <td class="show-sm td-show-sm" style="height: 230px;background-size:cover;background-repeat:no-repeat;vertical-align:top;
          background-position:center;background-image: url('{{config('app.url')}}/images/emails/clients_medium_mobilen.png')">
            <center style="padding-top:5px;">
              <a href="{{config('app.url')}}">
                <img src="{{config('app.url')}}/images/site-images/logo.png" width="159" /></a>
              </center>
              <div style="
                float: right;
                max-width: 285px;
                margin-right: 6%;
              ">
                <p style="
                  text-align: center;
                  font-size: 24px !important;
                  line-height: 24px;
                  font-weight: bold;
                  font-family: 'Montserrat', 'Verdana', sans-serif !important;
                  letter-spacing: 0px;
                  margin: 0px;
                  margin-bottom: 5px;
                  color: #FFFFFF;"
                >Find Your<br/> Inner Peace<br/></p>
                <p style="
                  text-align: center;
                  font-size: 12px !important;
                  line-height: 24px;
                  font-family: 'Montserrat', 'Verdana', sans-serif !important;
                  letter-spacing: 0px;
                  margin: 0px;
                  margin-bottom: 20px;
                  color: #FFFFFF;
                "
                >$10 OFF Your Next Reading</p>
                <div style="
                  margin: auto;
                  background: #8EBEF8 0% 0% no-repeat padding-box;
                  border-radius: 18px;
                  padding: 10px 10px;
                  width: 138px;
                  text-align: center;
                  font-style: normal;
                  font-weight: 600;
                  font-stretch: normal;
                  font-size: 14px;
                  line-height: 18px;
                  font-family: 'Montserrat', 'Verdana', sans-serif !important;
                  letter-spacing: 0px;
                  color: #FFFFFF;
                  opacity: 1;
                ">
                  Redeem Now
                </div>
              </div>
        </td>
      </tr>
      <tr>
        <td style="padding-top: 20px;background:#43425D;">
            <div style="
              text-align: center;
              font-size: 18px;
              line-height: 26px;
              font-weight: 600;
              font-family: 'Montserrat', 'Verdana', sans-serif !important;
              letter-spacing: 0.36px;
              color: #FFFFFF;
              opacity: 1;
            ">Start Your Path Today</div>
          </div>
        </td>
      </tr>
      <tr>
        <td style="background:#43425D; padding: 4px 20px 5px 20px;">
          <div style="
            text-align: center;
            font-size: 16px;
            line-height: 24px;
            font-family: 'Montserrat', 'Verdana', sans-serif !important;
            letter-spacing: 0px;
            color: #FFFFFF;
            opacity: 1;
          ">
            Mediums can clear your judgement and help guide you.
          </div>
        </td>
      </tr>
      <tr>
        <td style="padding-top: 20px; background:#F0F0F7;">
          <div style="text-align: center; font-size: 16px; color:#43425D; font-weight: 600; ">
            Mediums to Help You Soul-Search
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
                  <a style="font-weight: 600; display: inline-block; padding: 10px 20px; background-color: #8EBEF8; border-radius: 20px; color:white; font-size: 12px; font-family: 'Montserrat',  'Verdana', sans-serif;"
                    href="{{$user1['link']}}" target="blank">
                    <span style="font-family: 'Montserrat', 'Verdana', sans-serif;">Chat Now</span>
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