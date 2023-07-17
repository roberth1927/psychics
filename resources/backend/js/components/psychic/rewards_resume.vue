<template>
  <div>
    <v-row>
      <v-col
        :cols="mobile ? 12 : 6"
        class="px-0 pt-0"
        :style="mobile ? '' : 'padding-right: 5px !important'"
      >
        <v-container class="mx-0 pt-0 pr-0">
          <v-card class="justify-content-between m-0 pl-0 pt-1 pb-1 pr-2">
            <div class="form-row mb-0 ml-0 mr-0">
              <div class="col-12 subtitle-1 m-0 p-0">
                <span class="col-12 pl-0">My Badges</span>
              </div>

              <div
                class="col-12 m-0 p-0 d-flex"
                style="margin-top: 20px !important"
              >
                <div class="MyBadges" :style="counterCosmicCredits>=500 ? 'background: #43425D' : ''">
                  <div>
                    <img :src="counterCosmicCredits>=500 ? '/images/icons/award-regular_active.svg':'/images/icons/award-regular.svg'"  :style="counterCosmicCredits>=500 ? 'opacity:1;' : ''"/>
                  </div>
                  <div class="MyBadgesText" :style="counterCosmicCredits>=500 ? 'opacity:1;color: #C1DBFB;' : ''" >Featured</div>
                </div>
                <div class="MyBadges" style="margin: 0 10px" :style="counterCosmicCredits>=1000 ? 'background: #43425D' : ''">
                  <div>
                    <img style="margin: 13px 10px 13px 5px;" :src="counterCosmicCredits>=1000 ? '/images/icons/medal-regular_active.svg':'/images/icons/medal-regular.svg'"  :style="counterCosmicCredits>=1000 ? 'opacity:1;' : ''"/>
                  </div>
                  <div class="MyBadgesText" :style="counterCosmicCredits>=1000 ? 'opacity:1;color: #C1DBFB;' : ''" >Preferred</div>
                </div>
                <div class="MyBadges" :style="counterCosmicCredits>=5000 ? 'background: #43425D' : ''">
                  <div>
                    <img style="margin-left: 23px" :src="counterCosmicCredits>=5000 ? '/images/icons/trophy-alt-regular_active.svg':'/images/icons/trophy-alt-regular.svg'"  :style="counterCosmicCredits>=5000 ? 'opacity:1;' : ''"/>
                  </div>
                  <div class="MyBadgesText" :style="counterCosmicCredits>=5000 ? 'opacity:1;color: #C1DBFB;' : ''" >Top</div>
                </div>
              </div>
            </div>
          </v-card>
        </v-container>

        <v-container class="mx-0 pt-0 pr-0">
          <v-card class="justify-content-between m-0 pl-0 pt-0 pb-1 pr-2">
            <div class="form-row mb-0 ml-0 mr-0">
              <div class="col-12 subtitle-1 m-0 p-0">
                <span class="col-12 pl-0" v-if="counterCosmicCredits>=500">Unlocked Achievements</span>
                <span class="col-12 pl-0" v-else>Goal in Progress</span>
                <div
                  class="col-12 subtitle-1 m-0 p-0"
                  style="
                    padding-right: 30px !important;
                    margin-top: 20px !important;
                  "
                >
                  <span class="col-12 pl-0">
                    <img
                      src="/images/icons/featured_psychic.svg"
                      style="margin-right: 10px"
                    />
                    Featured Psychic Rewards
                  </span>
                </div>

                <p class="sfProfileText" style="margin-top: 10px !important">
                  500 Cosmic Credits earns you a “featured psychic” spot right
                  on Psychics1on1 homepage for a month!
                </p>

                <p class="sfProfileTextSub" v-if="counterCosmicCredits>=500 && unlocked[500]">Achieved: {{unlocked[500]}}</p>

                <div class="d-flex UnlockedAchievements">
                  <div class="ini" :style="counterCosmicCredits>0 ? 'background: '+backgroundColor(0,100) : ''"><font :style="counterCosmicCredits>=100 ? 'opacity: 1' : ''" class="col">100</font></div>
                  <div class="middle" :style="counterCosmicCredits>100 ? 'background: '+backgroundColor(100,200) : ''"><font  :style="counterCosmicCredits>=200 ? 'opacity: 1' : ''">200</font></div>
                  <div class="middle" :style="counterCosmicCredits>200 ? 'background: '+backgroundColor(200,300) : ''"><font  :style="counterCosmicCredits>=300 ? 'opacity: 1' : ''">300</font></div>
                  <div class="middle" :style="counterCosmicCredits>300 ? 'background: '+backgroundColor(300,400) : ''"><font  :style="counterCosmicCredits>=400 ? 'opacity: 1' : ''">400</font></div>
                  <div class="end" :style="counterCosmicCredits>400 ? 'background: '+backgroundColor(400,500) : ''">
                    <img src="/images/icons/rewards.svg"   :style="counterCosmicCredits>=500 ? 'opacity: 1;width: 27px;' : 'opacity: 0.5; width: 27px;'">
                    <font  :style="counterCosmicCredits>=500 ? 'opacity: 1' : ''">500</font>
                    </div>
                </div>
              </div>
            </div>
          </v-card>
        </v-container>
      </v-col>
      <v-col
        :cols="mobile ? 12 : 6"
        class="px-0 pt-0"
        :style="mobile ? '' : 'padding-left: 5px !important'"
      >
        <v-container class="mx-0 pt-0 pl-0">
          <v-card class="justify-content-between m-0 pl-0 pt-1 pb-1 pr-2">
            <div class="form-row mb-0 ml-0 mr-0">
              <div class="col-12 subtitle-1 m-0 p-0">
                <span class="col-12 pl-0" v-if="counterCosmicCredits>=5000">Unlocked Achievements</span>
                <span class="col-12 pl-0" v-else>Goal in Progress</span>

                <div
                  class="col-12 subtitle-1 m-0 p-0"
                  style="
                    padding-right: 30px !important;
                    margin-top: 20px !important;
                  "
                >
                  <span class="col-12 pl-0">
                    <img
                      src="/images/icons/preferred_psychic.svg"
                      style="margin-right: 10px"
                    />
                    Preferred Psychic Rewards
                  </span>
                </div>

                <p class="sfProfileText" style="margin-top: 10px !important">
                  1,000 Cosmic Credits earns you the “preferred psychic” badge
                  on your profile and you’ll be featured in an email blast to
                  all Psychics1on1 clients!
                </p>


                <p class="sfProfileTextSub" v-if="counterCosmicCredits>=1000 && unlocked[1000]">Achieved: {{unlocked[1000]}}</p>

                <div class="d-flex UnlockedAchievements">
                  <div class="ini" :style="counterCosmicCredits>500 ? 'background: '+backgroundColor(500,600) : ''"><font class="col" :style="counterCosmicCredits>=600 ? 'opacity: 1' : ''">600</font></div>
                  <div class="middle" :style="counterCosmicCredits>600 ? 'background: '+backgroundColor(600,700) : ''"><font :style="counterCosmicCredits>=700 ? 'opacity: 1' : ''">700</font></div>
                  <div class="middle" :style="counterCosmicCredits>700 ? 'background: '+backgroundColor(700,800) : ''"><font :style="counterCosmicCredits>=800 ? 'opacity: 1' : ''">800</font></div>
                  <div class="middle" :style="counterCosmicCredits>800 ? 'background: '+backgroundColor(800,900) : ''"><font :style="counterCosmicCredits>=900 ? 'opacity: 1' : ''">900</font></div>
                  <div class="end" :style="counterCosmicCredits>900 ? 'background: '+backgroundColor(900,1000) : ''">
                    <img src="/images/icons/rewards.svg"   :style="counterCosmicCredits>=1000 ? 'opacity: 1;width: 27px;' : 'opacity: 0.5; width: 27px;'">
                    <font  :style="counterCosmicCredits>=1000 ? 'opacity: 1' : ''">1,000</font>
                  </div>
                </div>
                <div
                  class="col-12 subtitle-1 m-0 p-0"
                  style="
                    padding-right: 30px !important;
                    margin-top: 30px !important;
                  "
                >
                  <span class="col-12 pl-0">
                    <img
                      src="/images/icons/top_psychic.svg"
                      style="margin-right: 10px"
                    />
                    Top Psychic Rewards
                  </span>
                </div>

                <p class="sfProfileText" style="margin-top: 10px !important">
                  5,000 Cosmic Credits earns you “Top Psychic” status including
                  a shiny new profile badge and a permanent position on the
                  homepage. You’ll also get a dedicated blog article written
                  about you, special features on all @psychics1on1 social media
                  and a personalized advertising campaign paid for by
                  Psychics1on1!
                </p>

                <p class="sfProfileTextSub" v-if="counterCosmicCredits>=5000 && unlocked[5000]">Achieved: {{unlocked[5000]}}</p>

                <div class="d-flex UnlockedAchievements">
                  <div class="ini" :style="counterCosmicCredits>1000 ? 'background: '+backgroundColor(1000,1500) : ''"><font class="col" :style="counterCosmicCredits>=1500 ? 'opacity: 1' : ''">1,500</font></div>
                  <div class="middle" :style="counterCosmicCredits>1500 ? 'background: '+backgroundColor(1500,2500) : ''"><font :style="counterCosmicCredits>=2500 ? 'opacity: 1' : ''">2,500</font></div>
                  <div class="middle" :style="counterCosmicCredits>2500 ? 'background: '+backgroundColor(2500,3500) : ''"><font :style="counterCosmicCredits>=3500 ? 'opacity: 1' : ''">3,500</font></div>
                  <div class="middle" :style="counterCosmicCredits>3500 ? 'background: '+backgroundColor(3500,4500) : ''"><font :style="counterCosmicCredits>=4500 ? 'opacity: 1' : ''">4,500</font></div>
                  <div class="end" :style="counterCosmicCredits>4500 ? 'background: '+backgroundColor(4500,5000) : ''">
                    <img src="/images/icons/rewards.svg"   :style="counterCosmicCredits>=5000 ? 'opacity: 1;width: 27px;' : 'opacity: 0.5; width: 27px;'">
                    <font  :style="counterCosmicCredits>=5000 ? 'opacity: 1' : ''">5,000</font>
                  </div>
                </div>
              </div>
            </div>
          </v-card>
        </v-container>
      </v-col>
    </v-row>
  </div>
