<template>
  <v-dialog v-model="dialog_message" scrollable max-width="450px">
    <v-card class="px-4">
      <!-- <v-card-title :style="{color:color()}" class="message_title py-8">{{message_title}}</v-card-title> -->
      <v-subheader class="" style="position: absolute; right: 0">
        <v-icon
          class="d-block text-right"
          style="position: absolute; right: 15px; z-index: 9"
          @click="dialog_message = false"
          >mdi-close
        </v-icon>
      </v-subheader>
      <v-subheader
        class="message"
        :class="content ? 'mb-5' : 'mb-10'"
        :style="content ? 'margin-top: 35px !important;'+'font-size:' + this.font : 'margin-top: 65px !important'"
        >{{ message }}
        <div v-if="message_title == 'appointment'" style="display: initial">
          {{ this.font }}
          <a href="/dashboard/appointments">Appointments</a>
        </div>
          <p v-if="content" class="text-grey-darker text-2xl md:text-3xl font-light mb-8 leading-normal" style="opacity: 0.5; margin-top: 20px;">
                        {{ content }}
          </p>
      </v-subheader>

      <div class="text-center mb-8"     :class="content ? 'mt-14' : ''">
        <v-btn
          type="button"
          depressed
          rounded
          @click="dialog_message = false"
          color="primary"
        >
          OK
        </v-btn>
      </div>
    </v-card>
  </v-dialog>
</template>

<script>
export default {
  name: "c_message",
  data() {
    return {
      dialog_message: false,
      color_title: "red",
      message: "",
      content: "",
      message_title: "",
      credits: "",
      font: "",
    };
  },

  mounted() {
    this.$root.$on("open_dialog_message", (data) => {
      this.message_title = data.message_title;

      if (typeof data.message !== "string" || data.message === "") {
        this.message = "Please update your card details and try again.";
      } else {
        this.message = data.message;
        this.content = data.content;
      }

      if (this.message_title == "PURCHASE") {
        this.track(data);
      }
      if (this.message_title == "unsubscribe") {
        this.font = "14px";
      }
      this.dialog_message = true;
    });
  },
  ready() {
    //EventBus.$on('open_dialog_message', () => this.dialog_message = true);
  },
  methods: {
    color() {
      switch (this.message_title) {
        case "ERROR":
          this.color_title = "#f77f98";
          break;
        case "SUCCESS":
          this.color_title = "#2cc05f";
          break;
        case "INFORMATION":
          this.color_title = "#bebeec";
          break;
        
        case "unsubscribe":
          this.color_title = "#2cc05f";
          break;
        default:
          break;
      }
      return this.color_title;
    },

    track(data) {
      // console.log(data.purchase);
      // this.$gtag.purchase({
      //   transaction_id: data.purchase.id,
      //   affiliation: "Psychics1on1 Purchase",
      //   value: data.purchase.credits,
      // });

      var dataLayer  = window.dataLayer || [];
          dataLayer.push({
            'event': 'transaction',
            'userRole': 'Client',
            'ecommerce': {
              'purchase': {
                'actionField': {
                  'id': data.purchase.id,            // would be better to be sku from erp.
                  'revenue': data.purchase.credits,     // mandatory that the value to be separated with dots not with commas      
                  'tax':'0.00',
                  'shipping': '0.00',
                  'coupon': '' //needs to be filled if coupon is used on the entire order
                },
                'products': [{
                  'name': 'Psychics1on1 Purchase',   
                  'id': data.purchase.id,
                  'price': data.purchase.credits,
                  'brand': 'Psychics1on1',
                  'category': 'Payments',
                  'quantity': 1,
                  'coupon': ''  
                }]
              }
            }
          });

    },
  },
};
</script>

<style scoped>
.message_title {
  font-size: 30px !important;
  text-align: center;
  font-weight: 600;
  display: block;
}
.message {
  /* display: block; */
  text-align: center;
  font-size: 20px;
  display: inline;
}
</style>