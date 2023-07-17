<template>
  <div class="home_search" style="background: #ffffff 0% 0% no-repeat padding-box; opacity: 1">
    <v-img
      alt="Press"
      :height="$vuetify.breakpoint.smAndDown ? '153' : '298'"
      :src="
        $vuetify.breakpoint.smAndDown
          ? '/images/site-images/press-mobile.png'
          : '/images/site-images/press-desktop.png'
      "
      aspect-ratio="1.7"
      class="w-100 d-flex justify-center align-center px-5 text-center"
    >
      <h1>
        News & Press
      </h1>
      <h3>
        Latest Industry Buzz Featuring Our Popular Psychics
      </h3>
    </v-img>

    <div
      :style="
        $vuetify.breakpoint.smAndDown
          ? 'margin-top: 11px;'
          : 'margin-top: 15px;'
      "
      style="padding-top: 6px"
      class="container pb-0 mb-0"
    >
      <div
        :style="
          $vuetify.breakpoint.smAndDown
            ? 'margin-bottom: 11px;'
            : 'margin-bottom: 15px;'
        "
        class="d-flex justify-end"
      >
        <span
          class="mt-0 pt-0 d-flex align-center"
          style="
            color: #43425d;
            font: normal normal 600 14px/18px Montserrat;
            cursor: pointer;
          "
          @click="dialog2 = true"
        >
          <p style="margin: 0 10px">PR Contact</p>
          <i><img width="40" :src="press_icon" /></i>
        </span>
      </div>

      <div class="row" id="videoWidth">
        <div
          class="cols-12 col-md-6"
          v-for="(i, index) in pressRow"
          :key="i.name"
        >
          <div
            class="d-flex justify-center align-center w-100 h-100"
            style="
              position: absolute;
              object-fit: contain;
              right: 5px;
              bottom: 10px;
            "
          >
            <i v-if="i.vid || i.vidx"
              ><img
                :style="
                  $vuetify.breakpoint.smAndDown ? 'width: 66px !important;' : ''
                "
                :src="play_icon"
            /></i>
          </div>
          <div
            @click="i.vid || i.pdf ? showImage(i) : openLink(i)"
            :id="'cover' + index"
            class="cover text-center d-flex justify-center align-center"
            :style="
              $vuetify.breakpoint.smAndDown
                ? 'margin-top: 20px !important;'
                : 'margin-top: 30px !important;'
            "
          ></div>

          <img
            :alt="i.title"
            :id="'press' + index"
            :src="'/images/press/' + i.name"
            class="w-100"
            :style="
              $vuetify.breakpoint.smAndDown
                ? 'margin-top: 20px !important;'
                : 'margin-top: 30px !important;'
            "
            style="cursor: pointer"
            @load="onImgLoaded(index)"
          />
          <div
            class="m-auto"
            :style="
              $vuetify.breakpoint.smAndDown
                ? 'margin-bottom: 10px !important;'
                : 'margin-bottom: 15px !important;'
            "
            style="color: #a2a2a2; font-size: 12px; text-align: left"
          >
            <div
              style="
                color: black;
                font-size: 18px;
                font-weight: bold;
                margin-top: 10px;
              "
            >
              {{ i.title }}
            </div>
            <div>{{ i.date }}</div>
          </div>
        </div>
      </div>
    </div>
    <div class="d-flex justify-content-center pb-2">
      <v-btn
        style="
          background-color: #ffffff;
          font: normal normal 600 14px/18px Montserrat;
          letter-spacing: 0.28px;
          color: #43425d;
          opacity: 1;
        "
        :loading="loadingPress"
        :disabled="loadingPress"
        v-if="this.fullPress.length > this.pressRow.length"
        @click="showMore()"
        >Show More ▽</v-btn
      >
      <v-btn
        style="
          background-color: #ffffff;
          font: normal normal 600 14px/18px Montserrat;
          letter-spacing: 0.28px;
          color: #43425d;
          opacity: 1;
        "
        :loading="loadingPress"
        :disabled="loadingPress"
        v-if="this.pressRow.length > this.numberArticles"
        @click="showLess()"
        >Show Less △</v-btn
      >
    </div>
    <div
      style="background: #f4f4f4 0% 0% no-repeat padding-box; opacity: 1"
      :style="
        $vuetify.breakpoint.smAndDown
          ? 'padding: 20px 45px;'
          : 'padding: 30px 98px;'
      "
      class="w-100 d-flex justify-center align-center mt-3"
    >
      <p
        :style="
          $vuetify.breakpoint.smAndDown
            ? 'color: #656B72; text-align: left; font: normal normal medium 12px/22px Montserrat; letter-spacing: 0px; opacity: 1; line-height: 22px'
            : 'color: #656B72; font: normal normal medium 14px/26px Montserrat; letter-spacing: 0px; opacity: 1; line-height: 22px; text-align: center;' +
              `max-width: ${this.textWidth}px;`
        "
      >
        Psychics1on1 is an exponentially growing newcomer, transforming the
        psychic services industry and tech scene! Since we launched in January
        of 2020, the world has been buzzing about our intuitive and tech-forward
        platform that’s easy for anyone to use, as well as our modern business
        model and 2,000+ highly rated spiritual advisors. We’ve connected
        in-demand famous psychics, mediums, tarot readers, palm readers,
        astrologists, and more with real people all over the globe.
      </p>
    </div>

    <v-dialog
      content-class="overflow-visible"
      v-model="dialog2"
      max-width="600"
    >
      <div class="text-right">
        <i
          class="fa fa-times close-button contact-close"
          style="z-index: 100"
          @click="dialog2 = false"
          aria-hidden="true"
        ></i>
      </div>
      <v-card style="border-radius: 30px !important">
        <v-card-text class="p-5">
          <p style="color: #43425d">Public Relations Inquiries:</p>
          <p></p>

          <p>
            <a
              href="mailto:press@psychics1on1.com"
              style="color: #43425d; cursor: pointer"
            >
              Contact
              <i><img :src="press_icon" /></i>
            </a>
            <span style="color:black">press@psychics1on1.com</span>
          </p>
          <p></p>
          <div class="border-top my-3"></div>
          <p style="color: #43425d">Marketing Inquiries:</p>
          <p></p>
          <p>
            <a
              href="mailto:marketing@psychics1on1.com"
              style="color: #43425d; cursor: pointer"
            >
              Contact
              <i><img :src="press_icon" /></i>
            </a>
            <span style="color:black">marketing@psychics1on1.com</span>
          </p>
        </v-card-text>
      </v-card>
    </v-dialog>

    <v-dialog
      content-class="no-overflow"
      v-model="dialog"
      :max-width="image.vid ? width : '500'"
    >
      <div class="text-right mb-5">
        <i
          class="fa fa-times close-button"
          style="z-index: 100"
          @click="dialog = false"
          aria-hidden="true"
        ></i>
      </div>
      <v-card elevation="0" style="background-color: transparent">
        <v-card-text>
          <div class="row">
            <div v-if="image.vid" class="col-12">
              <iframe
                :src="image.vid"
                loading="lazy"
                :width="width - 20"
                :height="height"
                frameborder="0"
                allow="autoplay; fullscreen"
                allowfullscreen
              ></iframe>
            </div>
            <div v-else-if="image.pdf" class="col-12">
              <v-img
                :alt="image.title"
                :max-height="maxHeight"
                contain
                :src="'/images/press/' + image.pdf"
              ></v-img>
            </div>
          </div>
          <div class="row">
            <div class="col-12 text-center">
              <div style="color: white; font-weight: bold; margin-top: 10px">
                {{ image.title }}
              </div>
            </div>
            <div class="col-12 text-center">
              <div style="color: white">{{ image.date }}</div>
            </div>
          </div>
        </v-card-text>
      </v-card>
    </v-dialog>
  </div>
