<template>
    <div>
        <div class="footer blue white--text container-fluid mt-0">
            <v-container >
                <v-row class="">
                    <v-col cols="12" md="4" class="pt-2 pb-4">                        
                        <v-divider color="white" style="border: 1px solid; width: 70%"></v-divider>
                        <p class="text-white pb d-none d-md-inline-block" style="font-weight: 600;">Obtenga Información</p>
                        <p class="text-white pb d-md-none" style="font-weight: 600; font-size: 14px">Obtenga Información</p>
                        <div style="margin-top: 23px">
                        <!-- <p style="margin-top: 10px"><a href="/about" class="text-white"  style="font-weight: 600; font-size: 14px; text-decoration: none">Sobre</a></p> -->
                        <p style="margin-top: 10px"><a href="/blog" class="text-white"  style="font-weight: 600; font-size: 14px; text-decoration: none">Blog</a></p>
                        <p style="margin-top: 10px"><a href="/press" class="text-white" style="font-weight: 600; font-size: 14px; text-decoration: none">Prensa</a></p>
                        <p style="margin-top: 10px"><a class="text-white" href="/privacy-policy" style="font-weight: 600; font-size: 14px; text-decoration: none">Política de Privacidad</a></p>
                        <p style="margin-top: 10px"><a class="text-white" href="/dmca-policy" style="font-weight: 600; font-size: 14px; text-decoration: none">DMCA</a></p>
                        <p style="margin-top: 10px"><a class="text-white" href="/payment-terms" style="font-weight: 600; font-size: 14px; text-decoration: none">Términos de Pago</a></p>
                        <p style="margin-top: 10px"><a class="text-white" href="/terms" style="font-weight: 600; font-size: 14px; text-decoration: none">Términos de Servicio</a></p>
                        <p style="margin-top: 10px" v-if="guest"><a href="#" @click.prevent="f_sign_up" class="text-white" style="font-weight: 600; font-size: 14px; text-decoration: none">Aplique Aquí</a></p>
                        <!-- <p style="margin-top: 10px" v-if="guest"><a href="#" @click.prevent="f_sign_up" class="text-white d-none d-md-inline-block" style="font-weight: 600; font-size: 14px; text-decoration: none">Annual Report</a></p> -->
                        <!-- <p style="margin-top: 10px"><a href="#"  class="text-white" style="font-weight: 600; font-size: 14px; text-decoration: none">Annual Report</a></p> -->
                        </div>
                        <v-divider class="d-none d-md-inline-block" color="white" style="border: 1px solid; width: 70%"></v-divider>
                        <p class="text-white pb d-none d-md-inline-block" style="font-weight: 600;">Habilidades de Psíquicos</p>
                        <div class="d-flex">
                            <div style="margin-top: 23px">
                                <p style="margin-top: 10px"><a href="/search?ability=medium" class="text-white d-none d-md-inline-block"  style="font-weight: 600; font-size: 10px; text-decoration: none">Medium</a></p>
                                <p style="margin-top: 10px"><a href="/search?ability=astrology" class="text-white d-none d-md-inline-block"  style="font-weight: 600; font-size: 10px; text-decoration: none">Astrólogo</a></p>
                                <p style="margin-top: 10px"><a href="/search?ability=tarot-card-reading" class="text-white d-none d-md-inline-block"  style="font-weight: 600; font-size: 10px; text-decoration: none">Lector de cartas del Tarot</a></p>
                                <p style="margin-top: 10px"><a href="/search?ability=palm-reading" class="text-white d-none d-md-inline-block"  style="font-weight: 600; font-size: 10px; text-decoration: none">Lector de palmas</a></p>
                                <p style="margin-top: 10px"><a href="/search?ability=clairvoyant" class="text-white d-none d-md-inline-block"  style="font-weight: 600; font-size: 10px; text-decoration: none">Clarividente</a></p>
                                <p style="margin-top: 10px"><a href="/search?ability=spiritual-healer" class="text-white d-none d-md-inline-block"  style="font-weight: 600; font-size: 10px; text-decoration: none">Sanador espiritual</a></p>
                            </div>


                            <div class="d-none d-md-inline-block" style="margin-top: 23px; padding-left: 5rem;">
                                <p style="margin-top: 10px"><a href="/search?ability=empath" class="text-white"  style="font-weight: 600; font-size: 10px; text-decoration: none">Empático</a></p>
                                <p style="margin-top: 10px"><a href="/search?ability=clairaudient" class="text-white"  style="font-weight: 600; font-size: 10px; text-decoration: none">Clariaudiente</a></p>
                                <p style="margin-top: 10px"><a href="/search?ability=clairsentient" class="text-white"  style="font-weight: 600; font-size: 10px; text-decoration: none">Clarisentiente</a></p>
                            </div>
                        </div>
                    </v-col>
                    <v-col cols="12" md="4" class="pt-2 pb-4">
                        <v-divider color="white" style="border: 1px solid; width: 70%"></v-divider>
                        <p class="text-white pb d-none d-md-inline-block" style="font-weight: 600;">Foros Sociales</p>
                        <p class="text-white pb d-md-none" style="font-weight: 600; font-size: 14px">Foros Sociales</p>

                        <div style="margin-top: 23px">
                             <a href="https://www.instagram.com/psychics1on1/">
                             <!-- <v-icon class="mr-3" color="white">mdi-instagram</v-icon> -->
                             <img src="/images/icons/instagram-square-brands-footer.svg" />
                            </a>

                            <a href="https://www.facebook.com/Psychics1on1/" class="mx-3">
                            <!-- <v-icon class="mr-3" color="white">mdi-facebook-box</v-icon> -->
                            <img src="/images/icons/facebook-square-brands-footer.svg" />
                            </a>                                                        

                              <a href="https://twitter.com/psychics1on1/" class="mr-3">
                           <!-- <v-icon color="white">mdi-twitter</v-icon> -->
                           <img src="/images/icons/twitter-square-brands-footer.svg" />
                            </a>

                            <a href="https://www.linkedin.com/company/psychics1on1/about/">
                             <!-- <v-icon class="mr-3" color="white">mdi-linkedin-box</v-icon> -->
                             <img src="/images/icons/linkedin-brands-footer.svg" />
                            </a>
                            
                            
 
                           
                        </div>
                        <div  :style="{ 'margin-top': guest ? '255px' : '255px' }"  class="d-none d-md-inline-block">
                        <v-divider class="d-none d-md-inline-block" color="white" style="border: 1px solid; width: 70%"></v-divider>
                        <p class="text-white pb d-none d-md-inline-block" style="font-weight: 600;">Especialidades de Psíquicos</p>
                        <div class="d-flex">
                            <div style="margin-top: 23px">
                                <p style="margin-top: 10px"><a href="/search?category=career-finances" class="text-white"  style="font-weight: 600; font-size: 10px; text-decoration: none">Carrera y finanzas</a></p>
                                <p style="margin-top: 10px"><a href="/search?category=friendships-family" class="text-white"  style="font-weight: 600; font-size: 10px; text-decoration: none">Amistades y familia</a></p>
                                <p style="margin-top: 10px"><a href="/search?category=dream-interpreting" class="text-white"  style="font-weight: 600; font-size: 10px; text-decoration: none">Interpretación de los sueños</a></p>
                                <p style="margin-top: 10px"><a href="/search?category=finding-lost-items" class="text-white"  style="font-weight: 600; font-size: 10px; text-decoration: none">Encontrar objetos perdidos</a></p>
                                <p style="margin-top: 10px"><a href="/search?category=grieving-loss" class="text-white"  style="font-weight: 600; font-size: 10px; text-decoration: none">Duelo y pérdida</a></p>
                            </div>

                            <div style="margin-top: 23px; padding-left: 5rem;">
                                <p style="margin-top: 10px"><a href="/search?category=past-life" class="text-white"  style="font-weight: 600; font-size: 10px; text-decoration: none">Descubrimiento de vidas pasadas</a></p>
                                <p style="margin-top: 10px"><a href="/search?category=love-relationships" class="text-white"  style="font-weight: 600; font-size: 10px; text-decoration: none">Amor y relaciones</a></p>
                                <p style="margin-top: 10px"><a href="/search?category=money-prosperity" class="text-white"  style="font-weight: 600; font-size: 10px; text-decoration: none">Dinero y prosperidad</a></p>
                                <p style="margin-top: 10px"><a href="/search?category=life-path-destiny" class="text-white"  style="font-weight: 600; font-size: 10px; text-decoration: none">Camino de la vida y destino</a></p>
                            </div>
                        </div>
                        </div>
                    </v-col>
                    <v-col cols="12" md="4" class="pt-2 pb-4">
                        <v-divider color="white" style="border: 1px solid; width: 70%"></v-divider>
                        <p class="text-white pb d-none d-md-inline-block" style="font-weight: 600;">Contáctenos</p>
                        <p class="text-white pb d-md-none" style="font-weight: 600; font-size: 14px">Contáctenos</p>

                        <div style="margin-top: 23px">
                            <a href="https://psychics1on1.zendesk.com/hc/en-us" class="mr-3">
                           <!-- <v-icon class="mr-3" color="white">mdi-help</v-icon> -->
                            <img src="/images/icons/interrogation-footer.svg" />
                            </a>
                            
                            <a href=" https://psychics1on1.zendesk.com/hc/en-us/requests/new">
                            <!-- <v-icon color="white">mdi-email</v-icon> -->
                            <img src="/images/icons/mail-footer.svg" />
                            </a>
                           
                        </div>
                        <div  :style="{ 'margin-top': guest ? '255px' : '255px' }" class="d-none d-md-inline-block">
                        <v-divider class="d-none d-md-inline-block" color="white" style="border: 1px solid; width: 70%"></v-divider>
                        <p class="text-white pb d-none d-md-inline-block" style="font-weight: 600;width:70%">Horóscopo</p>
                        <div class="d-flex">
                            <div style="margin-top: 23px">
                                <p style="margin-top: 10px"><a href="/horoscope/aries" class="text-white"  style="font-weight: 600; font-size: 10px; text-decoration: none">Aries</a></p>
                                <p style="margin-top: 10px"><a href="/horoscope/taurus" class="text-white"  style="font-weight: 600; font-size: 10px; text-decoration: none">Tauro</a></p>
                                <p style="margin-top: 10px"><a href="/horoscope/gemini" class="text-white"  style="font-weight: 600; font-size: 10px; text-decoration: none">Géminis</a></p>
                                <p style="margin-top: 10px"><a href="/horoscope/cancer" class="text-white"  style="font-weight: 600; font-size: 10px; text-decoration: none">Cáncer</a></p>
                                <p style="margin-top: 10px"><a href="/horoscope/leo" class="text-white"  style="font-weight: 600; font-size: 10px; text-decoration: none">Leo</a></p>
                            </div>

                            <div style="margin-top: 23px; padding-left: 5rem;">
                                <p style="margin-top: 10px"><a href="/horoscope/virgo" class="text-white"  style="font-weight: 600; font-size: 10px; text-decoration: none">Virgo</a></p>
                                <p style="margin-top: 10px"><a href="/horoscope/libra" class="text-white"  style="font-weight: 600; font-size: 10px; text-decoration: none">Libra</a></p>
                                <p style="margin-top: 10px"><a href="/horoscope/scorpio" class="text-white"  style="font-weight: 600; font-size: 10px; text-decoration: none">Escorpio</a></p>
                                <p style="margin-top: 10px"><a href="/horoscope/sagittarius" class="text-white"  style="font-weight: 600; font-size: 10px; text-decoration: none">Sagitario</a></p>
                                <p style="margin-top: 10px"><a href="/horoscope/capricorn" class="text-white"  style="font-weight: 600; font-size: 10px; text-decoration: none">Capricornio</a></p>
                            </div>

                            <div style="margin-top: 23px; padding-left: 5rem;">
                                <p style="margin-top: 10px"><a href="/horoscope/aquarius" class="text-white"  style="font-weight: 600; font-size: 10px; text-decoration: none">Capricornio</a></p>
                                <p style="margin-top: 10px"><a href="/horoscope/pisces" class="text-white"  style="font-weight: 600; font-size: 10px; text-decoration: none">Piscis</a></p>
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
