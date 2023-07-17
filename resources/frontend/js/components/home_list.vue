<template>
  <div class="homepage">
    <div class="pa-0">
      <v-img
        alt="Home Banner Image"
        style="z-index: 1"
        :src="
          guest
            ? mobile ? '/images/Banner-imgs/HomeHeroImageMobile.png' : '/images/Banner-imgs/home.png'
            : '/images/Banner-imgs/home_in.png'
        "
        aspect-ratio="1"
        :max-height="mobile ? 352 : 359"
        class="align-sm-center justify-sm-center home_hero"
      >
        <div
          class="justify-center text-center home_search home-header-container"
          :style="{ top: mobile ? '25%' : '45%', 'margin-top': guest ? mobile ? '-8px' : '-50px' : mobile ? '-22px;' : '-50px' }"
        >
          <!-- <h1 :style="mobile ? 'font: normal normal 900 30px/30px Montserrat;' : ''">Answers Are<br v-if="mobile" /> A Reading Away</h1> -->
          <h1 :style="mobile ? 'font: normal normal 900 30px/30px Montserrat;' : ''">Online Psychics & Spiritual Advisors</h1>
          <h3 class="mt-6" :style="{ fontSize: mobile ? '16px !important' : '' }">
            Discover your personal psychic <br v-if="mobile" /> today
            and get your free $5 credit
          </h3>
          <v-btn
            v-if="guest"
            rounded
            color="#43425D"
            class="m-0 elevation-0 white--text mt-n1"
            href="/signup"
            style="box-shadow: inset 10px -10px 10px #0000004D !important;border-radius: 20px;opacity: 1;width:152px;text-decoration: none !important;"
            >Chat Now</v-btn
          >
        </div>
        <div
          v-if="user"
          class="d-flex justify-center w-100"
          style="height: 40px"
        >
          <SearchInput />
        </div>
      </v-img>
    </div>

    <SearchFilter />
    <div v-if="!$vuetify.breakpoint.xs" v-show="closeBanner">
      <div style="display: flex;justify-content: center;">
        <div class="banner-paula" style="position: fixed;bottom: 0px;z-index: 100;">
          <div class="row">
            <div class="col-6">
              <div class="row pl-4 pt-4">
                <div class="col-12">
                  <span style="
                    text-align: left;
                    font: normal normal 600 14px/14px Montserrat;
                    letter-spacing: 1.4px;
                    color: #43425D;
                    opacity: 1;">
                    GLOBAL ICON
                  </span>
                </div>
                <div class="col-12 mt-2 pl-3">
                  <span style="text-align: left;
                    font: normal normal 900 40px/55px Montserrat;
                    letter-spacing: 0px;
                    color: #43425D;
                    opacity: 0.8;">
                    Paula Abdul
                  </span>
                </div>
                <div class="col-12 mt-2">
                  <span style="text-align: left;
                    font: normal normal medium 14px/26px Montserrat;
                    letter-spacing: 0px;
                    color: #43425D;
                    opacity: 1;">
                    Joins Psychics1on1™ as partner, believing deeply <br> in the value of spiritual guidance.
                  </span>
                </div>
                <div class="col-12 mt-2">
                  <a href="/paulaabdul" style="text-decoration: none;">
                    <span style="text-align: left;
                      font: normal normal 600 14px/18px Montserrat;
                      letter-spacing: 0.28px;
                      color: #43425D;
                      opacity: 1;">
                      Learn More
                    </span>
                    <img src="images/icons/Chevron30x30InactiveLeft.png" alt="">
                  </a>
                </div>
              </div>
            </div>
            <div class="col-6">
              <a @click="closePaulaBanner" style="position:absolute;right: 25px;top: 9px;z-index: 100;"><img  src="images/icons/Exit-Icon-30x30.svg"/></a>
              <img src="images/Banner-imgs/PAULA_ABDUL_HOMEPAGE_BANNER.png" style="position: absolute;top: -31px;left: -188px;" alt="">
            </div>
          </div>
        </div>
      </div>
    </div>
    <div v-else v-show="closeBanner" class="mobile-banner-container" style="position: fixed !important;">
       <div class="banner-paula" style="height:207px !important;width: 100% !important;">
        <div class="row">
          <div class="col-8">
            <div class="row pl-3 pt-4">
              <div class="col-12">
                <span style="
                  text-align: left;
                  font: normal normal 600 10px/14px Montserrat;
                  letter-spacing: 1px;
                  color: #43425D;
                  opacity: 1;">
                  GLOBAL ICON
                </span>
              </div>
              <div class="col-12 pl-3">
                <span style="text-align: left;
                  font: normal normal 900 30px/55px Montserrat;
                  letter-spacing: 0px;
                  opacity: 80%;
                  color: #43425D;">
                  Paula Abdul
                </span>
              </div>
              <div class="col-12">
                <span class="font-weight-medium" style="text-align: left;
                  font: normal normal 12px/20px Montserrat;
                  letter-spacing: 0px;
                  color: #43425D;
                  opacity: 1;">
                  Joins Psychics1on1™ as partner, <br> believing deeply in the value of <br> spiritual guidance.
                </span>
              </div>
              <div class="col-12 mt-3">
                <a href="/paulaabdul" style="text-decoration: none;">
                  <span style="text-align: left;
                  font: normal normal 600 14px/18px Montserrat;
                  letter-spacing: 0.28px;
                  color: #43425D;
                  opacity: 1;">
                    Learn More
                  </span>
                  <img src="images/icons/Chevron30x30InactiveLeft.png" alt="">
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12 pr-0">
          <a @click="closePaulaBanner" style="position:absolute;right: 25px;top: 9px;z-index: 100;"><img  src="images/icons/Exit-Icon-30x30.svg"/></a>
          <img src="images/Banner-imgs/PAULA_ABDUL_BANNER_MOBILE.png" style="position: absolute;top: -23px;left: -183px;height: 230px;" alt="">
        </div>
      </div>
    </div>

    <v-layout row class="front m-0">
      <v-flex
        :style="
          ({ height: $vuetify.breakpoint.xsOnly ? '274px' : '178px' },
          { background: '#F4F4F4' })
        "
      >
        <v-container class="p-0">
          <div
            class="align-sm-center text-center-md justify-sm-center home_banner"
          >
            <h3 class="mb-5">The Answers You Seek Available 24/7</h3>
            <p
              class="text-center-md"
              style="
                font-size: 14px !important;
                color: #656b72;
                font-weight: 500;
              "
            >
             All the answers you seek are just a click away. Is there a new romance in your future? 
             Was that life shift you felt part of a grander plan waiting to reveal itself to you? 
             Find out with the help of the world’s best psychics, mediums, healers, and astrologers
             available now on Psychics1on1.  Enjoy discreet, personalized sessions across a variety 
             of specialties, with our verified online psychics and spiritual professionals ready to chat. 
            </p>
          </div>
        </v-container>
      </v-flex>
    </v-layout>

    <v-container class="front pb-0 pt-0" v-if="online">
      <div>
        <v-row
          justify="space-around"
          :class="!mobile ? 'mt-12 px-4' : 'px-4'"
          class="mb-2"
          style="margin-top: 12px"
        >
          <v-col cols="9" class="mb-0">
            <h1 :style="mobile ? 'font-size:16px;font-weight:600;color:#43425D;' : 'font-size:18px;font-weight:600;'">Top-Rated Online Psychics</h1>
          </v-col>
          <v-col
            class="mb-0 text-lg-right cursor-pointer px-0 px-lg-3"
            style="line-height: 18px"
          >
            <a href="/search?sortBy=rating&online=1">
              <span
                class="grey--text"
                style="
                  font-size: 14px;
                  font-weight: 600;
                  color: #43425d !important;
                  opacity: 1;
                "
                >Show All</span
              >
            </a>
          </v-col>
        </v-row>

        <ListItems
          :guest="guest"
          :cols="!mobile ? 12 : 6"
          :filters="{ rating: true }"
          :perPageProp="!mobile ? 12 : 6"
          :rows="1"
        />
      </div>
    </v-container>

     <v-layout row class="front m-0">
      <v-flex
        :style="
          ({ height: $vuetify.breakpoint.xsOnly ? '274px' : '178px' },
          { background: '#F4F4F4' })
        "
      >
        <v-container class="p-0">
          <div
            class="align-sm-center text-center-md justify-sm-center home_banner"
          >
            <h3 class="mb-5">Verified Psychics</h3>
            <p
              class="text-center-md"
              style="
                font-size: 14px !important;
                color: #656b72;
                font-weight: 500;
              "
            >
             Each of our top-rated online psychics and professionals are verified by us and 
             reviewed and rated by the community, so nothing is left to chance. Our simple, 
             protected system and accurate, in-depth answers always bring customers back for 
             more personal readings. It’s easier than ever to gain the insight you seek with 
             peace of mind. 
            </p> 
          </div>
        </v-container>
      </v-flex>
    </v-layout>

    <v-container class="front">
      <v-row
        justify="space-around"
        :class="!mobile ? 'mt-7 px-4' : 'px-4'"
        class="mb-2"
      >
        <v-col cols="9" class="h3 mb-0 d-flex align-center">
          <h4 style="font-size:18px;font-weight:600;" class="mb-0">Thousands Of Happy Customers</h4>
        </v-col>
        <v-col class="h3 mb-0 text-lg-right cursor-pointer">
          <div
            class="d-flex justify-end align-center"
            style="font-size: 30px; color: #43425d"
            @click="nextReviews"
          >
            <span>&#8226;</span>
            <span>&#8226;</span>
            <span>&#8226;</span>
          </div>
        </v-col>
      </v-row>
    </v-container>
    <v-container class="mb-5 front reviews_container">
      
      <v-row class="px-4">
        <v-col>
          <swiper
            :options="swiperOptions4"
            ref="mySwiperReviews"
            class="row"
          >
            <swiper-slide v-for="(i, index) in reviews" :key="index">
              
              <v-card
                class="sfProfileListRating mt-0 custom_card_rating"
              >
               <div style="position:absolute;right:0px;top:0px;"><img src="/images/icons/featured.svg"/></div>
                <v-badge v-if="i.helpful > 0" color="transparent" avatar>

                  <template v-slot:badge>
                    <v-btn
                      text
                      @click="saveHelpfuls(i)"
                      class="text-right saveHelpful"
                    >
                      <div><img src="/images/icons/helpful_icon.svg"/></div>
                    </v-btn>
                  </template>
                  <v-list-item>
                    <v-list-item-avatar size="50" color="grey" left>
                      <img
                        :src="i.user.profile.profile_headshot_url"
                      />
                    </v-list-item-avatar>
                    <v-list-item-content>
                      <v-list-item-title>
                        {{ i.user.profile.name | truncate(18, "...") }}
                      </v-list-item-title>
                      <v-list-item-subtitle v-if="i.service">
                        {{ i.category.name }}
                      </v-list-item-subtitle>
                      <span>{{ i.created_at | formatDate }}</span>
                    </v-list-item-content>
                  </v-list-item>

                </v-badge>
                <v-list-item v-else>
                  <v-list-item-avatar size="50" color="grey" left>
                    <img
                      :src="i.user.profile.profile_headshot_url"
                    />
                  </v-list-item-avatar>
                  <v-list-item-content>
                    <v-list-item-title>
                      {{ i.user.profile.name | truncate(18, "...") }}
                    </v-list-item-title>
                    <v-list-item-subtitle v-if="i.service">
                      {{ i.category.name }}
                    </v-list-item-subtitle>
                    <span>{{ i.created_at | formatDate }}</span>
                  </v-list-item-content>
                </v-list-item>
                <v-card-subtitle
                  >{{ i.title | truncate(14, "...") }}
                  <v-rating
                    style="bottom: 1px; position: relative"
                    class="d-inline starBtn"
                    :value="parseFloat(i.rating)"
                    color="amber"
                    background-color="#C7C7C7"
                    empty-icon="mdi-star"
                    dense
                    half-increments
                    readonly
                    size="17"
                  ></v-rating
                ></v-card-subtitle>
                <v-card-text class="pb-0"> “{{ i.text | truncate(110, "...")}}” </v-card-text>
              </v-card>

            </swiper-slide>
          </swiper>
        </v-col>
      </v-row>
      <!-- </v-window-item>
      </v-window> -->
    </v-container>

    <v-layout row class="front m-0">
      <v-flex
        :style="
          ({ height: $vuetify.breakpoint.xsOnly ? '274px' : '178px' },
          { background: '#F4F4F4' })
        "
      >
        <v-container class="p-0">
          <div
            class="align-sm-center text-center-md justify-sm-center home_banner"
          >
            <h3 class="mb-5">Our Specialties</h3>
            <p
              class="text-center-md"
              style="
                font-size: 14px !important;
                color: #656b72;
                font-weight: 500;
              "
            >
             Let us be your guiding light to spiritual advice and counsel on all matters 
             including relationships, career success, healing, and much more. Each of our 
             featured psychics and mediums have years of experience within their own specialty.
             Browse through their individual profiles to get better acquainted with your options. 
            </p> 
          </div>
        </v-container>
      </v-flex>
    </v-layout>

    <v-container class="my-3 front">
      <v-row
        justify="space-around"
        :class="!mobile ? 'mt-5 px-4' : 'mt-0 px-4'"
        class="mb-2"
      >
        <v-col cols="9" class="h3 mb-0 d-flex align-center">
          <h4  style="font-size:18px;font-weight:600;" class="mb-0">Our Psychic's Abilities</h4>
        </v-col>
        <v-col class="h3 mb-0 text-lg-right cursor-pointer">
          <div
            class="d-flex justify-end align-center"
            style="font-size: 30px; color: #43425d"
            @click="nextAbilities"
          >
            <span>&#8226;</span>
            <span>&#8226;</span>
            <span>&#8226;</span>
          </div>
        </v-col>
      </v-row>
      <v-row>
        <v-col>
          <swiper
            v-if="!$vuetify.breakpoint.xsOnly"
            ref="mySwiper"
            :options="swiperOptions"
          >
            <swiper-slide v-for="(item, index) in items" :key="index">
              <div class="my-2 ability_card" :key="index" style="height: 100%">
                <v-hover v-if="!item.loading" v-slot:default="{ hover }">
                  <a
                    :href="'/abilities/' + item.slug"
                    style="text-decoration: none"
                  >
                    <v-row class="ma-0 text-center">
                      <v-col
                        cols="12"
                        class="align-sm-center justify-sm-center sm4 p-0"
                      >
                        <img
                          :alt="item.image.name + ' File'"
                          v-bind:src="'/files/' + item.image.path"
                          style=""
                        />
                      </v-col>
                      <v-col
                        cols="12"
                        class="align-center text-center p-0 mt-1 mt-n3"
                      >
                        <div class="description" style="font-weight:700">
                          {{ item.description }}
                        </div>
                      </v-col>
                    </v-row>
                  </a>
                </v-hover>
                <v-skeleton-loader
                  v-else
                  height="100"
                  type="image"
                  class="mx-auto"
                ></v-skeleton-loader>
              </div>
            </swiper-slide>
          </swiper>

          <swiper v-else ref="mySwiper" :options="swiperOptions">
            <swiper-slide v-for="(item2, index) in items" :key="index">
              <div
                class="my-4 ability_card"
                style="height: 100px"
                v-for="(item, index2) in item2"
                :key="index2"
              >
                <v-hover v-if="!item.loading" v-slot:default="{ hover }">
                  <a
                    :href="'/abilities/' + item.slug"
                    style="text-decoration: none"
                  >
                    <v-row class="ma-0 text-center">
                      <v-col
                        cols="12"
                        class="align-sm-center justify-sm-center sm4 p-0"
                      >
                        <img
                          :alt="item.image.name + ' File'"
                          v-bind:src="'/files/' + item.image.path"
                          style=""
                        />
                      </v-col>
                      <v-col
                        cols="12"
                        class="align-center text-center p-0 mt-n2"
                        :class="mobile ? 'mt-n2' : 'mt-1'"
                      >
                        <div class="description" style="">
                          {{ item.description }}
                        </div>
                      </v-col>
                    </v-row>
                  </a>
                </v-hover>
                <v-skeleton-loader
                  v-else
                  height="100"
                  type="image"
                  class="mx-auto"
                ></v-skeleton-loader>
              </div>
            </swiper-slide>
          </swiper>
        </v-col>
      </v-row>
      <!-- </v-window-item>
      </v-window> -->
    </v-container>

    <v-container class="py-0 pt-3 front">
      <v-row
        justify="space-around"
        :class="!mobile ? 'mt-5 px-4' : 'px-4'"
        :style="!mobile ? 'margin-top' : '50px'"
        class="mb-3"
      >
        <v-col cols="9" class="h3 mb-0">
          <h4 style="font-size:18px;font-weight:600;">Featured Psychic Advisors</h4>
        </v-col>
        <v-col
          class="mb-0 text-lg-right cursor-pointer px-0 px-lg-3"
          style="line-height: 18px"
        >
          <a v-if="!mobile" href="/search?sortBy=featured">
            <span
              class="grey--text"
              style="
                font-size: 14px;
                font-weight: 600;
                color: #43425d !important;
                opacity: 1;
              "
              >Show All</span
            >
          </a>
          <!-- <a
            v-else
            class="h3 d-flex justify-end align-center"
            style="
              font-size: 30px;
              color: #43425d;
              text-decoration: none;
              padding-right: 15px;
            "
            href="/search?sortBy=featured"
          >
            <span style="line-height: 15px">&#8226;</span>
            <span style="line-height: 15px">&#8226;</span>
            <span style="line-height: 15px">&#8226;</span>
          </a> -->
          <div
            v-else
            class="d-flex justify-end align-center"
            style="font-size: 30px; color: #43425d"
            @click="nextSwipeListFeatured()"
          >
            <span>&#8226;</span>
            <span>&#8226;</span>
            <span>&#8226;</span>
          </div>
        </v-col>
      </v-row>

      <!-- <ListItems
        :guest="guest"
        :cols="3"
        :rows="!mobile ? 2 : null"
        :bottomOff="1"
        :filters="{ featured: true }"
        :set-featured="setFeatured"
        :perPageProp="2"
      /> -->
      <ListItemsCarousel
        ref="listfeaturedcarousel"
        :guest="guest"
        :cols="3"
        :rows="!mobile ? 2 : null"
        :bottomOff="1"
        :filters="{ featured: true }"
        :set-featured="setFeatured"
        :perPageProp="6"
      />
    </v-container>

    <v-layout row class="mt-12 front m-0">
      <v-flex class="engage">
        <v-container class="p-0">
          <div
            class="align-sm-center text-center-md justify-sm-center home_banner"
          >
            <h2 class="mb-5">Engage Easily</h2>
            <p class="text-center-md" :style="!mobile ? '' : 'color: #FFFFFF !important'"
            >
              Questions about life or the grand scheme of things may pop up at random moments. 
              This is why Psychics1on1 offers text correspondence, phone calls, or even video 
              chats available 24/7. Our simple, upfront rates put you in charge of how you prefer 
              to chat with an online psychic. Browse, click, and start unraveling the truths you 
              seek with a certified professional.  
            </p>
          </div>
        </v-container>
      </v-flex>
    </v-layout>

    <v-container class="py-0 front">
      <v-row
        justify="space-around"
        :class="!mobile ? 'mt-12 px-4' : 'mt-8 px-4'"
        class="mb-2"
      >
        <v-col cols="9" class="h3 mb-0">
          <h4 style="font-size:18px;font-weight:600;">Popular Psychic Advisors</h4>
        </v-col>
        <v-col
          class="mb-0 text-lg-right cursor-pointer px-0 px-lg-3"
          style="line-height: 18px"
        >
          <a v-if="!mobile" href="/search?sortBy=popular">
            <span
              class="grey--text"
              style="
                font-size: 14px;
                font-weight: 600;
                color: #43425d !important;
                opacity: 1;
              "
              >Show All</span
            >
          </a>
          <!-- <a
            v-else
            class="h3 d-flex justify-end align-center"
            style="
              font-size: 30px;
              color: #43425d;
              text-decoration: none;
              padding-right: 15px;
            "
            href="/search?sortBy=popular"
          >
            <span style="line-height: 15px">&#8226;</span>
            <span style="line-height: 15px">&#8226;</span>
            <span style="line-height: 15px">&#8226;</span>
          </a> -->
          <div
            v-else
            class="d-flex justify-end align-center"
            style="font-size: 30px; color: #43425d"
            @click="nextSwipeListPopular()"
          >
            <span>&#8226;</span>
            <span>&#8226;</span>
            <span>&#8226;</span>
          </div>
        </v-col>
      </v-row>
      <!-- <ListItems
        :guest="guest"
        :cols="3"
        :perPageProp="2"
        :rows="!mobile ? 2 : null"
        bottomOff="true"
        :filters="{ popular: true }"
      /> -->
      <ListItemsCarousel
        ref="listpopularcarousel"
        :guest="guest"
        :cols="3"
        :perPageProp="6"
        :rows="!mobile ? 2 : null"
        bottomOff="true"
        :filters="{ popular: true }"
      />
    </v-container>

    <v-layout row class="mt-12 front m-0">
      <v-flex
        :style="
          ({ height: $vuetify.breakpoint.xsOnly ? '274px' : '178px' },
          { background: '#F4F4F4' })
        "
      >
        <v-container class="p-0">
          <div
            class="align-sm-center text-center-md justify-sm-center home_banner"
          >
            <h3 class="mb-5">Find Your True Answers</h3>
            <p
              class="text-center-md"
              style="
                font-size: 14px !important;
                color: #656b72;
                font-weight: 500;
              "
            >
              Too often we are left to our own devices when tackling big topics, but now 
              you can consult a professional who will relay the universe’s personal messages 
              to you. Our spiritually in-tune advisors are online right this second and ready 
              to help you dissect a problem, big decision, or other major moments. 
            </p>
          </div>
        </v-container>
      </v-flex>
    </v-layout>

    <v-container class="py-0 front">
      <v-row
        justify="space-around"
        :class="!mobile ? 'mt-12 px-4' : 'mt-8 px-4'"
        class="mb-2"
      >
        <v-col cols="9" class="h3 mb-0">
          <h4 style="font-size:18px;font-weight:600;">New Top Psychics</h4>
        </v-col>
       <v-col
        id="Specialties"
          class="mb-0 text-lg-right cursor-pointer px-0 px-lg-3"
          style="line-height: 18px"
        >
          <a v-if="!mobile" href='/search/?filters={"new":true}'>
            <span
              class="grey--text"
              style="
                font-size: 14px;
                font-weight: 600;
                color: #43425d !important;
                opacity: 0.5;
              "
              >Show All</span
            >
          </a>
          <a
            v-else
            class="h3 d-flex justify-end align-center"
            style="
              font-size: 30px;
              color: #43425d;
              text-decoration: none;
              padding-right: 15px;
            "
            href='/search/?filters={"new":true}'
          >
            <span style="line-height: 15px">&#8226;</span>
            <span style="line-height: 15px">&#8226;</span>
            <span style="line-height: 15px">&#8226;</span>
          </a> 
        </v-col>
      </v-row>
      <ListItems
        :guest="guest"
        :cols="3"
        :perPageProp="2"
        :rows="!mobile ? 2 : null"
        bottomOff="true"
        :filters="{ new: true }"
      />
    </v-container>

  <v-layout row class="mt-12 front m-0">
      <v-flex
        :style="
          ({ height: $vuetify.breakpoint.xsOnly ? '274px' : '178px' },
          { background: '#F4F4F4' })
        "
      >
        <v-container class="p-0">
          <div
            class="align-sm-center text-center-md justify-sm-center home_banner"
          >
            <h3 class="mb-5">All The Guidance You Need</h3>
            <p
              class="text-center-md"
              style="
                font-size: 14px !important;
                color: #656b72;
                font-weight: 500;
              "
            >
              It’s time to set your intentions. The guidance we seek as humans is always shifting, 
              so the answers you need now may not be what you need a few months from now. Have your 
              dream interpreted, learn who you were in a past life, chat with online psychics and mediums 
              about the highs and lows of life, and more. The entire Psychics1on1 experience is tailored 
              to you and your needs at the current moment. 
            </p>
          </div>
        </v-container>
      </v-flex>
    </v-layout>

    <v-container class="mb-6 front">
      <v-row
        id="specialties"
        justify="space-around"
        :class="!mobile ? 'mt-7 px-4' : 'px-4'"
        class="mb-2"
      >
        <v-col cols="9" class="h3 mb-0 d-flex align-center">
          <h4 style="font-size:18px;font-weight:600;" class="mb-0">Popular Psychic Specialties</h4>
        </v-col>
        <v-col class="h3 mb-0 text-lg-right cursor-pointer">
          <div
            class="d-flex justify-end align-center"
            style="font-size: 30px; color: #43425d"
            @click="nextSpecialties"
          >
            <span>&#8226;</span>
            <span>&#8226;</span>
            <span>&#8226;</span>
          </div>
        </v-col>
      </v-row>

      <v-row>
        <v-col>
          <swiper
            v-if="!$vuetify.breakpoint.xsOnly"
            ref="mySwiper2"
            :options="swiperOptions2"
            class="row"
          >
            <swiper-slide v-for="(item, index) in specialties" :key="index">
              <div
                class="my-2 specialty_card"
                :key="index"
                style="height: 100%"
              >
                <v-hover v-if="!item.loading" v-slot:default="{ hover }">
                  <a
                    :href="'/search?category=' + item.slug"
                    style="text-decoration: none"
                  >
                    <v-row class="ma-0 text-center">
                      <v-col
                        cols="12"
                        class="align-sm-center justify-sm-center sm4 p-0"
                      >
                        <img :alt="item.name" v-bind:src="item.path" style="" />
                      </v-col>
                      <v-col
                        cols="12"
                        class="align-center text-center p-0 mt-1"
                      >
                        <div class="description" style="font-weight:700;">{{ item.name }}</div>
                      </v-col>
                    </v-row>
                  </a>
                </v-hover>
                <v-skeleton-loader
                  v-else
                  height="100"
                  type="image"
                  class="mx-auto"
                ></v-skeleton-loader>
              </div>
            </swiper-slide>
          </swiper>

          <swiper v-else ref="mySwiper2" :options="swiperOptions2" class="row">
            <swiper-slide v-for="(item2, index) in specialties" :key="index">
              <div
                v-for="(item, index2) in item2"
                :key="index2"
                class="my-2 specialty_card"
                style="height: 140px"
              >
                <v-hover v-if="!item.loading" v-slot:default="{ hover }">
                  <a
                    :href="'/search?category=' + item.slug"
                    style="text-decoration: none"
                  >
                    <v-row class="ma-0 text-center">
                      <v-col
                        cols="12"
                        class="align-sm-center justify-sm-center sm4 p-0"
                      >
                        <img :alt="item.name" v-bind:src="item.path" style="" />
                      </v-col>
                      <v-col
                        cols="12"
                        class="align-center text-center p-0 mt-1"
                      >
                        <div class="description" style="">{{ item.name }}</div>
                      </v-col>
                    </v-row>
                  </a>
                </v-hover>
                <v-skeleton-loader
                  v-else
                  height="100"
                  type="image"
                  class="mx-auto"
                ></v-skeleton-loader>
              </div>
            </swiper-slide>
          </swiper>
        </v-col>
      </v-row>
      <!-- </v-window-item>
      </v-window> -->
    </v-container>

    <v-layout row class="mt-12 front m-0">
      <v-flex :style=" ({ height: $vuetify.breakpoint.xsOnly ? '274px' : '178px' }, { background: '#F4F4F4' })">
        <v-container class="p-0">
          <div class="align-sm-center text-center-md justify-sm-center home_banner">
            <h3 class="mb-5">Commonly Asked Questions</h3>
            <p class="text-center-md" style="font-size: 14px !important;color: #656b72;font-weight: 500;">
              We invite you to embrace your curiosity. There is so much to be learned about what the universe 
              has in store for you. And yes, the universe does have something to say to us all. Our top-rated 
              online psychics are just the messenger. Psychics1on1 is here to make things clearer for you. 
              In fact, here are the questions we get asked most frequently:    
            </p>
          </div>  
          <FaqComponent />
        </v-container>
      </v-flex>
    </v-layout>
  </div>
