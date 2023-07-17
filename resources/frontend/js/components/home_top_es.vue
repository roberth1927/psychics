<template>
  <section class="pageBanner bannerAbout">
    <div class="container">
      <div class="row">
        <div class="col">
          <div class="bannerOverContainer">
            <div class="leftCol col-12 col-lg-6">
              <h1 :style="$vuetify.breakpoint.xsOnly ? ' font-size:25px !important' : ' font-size:45px !important'">
                Mejora Tu Futuro</h1>
              <p>
                Disfruta Lecturas Personales Y Recibe Respuestas De Nuestros Expertos Psíquicos, Asesores, Médiums, Videntes Y Astrólogos.
              </p>
              <!-- <ul>
                <li>Accurate, in-depth answers where you need them most.</li>
                <li>Total privacy for every reading, every time.</li>
                <li>Simple, easy to use and quick to get started.</li>
              </ul> -->
              <a @click.prevent="openSignUpPopUp()" class="ctaBtn applyBtnMob" v-if="$vuetify.breakpoint.xsOnly">Comienza Hoy</a>
              <div class="rightColImgOnMob d-block d-md-none">
                <img src="/images/Banner-imgs/banner-phone-two.png" alt="Psychics" class="img-fluid" />
              </div>
              <a @click.prevent="openSignUpPopUp()" class="ctaBtn applyBtn"  v-if="!$vuetify.breakpoint.xsOnly">Comienza Hoy</a>
            </div>
            <div class="rightCol col-12 col-lg-6 d-none d-md-block">
              <img src="/images/Banner-imgs/banner-phone-two.png" alt="Psychics" class="img-fluid" />
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>
<script>
import { mapGetters } from "vuex";
export default {
  props: ["user", "guest"],
   computed: {
    ...mapGetters({
      mobile: "util/mobile",
      
    }),
  },
  data: function () {
    return {
      loading: true,
      errors: [],
      signupDialog: false,
    };
  },
  mounted() {
    this.loadUser();
  },
  ready() {
    this.loadUser();
  },

  methods: {
    openSignUpPopUp() {
      EventBus.$emit("open_sign_up_user", {});
    },
    loadUser() {},
  },
};
</script>

<style scoped>
    .bannerAbout h1{
      color: #fff;
      text-transform: none;
    }
    .bannerAbout p{
      font-size: 22px;
      text-align: left;
      color: #FFFFFF;
      line-height: 37.5px;
      letter-spacing: 0px;
    }
    @media screen and (max-width: 767px) {
      .bannerAbout h1{
        text-align: center;
      }
      .bannerAbout p{
        font-size: 16px;
        line-height: 24px;
        text-align: center;
        font-weight: normal;
      }
    }
</style>