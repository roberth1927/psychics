<template>
  <div style="position: fixed;z-index: 1;width: 100%;">
    <v-dialog v-model="videoDialog"
      persistent
      width="335"
      style="border-radius: 5px !important;"
      >
      <v-card style="border-radius:20px !important;">
        <v-card-text class="p-0">
            <div class="row">
              <div class="col-md-12 col-12 col-sm-12 col-lg-12">
                <div class="text-center">
                  <v-img
                    style="position:absolute;top:25px;left:32px;"
                    src="/images/icons/warning.svg"
                    ></v-img>
                  <h2 style="font-size:16px;padding-top:30px;color:#1F1E34;font-weight:600;">
                    New Profile Requirements
                  </h2>
                </div>
                <div class="col-md-12 px-4 pt-4">
                  <p style="font: normal normal medium 14px/21px Montserrat;letter-spacing: 0px;color: #656B72;opacity: 1;">
                    An intro video is required for your profile to be featured on Psychics1on1 and discoverable by new clients. Review the guidelines to ensure your intro video meets the minimum criteria.
                  </p>
                  </div>
                  <div class="col-md-12 px-4">
                    <h3 style="text-align: left;font: normal normal 600 14px/19px Montserrat;letter-spacing: 0.28px;color: #1F1E34;opacity: 1;">Intro Video Guidelines</h3>
                  </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 col-12 col-sm-12 col-lg-12">
                <div class="col-md-12 px-3 pt-4">
                <ul>
                  <li>
                     <p class="modal_points">You must appear in the video, with your face clearly visible </p>
                  </li>
                  <li>
                     <p class="modal_points">You must mention your profile display name and Psychics1on1 clearly</p>
                  </li>
                  <li>
                     <p class="modal_points">Your video must not contain copyrighted material for which you do not own the rights </p>
                  </li>
                </ul>
                </div>
              </div>
            </div>
        </v-card-text>
        <v-card-actions>
          <div class="row px-3">
            <div class="col-6 pb-3" align="left">
            <v-btn
              outlined
              rounded
              color="#8EBEF8"
              style="width:102px;"
              @click="clickLater()"
            >
            Later
            </v-btn>
          </div>
          <div class="col-6 pb-3" align="right">
            <a v-bind:href="'/dashboard/profile#psychicProfileMedia'">
            <v-btn
            rounded
            color="#8EBEF8"
            style="width:130px;font: normal normal 600 14px/18px Montserrat;color:#FFFFFF !important;"
            @click="clickUpdateNow()"
            >
            Update Now
          </v-btn>
            </a>
          </div>
          </div>
        </v-card-actions>
      </v-card>
    </v-dialog>
   <header-info :user="user" included='backend'></header-info> 
  <div id="the_top_bar" :class="{'home_header': user.role_id == 2}" :style="[ $vuetify.breakpoint.xsOnly && user.role_id == 2 ? {'height': '60px !important'}:{}]">
    
    <div  :class="[user.role_id == 2 ? 'logo_container' : '']"  :style="{
                      'background-color': user.role_id == 2
                        ? 'transparent'
                        : '',
                    }">
      <!-- <div class="container" :class="[ user.role_id == 2 ? 'logo_container' : '']"> -->