</template>

<script>
import { mapGetters } from "vuex";
import moment from "moment";
import ListItems from "./specialtie_user_list.vue";
import ListItemsCarousel from "./specialtie_user_list_carousel.vue";
import FaqComponent from "./faq_component.vue";

import { Swiper, SwiperSlide } from "vue-awesome-swiper";
import "swiper/swiper-bundle.css";

export default {
  data() {
    return {
      window: 0,
      window1: 0,
      online: true,
      featured: true,
      categories: [],
      items: [],
      specialties: [],
      specialtiesList: [],
      links: [
        "/specialty/psychic",
        "/specialty/medium",
        "/specialty/astrology",
        "/specialty/palm-reading",
        "/specialty/tarot-card-reader",
        "/specialty/clairvoyant",
        "/specialty/spiritual-healer",
      ],
      filter: false,
      swiperOptions: {
        loop: true,
        breakpoints: {
          // when window width is >= 320px
          320: {
            slidesPerView: 5,
          },
          // when window width is >= 960
          960: {
            slidesPerView: 6,
          },
          // when window width is >= 1264
          1264: {
            slidesPerView: 9,
          },
        },
      },
      swiperOptions2: {
        loop: true,
        breakpoints: {
          // when window width is >= 320
          320: {
            slidesPerView: 3,
          },
          768: {
            slidesPerView: 6,
          },
          // when window width is >= 960
          960: {
            slidesPerView: 6,
          },
          // when window width is >= 1264
          1264: {
            slidesPerView: 9,
          },
        },
      },
      swiperOptions4: {
        autoplay: {
          delay: 2500,
        },
        loop: true,
        breakpoints: {
          // when window width is >= 320
          320: {
            slidesPerView: 1
          },
          768: {
            slidesPerView: 2,
            spaceBetween: 10
          },
          // when window width is >= 960
          960: {
            slidesPerView: 3,
            spaceBetween: 10
          },
          // when window width is >= 1264
          1264: {
            slidesPerView: 4,
            spaceBetween: 50
          },
        },
      },
      closeBanner: true
    };
  },
  filters: {
    formatDate(date) {
      return moment(date).format("MM/DD/YYYY");
    },
  },
  props: ["guest", "user", "unsubscribe", "reviews"],
  components: {
    ListItems,
    Swiper,
    SwiperSlide,
    ListItemsCarousel,
    FaqComponent
  },
  computed: {
    swiper() {
      return this.$refs.mySwiper.$swiper;
    },
    swiper2() {
      return this.$refs.mySwiper2.$swiper;
    },
    swiper4() {
      return this.$refs.mySwiperReviews.$swiper;
    },
    ...mapGetters({
      mobile: "util/mobile",
      paginate: "category/items",
      paginate1: "specialty/items",
    }),
  },

  watch: {},
  methods: {
    nextSwipeListFeatured(){
      this.$refs.listfeaturedcarousel.nextSwipe()
    },
    nextSwipeListPopular(){
      this.$refs.listpopularcarousel.nextSwipe()
    },
    nextAbilities() {
      this.swiper.slideNext();
    },
    nextSpecialties() {
      this.swiper2.slideNext();
    },
    nextReviews() {
      this.swiper4.slideNext();
    },
    getLoadingArray() {
      let array = [];
      for (let i = 0; i < 6; i++) array.push({ loading: true });
      return array;
    },
    setFeatured(val) {
      this.featured = val;
    },
    f_open_login() {
      EventBus.$emit("open_sign_up_user", {});
    },
    closePaulaBanner(){
      localStorage.setItem("paulaBanner", false);
      this.closeBanner = false;
    }
  },

  mounted() {
    if (this.unsubscribe == true) {
      this.$root.$emit("open_dialog_message", {
        message: "We're sorry to see you go! ",
        content:
          "You have been successfully unsubscribed from Psychics1on1's mailing list. You will no longer receive any of our promotion emails.",
        message_title: "unsubscribe",
      });
    }
  },
  created() {
    if (localStorage.getItem("paulaBanner") === "false") {
      console.log('entra');
      this.closeBanner = false;
    }
    const chunk = (arr, size) =>
      Array.from({ length: Math.ceil(arr.length / size) }, (v, i) =>
        arr.slice(i * size, i * size + size)
      );

    this.$store.dispatch("category/getItems").then(() => {
      if (this.$vuetify.breakpoint.xsOnly) {
        this.items = chunk(this.paginate.data, 2);
      } else this.items = this.paginate.data;
    });

    this.$store.dispatch("specialty/getItems").then(() => {
      if (this.$vuetify.breakpoint.xsOnly) {
        this.specialties = chunk(this.paginate1.data, 3);
      } else this.specialties = this.paginate1.data;
    });
    this.$store.dispatch("util/setUser", this.user);
  },
};
</script>
<style scoped>
  .banner-paula {
    width: 1085px;
    height: 209px;
    box-shadow: 0px 3px 6px #00000014;
    border-radius: 20px;
    opacity: 1;
    background-color: rgba(0, 0, 0, 0.04);;
    fill-opacity: 14%;
    backdrop-filter: blur(50px);
    -webkit-backdrop-filter: blur(50px);
  }
  .exit-banner:hover {
    cursor: pointer;
  }
  .mobile-banner-container {
    display: flex;
    justify-content: center;
    position: sticky;
    bottom: 0px;
    z-index: 100;
    position: -webkit-sticky !important;
  }