</template>

<script>
export default {
  data() {
    return {
      press_icon: "/images/icons/press_email_icon.svg",
      play_icon: "/images/icons/play_icon.png",
      loadingPress: false,
      numberArticles: 0,
      numberSlicer: 0,
      width: false,
      textWidth: false,
      height: false,
      dialog: false,
      dialog2: false,

      image: false,
      maxHeight: window.innerHeight - 100,
      fullPress: [
        {
          name: "US_Weekly.jpg.png",
          title: "US Magazine",
          date: "Feb 11, 2023",
          link: "https://www.usmagazine.com/celebrity-news/news/paula-abdul-2-psychics-predicted-my-american-idol-success/",
        },
        {
          name: "InTouch.jpg",
          title: "InTouch",
          date: "Feb 11, 2023",
          link: "https://www.intouchweekly.com/posts/paula-abdul-2-psychics-predicted-my-american-idol-success/",
        },
        {
          name: "Talent_Recap.jpg",
          title: "Talent Recap",
          date: "Feb 9, 2023",
          link: "https://talentrecap.com/paula-abdul-says-two-different-psychics-predicted-her-american-idol-future/",
        },
        {
          name: "Daily_Mail.jpg",
          title: "Daily Mail",
          date: "Feb 8, 2023",
          link: "https://www.dailymail.co.uk/tvshowbiz/article-11724703/Paula-Abdul-told-TWO-different-psychics-American-Idol.html",
        },
       
        {
          name: "Boss_Magaizine.jpg",
          title: "Boss Magazine",
          date: "Dec 8, 2022",
          link: "https://thebossmagazine.com/supply-chain-disruption-business-owners/",
        },
        {
          name: "Fundly.jpg",
          title: "Fundly",
          date: "Dec 7, 2022",
          link: "https://fundly.com/where-should-businesses-allocate-money-in-an-unpredictable-e",
        },
        {
          name: "TechBullion.jpg",
          title: "Tech Bullion",
          date: "Dec 7, 2022",
          link: "https://techbullion.com/five-technology-trends-that-will-impact-your-business/",
        },
        {
          name: "Big_News_Network.jpg",
          title: "Big News Network",
          date: "Dec 7, 2022",
          link: "https://www.bignewsnetwork.com/news/273167183/why-employee-development-is-crucial-for-business-success",
        },
        {
          name: "Digital_Journal.jpg",
          title: "Digital Journal",
          date: "Dec 5, 2022",
          link: "https://www.digitaljournal.com/pr/how-to-recognize-and-overcome-unconscious-bias-as-a-leader",
        },
        {
          name: "Big_Easy_Magazine.jpg",
          title: "Big Easy Magazine",
          date: "Nov 1, 2022",
          link: " https://www.bigeasymagazine.com/2022/11/01/eight-strategies-for-being-more-inclusive-in-the-workplace/",
        },
        {
          name: "Swaay.jpg",
          title: "Swaay",
          date: "Oct 26, 2022",
          link: "https://swaay.com/8-ways-to-be-remembered-in-a-job-interview",
        },

        {
          name: "Urban_Matter.jpg",
          title: "Urban Matter",
          date: "Oct 26, 2022",
          link: "https://urbanmatter.com/steps-to-prioritize-your-employees-mental-health-in-the-workplace/",
        },
         {
          name: "Time_Business_News.jpg",
          title: "Time Business News",
          date: "Oct 26, 2022",
          link: "https://timebusinessnews.com/new-business-skills-everyone-should-learn/",
        },
        {
          name: "Small_Biz_Club.jpg",
          title: "Small Biz Club",
          date: "Oct 22, 2022",
          link: "https://smallbizclub.com/leadership/10-top-new-strategies-to-running-in-person-meetings/",
        },
        {
          name: "Business_Daily_Media.jpg",
          title: "Business Daily Media",
          date: "Oct 20, 2022",
          link: "https://www.businessdailymedia.com/business-news/20659-top-wellness-apps-for-work-life-balance",
        },
        {
          name: "LA_Confidential.jpg",
          title: "LA Confidential",
          date: "Sep 15, 2022",
          link: "https://laconfidentialmag.com/habits-that-will-make-you-a-morning-person",
        },
        {
          name: "Power_Home_Biz.jpg",
          title: "Power Home Biz",
          date: "Sep 13, 2022",
          link: "https://www.powerhomebiz.com/managing-and-growing/employees/how-to-celebrate-employee-anniversaries-make-them-memorable.htm",
        },
        {
          name: "The_List_Wire.jpg",
          title: "List Wire",
          date: "Sep 8, 2022",
          link: "https://thelistwire.usatoday.com/lists/best-cities-to-live-in-while-working-remotely/",
        },
        {
          name: "Built_In_Chicago2.jpg",
          title: "Built in Chicago",
          date: "Sep 3, 2022",
          link: "https://www.builtinchicago.org/event/how-asking-questions-helps-you-stand-out-workplace/190326",
        },
        {
          name: "Terkel.jpg",
          title: "Terkel",
          date: "Aug 23, 2022",
          link: "https://blog.terkel.io/13-highest-paying-jobs-in-the-world/",
        },
        {
          name: "WomansWorld.jpg",
          title: "Woman's World",
          date: "Aug 23, 2022",
          link: "https://www.womansworld.com/posts/books/9-latest-book-releases-that-will-boost-imagination-and-creativity%EF%BF%BC",
        },
        {
          name: "Founder_s_Guide.jpg",
          title: "Founder's Guide",
          date: "Aug 10, 2022",
          link: "https://foundersguide.com/how-to-turn-a-side-hustle-into-a-full-time-job/",
        },
        {
          name: "Built_in_Sea.jpg",
          title: "Built In Sea",
          date: "Aug 8, 2022",
          link: "https://www.builtinseattle.com/event/workplace-upgrades-increase-employee-engagement/61851",
        },
        {
          name: "Curious_Mind_Magazine.jpg",
          title: "Curious Mind Magazine",
          date: "July 31, 2022",
          link: "https://curiousmindmagazine.com/how-to-lead-with-empathy-in-the-workplace/",
        },
        {
          name: "World_Financial_Review.jpg",
          title: "World Financial Review",
          date: "June 18, 2022",
          link: "https://worldfinancialreview.com/win-trust-maintain-loyalty-with-millennial-and-gen-z-consumers/",
        },
        {
          name: "Built_In_Chicago.jpg",
          title: "Built In Chicago",
          date: "June 15, 2022",
          link: "https://www.builtinchicago.org/event/ways-business-insurance-protects-your-small-business/181044",
        },
        {
          name: "Smart_Books_for_Smart_Kids.jpg",
          title: "Smart Books for Smart Kids",
          date: "June 14, 2022",
          link: "https://smartbooksforsmartkids.com/4-best-goosebumps-books-of-all-time/",
        },
        {
          name: "Boss_Magazine.jpg",
          title: "Boss Magazine",
          date: "June 13, 2022",
          link: "https://thebossmagazine.com/grow-your-network-of-support/",
        },
        {
          name: "Troy_Media.jpg",
          title: "Troy Media",
          date: "June 13, 2022",
          link: "https://troymedia.com/joint-venture/cool-podcasts-that-make-your-evening-commute-more-fun/",
        },
        {
          name: "Medium.jpg",
          title: "Medium",
          date: "June 12, 2022",
          link: "https://medium.com/authority-magazine/power-women-melissa-rhodes-of-psychics-1on1-on-how-to-successfully-navigate-work-love-and-life-as-f5c29a2e9239",
        },
        {
          name: "Mental_Itch.jpg",
          title: "Mental Itch",
          date: "June 11, 2022",
          link: "https://mentalitch.com/how-to-be-more-present-in-the-moment/",
        },
        {
          name: "360_Mag.jpg",
          title: "360 Mag",
          date: "June 10, 2022",
          link: "https://www.the360mag.com/ten-minute-activities-that-will-make-you-feel-happier/",
        },
        {
          name: "Pursue_the_Passion-June_9.jpg",
          title: "Pursue the Passion",
          date: "June 9, 2022",
          link: "https://pursuethepassion.com/7-careers-for-pisces/",
        },
        {
          name: "Panic_World.jpg",
          title: "Panic World",
          date: "May 30, 2022",
          link: "https://www.panic.world/the-most-intense-zodiac-sign-according-to-astrologers-best-life/",
        },
        {
          name: "Pursue_the_Passion_May_25.jpg",
          title: "Pursue the Passion",
          date: "May 25, 2022",
          link: "https://pursuethepassion.com/8-careers-for-female-felons/",
        },
        {
          name: "Smart_Locks_Guide.jpg",
          title: "Smart Locks Guide",
          date: "May 25, 2022",
          link: "https://smartlocksguide.com/safety-tips-for-a-woman-living-alone/",
        },
        {
          name: "Best_Life.jpg",
          title: "Best Life Online",
          date: "May 25, 2022",
          link: "https://bestlifeonline.com/zodiac-sign-cry-news/",
        },
        {
          name: "Pursue_the_Passion_May_23.jpg",
          title: "Pursue the Passion",
          date: "May 23, 2022",
          link: "https://pursuethepassion.com/5-best-careers-for-moms/",
        },
        {
          name: "Science_Times.jpg",
          title: "Science Times",
          date: "May 06, 2022",
          link: "https://www.sciencetimes.com/articles/37541/20220506/thinking-long-term-and-making-work-from-home-sustainable.htm",
        },
        {
          name: "Talented_ladies_club.jpg",
          title: "Talented Ladies Club",
          date: "May 06, 2022",
          link: "https://www.talentedladiesclub.com/articles/tips-to-marketing-your-brand-on-instagram/",
        },
        {
          name: "Creative_Beacon.jpg",
          title: "Creative Beacon",
          date: "May 05, 2022",
          link: "https://creativebeacon.com/the-importance-of-human-connections-in-the-virtual-work-world/",
        },
        {
          name: "California_News_times.jpg",
          title: "California News times",
          date: "May 05, 2022",
          link: "https://californianewstimes.com/how-daily-meditation-improves-your-workplace-productivity/713767/",
        },
        {
          name: "Parent_Herald.jpg",
          title: "Parent Herald",
          date: "May 04, 2022",
          link: "https://www.parentherald.com/articles/106774/20220504/summer-travel-tips-that-save-you-time-money.htm",
        },
        {
          name: "Home_Town_Station.jpg",
          title: "Home Town Station",
          date: "May 04, 2022",
          link: "https://www.hometownstation.com/news-articles/charitable-giving-how-companies-can-help-their-communities-416171",
        },
        {
          name: "Techshali.jpg",
          title: "Techshali",
          date: "May 03, 2022",
          link: "https://techshali.com/top-tips-tricks-to-combating-zoom-fatigue/",
        },
        {
          name: "Well_+_Good_article.jpg",
          title: "Well + Good",
          date: "April 29, 2022",
          link: "https://www.wellandgood.com/cardinal-meaning/",
        },
        {
          name: "Kickass_Entrepreneur.jpg",
          title: "Kickass Entrepreneur",
          date: "April 28, 2022",
          link: "https://www.thekickassentrepreneur.com/find-joy-in-any-job/",
        },
        {
          name: "BBNTimes_article.jpg",
          title: "BBN Times",
          date: "April 28, 2022",
          link: "https://www.bbntimes.com/society/creative-ways-families-can-celebrate-earth-day-together",
        },
        {
          name: "Psychreg_article.jpg",
          title: "Psychreg",
          date: "March 28, 2022",
          link: "https://www.psychreg.org/helpful-mindfulness-techniques-ease-anxiety/",
        },
        {
          name: "Symbolic_Meaning.jpg",
          title: "Well + Good",
          date: "March 27, 2022",
          link: "https://www.wellandgood.com/monarch-butterfly-meaning/",
        },
        {
          name: "Entrepeneur_Break.jpg",
          title: "Entrepreneurs Break",
          date: "March 15, 2022",
          link: "https://entrepreneursbreak.com/how-to-differentiate-your-business-from-the-competition.html",
        },
        {
          name: "Odyssey_Mockv2.jpg",
          title: "Odyssey",
          date: "March 3, 2022",
          link: "https://www.theodysseyonline.com/how-successful-startups-build-communities-for-their-brands",
        },
        {
          name: "Swaay_article.jpg",
          title: "Swaay",
          date: "March 3, 2022",
          link: "https://swaay.com/best-ways-to-measure-employee-productivity-in-hybrid-work-model",
        },
        {
          name: "time_business_news.jpg",
          title: "Time Business News",
          date: "March 2, 2022",
          link: "https://timebusinessnews.com/strategies-for-better-brand-reputation-management/",
        },
        {
          name: "AZ_Big_News.jpg",
          title: "Az Big News",
          date: "March 2, 2022",
          link: "https://azbigmedia.com/business/tips-for-attracting-top-talent-for-businesses/",
        },
        {
          name: "Mamabee_Article.jpg",
          title: "Mamabee",
          date: "March 2, 2022",
          link: "https://mamabee.com/quick-and-easy-ways-to-stay-energized-while-working-from-home/",
        },
        {
          name: "Well+Good_Mock.jpg",
          title: "Well + Good",
          date: "February 3, 2022",
          link: "https://www.wellandgood.com/page-of-swords-reversed/",
        },
        {
          name: "TZR_Mock.jpg",
          title: "TZR News",
          date: "February 3, 2022",
          link: "https://www.thezoereport.com/living/paint-color-based-on-zodiac-sign",
        },
        {
          name: "Yahoo_Mock.jpg",
          title: "Yahoo News",
          date: "December 21, 2021",
          link: "https://www.yahoo.com/lifestyle/numerology-2022-telling-us-going-173431568.html",
        },
        {
          name: "Refinery_Mock.jpg",
          title: "Refinery 29",
          date: "December 21, 2021",
          link: "https://www.refinery29.com/en-ca/2021/12/10814393/numerology-2022-predictions",
        },
        {
          name: "NBC_FIRST.png",
          title: "NBC TV",
          date: "April 24, 2021",
          link: "https://www.nbc.com/1st-look/video/1st-look-presents-celebrity-sleepover-margaret-cho/4346237",
          vidx: true,
        },
        {
          name: "ExtraTV.png",
          title: "Extra Tv",
          date: "October 31, 2020",
          vid: "https://www.youtube.com/embed/VOJkPWcQ-k0",
        },

        {
          name: "EXPRESS_UK_31821.png",
          title: "Express UK",
          date: "March 18, 2021",
          link: "https://www.express.co.uk/life-style/life/1409905/spring-equinox-2021-horoscope-when-is-it-how-will-it-affect-us-evg",
        },

        {
          name: "METRO_UK_MOCK2.png",
          title: "Metro UK",
          date: "March 11, 2021",
          link: "https://metro.co.uk/2021/03/11/what-marchs-new-moon-in-pisces-means-for-your-star-sign-14155974/",
        },

        {
          name: "BEST_LIFE_MOCK2x.png",
          title: "BestLife",
          date: "February 10, 2021",
          link: "https://bestlifeonline.com/2021-valentines-day-news/",
        },

        {
          name: "YAHOO_LIFE2.png",
          title: "Yahoo! Life",
          date: "February 10, 2021",
          link: "https://www.yahoo.com/lifestyle/valentines-day-ideas-2021-even-231126839.html?guccounter=1",
        },

        {
          name: "DAILY_STAR2x.png",
          title: "Daily Star",
          date: "January 30, 2021",
          link: "https://www.dailystar.co.uk/real-life/mercury-retrograde--astrologers-say-23396048",
        },

        {
          name: "US_SUN2.png",
          title: "The U.S. Sun",
          date: "January 29, 2021",
          link: "https://www.the-sun.com/lifestyle/2230674/mercury-retrograde-star-sign-horoscopes/",
        },

        {
          name: "EXPRESS_UK_28.png",
          title: "Express UK",
          date: "January 28, 2021",
          link: "https://www.express.co.uk/life-style/life/1389996/mercury-retrograde-horoscope-for-each-star-sign-evg",
        },

        {
          name: "EVOKE_MOCK2x.png",
          title: "Evoke",
          date: "January 21, 2021",
          link: "https://evoke.ie/2021/01/21/life-style/this-is-how-you-can-cope-with-the-first-mercury-retrograde-of-2021",
        },
        {
          name: "OPRAHMAG_MOCK2x.png",
          title: "OprahMag.com",
          date: "January 5, 2021",
          link: "https://www.oprahmag.com/life/relationships-love/g30549407/single-on-valentines-day/?slide=17",
        },

        {
          name: "01MagazineMockupTemplate.png",
          title: "In Touch, Life & Style and Star",
          date: "December 10, 2020",
          link: "https://www.intouchweekly.com/posts/its-a-wrap-the-best-gift-ideas-for-2020/",
        },
        {
          name: "SimpleNews.png",
          title: "Simple News UK",
          date: "December 5, 2020",
          link: "https://simplenews.co.uk/entertainment/palm-reading-for-beginners-what-are-the-palmistry-lines-how-to-read-your-palm/",
        },
        {
          name: "MagazineMockupTemplate.png",
          title: "In Touch and Life & Style",
          date: "December 4, 2020",
        },

        {
          name: "Express_UK_Mock.png",
          title: "Express UK",
          date: "November 28, 2020",
          link: "https://www.express.co.uk/life-style/life/1365464/eclipse-horoscope-November-2020-eclipse-beaver-moon-star-sign-astrology-evg",
        },

        {
          name: "Stylist_Mock.png",
          title: "Stylist UK",
          date: "November 27, 2020",
          link: "https://www.stylist.co.uk/astrology/lunar-eclipse-2020-meaning/456233",
        },

        {
          name: "Refinery29.png",
          title: "Refinery29",
          date: "November 6, 2020",
          link: "https://www.refinery29.com/en-us/2020/11/10139800/cuffing-season-2020-astrology-meaning",
        },
        {
          name: "Yahoo.png",
          title: "Yahoo! Life",
          date: "November 6, 2020",
          link: "https://www.yahoo.com/lifestyle/3-zodiac-signs-best-cuffing-174645092.html",
        },
        {
          name: "MSN.png",
          title: "MSN",
          date: "November 6, 2020",
          link: "https://www.msn.com/en-in/lifestyle/horoscope/these-3-zodiac-signs-are-about-to-have-the-best-cuffing-season-ever/ar-BB1aLxlP?li=BB12xKdA&srcref=rss",
        },
        {
          name: "LaOpinion.png",
          title: "La Opinión",
          date: "November 8, 2020",
          link: "https://laopinion.com/2020/11/08/la-astrologia-augura-que-3-signos-del-zodiaco-encontraran-el-amor-en-noviembre/",
        },
        {
          name: "Authority.png",
          title: "Authority Magazine",
          date: "October 21, 2020",
          link: "https://medium.com/authority-magazine/psychic-eva-white-surround-yourself-with-people-who-are-not-afraid-to-accept-their-faults-and-66d9d16cfb14",
        },
        {
          name: "ExtraTV_1.png",
          title: "Extra Tv",
          date: "April 12, 2020",
          vid: "https://www.youtube.com/embed/EOsrLsUqerc",
        },
        {
          name: "Ok_Magazine.png",
          title: "Ok! Magazine",
          date: "February 10, 2020",
          pdf: "4.jpg",
        },
        {
          name: "National_Enquirer_2020.png",
          title: "National Enquirer",
          date: "January 6, 2020",
          pdf: "3.jpg",
        },
        {
          name: "Globe_Magazine.png",
          title: "Globe Magazine",
          date: "January 6, 2020",
          pdf: "2.jpg",
        },
        {
          name: "NationalEnquirer_Magazine.png",
          title: "National Enquirer",
          date: "December 30, 2019",
          pdf: "1.png",
        },
      ],
      pressRow: [],
    };
  },
  computed: {
    heightImg: () => screen.height - 100,
  },
  methods: {
    showMore() {
      this.loadingReviews = true;
      this.numberSlicer += 2;
      this.pressRow = this.fullPress.slice(0, this.numberSlicer);
    },
    showLess() {
      this.loadingReviews = true;
      this.numberSlicer = this.numberArticles;
      this.pressRow = this.fullPress.slice(0, this.numberSlicer);
    },
    onImgLoaded(i) {
      document.getElementById("cover" + i).style.width =
        document.getElementById("press" + i).width + "px";
      document.getElementById("cover" + i).style.height =
        document.getElementById("press" + i).height + "px";
    },
    showImage(image) {
      this.image = image;
      this.dialog = true;
    },
    openLink(i) {
      if (i.link) window.open(i.link, "_blank");
    },
  },
  mounted() {
    this.numberArticles = this.$vuetify.breakpoint.smAndDown ? 5 : 6;
    this.numberSlicer = this.$vuetify.breakpoint.smAndDown ? 5 : 6;
    this.pressRow = this.$vuetify.breakpoint.smAndDown
      ? this.fullPress.slice(0, this.numberSlicer)
      : this.fullPress.slice(0, this.numberSlicer);
    const div = document.getElementById("videoWidth");
    this.textWidth = div.offsetWidth;
    this.width = this.$vuetify.breakpoint.smAndDown
      ? div.offsetWidth
      : div.offsetWidth / 1.5;
    if (this.$vuetify.breakpoint.smAndDown) this.width = this.width - 30;
    this.height = this.width / 1.777;
    console.log(div.offsetWidth);
  },
};
</script>
<style>
.no-overflow {
  overflow: hidden;
}
.close-button {
  position: absolute;
  margin-left: 18px;
  padding: 5px 7px;
  border: 2px solid white;
  border-radius: 50%;
  font-size: 14px;
  color: white;
  cursor: pointer;
}
.cover {
  position: absolute;
  object-fit: contain;
  cursor: pointer;
  background-color: rgba(0, 0, 0, 0.5);
}
@media (hover: hover) {
  .cover {
    opacity: 0;
  }
}
@media (hover: none) {
  .cover {
    opacity: 1;
    background: none;
  }
  .close-button {
    margin-left: -32px;
    margin-top: -20px;
  }
  .close-button.contact-close {
    margin-left: -12px;
  }
}
.cover:hover {
  opacity: 1;
}
</style>