</template>
                              



<script>
import { mapGetters } from "vuex";

export default {
  data: function () {
    return {
      counterReferral: 0,
      counterCosmicCredits: 0,
       tabulator:{
        35:100,
        50:150,
        75:200,
        100:250, 
      },
      unlocked:{
        500:'',
        1000:'',
        5000:'',
      },
    };
  },
  props: ["user"],

  computed: {
    ...mapGetters({
      mobile: "util/mobile",
    }),
  },
    mounted() {

          var i=0;
          for (i = this.user.userReferral.length-1; i >= 0; i--) {

            if(this.user.userReferral[i].action == "Invite Accepted")
            this.counterReferral++;


            if(this.user.userReferral[i].action > 0){

                          this.counterCosmicCredits+=Number(this.tabulator[this.user.userReferral[i].action]);
                          
                          //this.counterCosmicCredits = 550;

                          if((this.counterCosmicCredits>=500)&&(!this.unlocked[500]))
                          this.unlocked[500] = this.user.userReferral[i].date;
                          if((this.counterCosmicCredits>=1000)&&(this.unlocked[500])&&(!this.unlocked[1000]))
                          this.unlocked[1000] = this.user.userReferral[i].date;
                          if((this.counterCosmicCredits>=5000)&&(this.unlocked[500])&&(this.unlocked[1000])&&(!this.unlocked[5000]))
                          this.unlocked[5000] = this.user.userReferral[i].date;

            }

     
            
      
          }


  },

  methods: {

    backgroundColor(range,range2){
      var color = '#C1DBFB';
      var total = range2-range;
      var porcent = ((this.counterCosmicCredits - range) * 100 )/total;

      if(this.counterCosmicCredits<range2)
      color = 'linear-gradient(to left, #f4f4f4 '+(100-porcent)+'% '+(100-porcent)+'% , #C1DBFB '+(100-porcent)+'% )';

      return color;
    }


  },
};
</script>

