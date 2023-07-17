<template>
  <div>
    <nav class="navbar navbar-default navbar-fixed-top pb-0">
      <div class="container py-0 d-block d-md-flex justify-content-center">
        <div class="navbar-header page-scroll">
          <div id="logo">
            <a href="https://www.psychics1on1.com"
              ><img
                src="/images/site-images/psychics_logo_white.svg"
                alt="psychics1on1"
            /></a>
          </div>
        </div>
      </div>
    </nav>

    <section class="top" :style="`background-image: url(/images/${heroImage});`">
      <div class="container first">
        <div class="row h-100">
          <div class="col-md-1 col-lg-1 hidden-xs hidden-sm"></div>
          <div class="col-md-10 col-lg-10 hidden-xs hidden-sm m-auto">
            <div class="intro-text">
              <div class="first_intro">
                {{firstBannerText}}
              </div>
              <div class="intro-lead-in">
                $5 Free With Your First Reading
              </div>
            </div>
          </div>
          <div class="hidden-md hidden-lg col-xs-12 col-sm-12 m-auto">
            <div class="intro-text">
              <div class="first_intro">
                {{firstBannerText}}
              </div>
              <div class="intro-lead-in">
                Get $5 Free With Your First Reading
              </div>
            </div>
          </div>
          <div class="col-md-1 col-lg-1 hidden-xs hidden-sm"></div>
        </div>
      </div>
    </section>

    <section class="top-sticky">
      <a href="https://www.psychics1on1.com/signup">
        <div class="container p-0 h-100">
          <div class="row h-100">
            <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12 sticky-top m-auto">
              Get $5 Free With Your First Reading
            </div>
          </div>
        </div>
      </a>
    </section>

    <section class="tarot-readers">
      <div class="container">
        <div class="row">
          <div class="col-md-1 col-lg-1 hidden-xs hidden-sm"></div>
          <div class="col-md-10 col-lg-10 col-xs-12 col-sm-12">
            <div id="grid-header">
              <div id="big-head">{{listHeader}}</div>
            </div>

            <div id="expertgrid">
              <div
                class="box-expert"
                v-for="(reader, index) in tarotReaders"
                :key="index"
              >
                <div class="grid">
                  <div class="redBox" style="display: block">70% OFF</div>
                  <div class="profile-info">
                    <div class="profile-photo">
                      <a :href="'/' + reader.profile.profile_link"
                        ><img
                          class="photo"
                          :src="reader.profile.profile_headshot_url"
                          :title="reader.profile.display_name"
                          :alt="reader.profile.display_name" /></a
                      ><span class="status" :style="reader.online?'background: #2CC05F;':'background: #c7c7c7;'"></span>
                    </div>
                    <div class="profile-desc">
                      <a
                        class="profile_url"
                        :href="'/' + reader.profile.profile_link"
                        >{{ reader.profile.display_name }}</a
                      >
                      <div class="clear"></div>
                      <span class="rating d-flex align-items-center">
                        <!-- {{ parseFloat(reader.reviews_rating).toFixed(1) }} -->
                        <!-- <a
                          data-toggle="modal"
                          data-target="popupModal2"
                          class="btn rev-pop"
                          >
                          <img
                            src="/images/tarot-reading/stars5.png" /></a> -->
                        <v-rating
                          v-if = "reader.reviews_rating"
                          :value="parseFloat(reader.reviews_rating)"
                          color="#F4C150"
                          dense
                          background-color="#C7C7C7"
                          empty-icon="mdi-star"
                          half-increments
                          readonly
                          size="16"
                          class="starBtn"
                          style="line-height: 0.5;"
                          :style="!$vuetify.breakpoint.xsOnly ? '' : ''"
                        ></v-rating>
                        <a
                          data-toggle="modal"
                          data-target="popupModal2"
                          class="btn rev-pop"
                          data-url=""
                          ><span class="reviews">
                            {{
                              reader.profile.t_clients == 1
                                ? `(${reader.profile.t_clients}) client`
                                : `(${reader.profile.t_clients}) clients`
                            }}
                          </span>
                        </a>
                      </span>
                      <div class="clear"></div>
                      <p class="description m-0">
                        {{ reader.profile.elevator_pitch }}
                      </p>
                      <a :href="'/' + reader.profile.profile_link" class="read_more">Read more</a>
                      <div class="bottom-line">
                        <div class="dedfee">
                          ${{ getDiscount(reader.services[0].rate) }}
                        </div>
                        <span class="price-wrap">
                          <span class="perminute">
                            ${{ parseFloat(reader.services[0].rate).toFixed(2) }}
                          </span>/minute
                        </span>
                        <!-- :href="'/' + reader.profile.profile_link" -->
                        <a
                          :href="(user)?'/' + reader.profile.profile_link:'/signup/' + reader.profile.profile_link"
                          title="Contact Live"
                          class="contact-link"
                          >Call Now
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div id="extra-adv"></div>
            <div id="extra-spare-adv"></div>
            <div id="show-more-wrap">
              <span
                ><a
                  :href="`/search?ability=tarot-card-reading&online=true&sort=3&sortBy=rating`"
                  id="show-more-link"
                  >See more psychics »</a
                ></span
              >
            </div>
          </div>
          <!--end of grid -->
          <div class="col-md-1 col-lg-1 hidden-xs hidden-sm"></div>
        </div>
        <div id="popupModal2" class="modal fade" role="dialog">
          <div class="mod-wrap">
            <div class="modal-body">
              <div class="containerBoxWarp" style="width: 744px; height: 554px">
                <div class="top-section clearfix">
                  <div class="top-middle-review" style="width: 670px">
                    <span id="memberComments">Members reviews</span>
                    <span id="close-rating">X</span>
                  </div>
                </div>

                <div class="clearfix">
                  <div class="left-side-box">
                    <div
                      class="top-middle-left softEdge"
                      style="height: 75px"
                    ></div>
                    <div class="middle-left" style="height: 350px"></div>
                    <div
                      class="bottom-middle-left softEdge"
                      style="height: 75px"
                    ></div>
                  </div>

                  <div class="contentDiv" style="width: 620px; height: 500px">
                    <div class="box-content">
                      <iframe
                        src=""
                        frameborder="0"
                        height="500"
                        width="620"
                        id="iframe"
                        scrolling="no"
                      ></iframe>
                    </div>
                  </div>

                  <div class="right-side-box">
                    <div
                      class="top-middle-right softEdge"
                      style="height: 75px"
                    ></div>
                    <div class="middle-right" style="height: 350px"></div>
                    <div
                      class="bottom-middle-right softEdge"
                      style="height: 75px"
                    ></div>
                  </div>
                </div>

                <div class="bottom-section clearfix">
                  <div class="bottom-left cornerImage"></div>
                  <div class="bottom-middle" style="width: 620px"></div>
                  <div class="bottom-right cornerImage"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="why-psychics1on1">
      <div class="container">
        <div class="row">
          <div class="col-md-1 col-lg-1 hidden-xs hidden-sm"></div>
          <div class="col-md-10 col-lg-10 col-xs-12 col-sm-12">
            <div class="why-header-main">Why Psychics1on1™</div>
          </div>
          <div class="col-md-1 col-lg-1 hidden-xs hidden-sm"></div>
        </div>
        <div class="row align_grid">
          <div class="col-md-4 col-lg-4 col-xs-12 col-sm-12 pl-md-0">
            <img
              src="/images/tarot-reading/5-star-psychics.svg"
              class="why-image"
            />
            <div class="why-header">5 Star Psychics</div>
            <div class="why-text">
              Gifted, real psychics with over 18,500 satisfied clients.
            </div>
          </div>
          <div class="col-md-4 col-lg-4 col-xs-12 col-sm-12">
            <img src="/images/tarot-reading/3-free-min.svg" class="why-image" />
            <div class="why-header">Get $5 Free</div>
            <div class="why-text">
              Find the perfect psychic and
              <strong>Get $5 FREE</strong> with your first reading.
            </div>
          </div>
          <div class="col-md-4 col-lg-4 col-xs-12 col-sm-12 pr-md-0">
            <img
              src="/images/tarot-reading/satisfaction-guaranteed.svg"
              class="why-image"
            />
            <div class="why-header">Satisfaction Guaranteed</div>
            <div class="why-text">
              Request a refund if you're not completely happy with your first
              reading.
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="bottom-text">
      <div class="container">
        <div class="row">
          <div class="col-md-1 col-lg-1 hidden-xs hidden-sm"></div>
          <div class="col-md-10 col-lg-10 col-xs-12 col-sm-12">
            <div v-if="!seo_ability">
              <div class="text-head-bottom">Why Choose a Tarot Card Reading?</div>
              <div class="text-bottom-text">
                There are many purposes for getting a tarot reading online, mostly
                to gain insight and inspiration for anyone feeling stuck or in
                need of guidance. The advisors will use a tarot card deck to
                answer any variation of questions that need to be answered. The
                personal tarot reading is best for those who are going through a
                transition in life or feel a spiritual transformation. To get the
                most from the tarot reading, ask open ended questions that are
                focused on yourself.
              </div>
              <div class="text-head-bottom">What Can I Expect?</div>
              <div class="text-bottom-text">
                When you begin the online tarot card reading, the user will be
                asked to provide basic details including, your birthday and name,
                but have the option to remain anonymous. Our advisors offer the
                tarot readings through chat, voice call or video chat. Once connected
                through the preferred method, the user will be able to ask
                questions, whether personal or about others, and for advice about
                love and relationships, your life path, your career forecast, and
                you might be surprised by information that the divination might
                bring forward.
              </div>
              <div class="text-head-bottom">Who are the advisors?</div>
              <div class="text-bottom-text">
                Gifted advisors are increasingly using online methods to help
                clients as texting and chat has become more popular, giving
                individuals a more comfortable method of receiving answers.
                Whether you're looking for an expert in Online Pregnancy Psychic
                Reading, Tarot Card Readings, Astrology, Dreams, Fortune Telling,
                Love and Relationships, Career Forecasts, Numerology, or something
                else - we are certain you'll find a gifted psychic with valuable
                insights for you at Psychics1on1.
                <br /><br />
                When choosing an advisor, there is detailed information about each
                of our trusted tarot card readers, with ratings and reviews from
                people just like you. You can also ask our customer care to help
                you. Our main priority is that the process is comfortable and
                leave the chat very satisfied.
              </div>
              <div class="text-head-bottom">Other Types of Readings</div>
              <div class="text-bottom-text">
                If an online tarot card reading is not quite what you are looking
                for, there are many other types of intuitive readings that
                Psychics1on1 offers. Some advisors use psychic gifts and others
                use trusted tools or ancient systems. Each type of reading can
                focus on many specializations including, Online Pregnancy Psychic
                Reading, gifted love and relationships, career forecasts, past
                lives, dream interpretations, pet communication, and more. Here
                are some of the most popular types of intuitive readings:
                <br /><br />
                <ul>
                  <li>
                    Astrology: Astrologers use the stars as a road map to your
                    life. They can deliver insights into your past lives, destiny,
                    relationships, and more.
                  </li>
                  <li>
                    Mediums: A gifted psychic medium can receive messages from
                    loved ones who have left this world, angels, pets.
                  </li>
                  <li>
                    Numerology: Using your birthdate a numerologist can provide
                    deep insights into your destiny and life path.
                  </li>
                  <li>
                    Psychics: All advisors have strong intuitive powers, but some
                    are truly gifted clairvoyants who specialize in fortune
                    telling by hearing or feeling messages and seeing the future.
                  </li>
                </ul>
              </div>
            </div>
            <div v-else class="seo_content" v-html="seo_ability.seo_content"></div>
          </div>
          <div class="col-md-1 col-lg-1 hidden-xs hidden-sm"></div>
        </div>
      </div>
    </section>

    <!-- FAQS -->
    <!-- <section>
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
            <div id="accordion" style="margin: 0px auto">
              <div
                style="
                  font-family: 'Roboto';
                  font-size: 24px;
                  font-weight: bold;
                  color: #5f5771;
                "
              >
                FAQs
              </div>
              <div
                style="border-top: 1px solid #892788; margin: 15px 0 0"
              ></div>
              <div
                style="border-top: 6px solid #892788; width: 76px; margin: 0"
              ></div>
              <div class="">
                <h3 class="heading" style="color: #000000">
                  Here are some answers to commonly asked questions:
                </h3>
              </div>
              <br />
              <div class="panel-group">
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h4 class="panel-title">
                      <a
                        data-toggle="collapse"
                        href="#collapse1"
                        onclick="gtag('event', 'FAQ click', {'event_category':'Support Portal','event_label':'How do I get my 3 free minutes and what can I expect?'
});"
                        class="accordion-toggle collapsed"
                      >
                        How do I get my 3 free minutes and what can I expect?
                      </a>
                    </h4>
                  </div>
                  <div
                    id="collapse1"
                    class="panel-collapse collapse"
                    style="height: 0px"
                  >
                    <div class="panel-body">
                      You will receive 3 free minutes for your
                      <strong>first</strong> voice or chat reading with
                      Psychics1on1, after which you will get 3 free chat minutes
                      with each new advisor you try (online chat readings only,
                      does not include voice readings).<br /><br />
                      After selecting an advisor, click the "Let's Chat" or
                      "Call Now" button. During the first 3 minutes of your
                      session you'll be able to get a general idea of your
                      advisor's style. You may be asked to provide some details,
                      like your date of birth, name, or similar information
                      about anyone you're asking about. If you do not wish to
                      continue to a paid session simply thank your advisor and
                      'hang up' before your 3 minutes are up, and your session
                      will be free. You can always rely on our unlimited 3 free
                      minute offer to try different advisors and find the one
                      that's right for you.
                    </div>
                  </div>
                </div>
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h4 class="panel-title">
                      <a
                        data-toggle="collapse"
                        href="#collapse2"
                        class="accordion-toggle collapsed"
                        onclick="gtag('event', 'FAQ click', {'event_category':'Support Portal','event_label':'Is my credit card information safe and protected?'});"
                      >
                        Is my credit card information safe and protected?
                      </a>
                    </h4>
                  </div>
                  <div id="collapse2" class="panel-collapse collapse">
                    <div class="panel-body">
                      Your credit card information is sent to Psychics1on1 over
                      a secure connection and is encrypted to ensure your
                      privacy. This information is neither accessible to the
                      psychic nor to any other third party. Your financial
                      information is protected when you use your credit card or
                      prefer to use PayPal or another third-party payment
                      provider.
                    </div>
                  </div>
                </div>
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h4 class="panel-title">
                      <a
                        data-toggle="collapse"
                        href="#collapse3"
                        class="accordion-toggle collapsed"
                        onclick="gtag('event', 'FAQ click', {'event_category':'Support Portal','event_label':'Why am I seeing extra charges on my credit card account?'});"
                      >
                        Why am I seeing extra charges on my credit card account?
                      </a>
                    </h4>
                  </div>
                  <div id="collapse3" class="panel-collapse collapse">
                    <div class="panel-body">
                      Our system pre-authorizes your credit card to check for
                      validity by holding an amount of up to $15. This
                      validation is done upon entering new credit card
                      information to our system, as well as each time you start
                      a new session. In both cases, the pre-authorized amounts
                      are <strong>reversed after one hour.</strong> A
                      pre-authorization may appear in your statement as a
                      pending charge or a "Card check" action. Please note that
                      this is not an actual charge, but a hold of funds on your
                      card. These funds remain in your credit account.
                    </div>
                  </div>
                </div>
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h4 class="panel-title">
                      <a
                        data-toggle="collapse"
                        href="#collapse4"
                        class="accordion-toggle collapsed"
                        onclick="gtag('event', 'FAQ click', {'event_category':'Support Portal','event_label':'I saw a coupon online, why can't I use it?'});"
                      >
                        I saw a coupon online, why can't I use it?
                      </a>
                    </h4>
                  </div>
                  <div id="collapse4" class="panel-collapse collapse">
                    <div class="panel-body">
                      Our marketing team sends promotions from time to time to
                      our exsiting users using the E-Mail address they sign up
                      with. In case you saw a coupon or sale on a website that
                      is not www.psychics1on1.com, we ask that you read the
                      terms of that promotion clearly as they contain varying
                      requirements to apply. Either that or it's a coupon site
                      that is not affiliated with us and publishes codes without
                      our consent. When in doubt, feel free to ask us first.
                    </div>
                  </div>
                </div>
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h4 class="panel-title">
                      <a
                        data-toggle="collapse"
                        href="#collapse5"
                        class="accordion-toggle collapsed"
                        onclick="gtag('event', 'FAQ click', {'event_category':'Support Portal','event_label':'How can I receive promotions to my Email inbox?'});"
                      >
                        How can I receive promotions to my Email inbox?
                      </a>
                    </h4>
                  </div>
                  <div id="collapse5" class="panel-collapse collapse">
                    <div class="panel-body">
                      Make sure you whitelist our marketing E-Mail address
                      "advice@email.psychics1on1.com", also please check your
                      E-Mail
                      <a
                        href="https://www.psychics1on1.com/Email/EmailPreferences.aspx"
                        target="_blank"
                        >subscription preferences</a
                      >
                      to make sure you've set them up accordingly. If you're not
                      sure how to whitelist, you can google it or
                      <a
                        href="https://onlinegroups.net/blog/2014/02/25/how-to-whitelist-an-email-address/"
                        target="_blank"
                        >click here.</a
                      >
                    </div>
                  </div>
                </div>
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h4 class="panel-title">
                      <a
                        data-toggle="collapse"
                        href="#collapse6"
                        class="accordion-toggle collapsed"
                        onclick="gtag('event', 'FAQ click', {'event_category':'Support Portal','event_label':' believe I was charged incorrectly, what can I do?'});"
                      >
                        I believe I was charged incorrectly, what can I do?
                      </a>
                    </h4>
                  </div>
                  <div id="collapse6" class="panel-collapse collapse">
                    <div class="panel-body">
                      Our system charges each session by the minute. Please note
                      that a part of a minute is calculated as a full minute. If
                      your final fee in a particular session or sessions isn't
                      clear, feel free to contact us and we'll provide you with
                      a thorough explanation about your charge.
                    </div>
                  </div>
                </div>
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h4 class="panel-title">
                      <a
                        data-toggle="collapse"
                        href="#collapse7"
                        class="accordion-toggle collapsed"
                        onclick="gtag('event', 'FAQ click', {'event_category':'Support Portal','event_label':'How do I apply a promotion I received via E-Mail?'});"
                      >
                        How do I apply a promotion I received via E-Mail?
                      </a>
                    </h4>
                  </div>
                  <div id="collapse7" class="panel-collapse collapse">
                    <div class="panel-body">
                      Every promotion sent via E-Mail has an expiry date. The
                      session you conduct needs to end before the expiry date.
                      Note that the time zone is EST. In order to apply your
                      promotion, you will need to first log into your
                      Psychics1on1 account, then go to your E-Mail where the
                      promotion is advertised, click on the link inside the
                      E-Mail, usually it would be an orange button. The
                      promotion will then apply to your next session. Please pay
                      attention to the promotion's conditions.
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section> -->

  </div>