</style>
<style scoped>
img {
  object-fit: cover;
}

.custom_card_rating{
  padding: 15px;
  border-radius: 20px !important;
  height: 177px;
  max-height: 185px;
  background: #EDF4FC !important;
}

@media (min-width: 1050px){
  .custom_card_rating{
    width: 306px;
  } 
}

@media (max-width: 576px){
  .custom_card_rating{
    width: 89%;
  }
}

.sfProfileListRating.custom_card_rating .v-badge__badge {
  right: -23px !important;
  top: -27px !important;
}
</style>
<style>
.v-expansion-panel:before {
  box-shadow: none;
}

.theme--light.v-expansion-panels .v-expansion-panel {
  background-color: transparent;
}

.v-expansion-panel-header__icon i {
  color: #a163c1 !important;
  font-size: 45px !important;
}
.header-h1  {
  text-align: center;
  font: normal normal 900 40px/40px Montserrat !important;
  font-size:40px;
  letter-spacing: 0px;
  color: #FFFFFF;
  opacity: 1;
}
@media only screen and (max-width: 600px){
  .header-h1  {
    font-size:30px !important;
  }
}
.home-header-container {
  position: absolute;
  width: 100%;
  padding: 0 47px;
}
@media only screen and (max-width: 360px) {
  .home-header-container {
      padding: 0 20px;
  }
}
</style>
