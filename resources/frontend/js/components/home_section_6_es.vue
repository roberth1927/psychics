<template>
    <section class="sixthSection" style="background: #43425D;">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="sixthSecContainer">
                        <h3 style="text-transform: capitalize;">Eres Psíquico? Unete a Nuestra Red</h3>
                        <h4>Conéctate, Apoya Y Obtén Ganancias En Tus Términos.</h4>
                        <a @click.prevent="openSignUpPopUp()" class="ctaBtn applyBtnMob mt-6" v-if="$vuetify.breakpoint.xsOnly">Aplica Hoy</a>
                        <a href="#" @click.prevent="openSignUpPopUp" class="ctaBtn mt-6 applyBtn" style="margin: auto;" v-if="!$vuetify.breakpoint.xsOnly">Aplica Hoy</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

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
                EventBus.$emit('open_sign_up',  {});
            },
            loadUser(){

            }
        }
    }
</script>


<style scoped>
@media only screen and (max-width: 991.98px) {
    .sixthSecContainer h4{
        line-height: initial;        
    }
}
</style>