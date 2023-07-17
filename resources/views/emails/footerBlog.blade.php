<tr>
    <td
      style="background-color: #43425D;line-height: 24px; text-align: center; margin: auto;  font-family: 'Montserrat',  'Verdana', sans-serif; color: #FFFFFF;font-size: 16px;">
      <div style="max-width: 550px; margin: auto; padding: 0px 35px;">
        <table cellspacing="0" width="100%">
          <tr>
            <td
              style="text-align: center; padding-top: 30px; color: #8EBEF8; font-family: 'Montserrat',  'Verdana', sans-serif; font-weight: 600; font-size: 16px;">
              <div style="font-family: 'Montserrat',  'Verdana', sans-serif;">
                <a style=" color: #8EBEF8;font-family: 'Montserrat',  'Verdana', sans-serif;"
                  href="{{config('app.url')}}/blog">Thanks for Reading!</a>
                </div>
              {{-- <div style="font-family: 'Montserrat',  'Verdana', sans-serif;" class="show-sm">
                <div>Read the Latest</div>
                <div>Psychic News on Our Radar</div>
              </div> --}}
            </td>
          </tr>
          <tr>
            <td
              style="text-align: center;padding-top:20px; color: #ffffff; font-family: 'Montserrat',  'Verdana', sans-serif; font-size: 16px;">
              <div style="font-family: 'Montserrat',  'Verdana', sans-serif;">
                We’ll see you next month with more psychic news; until then check out our blog for <a style=" color: #8EBEF8;font-family: 'Montserrat',  'Verdana', sans-serif;"
                href="{{config('app.url')}}/blog">more stories</a> or visit our website to <a style=" color: #8EBEF8;font-family: 'Montserrat',  'Verdana', sans-serif;"
                href="{{config('app.url')}}/blog">book in</a> with one of our readers.
              </div>
            </td>
          </tr>

          <tr>
            <td>
              <table style="margin-top: 35px !important;" role="presentation" border="0" cellpadding="0"
                cellspacing="0" width="100%">
                <tr>
                  <td
                    style="font-family: 'Montserrat', 'Verdana', sans-serif; font-size: 15px; color:#ffffff; text-align: center; "
                    class="center-on-narrow">

                    <hr style="width:180px;margin-bottom: 19px;">

                    <a href="https://www.instagram.com/psychics1on1/" target="blank">
                      <img src="{{config('app.url')}}/images/icons/email/instagram_2.png">
                    </a>
                    <a href="https://www.facebook.com/Psychics1on1/" target="blank" style="margin-left:14px;">
                      <img src="{{config('app.url')}}/images/icons/email/facebook_2.png">

                    </a>
                    <a href="https://twitter.com/psychics1on1/" target="blank" style="margin-left:14px;">
                      <img class="padding_social" src="{{config('app.url')}}/images/icons/email/twitter_2.png">
                    </a>
                   <!-- <a href="https://www.linkedin.com/company/psychics1on1/about/" target="blank"
                      style="margin-left:14px;">
                      <img src="{{config('app.url')}}/images/icons/email/linkedin_2.png">
                    </a>-->


                  </td>
                </tr>
                <tr>
                  <td
                    style="font-family: 'Montserrat',  'Verdana', sans-serif; padding-top:15px; padding-bottom: 20px; font-size: 12px; line-height: 15px; text-align: center; color: #ffffff!important;">
                    <div style="font-family: 'Montserrat', 'Verdana', sans-serif;">
                      <a href="mailto:{{$user->email}}"> <span style="color:#FFFFFF !important; font-family: 'Montserrat', 'Verdana', sans-serif; ">Sent to <span
                          style="color:#8EBEF8; font-family: 'Montserrat', 'Verdana', sans-serif;">{!!
                          str_replace('.', '<span>.</span>', str_replace('@', '<span>@</span>', $user->email))
                          !!}</span></a>
                    <br>
                    Psychic1on1, LLC</span>
                    </div>
                  </td>
                </tr>
              </table>
            </td>
          </tr>

        </table>
      </div>
    </td>
</tr>