<template>
  <div class="bg-white">
    <div class="pa-0">
      <v-img
        alt="Home Banner Image"
        style="z-index: 1"
        :src="$vuetify.breakpoint.xsOnly ? 
          '/images/Banner-imgs/banner_lp_paula_mobile.png':
          '/images/Banner-imgs/banner_lp_paula.png'"
        aspect-ratio="1"
        :max-height="mobile ? 714 : 680"
        :height="mobile ? 714 : 680"
        class="align-sm-center justify-sm-center home_hero banner_paulaabdul"
      >
        <div
          class="text-center main_copy_cta"
          :style="{ top: mobile ? '0' : '19%', marginTop: mobile ? '285px' : '0px' }"
        >
          <p class="main_title_lp_paula">Paula Abdul<br v-if="mobile"/> x<br v-if="!mobile"/>
            Psychics1on1™</p>
          <p class="sub_title_main_lp_paula">
            You’ll get $10 off your first reading<br/>
            when you use promo code PAULA
          </p>
          <div
            class="m-0 text-center btn_lp_paula center_custom"
            @click="goToUrl('/signup')"
            >
            Claim Offer
          </div>
        </div>
        <div
          class="text-left text-sm-right block_quote_h"
          :style="{ top: mobile ? '25px' : '0' }"
        >
          <div style="display: grid; margin: auto;"
            :style="(mobile ? 'max-width:270px' : 'max-width:305px')"
            class="float-md-right">
            <img src="/images/icons/crystal_ball_icon.png"
              class="float-right"
              style="z-index: 1;"
              :style="{ height: mobile ? '40px' : '80px', display: mobile ? 'none' : ''}"
            />
            <p class="italic_additional_info">“Check out my favorite hand-<br/>selected psychics right below.”</p>
          </div>
        </div>
      </v-img>
      <img src="/images/icons/double_chevron_icon.svg"
        class="chevron_down"
        :style="{ height: mobile ? '40px' : '80px' }"
      />
    </div>

    <v-container class="mt-11 front">
      <v-row
        id="paula_top"
        justify="space-around"
        :class="!mobile ? 'mt-7 px-4' : 'px-4'"
        class="mb-2"
      >
        <v-col cols="9" class="h3 mb-0 d-flex align-center">
          <h4 class="mb-0">Paula’s Top Psychic Picks</h4>
        </v-col>
        <v-col class="h3 mb-0 text-lg-right cursor-pointer">
          <div
            class="d-flex justify-end align-center"
            style="font-size: 30px; color: #43425d"
            @click="nextTopPaula"
          >
            <span>&#8226;</span>
            <span>&#8226;</span>
            <span>&#8226;</span>
          </div>
        </v-col>
      </v-row>
    </v-container>

    <v-container class="mb-6 front">
      <v-row>
        <v-col>
          <swiper
            :options="swiperOptions3"
            ref="mySwiperTopPaula"
            class="row custom_swiper"
          >
            <swiper-slide v-for="(item, index) in top_psychics" :key="index">
              <div class="top_ps_card text-center d-flex flex-column justify-center">
                <img :src="item.profile.profile_headshot_url"
                  :alt="item.profile.display_name"
                  class="top_avatar"/>
                <p class="top_displayname mb-0">{{item.profile.display_name}}</p>
                <v-rating
                  class="d-inline starBtn"
                  :value="parseFloat(item.reviews_rating)"
                  color="amber"
                  background-color="#C7C7C7"
                  empty-icon="mdi-star"
                  dense
                  half-increments
                  readonly
                  size="17"
                ></v-rating>
                <p class="top_tagline mx-2">{{item.profile.tagline | truncate(50, "...")}}</p>
                <div
                  class="m-0 text-center btn_lp_paula chat_now"
                  @click="goToUrl('/'+item.profile.profile_link)"
                  >
                  Chat Now
                </div>
              </div>
            </swiper-slide>
          </swiper>
        </v-col>
      </v-row>
    </v-container>

    <v-container class="mb-6 front">
      <v-row
        id="specialties"
        justify="space-around"
        :class="!mobile ? 'mt-7 px-4' : 'px-4'"
        class="mb-2"
      >
        <v-col cols="9" class="h3 mb-0 d-flex align-center">
          <h4 class="mb-0">Browse Psychics By Specialties</h4>
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

    <v-layout row class="m-0">
      <v-flex
        class="message_paula_container"
      >
        <v-container class="p-0" id="message">
          <v-row class="align-sm-center justify-sm-center home_banner home_banner_new">
            <v-col cols="12" md="8">
              <div
                class="d-flex message_signature"
              >
                <p class="italic_additional_info" style="padding-top: 20px;padding-left: 20px;">
                  “Hey everyone, it's<br v-if="!mobile"/> Paula<br v-if="mobile"/> 
                  Abdul and I'm<br v-if="!mobile"/> so excited<br v-if="mobile"/>
                  to tell you<br v-if="!mobile"/> about<br v-if="mobile"/> Psychics1on1™!”
                  <img src="/images/landing_paula/paula_signature.png" class="signature_img"/>
                </p>
                <img src="/images/landing_paula/paula_talking_img.png" class="paula_calling_img"/>
              </div>
            </v-col>
            <v-col
              cols="12" md="4" class="mt-4 mt-md-0"
            >
              <p class="second_messge px-5 px-md-0 mb-0">
                “This is a one stop shop to get all
              </p>
              <p class="highlighted_msg px-5 px-md-0 mb-0">
                your questions answered <img src="/images/icons/sparkles_icon.svg"/>
              </p>
              <p class="second_messge px-5 px-md-0">
                with trusted guidance along the way.”
              </p>
              <p class="message_add_desc px-5 px-md-0">
                Psychics1on1™ is your gateway to the most incredibly talented, gifted psychics, mediums, tarot card readers, tea leaf readers, spiritual guides, you name it.
              </p>
              <div
                class="ml-5 ml-md-0 text-center btn_lp_paula px-5 px-md-0"
                @click="goToUrl('/search')"
                >
                Find a Psychic
              </div>
            </v-col>
          </v-row>
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
          <h4 class="mb-0">Browse Psychics By Abilities</h4>
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
                    :href="'/search?ability=' + item.slug"
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
                        class="align-center text-center p-0 mt-n3"
                      >
                        <div class="description" style="font-weight:700;">
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
                    :href="'/search?ability=' + item.slug"
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
                        class="align-center text-center p-0 mt-n3"
                      >
                        <div class="description" style="font-weight:700;">
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

    <v-container class="front">
      <v-row
        justify="space-around"
        :class="!mobile ? 'mt-7 px-4' : 'px-4'"
        class="mb-2"
      >
        <v-col cols="9" class="h3 mb-0 d-flex align-center">
          <h4 class="mb-0">Thousands Of Happy Customers</h4>
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
      
      <v-row>
        <v-col style="padding-left: 25px !important;">
          <swiper
            :options="swiperOptions4"
            ref="mySwiperReviews"
            class="row"
          >
            <swiper-slide v-for="(i, index) in reviews" :key="index">
              
              <v-card
                class="sfProfileListRating mt-0 custom_card_rating"
              >
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
                    <v-list-item-avatar size="40" color="grey" left>
                      <v-img
                        :src="i.user.profile.profile_headshot_url"
                      ></v-img>
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
                  <v-list-item-avatar size="40" color="grey" left>
                    <v-img
                      :src="i.user.profile.profile_headshot_url"
                    ></v-img>
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

    <v-layout row class="m-0">
      <v-flex
        class="message_paula_container"
      >
        <v-container class="p-0" id="message">
          <v-row class="flex-md-row flex-column-reverse align-sm-center justify-sm-center home_banner home_banner_new">
            <v-col
              cols="12" md="4" class="mt-4 mt-md-0"
            >
              <p class="second_messge px-5 px-md-0 mb-0">
                “This is not your old fashion<br/> psychic hotline, this is a
              </p>
              <p class="highlighted_msg px-5 px-md-0 mb-0">
                modern platform&nbsp;&nbsp;&nbsp;&nbsp; <img src="/images/icons/double_chevron_icon.svg"/>
              </p>
              <p class="second_messge px-5 px-md-0">
                that connects you with top-rated<br/> and vetted psychics through chat,<br/> call or video chat.”
              </p>
              <p class="message_add_desc px-5 px-md-0">
                “Incredible spiritual advisors and spot on psychics have helped lead my way throughout my career and my love life…”
              </p>
              <div
                class="ml-5 ml-md-0 text-center btn_lp_paula px-5 px-md-0"
                @click="goToUrl('/search')"
                >
                Find a Psychic
              </div>
            </v-col>
            <v-col cols="12" md="8">
              <div
                class="d-flex bg_computer_img"
              >
                <img 
                  :src="mobile ? 
                    '/images/landing_paula/computer_image_paula_mobile.png':
                    '/images/landing_paula/computer_image_paula_desktop.png'"
                  class="computer_img"/>
              </div>
            </v-col>
          </v-row>
        </v-container>
      </v-flex>
    </v-layout>

    <!-- <v-container class="py-0 pt-3 front">
      <v-row
        justify="space-around"
        :class="!mobile ? 'mt-5 px-4' : 'px-4'"
        :style="!mobile ? 'margin-top' : '50px'"
        class="mb-3"
      >
        <v-col cols="9" class="h3 mb-0">
          <h4>Featured Psychic Advisors</h4>
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
            href="/search?sortBy=featured"
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
        :rows="!mobile ? 2 : null"
        :bottomOff="1"
        :filters="{ featured: true }"
        :set-featured="setFeatured"
        :perPageProp="2"
      />
    </v-container>

    <v-layout row class="mt-12 front m-0">
      <v-flex class="engage">
        <v-container class="p-0">
          <div
            class="align-sm-center text-center-md justify-sm-center home_banner"
          >
            <h2 class="mb-5">Engage Easily</h2>
            <p class="text-center-md" style="">
              Connecting with our top-rated online psychics on issues that
              matter most to you is simple and transparent. Our spiritual
              advisors all have their own specialties and hail from all around
              the world, making it easy to find someone you can communicate with
              easily.
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
          <h4>Popular Psychic Advisors</h4>
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
            href="/search?sortBy=popular"
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
              Navigate through some of life’s most difficult scenarios and get
              the peace of mind that you deserve. Connect with Psychics1on1’s™
              top-rated online psychics who are always available to connect and
              offer the powerful truth and guidance you need. Whether you are
              coping with a difficult loss or struggling with a big decision,
              our spiritual advisors offer personal readings on topics.
            </p>
          </div>
        </v-container>
      </v-flex>
    </v-layout> -->

    <v-container class="py-0 front">
      <v-row
        justify="space-around"
        :class="!mobile ? 'mt-12 px-4' : 'mt-8 px-4'"
        class="mb-2"
      >
        <v-col cols="9" class="h3 mb-0">
          <h4>Discover Top-Rated Psychics</h4>
        </v-col>
        <v-col
          class="mb-0 text-lg-right cursor-pointer px-0 px-lg-3"
          style="line-height: 18px"
        >
          <a v-if="!mobile" href="/search?sortBy=rating">
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
            href="/search?sortBy=rating"
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
        :psychicsProp="top_rated_psychics"
      />
      <div @click="goToUrl('/search?sortBy=rating')"
        class="show_more_lp">
        Show More <img width="30" height="30" src="/images/icons/load_more.png"/>
      </div>
    </v-container>

    
  </div>
