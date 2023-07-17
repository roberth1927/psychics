<template>
    <div>
        <div class="footer blue white--text container-fluid mt-0">
            <v-container >
                <v-row >
                    <v-col cols="12" md="4" class="pt-2 pb-4">                        
                        <v-divider color="white" style="border: 1px solid; width: 70%"></v-divider>
                        <p class="text-white pb d-none d-md-inline-block" style="font-weight: 600;">Get Resources</p>
                        <p class="text-white pb d-md-none" style="font-weight: 600; font-size: 14px">Get Resources</p>
                        <div style="margin-top: 23px;" :style="$vuetify.breakpoint.xs ? guest ? 'height: 269px;' : 'height: 235px;' : 'height: 322px'">
                        <p style="margin-top: 10px"><a href="/about" class="text-white"  style="font-weight: 600; font-size: 14px; text-decoration: none">About</a></p>
                        <p style="margin-top: 10px"><a href="/blog" class="text-white"  style="font-weight: 600; font-size: 14px; text-decoration: none">Blog</a></p>
                        <p style="margin-top: 10px"><a href="/press" class="text-white" style="font-weight: 600; font-size: 14px; text-decoration: none">Press</a></p>
                        <p style="margin-top: 10px"><a class="text-white" href="/privacy-policy" style="font-weight: 600; font-size: 14px; text-decoration: none">Privacy</a></p>
                        <p style="margin-top: 10px"><a class="text-white" href="/dmca-policy" style="font-weight: 600; font-size: 14px; text-decoration: none">DMCA</a></p>
                        <p style="margin-top: 10px"><a class="text-white" href="/payment-terms" style="font-weight: 600; font-size: 14px; text-decoration: none">Payment Terms</a></p>
                        <p style="margin-top: 10px"><a class="text-white" href="/terms" style="font-weight: 600; font-size: 14px; text-decoration: none">
                          Terms of Service
                         </a></p>
                        <p style="margin-top: 10px" v-if="guest"><a href="#" @click.prevent="f_sign_up" class="text-white" style="font-weight: 600; font-size: 14px; text-decoration: none">Psychic Apply</a></p>
                        <!-- <p style="margin-top: 10px"><a href="#"  class="text-white" style="font-weight: 600; font-size: 14px; text-decoration: none">Annual Report</a></p> -->
                        </div>
                        <v-divider class="d-none d-md-inline-block" color="white" style="border: 1px solid; width: 70%"></v-divider>
                        <p class="text-white pb d-none d-md-inline-block" style="font-weight: 600;">Psychics Abilities</p>
                        <div class="d-flex" v-if="!$vuetify.breakpoint.xs">
                            <div style="margin-top: 23px">
                                <p style="margin-top: 10px"><a href="/abilities/medium" class="text-white d-none d-md-inline-block"  style="font-weight: 600; font-size: 10px; text-decoration: none">Medium</a></p>
                                <p style="margin-top: 10px"><a href="/abilities/astrology" class="text-white d-none d-md-inline-block"  style="font-weight: 600; font-size: 10px; text-decoration: none">Astrologer</a></p>
                                <p style="margin-top: 10px"><a href="/abilities/tarot-card-reading" class="text-white d-none d-md-inline-block"  style="font-weight: 600; font-size: 10px; text-decoration: none">Tarot Card Reader</a></p>
                                <p style="margin-top: 10px"><a href="/abilities/palm-reading" class="text-white d-none d-md-inline-block"  style="font-weight: 600; font-size: 10px; text-decoration: none">Palm Reader</a></p>
                                <p style="margin-top: 10px"><a href="/abilities/clairvoyant" class="text-white d-none d-md-inline-block"  style="font-weight: 600; font-size: 10px; text-decoration: none">Clairvoyant</a></p>
                                <p style="margin-top: 10px"><a href="/abilities/spiritual-healer" class="text-white d-none d-md-inline-block"  style="font-weight: 600; font-size: 10px; text-decoration: none">Spiritual Healer</a></p>
                            </div>


                            <div class="d-none d-md-inline-block" style="margin-top: 23px; padding-left: 5rem;">
                                <p style="margin-top: 10px"><a href="/abilities/empath" class="text-white"  style="font-weight: 600; font-size: 10px; text-decoration: none">Empath</a></p>
                                <p style="margin-top: 10px"><a href="/abilities/clairaudient" class="text-white"  style="font-weight: 600; font-size: 10px; text-decoration: none">Clairaudient</a></p>
                                <p style="margin-top: 10px"><a href="/abilities/clairsentient" class="text-white"  style="font-weight: 600; font-size: 10px; text-decoration: none">Clairsentient</a></p>
                            </div>
                        </div>
                    </v-col>
                    <v-col cols="12" md="4" class="pt-2 pb-4">
                        <v-divider color="white" style="border: 1px solid; width: 70%"></v-divider>
                        <p class="text-white pb d-none d-md-inline-block" style="font-weight: 600;">Get Social</p>
                        <p class="text-white pb d-md-none" style="font-weight: 600; font-size: 14px">Get Social</p>

                        <div style="margin-top: 23px">
                             <a href="https://www.instagram.com/psychics1on1/" target="_blank" >
                             <!-- <v-icon class="mr-3" color="white">mdi-instagram</v-icon> -->
                             <img src="/images/icons/instagram-square-brands-footer.svg" />
                            </a>

                            <a href="https://www.facebook.com/Psychics1on1/" target="_blank" class="mx-3">
                            <!-- <v-icon class="mr-3" color="white">mdi-facebook-box</v-icon> -->
                            <img src="/images/icons/facebook-square-brands-footer.svg" />
                            </a>                                                        

                              <a href="https://twitter.com/psychics1on1/" target="_blank" class="mr-3">
                           <!-- <v-icon color="white">mdi-twitter</v-icon> -->
                           <img src="/images/icons/twitter-square-brands-footer.svg" />
                            </a>

                            <a href="https://www.linkedin.com/company/psychics1on1/about/" target="_blank" >
                             <!-- <v-icon class="mr-3" color="white">mdi-linkedin-box</v-icon> -->
                             <img src="/images/icons/linkedin-brands-footer.svg" />
                            </a>
                            
                            
 
                           
                        </div>
                        <div  :style="{ 'margin-top': guest ? '297px' : '297px' }"  class="d-none d-md-inline-block">
                        <v-divider class="d-none d-md-inline-block" color="white" style="border: 1px solid; width: 70%"></v-divider>
                        <p class="text-white pb d-none d-md-inline-block" style="font-weight: 600;">Psychics Specialties</p>
                        <div class="d-flex">
                            <div style="margin-top: 23px">
                                <p style="margin-top: 10px"><a href="/search?category=career-finances" class="text-white"  style="font-weight: 600; font-size: 10px; text-decoration: none">Career & Finances</a></p>
                                <p style="margin-top: 10px"><a href="/search?category=friendships-family" class="text-white"  style="font-weight: 600; font-size: 10px; text-decoration: none">Friendships & Family</a></p>
                                <p style="margin-top: 10px"><a href="/search?category=dream-interpreting" class="text-white"  style="font-weight: 600; font-size: 10px; text-decoration: none">Dream Interpreting</a></p>
                                <p style="margin-top: 10px"><a href="/search?category=finding-lost-items" class="text-white"  style="font-weight: 600; font-size: 10px; text-decoration: none">Finding Lost Items</a></p>
                                <p style="margin-top: 10px"><a href="/search?category=grieving-loss" class="text-white"  style="font-weight: 600; font-size: 10px; text-decoration: none">Grieving & Loss</a></p>
                            </div>

                            <div style="margin-top: 23px; padding-left: 5rem;">
                                <p style="margin-top: 10px"><a href="/search?category=past-life" class="text-white"  style="font-weight: 600; font-size: 10px; text-decoration: none">Past Life Discovery</a></p>
                                <p style="margin-top: 10px"><a href="/search?category=love-relationships" class="text-white"  style="font-weight: 600; font-size: 10px; text-decoration: none">Love & Relationships</a></p>
                                <p style="margin-top: 10px"><a href="/search?category=money-prosperity" class="text-white"  style="font-weight: 600; font-size: 10px; text-decoration: none">Money & Prosperity</a></p>
                                <p style="margin-top: 10px"><a href="/search?category=life-path-destiny" class="text-white"  style="font-weight: 600; font-size: 10px; text-decoration: none">Life Path & Destiny</a></p>
                            </div>
                        </div>
                        </div>
                    </v-col>
                    <v-col cols="12" md="4" class="pt-2 pb-4">
                        <v-divider color="white" style="border: 1px solid; width: 70%"></v-divider>
                        <p class="text-white pb d-none d-md-inline-block" style="font-weight: 600;">Get Help</p>
                        <p class="text-white pb d-md-none" style="font-weight: 600; font-size: 14px">Get Help</p>

                        <div style="margin-top: 23px">
                            <a href="https://psychics1on1.zendesk.com/hc/en-us" target="_blank" class="mr-3">
                           <!-- <v-icon class="mr-3" color="white">mdi-help</v-icon> -->
                            <img src="/images/icons/interrogation-footer.svg" />
                            </a>
                            
                            <a href=" https://psychics1on1.zendesk.com/hc/en-us/requests/new" target="_blank" >
                            <!-- <v-icon color="white">mdi-email</v-icon> -->
                            <img src="/images/icons/mail-footer.svg" />
                            </a>
                           
                        </div>
                        <div  :style="{ 'margin-top': guest ? '297px' : '297px' }" class="d-none d-md-inline-block">
                        <v-divider class="d-none d-md-inline-block" color="white" style="border: 1px solid; width: 70%"></v-divider>
                        <p class="text-white pb d-none d-md-inline-block" style="font-weight: 600;">Horoscopes</p>
                        <div class="d-flex">
                            <div style="margin-top: 23px">
                                <p style="margin-top: 10px"><a href="/horoscope/aries" class="text-white"  style="font-weight: 600; font-size: 10px; text-decoration: none">Aries</a></p>
                                <p style="margin-top: 10px"><a href="/horoscope/taurus" class="text-white"  style="font-weight: 600; font-size: 10px; text-decoration: none">Taurus</a></p>
                                <p style="margin-top: 10px"><a href="/horoscope/gemini" class="text-white"  style="font-weight: 600; font-size: 10px; text-decoration: none">Gemini</a></p>
                                <p style="margin-top: 10px"><a href="/horoscope/cancer" class="text-white"  style="font-weight: 600; font-size: 10px; text-decoration: none">Cancer</a></p>
                                <p style="margin-top: 10px"><a href="/horoscope/leo" class="text-white"  style="font-weight: 600; font-size: 10px; text-decoration: none">Leo</a></p>
                            </div>

                            <div style="margin-top: 23px; padding-left: 5rem;">
                                <p style="margin-top: 10px"><a href="/horoscope/virgo" class="text-white"  style="font-weight: 600; font-size: 10px; text-decoration: none">Virgo</a></p>
                                <p style="margin-top: 10px"><a href="/horoscope/libra" class="text-white"  style="font-weight: 600; font-size: 10px; text-decoration: none">Libra</a></p>
                                <p style="margin-top: 10px"><a href="/horoscope/scorpio" class="text-white"  style="font-weight: 600; font-size: 10px; text-decoration: none">Scorpio</a></p>
                                <p style="margin-top: 10px"><a href="/horoscope/sagittarius" class="text-white"  style="font-weight: 600; font-size: 10px; text-decoration: none">Sagittarius</a></p>
                                <p style="margin-top: 10px"><a href="/horoscope/capricorn" class="text-white"  style="font-weight: 600; font-size: 10px; text-decoration: none">Capricorn</a></p>
                            </div>

                            <div style="margin-top: 23px; padding-left: 5rem;">
                                <p style="margin-top: 10px"><a href="/horoscope/aquarius" class="text-white"  style="font-weight: 600; font-size: 10px; text-decoration: none">Aquarius</a></p>
                                <p style="margin-top: 10px"><a href="/horoscope/pisces" class="text-white"  style="font-weight: 600; font-size: 10px; text-decoration: none">Pieces</a></p>
                            </div>
                        </div>
                        </div>
                    </v-col>
                </v-row>
                
                <!-- <v-row class="text-center text-white d-block h6">
                © Copyright {{ year }} Psychics1on1, LLC
                </v-row>
                <v-row class="text-center text-white d-block h6 small">
                    This site is protected by reCAPTCHA and the Google
                    <a href="https://policies.google.com/privacy" class="text-white">Privacy Policy</a> and
                    <a href="https://policies.google.com/terms" class="text-white">Terms of Service</a> apply.
                </v-row> -->

            </v-container>
    </div>
    <v-row>
        <v-col class="pl-0 pr-0">
            <div style="background: #43425D 0% 0% no-repeat padding-box; display:flex; justify-content:center;height: 40px;">
                <p class="text-white" :class="!$vuetify.breakpoint.xs ? 'pt-2' : 'pt-3'" style="font-weight: 600;" :style="{'font-size': !$vuetify.breakpoint.xs ? '14px' : '12px'}">© Copyright 2023. All Right Reserved</p>
            </div>
        </v-col>
    </v-row>
    </div>
</template>

<script>    
    export default {
        data: () => ({
          signupDialog:false,
            year: 2020,
        }),
        props: ['guest', 'home'],
         methods:{
             
             f_open_login(){
                 EventBus.$emit('open_login',  {});
             },
             f_sign_up(){
                 EventBus.$emit('open_sign_up',  {});
             },
              f_sign_up_user(){
                 EventBus.$emit('open_sign_up_user',  {});
             },

         },
         mounted() {

            var now_date=new Date();

            this.year = now_date.getFullYear();




         },
        
        
        }
 
</script>