<style>
.sfProfileText input {
  /* margin-right: 19px; */
  margin-top: 2px;
}

.sfProfileText label {
  font-size: 12px !important;
  line-height: 18px;
  letter-spacing: 0px;
  color: #43425d !important;
  opacity: 1;
  padding-left: 19px;
}

.checkLeftS,
.checkLeftS select,
.checkLeftS .v-input__control,
.checkLeftS .v-select__slot,
.checkLeftS .v-input__slot {
  width: 100px;
  max-width: 100px;
  min-height: 40px !important;
  max-height: 40px;
  height: 40px;
  min-height: 40px;
  background: #f4f4f4 !important;
  border-radius: 5px !important;
  padding: 0px !important;
  opacity: 1 !important;
}

.sfTypeForm label {
  font-size: 12px !important;
  text-align: left;
  line-height: 18px;
  letter-spacing: 0px;
  color: #43425d !important;
  opacity: 0.5;
  padding-left: 10px;
  vertical-align: middle;
}

.sfProfileLinkText {
  letter-spacing: 0px;
  color: #c1dbfb;
  opacity: 1;
  font-weight: 500;
  font-size: 12px;
  line-height: 18px;
}

.sfInputClass.blueLink,
.sfInputClass.blueLink input,
.sfInputClass.blueLink .v-text-field__prefix,
.sfInputClass.blueLink .v-input__control,
.sfInputClass.blueLink .v-text-field__slot,
.sfInputClass.blueLink
  .v-text-field.v-text-field--enclosed.v-text-field--single-line
  .v-text-field__prefix,
