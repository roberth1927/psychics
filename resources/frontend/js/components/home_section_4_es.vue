<template>
<section class="thirdSectionHeading thirdSectionHeading-about" style="background: #fff">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="thirdSectionHeadingContainer thirdSectionHeadingContainerEs">
                    <p>
                        En Psychics1on1™, disfrutarás de lecturas personales y respuestas reales de los mejores psíquicos, médiums, sanadores y astrólogos del mundo que están siempre disponibles para conectarse contigo. Nuestros clientes no dejan de elogiar las respuestas precisas y profundas que reciben cuando más las necesitan. Además, siempre te sentirás seguro con total privacidad en cada lectura. 
                        <br><br>
                        Las primeras lecturas psíquicas pueden ser intimidantes, por eso hemos hecho que nuestra galería de confiables asesores espirituales sea lo más transparente posible antes de que te decidas por un psíquico para tu primera lectura. Puedes ver las calificaciones de nuestros clientes reales, las biografías, los vídeos introductorios personalizados y mucho más para que te sientas lo más cómodo posible antes de pulsar enviar.
                    </p>
                    <a @click.prevent="openSignUpPopUp()" class="ctaBtn applyBtnMob mt-5" v-if="$vuetify.breakpoint.xsOnly">Regístrese Gratis</a>
                    <a @click="openSignUpPopUp()" class="ctaBtn applyBtn mt-5" style="margin: auto; " v-if="!$vuetify.breakpoint.xsOnly">Regístrese Gratis</a>
                    
                </div>
            </div>
        </div>
    </div>
</section>
    <!-- <section class="fourthSection">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="fourthSecContainer">
                        <h3>Why we’re Better</h3>
                        <div class="fourthSecItemContainer">
                            <div class="fItemContainer">
                                <div class="iconContainer">
                                    <img src="/images/icons/easy-access.png" alt="Easy Access" class="img-fluid">
                                </div>
                                <div class="fitemContent">
                                    <h5>Easy Access</h5>
                                    <p>Our user-friendly platform makes it easy to get started and simple to find
                                        exactly what you’re looking for.</p>
                                </div>
                            </div>

                            <div class="fItemContainer">
                                <div class="iconContainer">
                                    <img src="/images/icons/flexibility.png" alt="Total Flexibility" class="img-fluid">
                                </div>
                                <div class="fitemContent">
                                    <h5>Total Flexibility</h5>
                                    <p>Forget long wait times and hard-to-get appointments. Log on with one click from
                                        anywhere in the world, as often as you want.</p>
                                </div>
                            </div>

                            <div class="fItemContainer">
                                <div class="iconContainer">
                                    <img src="/images/icons/empowered.png" alt="Empowered Connections" class="img-fluid">
                                </div>
                                <div class="fitemContent">
                                    <h5>Empowered Connections</h5>
                                    <p>Through direct, 1:1 conversations you’ll gain more clarity and deeper
                                        understandings of what matters most to you.</p>
                                </div>
                            </div>
                        </div>
                        <a @click.prevent="openSignUpPopUp()" class="ctaBtn">Sign Up for Free</a>
                    </div>
                </div>
            </div>
        </div>
    </section> -->

</template>
<script>
    export default {
        props: ['user', 'guest'],
        data: function () {
            return {
                loading: true,
                errors: [],
                signupDialog: false,
            }
        },
        mounted() {
            this.loadUser();
        },
        ready() {
            this.loadUser();
        },

        methods: {
            openSignUpPopUp(){
                EventBus.$emit('open_sign_up_user',  {});
            },
            loadUser(){

            }
        }
    }
</script>