<!-- 
            background: rgb(201,132,154);
    background: ; -->



      <div v-if="!mobile" class="row row-top-bar m-0">
        <div
          class="col logo_container text-center d-flex align-center justify-center"
          style="max-width: 268px; padding: 10px 29px !important;" :style="{
                      'background': user.role_id == 2
                        ? 'transparent'
                        : 'linear-gradient(90deg, rgba(201,132,154,1) 0%, rgba(201,132,154,1) 51%, rgba(104,99,123,1) 100%)',
                    }"
        >
          <a href="/">
            <img
              alt="Psychics Logo"
              src="/images/site-images/psychics_logo_white.svg"
              class="logo"
              style="margin: 0px"
            />
          </a>
        </div>

        <div class="col" id="stats-row">
          <div id="top-bar" class="row" v-if="user.role_id == 1">
            <div class="col-3 px-5">
              <div class="inner">
                <span class="words d-none d-md-block text_header_data">Earned This Week</span>
                <span class="words d-block d-sm-block d-md-none">Subs</span>
                <span class>
                  <span
                    class="words d-none d-md-inline-block"
                  >${{ current_balance | numFormat("0,0.00") }}</span>
                  <span
                    class="words d-inline-block d-sm-inline-block d-md-none"
                  >${{ current_balance | numFormat("0,0.00") }}</span>
                </span>
              </div>
            </div>

            <div class="col-3 px-5">
              <div class="inner">
                <span class="d-none d-md-block">
                  <span class="words text_header_data">Total Earnings</span>
                  <span class="words d-none d-md-block">${{ total_earning | numFormat("0,0.00") }}</span>
                </span>

                <span class="d-block d-sm-block d-md-none">
                  <span class="words">Earn</span>
                  <span class="words">${{ total_earning | numFormat("0,0.00") }}</span>
                </span>
              </div>
            </div>

            <div class="col-3 px-5">
              <div class="inner">
                <span class="words d-none d-md-block text_header_data">Reviews</span>
                <span class="words d-block d-sm-block d-md-none">Favs</span>

                <span class>
                  <span class="words d-none d-md-inline-block">
                    {{
                    reviews
                    }}
                  </span>
                  <span class="words d-inline-block d-sm-inline-block d-md-none">{{ reviews }}</span>
                  <v-rating
                    class="d-inline-flex hStars"
                    v-model="reviews_rating"
                    background-color="yellow darken-2"
                    color="yellow darken-2"
                    readonly
                    dense
                    half-increments
                    small
                  ></v-rating>
                </span>
              </div>
            </div>

            <div class="col-3 pt-2 d-flex">
              <div>
                <text-chat-notifications color="#A163C1" size="27px" :user="user"></text-chat-notifications>
              </div>
              <toxbox-chat-notifications color="#A163C1" size="27px" :user="user"></toxbox-chat-notifications>
              <v-menu v-model="menu_opened" offset-y left content-class="my-menu">
                <template v-slot:activator="{ on }">
                  <a v-on="on" class="d-flex align-center">
                    <div
                      class="w-profile"
                      style="width: 40px"
                      :style="[
                        menu_opened
                          ? {
                              'background-image':
                                'url(/images/icons/profile-active.svg)',
                            }
                          : {
                              'background-image':
                                'url(/images/icons/w-profile.svg)',
                            },
                      ]"
                    ></div>
                  </a>
                </template>
                <v-card style="border-radius:  5px !important;" :min-width="300" :min-height="150">
                  <v-list dense class>
                    <v-list-item-group color="primary">
                      <v-list-item dense class="px-5" href="/dashboard">
                        <v-list-item-icon>
                          <img src="/images/icons/calendar.svg" />
                        </v-list-item-icon>
                        <v-list-item-content>
                          <v-list-item-title>Appointments</v-list-item-title>
                        </v-list-item-content>
                      </v-list-item>

                      <v-list-item dense class="px-5" href="/dashboard/services">
                        <v-list-item-icon>
                          <img src="/images/icons/services_bar.svg" />
                        </v-list-item-icon>
                        <v-list-item-content>
                          <v-list-item-title>Services</v-list-item-title>
                        </v-list-item-content>
                      </v-list-item>

                      <v-list-item class="px-5" href="/dashboard/reviews">
                        <v-list-item-icon>
                          <img src="/images/icons/review.svg" />
                        </v-list-item-icon>
                        <v-list-item-content>
                          <v-list-item-title>Reviews</v-list-item-title>
                        </v-list-item-content>
                      </v-list-item>

                          <v-list-item class="px-5" href="/dashboard/cosmic-rewards">
                          <v-list-item-icon>
                            <img src="/images/icons/cosmic_rewards_ico.svg" />
                          </v-list-item-icon>
                          <v-list-item-content>
                            <v-list-item-title>Cosmic Rewards</v-list-item-title>
                          </v-list-item-content>
                        </v-list-item>

                        
                      <v-list-item class="px-5" href="/dashboard/payout">
                        <v-list-item-icon>
                          <img src="/images/icons/moneys.svg" />
                        </v-list-item-icon>
                        <v-list-item-content>
                          <v-list-item-title>Money</v-list-item-title>
                        </v-list-item-content>
                      </v-list-item>
                      <v-list-item class="px-5" href="/dashboard/analytics">
                        <v-list-item-icon>
                          <img src="/images/icons/analytic.svg" />
                        </v-list-item-icon>
                        <v-list-item-content>
                          <v-list-item-title>Analytics</v-list-item-title>
                        </v-list-item-content>
                      </v-list-item>
                      <!-- <v-list-item class="px-5" href="/about">
                        <v-list-item-icon>
                          <img src="/images/icons/about.svg" />
                        </v-list-item-icon>
                        <v-list-item-content>
                          <v-list-item-title>About</v-list-item-title>
                        </v-list-item-content>
                      </v-list-item> -->

                      <v-list-item class="px-5"  target="_blank" href="https://psychics1on1.zendesk.com/hc/en-us">
                        <v-list-item-icon>
                          <img src="/images/icons/help.svg" />
                        </v-list-item-icon>
                        <v-list-item-content>
                          <v-list-item-title>Help</v-list-item-title>
                        </v-list-item-content>
                      </v-list-item>


                      <v-list-item class="px-5" href="/blog">
                        <v-list-item-icon>
                          <img src="/images/icons/blog.svg" />
                        </v-list-item-icon>
                        <v-list-item-content>
                          <v-list-item-title>Blog</v-list-item-title>
                        </v-list-item-content>
                      </v-list-item>

                      <v-list-item class="px-5" @click.prevent="logout()" dense>
                        <v-list-item-icon>
                          <img src="/images/icons/logout.svg" />
                        </v-list-item-icon>
                        <v-list-item-content>
                          <v-list-item-title style="color:rgb(162, 162, 162) !important">Log Out</v-list-item-title>
                        </v-list-item-content>
                      </v-list-item>
                    </v-list-item-group>
                  </v-list>
                </v-card>
              </v-menu>
            </div>
          </div>
          <div
            id="top-bar"
            class="row pr-0"
            style="background-color: transparent; height: 80px;padding-top: 22px; padding-bottom: 18px;"
            v-else-if="user.role_id == 2"
          >
            <div class="col-9 px-5"></div>

            <!-- <div class="col-3 pt-2 d-flex "> -->
            <div class="col-3 pr-0 d-flex justify-end">
              <div class="d-flex">
                <credits
                  v-if="user.role_id === 2"
                  :user="user"
                  class="mt-2"
                  style="margin-right: 10px !important; "
                />
                <text-chat-notifications color="white" size="25px" :user="user"></text-chat-notifications>
                <toxbox-chat-notifications
                  color="white"
                  size="25px"
                  :user="user"
                  style="margin-left: 10px !important;margin-right: 0px !important; "
                ></toxbox-chat-notifications>
              </div>
              <v-menu v-model="menu_opened" offset-y left content-class="my-menu">
                <template v-slot:activator="{ on }">
                  <a
                    v-on="on"
                    :style="{
                      marginRight: $vuetify.breakpoint.mdAndDown
                        ? '89px'
                        : '89px',
                    }"
                    style="margin-left: 10px"
                  >
                    <div
                      class="w-profile"
                      style="width: 40px"
                      :style="[
                        menu_opened
                          ? {
                              'background-image':
                                'url(/images/icons/profile-active.svg)',
                            }
                          : {
                              'background-image':
                                'url(/images/icons/profile.svg)',
                            },
                      ]"
                    ></div>
                  </a>
                </template>
                <v-card style="border-radius:  5px !important;" :min-width="300" :min-height="150">
                  <v-list dense class>
                    <v-list-item-group color="primary">
                      <v-list-item dense class="px-5" href="/dashboard/appointments">
                        <v-list-item-icon>
                          <img src="/images/icons/calendar.svg" />
                        </v-list-item-icon>
                        <v-list-item-content>
                          <v-list-item-title>Appointments</v-list-item-title>
                        </v-list-item-content>
                      </v-list-item>

                      <v-list-item class="px-5" href="/dashboard/user/reviews">
                        <v-list-item-icon>
                          <img src="/images/icons/review.svg" />
                        </v-list-item-icon>
                        <v-list-item-content>
                          <v-list-item-title>Reviews</v-list-item-title>
                        </v-list-item-content>
                      </v-list-item>

                      <v-list-item dense class="px-5" href="/dashboard/favorites">
                        <v-list-item-icon>
                          <img src="/images/icons/favorites.svg" />
                        </v-list-item-icon>
                        <v-list-item-content>
                          <v-list-item-title>Favorites</v-list-item-title>
                        </v-list-item-content>
                      </v-list-item>
                      <v-list-item class="px-5" href="/dashboard/cosmic-rewards">
                      <v-list-item-icon>
                        <img src="/images/icons/cosmic_rewards_ico.svg" />
                      </v-list-item-icon>
                      <v-list-item-content>
                        <v-list-item-title>Cosmic Rewards</v-list-item-title>
                      </v-list-item-content>
                    </v-list-item>
                      <v-list-item class="px-5" href="/dashboard/transaction">
                        <v-list-item-icon>
                          <img src="/images/icons/moneys.svg" />
                        </v-list-item-icon>
                        <v-list-item-content>
                          <v-list-item-title>Transactions</v-list-item-title>
                        </v-list-item-content>
                      </v-list-item>
                      <v-list-item class="px-5" href="/dashboard/payment">
                        <v-list-item-icon>
                          <img src="/images/icons/payment.svg" />
                        </v-list-item-icon>
                        <v-list-item-content>
                          <v-list-item-title>Payment</v-list-item-title>
                        </v-list-item-content>
                      </v-list-item>

                      <v-list-item class="px-5" @click.prevent="logout()" dense>
                        <v-list-item-icon>
                          <img src="/images/icons/logout.svg" />
                        </v-list-item-icon>
                        <v-list-item-content>
                          <v-list-item-title style="color:rgb(162, 162, 162) !important">Log Out</v-list-item-title>
                        </v-list-item-content>
                      </v-list-item>
                    </v-list-item-group>
                  </v-list>
                </v-card>
              </v-menu>
            </div>
          </div>
        </div>
      </div>

      <!--Navbar-->
      <nav class="navbar" style="max-height: 60px; height: 60px; " v-if="mobile" id="mobile-nav">
        <v-row>
          <v-col v-if="user.role_id === 2" :md="4" class="text-center">
            <v-btn text icon color="white" href="/">
              <img :src="explore_icon" width="40px" />
            </v-btn>
          </v-col>
          <v-col v-if="user.role_id === 1" :md="4" class="text-center">
            <v-btn text icon color="white" href="/dashboard">
              <img :src="dash_app" width="40px" />
            </v-btn>
          </v-col>
          <v-col v-if="user.role_id === 2" :md="4" class="text-center">
            <v-btn text icon color="white" href="/dashboard/appointments">
              <img :src="dash_app" width="40px" />
            </v-btn>
          </v-col>
          <v-col :md="4" class="text-center">
            <text-chat-notifications color="white" :user="user"></text-chat-notifications>
          </v-col>
          <v-col :md="4" class="text-center">
            <toxbox-chat-notifications color="white" :user="user"></toxbox-chat-notifications>
          </v-col>
          <v-col v-if="user.role_id === 1" :md="4" class="text-center">
            <v-btn text icon color="white" href="/dashboard/menu">
              <img :src="dash_menu" />
            </v-btn>
          </v-col>
          <v-col v-if="user.role_id === 2" :md="4" class="text-center">
            <v-btn text icon color="white" href="/dashboard/user/menu">
              <img :src="dash_menu" />
            </v-btn>
            <!-- Wallet reload component hidden to have access from messages and other pages-->
            <div style="visibility: hidden; width: 0px; height: 0px;">
              <credits :user="user" />
            </div>
          </v-col>
        </v-row>
      </nav>
      <!--/.Navbar-->
    </div>
  </div>
  </div>