.sfInputClass.blueLink
  .v-text-field.v-text-field--enclosed.v-text-field--single-line
  .v-text-field__suffix {
  background: #c1dbfb !important;
  text-align: left !important;
  font-size: 14px !important;
  letter-spacing: 0px !important;
  color: #43425d !important;
  opacity: 1 !important;
  font-weight: 500;
}

.sfInputClass.blueLink .v-text-field__slot {
  padding-left: 10px !important;
}

.sfButtonAction {
  text-align: right !important;
  cursor: pointer !important;
  font-size: 14px !important;
  letter-spacing: 0.28px !important;
  line-height: 18px !important;
  color: #43425d !important;
  opacity: 1 !important;
  font-weight: 500 !important;
}
.sfButtonAction i {
  font-size: 16px;
}
.sfProfileTextSub {
  margin-top: 20px !important;
  font-size: 12px;
  letter-spacing: 0px;
  line-height: 18px;
  text-align: left;
  opacity: 0.5;
  color: #43425d;
  font-weight: 600;
}

.MyBadges {
  width: 105px;
  height: 50px;
  box-shadow: 0px 3px 6px #0000000d;
  border-radius: 10px;
  background: #f4f4f4;
}
.MyBadges div {
  float: left;
}

.MyBadges img {
  opacity: 0.5;
  margin: 13px 10px 13px 10px;
}

.MyBadgesText {
  text-align: left;
  font-weight: 600;
  font-size: 12px;
  letter-spacing: 0px;
  color: #43425d;
  opacity: 0.5;
  margin-top: 17px;
}

.UnlockedAchievements {
  height: 32px;
  width: 340px;
  margin: 0 auto;
      margin-bottom: 10px;
}
.UnlockedAchievements .ini {
  background: #f4f4f4;
  box-shadow: 0px 3px 6px #0000000d;
  border-radius: 18px 0px 0px 18px;
  opacity: 1;
  height: 32px;
  width: 72.5px;
      padding-top: 8px;
      text-align: center;
}
.UnlockedAchievements .middle {
  height: 32px;
  width:  72.5px;
  box-shadow: 0px 3px 6px #0000000d;
  background: #f4f4f4;
      padding-top: 8px;
      text-align: center;
}
.UnlockedAchievements .end {
  width: 50px;
  height: 50px;
  box-shadow: 0px 3px 6px #0000000D;
border-radius: 10px;
  background: #f4f4f4;
  text-align: center;
  margin-top: -10px;
      line-height: 12px;
          padding-top: 4px;
}
.UnlockedAchievements font {
  text-align: left;
  font-weight: 600;
  letter-spacing: 0px;
  color: #43425d;
  opacity: 0.5;
  font-size: 10px;
}
</style>