</template>

<script>
import { mapGetters } from "vuex";
import moment from "moment";
import ListItems from "./specialtie_user_list.vue";

import { Swiper, SwiperSlide } from "vue-awesome-swiper";
import { Autoplay } from "swiper"; 
import "swiper/swiper-bundle.css";

export default {
  modules: [Autoplay],
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
      swiperOptions3: {
        loop: true,
        breakpoints: {
          // when window width is >= 320
          320: {
            slidesPerView: 1.30
          },
          420: {
            slidesPerView: 1.50
          },
          570: {
            slidesPerView: 1.90
          },
          // 300: {slidesPerView:0.80},
          // 320: {slidesPerView:1.30},
          // 350: { slidesPerView:1},
          // 360: {slidesPerView:1.03},
          // 370: {slidesPerView:1.05},
          // 380: {slidesPerView:1.09},
          // 390: {slidesPerView:1.12},
          // 400: {slidesPerView:1.15},
          // 410: {slidesPerView:1.21},
          // 420: {slidesPerView:1.23},
          // 430: {slidesPerView:1.25},
          // 450: {slidesPerView:1.28},
          // 500: {slidesPerView:1.35},
          // 520: {slidesPerView:1.45},
          // 550: {slidesPerView:1.55},
          // 600: {slidesPerView:1.6},
          // 680: {slidesPerView:0.95},
          768: {
            slidesPerView: 2.5,
            spaceBetween: 20
          },
          // when window width is >= 960
          960: {
            slidesPerView: 3.5,
            spaceBetween: 20
          },
          // when window width is >= 1264
          1264: {
            slidesPerView: 4,
            spaceBetween: 20
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
    };
  },
  filters: {
    formatDate(date) {
      return moment(date).format("MM/DD/YYYY");
    },
  },
  props: ["guest", "user", "top_psychics", "top_rated_psychics", "reviews"],
  components: {
    ListItems,
    Swiper,
    SwiperSlide,
  },
  computed: {
    swiper() {
      return this.$refs.mySwiper.$swiper;
    },
    swiper2() {
      return this.$refs.mySwiper2.$swiper;
    },
    swiper3() {
      return this.$refs.mySwiperTopPaula.$swiper;
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
    goToUrl(url){
      window.location = url
    },
    nextAbilities() {
      this.swiper.slideNext();
    },
    nextSpecialties() {
      this.swiper2.slideNext();
    },
    nextTopPaula() {
      this.swiper3.slideNext();
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
  },

  mounted() {

    let bgi = document.getElementsByClassName("home_hero")[0]

    bgi.addEventListener("DOMNodeInserted", function(ev) {
      if (ev.relatedNode == bgi) {
        
        if (/^((?!chrome|android).)*safari/i.test(navigator.userAgent)) {
          ev.target.style.backgroundPosition = "initial"
        }
        
      }
      
    });

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
    console.log(this.reviews);
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

.main_title_lp_paula{
  font: normal normal 900 40px/55px Montserrat Black;
  letter-spacing: 0px;
  color: #FFFFFF;
}

.sub_title_main_lp_paula{
  font: normal normal 600 18px/32px Montserrat;
  letter-spacing: 0.36px;
  color: #FFFFFF;
}

.btn_lp_paula{
  background: #43425D 0% 0% no-repeat padding-box;
  box-shadow: inset 10px -10px 10px #0000004D;
  border-radius: 20px;
  opacity: 1;
  font: normal normal 600 14px/18px Montserrat;
  letter-spacing: 0px;
  text-decoration: none;
  color: white;
  padding: 10px;
  max-width: 152px;
  cursor: pointer;
}

.center_custom{
  margin: 0 auto !important;
}

.chevron_down{
  transform: rotate(90deg);
  height: 80px;
  top: -40px;
  position: relative;
  z-index: 1;
  float: right;
  margin-right: 108px;
}

.italic_additional_info{
  text-align: left;
  font: italic normal 600 16px/32px Montserrat;
  letter-spacing: 0.32px;
  color: #FFFFFF;
}

.v-image__image, .v-image__placeholder {
  background-position: inherit !important;
}

@media (max-width: 991px){
  .v-image__image, .v-image__placeholder {
    background-position: 65% !important;
  }
}

.main_copy_cta{
  box-shadow: 0px 3px 6px #00000014;
  border-radius: 20px;
  opacity: 1;
  backdrop-filter: blur(30px);
  -webkit-backdrop-filter: blur(30px);
  margin: 0px 108px;
  padding: 20px;
  position: absolute;
  z-index: 1;
}

.block_quote_h{
  width: 100%;
  padding: 0px 108px;
  position: absolute;
  margin-top: 505px;
}

.top_ps_card{
  height: 402px;
  max-width: 240px;
  background: #EBF4FD 0% 0% no-repeat padding-box;
  box-shadow: 0px 3px 6px #00000014;
  border-radius: 20px;
  opacity: 1;
}

.top_avatar{
  border-radius: 20px;
  margin: 20px auto;
  width: 200px;
  height: 200px;
  object-fit: cover;
}

.top_displayname{
  font: normal normal 600 15px/20px Montserrat;
  letter-spacing: 0px;
  color: #43425D;
  opacity: 1;
}

.top_tagline{
  font: normal normal 600 10px/16px Montserrat;
  letter-spacing: 0.2px;
  color: #656B72;
  opacity: 1;
}

.btn_lp_paula.chat_now{
  padding: 8px 0px;
  width: 87px;
  font: normal normal 600 12px/15px Montserrat;
  letter-spacing: 0.24px;
  color: #FFFFFF;
  margin: auto auto 30px auto !important;
}

.message_paula_container{
  background: #F4F4F4 0% 0% no-repeat padding-box;
  box-shadow: 0px 3px 6px #00000014;
  opacity: 1;
}

.message_signature{
  background: #D395A5;
  border-radius: 20px;
  width: 70%;
  height: 290px;
}

.paula_calling_img{
  position: absolute;
  height: 408px;
  top: -85px;
}

.signature_img{
  position: absolute;
  left: 32px;
  bottom: 0px;
}

.computer_img{
  position: absolute;
  top: -263px;
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
    width: 90%;
  } 
}

@media (max-width: 960px){
  .main_title_lp_paula{
    font: normal normal 900 30px/55px Montserrat Black;
  }
  .sub_title_main_lp_paula{
    font: normal normal 600 16px/32px Montserrat;
    letter-spacing: 0.32px;
  }
  .paula_calling_img{
    transform: scaleX(-1);
    height: 300px;
    top: 20%;
    left: 38%;
  }
  .signature_img{
    bottom: 95px !important;
    width: 40%;
  }
  .message_signature{
    width: 100%;
    height: 376px;
  }
  .bg_computer_img{
    background: #D395A5;
    border-radius: 20px;
  }
  .computer_img{
    position: inherit;
    top: -340px;
    width: 104%;
    height: auto;
  }
  .block_quote_h{
    margin-top: 555px;
  }
}

@media (max-width: 767px){
  .paula_calling_img {
    transform: scaleX(-1);
    height: 300px;
    top: 20%;
    left: 18%;
  }
  .signature_img{
    bottom: 125px !important;
  }
  .message_signature{
    width: 100%;
    height: 376px;
  }
}

@media (max-width: 576px){
  .main_copy_cta{
    padding: 20px;
    z-index: 0;
    margin-left: 5% !important;
    margin-right: 5% !important;
    position: unset;
  }
  .block_quote_h{
    padding: 0px;
    margin-top: 600px;
    /* margin-top: 518px; */
    /* margin-left: 20px; */
  }
  .btn_lp_paula{
    margin: 0px auto !important;
  }
  /* .custom_swiper .swiper-slide.swiper-slide-prev, */
  .custom_swiper .swiper-slide.swiper-slide-active
  /* .custom_swiper .swiper-slide.swiper-slide-next,
  .custom_swiper .swiper-slide.swiper-slide-duplicate.swiper-slide-next */
  {
    /* max-width: 265px; */
  }
  .chevron_down{
    top: -20px;
    margin-right: 45%;
  }
  .main_copy_cta{
    backdrop-filter: brightness(1.5) blur(30px);
    -webkit-backdrop-filter: brightness(1.5) blur(30px);
  }
  .custom_card_rating{
    width: 89%;
  }
}

@media (max-width: 450px){
  .home_banner_new{
    padding: 30px 20px;
  }
  .bg_computer_img{
    height: 346px;
  }
  .computer_img{
    position: absolute;
    top: -15px;
    right: -7px;
  }
}

.second_messge{
  text-align: left;
  font: italic normal 600 16px/32px Montserrat;
  letter-spacing: 0.32px;
  color: #43425D;
  opacity: 1;
}

.highlighted_msg{
  text-align: left;
  font: normal normal 900 18px/32px Montserrat Black;
  letter-spacing: 0.36px;
  color: #D395A5;
  text-transform: lowercase;
  opacity: 1;
}

.message_add_desc{
  text-align: left;
  font: normal normal 500 14px/26px Montserrat;
  letter-spacing: 0px;
  color: #43425D;
}

.reviews_container{
  /* max-width: fit-content; */
}

.sfProfileListRating.custom_card_rating .v-badge__badge {
  right: -23px !important;
  top: -27px !important;
}

.show_more_lp{
  text-align: center;
  padding: 30px;
  color: #43425D;
  font-weight: 600;
  font-size: 14px;
  cursor: pointer;
}
</style>
<style>
@media (min-width: 958px){
  .banner_paulaabdul .v-image__image--cover {
    background-position: inherit !important;
  }
}
/* for safari only */
/* @media not all and (min-resolution:.001dpcm){
  .banner_paulaabdul .v-image__image--cover {
    background-position: initial !important;
  }
} */
</style>