</template>
<script>
import { mapGetters } from "vuex";
export default {
  props: ["user"],
  data: function () {
    return {
      menu_opened: false,
      loading: false,
      dash_menu: "/images/icons/profile.svg",
      dash_app: "/images/icons/dashboard.svg",
      explore_icon: "/images/icons/Explore_Icon_40x40_Inactive.svg",
      errors: [],
      signupDialog: false,
      message: "",
      messageDialog: "",
      reviews: 0,
      total_earning: 0,
      profile_views: 0,
      reviews_rating: 0.0,
      current_balance: 0,
      menu_opened: false,
      videoDialog:false,  
    };
  },
  computed: {
    ...mapGetters({
      mobile: "util/mobile",
    }),
  },
  created() {
    var cookie = this.getCookie("videoStatusView" + this.user.id);
    if(!cookie || cookie==false)
    this.getViewVideoStatus();
    if (
      window.location.pathname == "/dashboard/menu" ||
      window.location.pathname == "/dashboard/user/menu"
    ) {
      this.dash_menu = "/images/icons/profile-active.svg";
    } else if (
      window.location.pathname == "/dashboard" ||
      window.location.pathname == "/dashboard/appointments"
    ) {
      this.dash_app = "/images/icons/dashboard-active.svg";
    }
  },
  mounted() {
      this.f_data_header();
  },
  ready() {},

  methods: {
    getCookie(name) 
    {
      var match = document.cookie.match(new RegExp('(^| )' + name + '=([^;]+)'));
      if (match) {
        return match[2];
      }
      else{
        return false;
      }
   },
    setCookie(name, value, exdate) {
      (exdate) && (exdate = new Date(exdate).toUTCString());
      var c_value = escape(value) + ((exdate === null || exdate === undefined) ? "" : "; expires=" + exdate);
      document.cookie = name + "=" + c_value;
    },
    clickLater(){
      Date.prototype.addHours = function(h) {
        this.setTime(this.getTime() + (h*60*60*1000));
        return this;
      }
      const d = new Date();
      d.addHours(12);
      this.videoDialog = false;
      this.setCookie('videoStatusView' + this.user.id, true, d);
    },
    getViewVideoStatus() {
      axios
        .get("/generic/get_video_status_view")
        .then((res) => {
          var hashcode = window.location.hash;
          if(!hashcode || hashcode !== "#psychicProfileMedia")
          this.videoDialog = !res.data;
        })
        .catch((error) => {
         console.log(error);
        });
    },
    clickUpdateNow() {
      this.videoDialog = false;
      /*axios
        .post("/generic/update/video_status_view")
        .then((res) => {
          console.log(res);
        })
        .catch((error) => {
          if (
            error.response &&
            (error.response.status === 401 || error.response.status === 419)
          ) {
            location.reload();
          }
          if (typeof error.response.data === "object") {
            this.errors = error.response.data.errors;
          } else {
            this.errors = ["Something went wrong. Please try again."];
          }
          this.show1 = false;
          this.loading = false;
          this.message =
            "There is something wrong, please check that all form fields are correct.";
        });*/
    },
    f_data_header() {
      axios
        .get("/api/v1/user/hdata")
        .then((response) => {
          if (response.status === 200) {
            this.total_earning = response.data.success.t_earning;
            this.reviews = response.data.success.reviews;
            this.profile_views = response.data.success.p_views;
            this.current_balance = response.data.success.current_balance;
            this.reviews_rating = response.data.success.reviews_rating;
          }
        })
        .catch((error) => {
          if (
            error.response &&
            (error.response.status === 401 || error.response.status === 419)
          ) {
            location.reload();
          }
        });
    },
    logout() {
      axios
        .post("/logout")
        .then((response) => {
          if (response.status === 200) {
            window.location = "/";
          }
        })
        .catch((error) => {
          if (
            error.response &&
            (error.response.status === 401 || error.response.status === 419)
          ) {
            location.reload();
          }
        });
      // this.$refs.logoutform.submit()
    },
  },
};
</script>
<style scoped>
.mobile_chat_notifications {
  position: absolute;
  float: right;
  right: 65px;
  top: 32px;
  display: flex;
}

#stats-row [class*="col"] .words {
  color: #4d4f5c !important;
  opacity: 1;
  font-weight: 500 !important;
  letter-spacing: 0.28px;
}
.text_header_data {
  font-weight: 500 !important;
  color: #43425d !important;
  opacity: 0.5 !important;
}

>>> .v-rating.v-rating--dense .yellow--text.text--darken-2 {
  color: #f4c150 !important;
  caret-color: #f4c150 !important;
}
.v-dialog__content--active {
  opacity: 1 !important;
  -webkit-backdrop-filter: blur(10px);
  backdrop-filter: blur(10px);
}
.modal_points{
  text-align: left;
  font: normal normal medium 14px/18px Montserrat;
  letter-spacing: 0px;
  color: #656B72;
  opacity: 1;
}
</style>
