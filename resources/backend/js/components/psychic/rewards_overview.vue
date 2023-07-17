<template>
  <div>
    <v-row>
      <v-col cols="12" class="px-0 pt-0">
        <v-container class="mx-0 mt-0 pt-0 pr-0" style="padding-bottom: 20px;">
          <v-card class="referal-message justify-content-between mt-0 pl-0 pt-1 pb-1 pr-0">
            <span>Give $10, Get $10 When You Refer a Friend!</span>
            <p>Share the gift of clarity! Refer a friend and get $10 when they’ve made their first purchase. They’ll get an extra $10 too, when they sign up through your referral link.</p>
            <!-- <div
              v-if="!mobile"
              class="form-row mb-0"
              style="margin-top: 20px !important"
            >
              <div class="col-6 subtitle-1 m-0 p-0">
                <span class="col-12 pl-0">Cosmic Rewards Referral Program</span>
                <p class="sfProfileText" style="margin-top: 20px !important">
                  You’ll earn Cosmic Credits each time a referral makes a
                  qualifying first purchase.
                </p>
              </div>
              <div class="col-6 subtitle-1 m-0 p-0" style="display: flex">
                <box-rewards
                  :status="cosmic[35] ? 'on': 'off'"
                  :value="100"
                  positionbox="first"
                  :marginbox="15"
                  title="Referral Spends $35"
                  
                ></box-rewards>
                <box-rewards
                  :status="cosmic[50] ? 'on': 'off'"
                  :value="150"
                  positionbox="middle"
                  :marginbox="15"
                  title="Referral Spends $50"
                  
                ></box-rewards>
                <box-rewards
                  :status="cosmic[75] ? 'on': 'off'"
                  :value="200"
                  positionbox="middle"
                  :marginbox="15"
                  title="Referral Spends $75"
                  
                ></box-rewards>
                <box-rewards
                  :status="cosmic[100] ? 'on': 'off'"
                  :value="250"
                  positionbox="last"
                  :marginbox="15"
                  title="Referral Spends $100"
                  
                ></box-rewards>
              </div>
            </div> -->
          </v-card>
        </v-container>
      </v-col>
    </v-row>

    <v-row>
      <v-col cols="12" class="px-0">
        <v-container class="mx-0 pt-0 pr-0 pb-0">
          <v-card class="justify-content-between m-0 pl-0 pt-1 pb-1 pr-0">
            <div class="form-row m-0">
              <div v-if="!mobile" class="col-12 subtitle-1 m-0 p-0">
                <v-row>
                  <div :class="mobile ? 'col-12 pr-0' : 'col-6 pr-6'" class="m-0">
                    <div class="row m-0 p-0 mb-5" >
                      <span class="col-12 pl-0">How It Works</span>
                    </div>
                    <div class="row subtitle-1 m-0 p-0">
                      <span class="col-12 pl-0">
                        <img
                          src="/images/icons/email_square.svg"
                          style="margin-right: 10px"
                        />
                        Invite Friends
                      </span>

                      <p class="sfProfileText" style="margin-top: 10px">
                        Share your referral link with friends and family. Copy your referral url and share, or send them an invite email directly from your dashboard.
                      </p>
                    </div>
                    
                  <div class="row subtitle-1 m-0 p-0">
                      <span class="col-12 pl-0">
                        <img
                          src="/images/icons/money_square.svg"
                          style="margin-right: 10px"
                        />
                        Earn Cosmic Cash
                      </span>

                      <p class="sfProfileText" style="margin-top: 10px">
                        We’ll add $10 to your account each time a referral makes their first purchase! The more you refer, the more you earn.
                      </p>
                    </div>
                  </div>

                  <div :class="mobile ? 'col-12 pr-0' : 'col-6 pr-6'" class="m-0">
                    <div class="row subtitle-1 m-0 p-0">
                      <span class="col-12 pl-0">
                        <img
                          src="/images/icons/gift _card_square.svg"
                          style="margin-right: 10px"
                        />
                        Give the Gift of Clarity
                      </span>

                      <p class="sfProfileText" style="margin-top: 10px">
                        Anyone who joins Psychics1on1 using your link will receive $10 towards their first reading.
                      </p>
                    </div>
                    <div class="row subtitle-1 m-0 p-0" >
                      <span class="col-12 pl-0">
                        <img
                          src="/images/icons/promote_square.svg"
                          style="margin-right: 10px"
                        />
                        Share on Social
                      </span>

                      <p class="sfProfileText" style="margin-top: 10px">
                        Post your invite link on social media, websites, blogs, or anywhere your network can find you.
                      </p>
                    </div>

                    <div class="roow subtitle-1 m-0 p-0" >
                      <span class="col-12 pl-0">
                        <img
                          src="/images/icons/track_square.svg"
                          style="margin-right: 10px"
                        />
                        Track Progress
                      </span>

                      <p class="sfProfileText" style="margin-top: 10px">
                        Keep track of your signups and completed referrals right from your referral dashboard.
                      </p>
                    </div>
                      
                      <!-- <div
                        :class="mobile ? 'col-12' : 'col-6'"
                        class="subtitle-1 m-0 p-0"
                        :style="!mobile ? 'padding-left: 30px !important' : ''"
                      >
                        <span class="col-12 pl-0">
                          <img
                            src="/images/icons/money_square.svg"
                            style="margin-right: 10px"
                          />
                          Earn Fee-Free
                        </span>

                        <p class="sfProfileText" style="margin-top: 10px">
                          Keep 100% when your referrals spend with you for 30
                          days. That’s right, referral earnings are fee-free for
                          an entire month!
                        </p>
                      </div> -->
                  </div>
                </v-row>

                <!-- <div class="col-12 subtitle-1 m-0 p-0">
                  <div
                    class="form-row m-0"
                    :style="!mobile ? 'margin-top: 20px !important' : ''"
                  >
                    <div
                      :class="mobile ? 'col-12' : 'col-6'"
                      class="subtitle-1 m-0 p-0"
                      :style="!mobile ? 'padding-right: 30px !important' : ''"
                    >
                      <span class="col-12 pl-0">
                        <img
                          src="/images/icons/track_square.svg"
                          style="margin-right: 10px"
                        />
                        Track Progress
                      </span>

                      <p class="sfProfileText" style="margin-top: 10px">
                        Keep track of your signups and completed referrals right
                        from your referral dashboard.
                      </p>
                    </div>
                    <div
                      :class="mobile ? 'col-12' : 'col-6'"
                      class="subtitle-1 m-0 p-0"
                      :style="!mobile ? 'padding-left: 30px !important' : ''"
                    >
                      <span class="col-12 pl-0">
                        <img
                          src="/images/icons/credits_square.svg"
                          style="margin-right: 10px"
                        />
                        Collect Cosmic Credits
                      </span>

                      <p class="sfProfileText" style="margin-top: 10px">
                        You’ll get Cosmic Credits each time your referrals spend
                        on Psychics1on1. Cash in your accumulated credits for
                        big Cosmic Rewards!
                      </p>
                    </div>
                  </div>
                </div> -->
              </div>

              <div v-else class="col-12 subtitle-1 m-0 p-0">
                <div class="form-row m-0">
                  <span class="col-12 pl-0">How It Works</span>
                </div>
                <div class="form-row m-0" style="margin-top: 20px !important">
                  <div
                    :class="mobile ? 'col-12' : 'col-6'"
                    class="subtitle-1 m-0 p-0"
                    :style="
                      !mobile ? 'padding-right: 30px !important' : ''
                    "
                  >
                    <span class="col-12 pl-0">
                      <img
                        src="/images/icons/email_square.svg"
                        style="margin-right: 10px"
                      />
                      Invite Clients
                    </span>

                    <p class="sfProfileText" style="margin-top: 10px">
                      Refer clients, friends and family to sign up through your
                      personal invite link.
                    </p>
                  </div>
                  <div
                    :class="mobile ? 'col-12' : 'col-6'"
                    class="subtitle-1 m-0 p-0"
                    :style="!mobile ? 'padding-right: 30px !important' : ''"
                  >
                    <span class="col-12 pl-0">
                      <img
                        src="/images/icons/promote_square.svg"
                        style="margin-right: 10px"
                      />
                      Share on Social
                    </span>

                    <p class="sfProfileText" style="margin-top: 10px">
                      Post your invite link on social media, websites, blogs, or
                      anywhere clients can find you.
                    </p>
                  </div>

                  <div
                    :class="mobile ? 'col-12' : 'col-6'"
                    class="subtitle-1 m-0 p-0"
                    :style="!mobile ? 'padding-right: 30px !important' : ''"
                  >
                    <span class="col-12 pl-0">
                      <img
                        src="/images/icons/track_square.svg"
                        style="margin-right: 10px"
                      />
                      Track Progress
                    </span>

                    <p class="sfProfileText" style="margin-top: 10px">
                      Keep track of your signups and completed referrals right
                      from your referral dashboard.
                    </p>
                  </div>

                  <div
                    :class="mobile ? 'col-12' : 'col-6'"
                    class="col-6 subtitle-1 m-0 p-0"
                    :style="
                      !mobile ? 'padding-left: 30px !important' : ''
                    "
                  >
                    <span class="col-12 pl-0">
                      <img
                        src="/images/icons/gift _card_square.svg"
                        style="margin-right: 10px"
                      />
                      Referral Perks
                    </span>

                    <p class="sfProfileText" style="margin-top: 10px">
                      Anyone who joins Psychics1on1 using your link will receive
                      up to $10 free with first qualifying purchase!
                    </p>
                  </div>

                  <div
                    :class="mobile ? 'col-12' : 'col-6'"
                    class="subtitle-1 m-0 p-0"
                    :style="!mobile ? 'padding-left: 30px !important' : ''"
                  >
                    <span class="col-12 pl-0">
                      <img
                        src="/images/icons/money_square.svg"
                        style="margin-right: 10px"
                      />
                      Earn Fee-Free
                    </span>

                    <p class="sfProfileText" style="margin-top: 10px">
                      Keep 100% when your referrals spend with you for 30 days.
                      That’s right, referral earnings are fee-free for an entire
                      month!
                    </p>
                  </div>
                  <div
                    :class="mobile ? 'col-12' : 'col-6'"
                    class="subtitle-1 m-0 p-0"
                    :style="!mobile ? 'padding-left: 30px !important' : ''"
                  >
                    <span class="col-12 pl-0">
                      <img
                        src="/images/icons/credits_square.svg"
                        style="margin-right: 10px"
                      />
                      Collect Cosmic Credits
                    </span>

                    <p class="sfProfileText" style="margin-top: 10px">
                      You’ll get Cosmic Credits each time your referrals spend
                      on Psychics1on1. Cash in your accumulated credits for big
                      Cosmic Rewards!
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </v-card>
        </v-container>
      </v-col>
    </v-row>

    <v-row v-if="mobile">
      <v-col cols="12" class="px-0 pt-0">
        <v-container class="mx-0 pt-0 pr-0 pt-0" style="padding-top: 20px !important">
          <v-card class="justify-content-between m-0 pl-0 pt-0 pb-0 pr-0">
            <div class="form-row mb-0">
              <div class="col-12 subtitle-1 m-0 p-0">
                <span class="col-12 pl-0">How To Earn Cosmic Credits</span>
                <p class="sfProfileText" style="margin-top: 20px !important">
                  You’ll earn Cosmic Credits each time a referral makes a
                  qualifying first purchase.
                </p>
              </div>
              <div class="col-12 subtitle-1 m-0 p-0" style="display: flex">
              <box-rewards
                  :status="cosmic[35] ? 'on': 'off'"
                  :value="100"
                  positionbox="first"
                  :marginbox="15"
                  title="Referral Spends $35"
                  
                ></box-rewards>
                <box-rewards
                  :status="cosmic[50] ? 'on': 'off'"
                  :value="150"
                  positionbox="middle"
                  :marginbox="15"
                  title="Referral Spends $50"
                  
                ></box-rewards>
                <box-rewards
                  :status="cosmic[75] ? 'on': 'off'"
                  :value="200"
                  positionbox="middle"
                  :marginbox="15"
                  title="Referral Spends $75"
                  
                ></box-rewards>
                <box-rewards
                  :status="cosmic[100] ? 'on': 'off'"
                  :value="250"
                  positionbox="last"
                  :marginbox="15"
                  title="Referral Spends $100"
                  
                ></box-rewards>
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
      cosmic: {
        35:0,
        50:0,
        75:0,
        100:0, 
      },
       tabulator:{
        35:100,
        50:150,
        75:200,
        100:250, 
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
          for (i = 0; i < this.user.userReferral.length; i++) {
            

            if(this.user.userReferral[i].action == "Invite Accepted")
            this.counterReferral++;
            if(this.user.userReferral[i].action > 0){
            this.counterCosmicCredits+=Number(this.tabulator[this.user.userReferral[i].action]);
            this.cosmic[this.user.userReferral[i].action]=Number(this.tabulator[this.user.userReferral[i].action]);
            }
      
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
</style>
<style lang="scss" scoped>
.referal-message {
  background: linear-gradient(90deg, rgb(201, 132, 154) 0%, rgb(201, 132, 154) 51%, rgb(104, 99, 123) 100%);
  color: white;
  span {
    font-weight: 400;
    font-size: 16px;
    margin-bottom: 20px;
    display: block;
    letter-spacing: 0.28px;
  }
  p {
    font-weight: 400;
    font-size: 13px;
  }
}
</style>