</template>

<script>
export default {
  data() {
    return {
      tarotReaders: [
        {
          id: 2049,
          role_id: 1,
          profile: {
            id: 2014,
            name: "ruby",
            last_name: "costello",
            display_name: "psychic solutions",
            profile_link: "psychic-solutions",
            email: null,
            birth_date: "08/04/1979",
            social_link_one: null,
            social_link_two: null,
            social_link_three: "Psychicsolutionsanddetails",
            description:
              "I am a clairvoyant psychic with over 15 years experience. I don't use tools. I am very accurate i get to the point and don't Sugar coat. I offer details Time frames And solutions. I will let you know how they feel and think and what to expect. Find out who is your soulmate. Psychic readings to me is a personal connecting between this world and the spiritual world the benefits to me is making a true positive connection for visions so i am able to help guide and lead in the right path. How i prepare for a reading, the first thing i do in the morning is go into a deep meditation to renew my spirit and connect with my self and spirit guides. How I connect with callers, I am able to pick up on the callers energy Through voice vibrations or name and date of birth. I first discovered my gift when i was about 10 years old. My grandmother help me to understand and develop my spiritual gift as she was a medium and picked up on my gift she also recommended me to take energy healing classes.My hope for my callers is to be as accurate with there reading, leaving them feeling refreshed and renewed.",
            profile_headshot_url:
              "https://psychics1on1-dev-assets.s3.us-west-2.amazonaws.com/user-profile/2049/psychic-solutions-profile.jpg",
            cover_path:
              "https://psychics1on1-dev-assets.s3.us-west-2.amazonaws.com/user-profile/2049/4b48e449f744dcc849b5f7d3d18ad345.jpg",
            gender: "Female",
            city: null,
            state: "FL",
            country: "US",
            timezone: "US/Eastern",
            intro_video_path:
              "https://psychics1on1-dev-assets.s3.us-west-2.amazonaws.com/user-profile/2049/f04e68013ded115971e3398338292704.mp4",
            intro_audio_path:
              "https://psychics1on1-dev-assets.s3.us-west-2.amazonaws.com/user-profile/2049/a3e0239ce38508087c2d3e7327e72615.wav",
            intro_video_thumbnail:
              "https://psychics1on1-dev-assets.s3.us-west-2.amazonaws.com/user-profile/2049/f04e68013ded115971e3398338292704.jpg",
            tagline: "I am a clairvoyant psychic with over 15 years expe...",
            elevator_pitch:
              "I am a clairvoyant psychic with over 15 years experience. I don't use tools. I am very accurate i get to the point and don't Sugar coat. I offer details Time fr...",
            years_experience: null,
            t_clients: 348,
            created_at: "2020-01-31T00:12:41.000000Z",
            updated_at: "2022-07-20T20:05:25.000000Z",
          },
          services: [
            {
              id: 1684,
              service: {
                id: 1,
                name: "Call",
                enable_duration: 1,
                created_at: "2019-10-24 16:27:49",
                updated_at: "2019-10-24 16:27:49",
                icon: "call_gray.svg",
                min_rate: 1,
              },
              rate: "3",
              active: 1,
              duration: 10,
              time_available: 0,
              chat_request: null,
            },
            {
              id: 1685,
              service: {
                id: 2,
                name: "Chat",
                enable_duration: 0,
                created_at: "2019-10-24 16:28:02",
                updated_at: "2019-10-24 16:28:03",
                icon: "chat_gray.svg\r\n\r\n\r\n",
                min_rate: 1,
              },
              rate: "4",
              active: 1,
              duration: null,
              time_available: 0,
              chat_request: null,
            },
            {
              id: 1686,
              service: {
                id: 3,
                name: "Video Chat",
                enable_duration: 1,
                created_at: "2019-10-24 16:28:23",
                updated_at: "2019-10-24 16:28:23",
                icon: "video_chat_gray.svg",
                min_rate: 1,
              },
              rate: "5",
              active: 0,
              duration: 10,
              time_available: 0,
              chat_request: null,
            },
          ],
          specialties: [],
          tools: [],
          styles: [],
          reviews: 121,
          reviews_rating: "4.9917",
          chat_free: false,
          t_cosmic: 0,
          online: true,
          reading_in_progress: false,
          favorite: false,
        },
        {
          id: 2506,
          role_id: 1,
          profile: {
            id: 2471,
            name: "Paul",
            last_name: "Nicholas",
            display_name: "Psychic Pauly",
            profile_link: "psychic-pauly",
            email: null,
            birth_date: "12/11/1967",
            social_link_one: null,
            social_link_two: "psychicpauly",
            social_link_three: "Psychicpauly",
            description:
              "Psychic energy reader and adviser in love and relationship dreams past lives spirituality here to give you advice on others as well I can read their energy through you such as family friends coworkers inlaws and more special advice on online dating and I can read your pets contact me now for your reading today",
            profile_headshot_url:
              "https://psychics1on1-dev-assets.s3.us-west-2.amazonaws.com/user-profile/2506/e8fbffa3a9d34cce871aed764b5d0a63.jpg",
            cover_path:
              "https://psychics1on1-dev-assets.s3.us-west-2.amazonaws.com/user-profile/2506/fcf98a04c939e217384511a8640ac164.jpg",
            gender: "Male",
            city: null,
            state: "NV",
            country: "US",
            timezone: "America/Los_Angeles",
            intro_video_path:
              "https://psychics1on1-dev-assets.s3.us-west-2.amazonaws.com/user-profile/2506/3b4b64bd0d57c0a84ad3ad262680c07a.mov",
            intro_audio_path:
              "https://psychics1on1-dev-assets.s3.us-west-2.amazonaws.com/user-profile/2506/6af1e49b28b9495ca92e60d4a0883327.m4a",
            intro_video_thumbnail:
              "https://psychics1on1-dev-assets.s3.us-west-2.amazonaws.com/user-profile/2506/3b4b64bd0d57c0a84ad3ad262680c07a.jpg",
            tagline: "Psychic Energy Reader",
            elevator_pitch:
              "Psychic Energy Reader over 25 years experience in giving advice on love relationships family pets friends Enemies coworkers job much more such as chakra balance",
            years_experience: 35,
            t_clients: 81,
            created_at: "2020-02-10T03:13:08.000000Z",
            updated_at: "2022-03-14T18:08:05.000000Z",
          },
          services: [
            {
              id: 1888,
              service: {
                id: 1,
                name: "Call",
                enable_duration: 1,
                created_at: "2019-10-24 16:27:49",
                updated_at: "2019-10-24 16:27:49",
                icon: "call_gray.svg",
                min_rate: 1,
              },
              rate: "19.99",
              active: 0,
              duration: 5,
              time_available: 0,
              chat_request: null,
            },
            {
              id: 1889,
              service: {
                id: 2,
                name: "Chat",
                enable_duration: 0,
                created_at: "2019-10-24 16:28:02",
                updated_at: "2019-10-24 16:28:03",
                icon: "chat_gray.svg\r\n\r\n\r\n",
                min_rate: 1,
              },
              rate: "2",
              active: 1,
              duration: null,
              time_available: 0,
              chat_request: null,
            },
            {
              id: 1890,
              service: {
                id: 3,
                name: "Video Chat",
                enable_duration: 1,
                created_at: "2019-10-24 16:28:23",
                updated_at: "2019-10-24 16:28:23",
                icon: "video_chat_gray.svg",
                min_rate: 1,
              },
              rate: "39.99",
              active: 0,
              duration: 5,
              time_available: 0,
              chat_request: null,
            },
          ],
          reviews: 30,
          reviews_rating: "4.9667",
          chat_free: false,
          t_cosmic: 0,
          online: true,
          reading_in_progress: false,
          favorite: false,
        },
        {
          id: 96,
          role_id: 1,
          profile: {
            id: 64,
            name: "Virginie",
            last_name: "Reynolds",
            display_name: "Maeva Sun",
            profile_link: "maeva-sun",
            email: null,
            birth_date: "03/08/1963",
            social_link_one:
              "https://www.facebook.com/virginia.reynolds.52090?ref=br_rs",
            social_link_two: "virginiareynolds690",
            social_link_three: "virginiareynolds690",
            description:
              "Originally from France i grew up in Western Africa from a long line of Psychics and Shamans. I have been blessed with the gift since birth helping clients to release resistance and remove blocks connecting with my Higher Self. I practice the art of White Magic using potions and Lotions for attracting what is wanted in your Life. LGBTQ friendly. I speak French and English. Call me or Chat now",
            profile_headshot_url:
              "https://psychics1on1-dev-assets.s3.us-west-2.amazonaws.com/user-profile/96/Maeva-Sun-profile.jpg",
            cover_path:
              "https://psychics1on1-dev-assets.s3.us-west-2.amazonaws.com/user-profile/96/d9827a1c1c2502e717ead141c3876d62.jpg",
            gender: "Female",
            city: "Glenwood Springs",
            state: "CO",
            country: "US",
            timezone: "US/Mountain",
            intro_video_path:
              "https://psychics1on1-dev-assets.s3.us-west-2.amazonaws.com/user-profile/96/347b044d4dc84e9505d50e3a17d072b4.mp4",
            intro_audio_path:
              "https://psychics1on1-dev-assets.s3.us-west-2.amazonaws.com/user-profile/96/604a161c634548a77b18facde35cfc53.m4a",
            intro_video_thumbnail:
              "https://psychics1on1-dev-assets.s3.us-west-2.amazonaws.com/user-profile/96/347b044d4dc84e9505d50e3a17d072b4.jpg",
            tagline: "ACCURATE - HONEST - CLEAR - \n    STRAIGHT FORWARD",
            elevator_pitch:
              "I am a natural born Psychic, Tarot Reader, Couple Therapist. My specialties are Love, Relationship, Money,  Career, Work, Healing, Destiny and Life Path.",
            years_experience: 28,
            t_clients: 647,
            created_at: "2019-09-24T18:28:38.000000Z",
            updated_at: "2021-03-04T19:20:25.000000Z",
          },
          services: [
            {
              id: 116,
              service: {
                id: 1,
                name: "Call",
                enable_duration: 1,
                created_at: "2019-10-24 16:27:49",
                updated_at: "2019-10-24 16:27:49",
                icon: "call_gray.svg",
                min_rate: 1,
              },
              rate: "2.99",
              active: 1,
              duration: 3,
              time_available: 0,
              chat_request: null,
            },
            {
              id: 180,
              service: {
                id: 2,
                name: "Chat",
                enable_duration: 0,
                created_at: "2019-10-24 16:28:02",
                updated_at: "2019-10-24 16:28:03",
                icon: "chat_gray.svg\r\n\r\n\r\n",
                min_rate: 1,
              },
              rate: "3.50",
              active: 1,
              duration: null,
              time_available: 0,
              chat_request: null,
            },
            {
              id: 244,
              service: {
                id: 3,
                name: "Video Chat",
                enable_duration: 1,
                created_at: "2019-10-24 16:28:23",
                updated_at: "2019-10-24 16:28:23",
                icon: "video_chat_gray.svg",
                min_rate: 1,
              },
              rate: "2.99",
              active: 1,
              duration: 5,
              time_available: 0,
              chat_request: null,
            },
          ],
          reviews: 206,
          reviews_rating: "4.9078",
          chat_free: false,
          t_cosmic: 0,
          online: false,
          reading_in_progress: false,
          favorite: false,
        },
        {
          id: 92,
          role_id: 1,
          profile: {
            id: 60,
            name: "Cristina",
            last_name: "Panescu",
            display_name: "maya",
            profile_link: "maya",
            email: null,
            birth_date: "04/14/1963",
            social_link_one: null,
            social_link_two: null,
            social_link_three: null,
            description:
              "My name is Maya. My specialty is life coach, dating, relationships and career. I can offer a quick YES or NO reading, or a full, in depth consultation. If I am not online for a phone reading, you can send me a message.I have over 20 years experience and a great sensitivity of the spiritual world. When I do a reading, I send questions to the spirits and show my answers through cards.",
            profile_headshot_url:
              "https://psychics1on1-dev-assets.s3.us-west-2.amazonaws.com/user-profile/92/276e922f04394b73b0429a0073cd8b74.jpg",
            cover_path:
              "https://psychics1on1-dev-assets.s3.us-west-2.amazonaws.com/user-profile/92/80145a0b29b1ed9f2d9eed791d958228.jpg",
            gender: "Female",
            city: "Magurele",
            state: null,
            country: "RO",
            timezone: "US/Eastern",
            intro_video_path:
              "https://psychics1on1-dev-assets.s3.us-west-2.amazonaws.com/user-profile/92/ff9e616e55a573dc7828d9c0e6c4e8ef.mp4",
            intro_audio_path:
              "https://psychics1on1-dev-assets.s3.us-west-2.amazonaws.com/user-profile/92/d1193f112e660067af76d96a070b405d.wav",
            intro_video_thumbnail:
              "https://psychics1on1-dev-assets.s3.us-west-2.amazonaws.com/user-profile/92/ff9e616e55a573dc7828d9c0e6c4e8ef.jpg",
            tagline: "Tarot reading for Love, Relationships, Career.",
            elevator_pitch:
              "My specialty is love, relationships and career. I can offer an in depth consultation. I send questions to the spirits and show my answers through cards.",
            years_experience: 25,
            t_clients: 481,
            created_at: "2019-09-24T15:07:10.000000Z",
            updated_at: "2021-09-23T21:12:40.000000Z",
          },
          services: [
            {
              id: 112,
              service: {
                id: 1,
                name: "Call",
                enable_duration: 1,
                created_at: "2019-10-24 16:27:49",
                updated_at: "2019-10-24 16:27:49",
                icon: "call_gray.svg",
                min_rate: 1,
              },
              rate: "2",
              active: 0,
              duration: 10,
              time_available: 0,
              chat_request: null,
            },
            {
              id: 176,
              service: {
                id: 2,
                name: "Chat",
                enable_duration: 0,
                created_at: "2019-10-24 16:28:02",
                updated_at: "2019-10-24 16:28:03",
                icon: "chat_gray.svg\r\n\r\n\r\n",
                min_rate: 1,
              },
              rate: "3",
              active: 1,
              duration: null,
              time_available: 0,
              chat_request: null,
            },
            {
              id: 240,
              service: {
                id: 3,
                name: "Video Chat",
                enable_duration: 1,
                created_at: "2019-10-24 16:28:23",
                updated_at: "2019-10-24 16:28:23",
                icon: "video_chat_gray.svg",
                min_rate: 1,
              },
              rate: "4",
              active: 0,
              duration: 10,
              time_available: 0,
              chat_request: null,
            },
          ],
          reviews: 188,
          reviews_rating: "4.8989",
          chat_free: false,
          t_cosmic: 0,
          online: false,
          reading_in_progress: false,
          favorite: false,
        },
        {
          id: 1539,
          role_id: 1,
          profile: {
            id: 1504,
            name: "Violet",
            last_name: "Spiro",
            display_name: "Love Specialist Violet",
            profile_link: "love-specialist-violet",
            email: null,
            birth_date: "12/04/1999",
            social_link_one: null,
            social_link_two: null,
            social_link_three: "love_specialist_violet",
            description:
              "Hello and welcome! My name is violet, a spiritual advisor with  12 years experience. I specialize in love  relationships but I can look into all aspects of life such as, career and finances, family matters, charka balancing and more! Allow me to be your spiritual advisor to help you gain insight and guidance in to things that are happening now and what's to come!Connect with me now!",
            profile_headshot_url:
              "https://psychics1on1-dev-assets.s3.us-west-2.amazonaws.com/user-profile/1539/b5f5906f4a587ededd0cd86062eda45e.jpg",
            cover_path:
              "https://psychics1on1-dev-assets.s3.us-west-2.amazonaws.com/user-profile/1539/d40e185d74b7b4a7eb54267714b45ad3.jpg",
            gender: "Female",
            city: "Seattle",
            state: "WA",
            country: "US",
            timezone: "US/Central",
            intro_video_path:
              "https://psychics1on1-dev-assets.s3.us-west-2.amazonaws.com/user-profile/1539/1ca7b0eb057f1b69fe283120908d66b8.mov",
            intro_audio_path: "",
            intro_video_thumbnail:
              "https://psychics1on1-dev-assets.s3.us-west-2.amazonaws.com/user-profile/1539/1ca7b0eb057f1b69fe283120908d66b8.jpg",
            tagline: "Allow me and my spirit guides to give you clarity!",
            elevator_pitch:
              "I’m a 4th generation gifted psychic, with the ability to see sense and feel one’s energies just through name and date of birth. Allow me to give you insight!",
            years_experience: 12,
            t_clients: 105,
            created_at: "2020-01-21T20:42:50.000000Z",
            updated_at: "2021-06-16T09:03:10.000000Z",
          },
          services: [
            {
              id: 1498,
              service: {
                id: 1,
                name: "Call",
                enable_duration: 1,
                created_at: "2019-10-24 16:27:49",
                updated_at: "2019-10-24 16:27:49",
                icon: "call_gray.svg",
                min_rate: 1,
              },
              rate: "5",
              active: 1,
              duration: 10,
              time_available: 0,
              chat_request: null,
            },
            {
              id: 1499,
              service: {
                id: 2,
                name: "Chat",
                enable_duration: 0,
                created_at: "2019-10-24 16:28:02",
                updated_at: "2019-10-24 16:28:03",
                icon: "chat_gray.svg\r\n\r\n\r\n",
                min_rate: 1,
              },
              rate: "6",
              active: 1,
              duration: null,
              time_available: 0,
              chat_request: null,
            },
            {
              id: 1500,
              service: {
                id: 3,
                name: "Video Chat",
                enable_duration: 1,
                created_at: "2019-10-24 16:28:23",
                updated_at: "2019-10-24 16:28:23",
                icon: "video_chat_gray.svg",
                min_rate: 1,
              },
              rate: "5",
              active: 1,
              duration: 30,
              time_available: 0,
              chat_request: null,
            },
          ],
          reviews: 15,
          reviews_rating: "5.0000",
          chat_free: false,
          t_cosmic: 0,
          online: false,
          reading_in_progress: false,
          favorite: false,
        },
        {
          id: 15550,
          role_id: 1,
          profile: {
            id: 15515,
            name: "ZeeShan",
            last_name: "Ashraf",
            display_name: "Psychics ZeeShan",
            profile_link: "psychics-zeeshan",
            email: null,
            birth_date: "09/14/1998",
            social_link_one: null,
            social_link_two: null,
            social_link_three: null,
            description:
              "I have been reading professionally for over 20 years No Fluff! Real Answers,Real solutions to your deepest relationship concerns Certified Psychic Medium to help you in all matters of the heart and spirit! I tell you without you asking.I was born psychic. Power to make things happen.My predictions are accurate.I am a healer.Know who your soulmate is.I help people with direction.No sugarcoating..",
            profile_headshot_url:
              "https://psychics1on1-dev-assets.s3.us-west-2.amazonaws.com/user-profile/15550/Psychics-ZeeShan-profile.jpg",
            cover_path:
              "https://psychics1on1-dev-assets.s3.us-west-2.amazonaws.com/images/Cover.png",
            gender: "Male",
            city: "Hafizabad mangt neecha Pakistan",
            state: null,
            country: "PK",
            timezone: "America/Los_Angeles",
            intro_video_path:
              "https://psychics1on1-dev-assets.s3.us-west-2.amazonaws.com/user-profile/15550/18e4500c590028b253d5a3c9eac64bee.mp4",
            intro_audio_path:
              "https://psychics1on1-dev-assets.s3.us-west-2.amazonaws.com/user-profile/15550/14c9f0f11255a90df7aaed9cc6059c40.m4a",
            intro_video_thumbnail:
              "https://psychics1on1-dev-assets.s3.us-west-2.amazonaws.com/user-profile/15550/18e4500c590028b253d5a3c9eac64bee.jpg",
            tagline: "LOVE RELATIONSHIP,CAREER,BREAK UP,DIVORCE",
            elevator_pitch:
              "I am a natural born Psychic,Tarot Reader, Couple Therapist.My specialties are Love, Relationship,Money,Career,Work, Healing, Destiny and Life Path Chat Me Now..",
            years_experience: 20,
            t_clients: 80,
            created_at: "2021-05-02T02:50:34.000000Z",
            updated_at: "2022-09-12T16:23:30.000000Z",
          },
          services: [
            {
              id: 7705,
              service: {
                id: 1,
                name: "Call",
                enable_duration: 1,
                created_at: "2019-10-24 16:27:49",
                updated_at: "2019-10-24 16:27:49",
                icon: "call_gray.svg",
                min_rate: 1,
              },
              rate: "4.99",
              active: 1,
              duration: 120,
              time_available: 0,
              chat_request: null,
            },
            {
              id: 7706,
              service: {
                id: 2,
                name: "Chat",
                enable_duration: 0,
                created_at: "2019-10-24 16:28:02",
                updated_at: "2019-10-24 16:28:03",
                icon: "chat_gray.svg\r\n\r\n\r\n",
                min_rate: 1,
              },
              rate: "1.90",
              active: 1,
              duration: null,
              time_available: 0,
              chat_request: null,
            },
            {
              id: 7707,
              service: {
                id: 3,
                name: "Video Chat",
                enable_duration: 1,
                created_at: "2019-10-24 16:28:23",
                updated_at: "2019-10-24 16:28:23",
                icon: "video_chat_gray.svg",
                min_rate: 1,
              },
              rate: "9.99",
              active: 1,
              duration: 5,
              time_available: 0,
              chat_request: null,
            },
          ],
          reviews: 65,
          reviews_rating: "4.7538",
          chat_free: false,
          t_cosmic: 0,
          online: true,
          reading_in_progress: false,
          favorite: false,
        },
      ],
      heroImage: 'tarot-reading/lp_4_750x770.png',
      firstBannerText: 'Get a Live Tarot Reading for Clarity and Comfort, Day or Night',
      listHeader: 'Our Top Rated Tarot Readers',
    };
  },
  props: ["psychics", "category_slug", "seo_ability", "user"],
  components: {},
  computed: {
    // ...mapGetters({
    //   psychics: "search/items",
    // }),
  },
  watch: {},
  methods: {
    getDiscount(rate, discountPercent = 70) {
      // let totalDiscount = rate * (discountPercent / 100);
      // return parseFloat(rate - totalDiscount).toFixed(2);
      let totalDiscount = (rate * 100) / 30;
      return parseFloat(totalDiscount).toFixed(2);
    },
    getResourcesByCategory(){
      switch (this.category_slug) {
        case 'astrology':
          this.heroImage = 'seo/astrologer_hero.png';
          this.firstBannerText = 'Chat with Your Personal Astrologer Today';
          this.listHeader = 'Our Top Rated Astrologers';
          return
        case 'tarot-card-reading-lp':
          this.heroImage = 'tarot-reading/lp_4_750x770.png';
          this.firstBannerText = 'Get a Live Tarot Reading for Clarity and Comfort, Day or Night';
          this.listHeader = 'Our Top Rated Tarot Readers';
          return
        case 'palm-reading':
          this.heroImage = 'seo/palm_reading_hero.png';
          this.firstBannerText = 'Discover Your Destiny with an Experienced Palm Reader';
          this.listHeader = 'Our Top Rated Palm Readers';
          return
        case 'clairvoyant':
          this.heroImage = 'seo/clairvoyant_hero_lp.png';
          this.firstBannerText = 'Find True Clarity with a Clairvoyant Consultation';
          this.listHeader = 'Our Top Rated Clairvoyants';
          return
        case 'medium':
          this.heroImage = 'seo/medium_hero.png';
          this.firstBannerText = 'Stay Connected to Loved Ones with an Expert Medium';
          this.listHeader = 'Our Top Rated Mediums';
          return
        case 'spiritual-healer':
          this.heroImage = 'seo/spiritual_healing_hero.png';
          this.firstBannerText = 'Heal Mind, Body and Soul with Top Spiritual Healers';
          this.listHeader = 'Our Top Rated Spiritual Healers';
          return
        case 'psychic':
          this.heroImage = 'seo/psychic_hero.png';
          this.firstBannerText = 'Spiritual Guidance in Love, Life, and Career, Our Psychics Are Here for You';
          this.listHeader = 'Our Top Rated Psychics';
          return
        case 'tarot-card-reading':
          this.heroImage = 'seo/tarot_card_reader_hero.png';
          this.firstBannerText = 'Understand Past, Present and Future with Your Personalized Tarot Reading';
          this.listHeader = 'Our Top Rated Tarot Card Readers';
          return
        default:
          break;
      }
    }
  },
  created() {
    // this.$store
    //   .dispatch("search/getItems", {
    //     ability: ["tarot-card-reading"],
    //     search: null,
    //     sort: "3",
    //     sortBy: "rating",
    //   })
    //   .then(() => {
    //     this.tarotReaders = [this.psychics.data];
    //   });
    this.tarotReaders = this.psychics;
    this.getResourcesByCategory();
  },
};
</script>
<style>
.top {
  background-repeat: no-repeat;
  background-attachment: scroll;
  background-position: 96%;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  background-size: cover;
  -o-background-size: cover;
}
#logo {
  display: inline-block;
  width: auto;
  height: auto;
  padding: 0;
}

