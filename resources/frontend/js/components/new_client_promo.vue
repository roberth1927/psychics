<template>
  <div class="homepage" style="height:auto;">
    <div class="pa-0">
      <v-img
        alt="Home Banner Image"
        :src="
          !mobile
            ? '/images/Banner-imgs/new-client-promo.png'
            : '/images/Banner-imgs/new-client-promo_mobile.png'
        "
        aspect-ratio="1"
        :max-height="mobile ? 365 : 477"
        style="z-index: 1;"
        :style="[mobile ?{'margin-top': '-50px'}:{'margin-top': '-118px'}]"
        class="home_hero homeTop5Free"
      >
        <div
          class="justify-left text-left titleFree"
          style="
            position: absolute;
            width: 100%;
            margin-top: 20px;
            margin-left: 100px
            padding: 0 47px;
          "
          :style="[mobile ?{'top': '20%','margin-left': '20px'}:{'top': '25%','margin-left': '100px'}]"
        >
          <div><h2 :style="[mobile ?{'font-size': '18px !important','line-height': '35px'}:{'font-size': '30px !important','line-height': '55px'}]">Brighten<br />your<br />outlook,</h2></div>
          <div v-if="!mobile"><h2 class="mt-n3" :style="[{'font-size': '30px !important','line-height': '55px'}]">With $5 free</h2></div>
          <div v-else><h2 class="mt-n3" :style="[{'font-size': '18px !important','line-height': '35px', 'margin-right': '40px', 'text-align': 'right'}]">With <br />$5 free</h2></div>
        </div>

        <div
          class="justify-right text-right titleFreeRight"
          style="
            position: absolute;
            width: 100%;
            margin-top: 50px;
            padding: 0 47px;
          "
          :style="[mobile ?{'bottom': '10px','margin-left': '20px'}:{'top': '35%','padding-right': '100px'}]"
        >
              <span v-if="!$vuetify.breakpoint.smAndDown" style="display: inline-block; border: 1px solid #fff;"
              :style="[mobile ?{'padding': '20px 20px 0px 20px'}:{'padding': '38px 54px'}]"
              >
                <!--<h2 v-for="ini in nTotal" :style="[mobile ?{'font-size': '20px !important','line-height': '35px'}:{'font-size': '40px !important','line-height': '55px'}]">$5 free</h2>-->
              <div><p style="color:#FFFFFF;font-size:18px;text-align:center;">Advice from the world’s most<br> trusted psychics</p></div>
              <div align="center"><v-btn
               v-if="guest"
               rounded
               color="#8EbEF8"
               style="font-weight:600;font-size:14px;"
               class="m-0 elevation-0 white--text mb-5 mt-2"
               href="/signup"
               >Chat Now</v-btn
               ></div>
              </span>

        </div>


      </v-img>
    </div>



    <v-container class="front pb-0" v-if="online">
      <div>
        <v-row
          justify="space-around"
          :class="!mobile ? 'mt-12 px-4' : 'px-4'"
          class="mb-2"
          style="margin-top: 12px"
        >
          <v-col cols="9" class="mb-0">
            <h1 
            
            :style="[mobile ? {paddingTop:'10px'} : {}]"
            >
            Top-Rated Psychics</h1>
          </v-col>
          <v-col v-if="!mobile" class="h3 mb-0 text-lg-right cursor-pointer px-0 px-lg-3">
            <a href="/search?sortBy=rating&online=1">
              <span class="grey--text" style="font-size: 14px; font-weight: 600"
                >Show All</span
              >
            </a>
          </v-col>

           <v-col v-else class="h3 mb-0 text-lg-right cursor-pointer">
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
  <ListItems :guest="guest" :cols="!$vuetify.breakpoint.xsOnly ? 4 : 12" :perPageProp ="12"  :rows="3" :filters="{ rating: true }" />
      
      </div>
    </v-container>

    <v-container class="my-3 front">
      <v-row
        id="specialties"
        justify="space-around"
        :class="!mobile ? 'mt-7 px-4' : 'px-4'"
        class="mb-2"
      >
        <v-col cols="9" class="h3 mb-0 d-flex align-center">
          <h4 class="mb-0">Popular Psychic Specialties</h4>
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
          <swiper v-if="!$vuetify.breakpoint.xsOnly" ref="mySwiper2" :options="swiperOptions2" class="row">
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

              <div v-for="(item, index2) in item2" :key="index2"
                class="my-2 specialty_card"
                style="height: 140px" 
              >
                <v-hover v-if="!item.loading" v-slot:default="{ hover }" >
                  <a
                    :href="'/search?category=' + item.slug"
                    style="text-decoration: none"
                  >
                    <v-row class="ma-0 text-center">
                      <v-col
                        cols="12"
                        class="align-sm-center justify-sm-center sm4 p-0"
                      >
                        <img :alt="item.name" v-bind:src="item.path" />
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
    <div style="height:10px;"></div>
  </div>
</template>

<script>
import { mapGetters } from "vuex";
import ListItems from "./psychics_list_promo.vue";

import { Swiper, SwiperSlide } from "vue-awesome-swiper";
import "swiper/swiper-bundle.css";

export default {
  data() {
    return {
      window: 0,
      window1: 0,
      ini:1,
      nTotal: 3,
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
    };
  },
  props: ["guest", "user"],
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
    ...mapGetters({
      mobile: "util/mobile",
      paginate: "category/items",
      paginate1: "specialty/items",
    }),
  },

  watch: {},
  methods: {
    nextAbilities() {
      this.swiper.slideNext();
    },
    nextSpecialties() {
      this.swiper2.slideNext();
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
  created() {
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

.homeTop5Free .v-image__image--cover {
  /* background-position:  center !important; */

}

/* @font-face {
  font-family: 'Gotham Black';
  src: url('fonts/Gotham-Black-Regular.ttf') format('truetype');
  font-style: normal;
  font-weight: normal;
} */



.titleFree h2{
  
  letter-spacing: 6px;
  color: #fff;
  font-weight: 900;
  font-family: 'Gotham-Black';
  text-transform: uppercase;
}

.titleFreeRight h2{
  
  letter-spacing: 6px;
  
  color:transparent;
  font-weight: 900;
  font-family: 'Gotham-Black';
  text-transform: uppercase;
  -webkit-text-stroke: 1px #fff;
}


</style>