.top-desclaimer {
  font-size: 13px;
}
.apps-text {
  font-size: 15px;
  line-height: 21px;
  color: #666666;
  text-align: center;
  margin: 17px 0 0 0;
}
.apps-text a {
  color: #892788;
}
.apps-img {
  width: 134px;
}
.container.first {
  height: 355px;
}
#extra-adv .box-expert {
  display: none;
}
#extra-spare-adv .box-expert {
  display: none;
}

.tarot-readers {
  background: #ffffff;
}

.first_intro {
  font: normal normal 500 18px/32px Montserrat;
  color: #FFFFFF;
  text-align: center;
  letter-spacing: 0.36px;
  /* padding-top: 120px; */
}

@media (max-width: 767px) {
  .hidden-xs {
    display: none !important;
  }
  .first_intro {
    /* padding-top: 0px; */
  }
}

@media (min-width: 768px) and (max-width: 1199px){
  .hidden-md {
    display: none !important;
  }
}

@media (min-width: 1200px) {
  .hidden-lg {
    display: none !important;
  }
}

.read_more{
  position: absolute;
  bottom: 20px;
  left: 0px;
}

@media screen and (max-width: 767px) {
  .read_more{
    bottom: 39px;
  }
}

.align_grid{
  max-width: 988px;
  margin: auto;
}

.bottom-text{
  background-color: #FFFFFF;
}

.seo_content{
  padding-top: 22px;
}

.seo_content h2{
  font-size: 16px;
  font-weight: 600;
  color: #43425D;
}
 .front h2 {
  font-size: 18px !important;
}
 .front p {
  font-size: 14px !important;
  color:#43425D !important;
}

.seo_content p{
  font-size: 14px;
  color: #656B72;
  font-weight: 500;
  text-align: justify;
}

@media only screen and (max-width: 960px){
  body{
    overflow-x: hidden;
  }
  html{
    overflow-x: hidden;
  }
}
</style>