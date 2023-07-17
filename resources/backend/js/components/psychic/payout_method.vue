<template>
  <div>
    <v-row>
      <v-col
        :cols="mobile ? 12 : 6"
        class="px-0 pt-0"
        :style="mobile ? '' : ''"
      >
        <v-container class="mx-0 pt-0 pr-0">
          <v-card class="justify-content-between m-0 pl-0 pt-1 pb-1 pr-2">
            <div class="form-row mb-0 ml-0 mr-0" :class="mobile ? 'pr-2' : ''">
              <div
                class="col-12 subtitle-1 m-0 p-0"
                style="padding-bottom: 10px !important"
              >
                <span class="col-12 pl-0">Payout Account</span>
              </div>

              <div class="col-12 subtitle-1 m-0 p-0" v-if="Object.entries(card).length">
                <v-card
                  class="mb-3 text-center pt-5 sfHeadersPayout"
                  style="
                    margin-inline-start: auto;
                    padding: 10px !important;
                    max-width: 100%;
                    max-height: 136px;
                    height: 136px;
                    background: #ebf4fd;
                  "
                >
                  <div>
                    <div class="sfHeaderBalance">{{ card.bank_name }}</div>
                    <div
                      class="sfHeaderTitle"
                      style="text-transform: capitalize"
                    >
                      {{ card.account_type }} Account
                    </div>
                    <div class="sfHeaderPeriod">
                      {{ card.account.replace("XXXXXXXXXX", "**********") }}
                    </div>
                    <div
                      class="sfHeaderIco"
                      style="bottom: 10px; position: absolute; right: 10px"
                    >
                      <img src="/images/icons/BanksquareActive.svg" />
                    </div>
                  </div>
                </v-card>
                <div style="float: right">
                  <a
                    class="removeLanguage"
                    @click="f_delete_deposit_account(card,true)"
                  >
                    Remove
                    <i class="fas fa-minus ml-3 ico-profile-delete"></i>
                  </a>
                </div>
              </div>

              <div class="col-12 subtitle-1 m-0 p-0" v-else>
                <v-card
                  class="mb-3 text-center pt-5 sfHeadersPayout"
                  style="
                    margin-inline-start: auto;
                    padding: 10px !important;
                    max-width: 100%;
                    max-height: 136px;
                    height: 136px;
                    background: #F4F4F4;
                  "
                >
                  <div>
                    <div class="sfHeaderBalance" style="color:#C7C7C7">Currently Empty</div>
                    <div
                      class="sfHeaderTitle"
                      style="text-transform: capitalize; color:#C7C7C7"
                    >
                      Add Bank Account
                    </div>
                    
                    <div
                      class="sfHeaderIco"
                      style="bottom: 10px; position: absolute; right: 10px"
                    >
                      <img src="/images/icons/BanksquareInactive.svg" />
                    </div>
                  </div>
                </v-card>
              </div>
            </div>
          </v-card>
        </v-container>
      </v-col>
      <v-col
        :cols="mobile ? 12 : 6"
        class="px-0 pt-0"
        :style="mobile ? '' : 'padding-left: 10px !important'"
      >
        <v-container class="mx-0 pt-0 sfFormPayout" :class="mobile ? 'p-0' : ''">
          <v-card class="justify-content-between m-0" :class="mobile ? '' : 'pl-0 pt-1 pb-1 pr-2'">
              <div :style="!mobile ? '' : 'padding-left: 10px;'">
              
                <div class="row subtitle-1">
                  <span class="col-12 " style="padding-bottom: 20px"
                    >Add Bank Account</span
                  >
                   
                  <v-btn
                    class="sfProfileSave"
                    style="position: absolute;top: 13px;right: 30px;"
                    color="#fff"
                    small
                    max-width="1"
                    @click.native.stop="add_deposit_account()"
                    :loading="loading"
                    :disabled="loading"
                    
                  >
                    Save

                    <img
                      src="/images/icons/save_inactive.svg"
                      style="margin-left: 5px !important; margin-right: -5px"
                    />
                  </v-btn>
                
                </div>

               

                <div class="row m-0" style="margin-top: 20px !important">
                  <div
                    class="p-0 col-6"
                    style="margin-bottom: 10px"
                  >
                    <v-text-field
                      id="bank_name"
                      placeholder="Bank Name"
                      solo
                      dense
                      hide-details
                      filled
                      flat
                      class="sfInputClass"
                      prepend-icon="ico-bank-name"
                      v-model="obj_account.bank_name"
                    ></v-text-field>

                    <span
                      v-if="obj_error.bank_name"
                      class="float-left text-danger small"
                      >Bank Name is required</span>
                  </div>
                  <div class="col-1 p-0"> </div>
                  <div
                    class="col-5 p-0"
                    style="margin-bottom: 10px"
                  >
                    <v-select
                      v-model="obj_account.address_country"
                      :items="countries"
                      item-text="name"
                      item-value="id"
                      label="Select"
                      filled
                      append-icon="ico-sort-arrows"
                      :menu-props="{ contentClass: 'checkList-line' }"
                      :class="{ invalid: obj_error.address_country }"
                      class="checkRigth"
                      dense
                      hide-details
                      solo
                      :height="32"
                      disabled
                    ></v-select>

                    <span
                      v-if="errors['address_country']"
                      class="float-left text-danger small"
                      >{{ errors["address_country"][0] }}</span>
                  </div>
                </div>

                <div class="row m-0">
                  <div class="col-12 p-0" style="margin-bottom: 10px" >
                    <v-text-field
                      id="first_name"
                      placeholder="Account Holder’s First Name"
                      solo
                      dense
                      hide-details
                      filled
                      flat
                      class="sfInputClass"
                      prepend-icon="ico-profile-finger"
                      v-model="obj_account.first_name"
                    ></v-text-field>
                    <span
                      v-if="obj_error.first_name"
                      class="float-left text-danger small"
                      >Account Holder’s First Name is required</span
                    >
                  </div>
                </div>

                <div class="row m-0">
                  <div class="col-12 p-0" style="margin-bottom: 10px">
                    <v-text-field
                      id="last_name"
                      placeholder="Account Holder’s Last Name"
                      solo
                      dense
                      hide-details
                      filled
                      flat
                      class="sfInputClass"
                      prepend-icon="ico-profile-finger"
                      v-model="obj_account.last_name"
                    ></v-text-field>
                    <span
                      v-if="obj_error.last_name"
                      class="float-left text-danger small"
                      >Account Holder’s Last Name is required</span>
                  </div>
                </div>

                <div class="row m-0">
                  <div class="col-12 p-0" style="margin-bottom: 10px">
                    <div
                      class="custom-control custom-radio custom-control-inline"
                    >
                      <input
                        v-model="obj_account.account_type"
                        value="checking"
                        checked
                        type="radio"
                        id="checking"
                        name="account_type"
                        class="custom-control-input"
                      />
                      <label
                        :class="{
                          rselected: obj_account.account_type === 'checking',
                          runselected: obj_account.account_type !== 'checking',
                        }"
                        class="custom-control-label"
                        for="checking"
                        >Checking</label
                      >
                    </div>
                    <div
                      class="custom-control custom-radio custom-control-inline"
                    >
                      <input
                        v-model="obj_account.account_type"
                        value="savings"
                        type="radio"
                        id="savings"
                        name="account_type"
                        class="custom-control-input"
                      />
                      <label
                        :class="{
                          rselected: obj_account.account_type === 'savings',
                          runselected: obj_account.account_type !== 'savings',
                        }"
                        class="custom-control-label"
                        for="savings"
                        >Savings</label
                      >
                    </div>
                  </div>
                </div>

                <div class="row m-0">
                  <div class="col-12 p-0" style="margin-bottom: 10px">
                    <v-text-field
                      id="account_number"
                      placeholder="Account Number"
                      solo
                      dense
                      hide-details
                      filled
                      flat
                      class="sfInputClass"
                      prepend-icon="ico-profile-inactive"
                      v-model="obj_account.account_number"
                    ></v-text-field>
                    <span
                      v-if="obj_error.account_number"
                      class="float-left text-danger small"
                      >Account Number is required</span>
                      <span
                      v-if="errors['account_number']"
                      class="float-left text-danger small"
                      >{{ errors["account_number"][0] }}</span>
                  </div>
                </div>

                <div class="row m-0">
                  <div class="col-12 p-0" style="margin-bottom: 10px">
                    <v-text-field
                      id="routing_number"
                      placeholder="Routing Number"
                      solo
                      dense
                      hide-details
                      filled
                      flat
                      class="sfInputClass"
                      prepend-icon="ico-profile-inactive"
                      v-model="obj_account.routing_number"
                    ></v-text-field>
                   <span
                      v-if="obj_error.routing_number"
                      class="float-left text-danger small"
                      >Routing Number is required</span>
                    <span
                      v-if="errors['routing_number']"
                      class="float-left text-danger small"
                      >{{ errors["routing_number"][0] }}</span>

                  </div>
                </div>
              
            </div>
          </v-card>
        </v-container>
      </v-col>
    </v-row>


     <v-dialog v-model="dialog_message" scrollable :max-width="dialog.msn ? '335px':'450px'" >
    <v-card class="px-4" :style="dialog.msn ? 'background: #F0F0F8' : ''">
      <v-card-title v-if="dialog.msn" class="message_title pt-10" >
        <font style="text-align: center;width: 100%;">{{dialog.msn}}</font>
        </v-card-title>
      <v-subheader class="" style="position: absolute; right: 0">
        <v-icon
          class="d-block text-right"
          style="position: absolute; right: 15px; z-index: 9"
          @click="dialog.dialog_message = false"
          >mdi-close
        </v-icon>
      </v-subheader>
      <v-subheader
        class="message"
        :class="dialog.content ? 'mb-5' : 'mb-5'"
        :style="!dialog.msn ? 'margin-top: 35px !important;'+'font-size:' + dialog.font : 'font-size: 14px; color: #656B72;  font-weight: 500;text-align: center; '"
        >{{ dialog.message }}
        <div v-if="dialog.message_title == 'appointment'" style="display: initial">
          {{ dialog.font }}
          <a href="/dashboard/appointments">Appointments</a>
        </div>



          <p v-if="dialog.content" class="text-grey-darker text-2xl md:text-3xl font-light mb-8 leading-normal" style="opacity: 0.5; margin-top: 20px;text-align: center;">
                        {{ dialog.content }}
          </p>
      </v-subheader>

      <div class="text-center mb-8"     :class="dialog.content ? 'mt-14' : ''">
        <v-btn
          type="button"
          depressed
          rounded
          @click="dialog_message = false"
          color="primary"
          v-if="!dialog.msn"
        >
          OK
        </v-btn>


        <v-btn
          type="button"
          depressed
          rounded
          @click="addDepositConfirm()"
          color="primary"
          v-if="dialog.message_title == 'CONFIRM'"
        >
          Confirm
        </v-btn>




      </div>
    </v-card>
  </v-dialog>
  </div>
</template>

<script>
import { mapGetters } from "vuex";
function getData() {
  return {
    dialog_message: false,
    message: "",
    message_title: "",
    loading: false,
    tab_in_use: "payout_method",
    edit: false,
    obj_account: {
      method: "DEPOSIT",
      checkname: null,
      first_name: null,
      last_name: null,
      bank_name: null,
      account_type: "checking",
      routing_number: null,
      account_number: null,
      address_country: 232,
      paypal_account: "",
    },
     dialog : { 
        color_title: "red",
        message: "",
        content: "",
        message_title: "",
        credits: "",
        font: "",
        msn: false
    },
    sending_method: false,
    successfully_method_added: false,
    obj_error: {
      method: "DEPOSIT",
      checkname: null,
      bank_name: null,
      account_type: "checking",
      routing_number: null,
      account_number: null,
      address_country: "",
      paypal_account: null,
    },
    errors: [],
    card: this.cards,
    old: this.cards,
  };
}
export default {
  name: "payou_method",
  props: ["user", "countries", "cards"],
  data: getData,
  methods: {
    f_edit_deposit_account() {
      if (this.card.payment === "DEPOSIT") {
        this.obj_account.address_country = this.card.country;
        this.obj_account.bank_name = this.card.bank_name;
        this.obj_account.checkname = this.card.account_name;
        this.obj_account.account_type = this.card.account_type;
        this.obj_account.routing_number = this.card.routing;
        this.obj_account.account_number = this.card.account;
        this.obj_account.method = this.card.payment;
      } else {
        this.obj_account.paypal_account = this.card.account;
        this.account_type = "";
        this.obj_account.account = this.card.account;
        this.obj_account.method = "PAYPAL";
      }
      this.edit = true;
    },
    f_delete_account(card) {
      
        let type = "DEPOSIT";
        axios
          .delete("/api/v1/user/account/card", {
            params: {
              card_type: type,
              biller: card.id,
            },
          })
          .then((response) => {
              this.send_new_depossit_account();
          });
    
    },
      f_delete_deposit_account(card,msn) {
      if (this.obj_account.method.toUpperCase() === "PAYPAL") {
        this.f_delete_paypal_account();
        this.f_reset_data();
        this.card = [];
      } else {
        let type = "DEPOSIT";
        this.loading = true;
        axios
          .delete("/api/v1/user/account/card", {
            params: {
              card_type: type,
              biller: card.id,
            },
          })
          .then((response) => {
            
              this.f_reset_data();
              this.card = [];
              
              if(msn)
              this.$root.$emit("open_dialog_message", {
                message: response.data.success,
                message_title: "SUCCESS",
              });
            
          })
          .catch((error) => {
            this.loading = false;
            if (error.response.status === 400) {
              this.message = error.response.data.error;
            } else {
              this.message = error.response.data.message;
            }
            this.$root.$emit("open_dialog_message", {
              message: this.message,
              message_title: "ERROR",
            });
          });
      }
    },
    f_reset_data() {
      Object.assign(this.$data, this.$options.data.call(this));
    },
    getDepositAccount(type) {
      axios
        .get("/api/v1/user/account/cards", {
          params: {
            card_type: type,
          },
        })
        .then((response) => {
          this.card = response.data;
        })
        .catch((error) => {
          this.message = error;
        });
    },
    send_edit_deposit_account() {
      axios
        .put("/api/v1/user/account/payout", {
          checkname:
            this.obj_account.first_name + " " + this.obj_account.last_name,
          account_type: this.obj_account.account_type,
          bank_name: this.obj_account.bank_name,
          routing_number: this.obj_account.routing_number,
          account_number: this.obj_account.account_number,
          address_country: this.obj_account.address_country,
          billing_id: this.card.id,
        })
        .then((response) => {
          this.loading = false;
          this.$root.$emit("open_dialog_message", {
            message: response.data.success,
            message_title: "SUCCESS",
          });
          this.f_reset_data();
          this.card = [];
          this.getDepositAccount("DEPOSIT");
        })
        .catch((error) => {
          this.loading = false;
          if (error.response.status === 400) {
            this.message = error.response.data.error;
          } else {
            this.message = "Please update your account details and try again";
          }
          this.$root.$emit("open_dialog_message", {
            message: this.message,
            message_title: "ERROR",
          });
        });
    },
    send_new_depossit_account() {
      this.loading = true;
      if (this.edit) {
        if (this.obj_account.method === "PAYPAL") {
          this.f_save_paypal_account();
        } else {
          this.send_edit_deposit_account();
        }
      } else {
      
      
    
        axios
          .post("/api/v1/user/account/depositAccount", {
            checkname:
              this.obj_account.first_name + " " + this.obj_account.last_name,
            account_type: this.obj_account.account_type,
            bank_name: this.obj_account.bank_name,
            routing_number: this.obj_account.routing_number,
            account_number: this.obj_account.account_number,
            address_country: this.obj_account.address_country,
          })
          .then((response) => {
            this.loading = false;
            this.$root.$emit("open_dialog_message", {
              message: response.data.success,
              message_title: "SUCCESS",
            });
            this.f_reset_data();
            this.card = [];
            this.getDepositAccount("DEPOSIT");
          })
          .catch((error) => {
            this.loading = false;
            if (error.response.status === 400) {
              this.message = error.response.data.error;
              this.errors = error.response.data.errors;
            } else {
              this.message = error.response.data.message;
              this.errors = error.response.data.errors;
            }
            this.$root.$emit("open_dialog_message", {
              message: this.message,
              message_title: "ERROR",
            });
          });
      }
    },
    addDepositConfirm(){
          this.dialog_message = false;
          this.f_delete_account(this.card);
    },


    add_deposit_account(e) {
      if (this.obj_account.method === "DEPOSIT") {
        
        
        if (this.check_form(e)) {
              if (this.card.id) {
                  
                  
                  this.dialog.message = "You are about to change your payout bank account.";
                  this.dialog.message_title = "CONFIRM";
                  this.dialog.msn = "Are You Sure?";
                  this.dialog_message = true;

                  
                }
                if(!this.card.id)
                this.send_new_depossit_account();
            
          
        }
      } else {
        this.obj_error.paypal_account = !this.obj_account.paypal_account;
        if (this.obj_error.paypal_account) {
          return;
        }
        this.f_save_paypal_account();
      }
    },
    f_save_paypal_account() {
      this.loading = true;
      axios
        .post("/api/v1/user/account/paypal", {
          email: this.obj_account.paypal_account,
        })
        .then((response) => {
          if (this.edit) {
            this.$root.$emit("open_dialog_message", {
              message: "Your PayPal account was updated",
              message_title: "SUCCESS",
            });
            this.card.account = this.obj_account.paypal_account;
            this.edit = false;
          } else {
            this.card.account = this.obj_account.paypal_account;
            this.card.account_type = "PAYPAL";
            this.$root.$emit("open_dialog_message", {
              message: response.data.success,
              message_title: "SUCCESS",
            });
          }
          this.loading = false;
          //EventBus.$emit('open_dialog_message',{});
        })
        .catch((error) => {
          this.loading = false;
          //this.edit =false;
          if (error.response.status === 400) {
            this.message = error.response.data.error;
          } else {
            this.message =
              "Your PayPal account could not be added. " +
              error.response.data.message;
          }
          this.$root.$emit("open_dialog_message", {
            message: this.message,
            message_title: "ERROR",
          });
          //EventBus.$emit('open_dialog_message',{});
        });
    },
    f_delete_paypal_account() {
      this.loading = true;
      axios
        .delete("/api/v1/user/account/paypal", {
          email: this.obj_account.paypal_account,
        })
        .then((response) => {
          this.loading = false;
          this.card = [];
          this.obj_account.method = "DEPOSIT";
          this.$root.$emit("open_dialog_message", {
            message: response.data.success,
            message_title: "SUCCESS",
          });
        })
        .catch((error) => {
          if (error.response.status === 400) {
            this.message = error.response.data.error;
          } else {
            this.message = "Your payment method could not be removed. ";
          }
          this.$root.$emit("open_dialog_message", {
            message: this.message,
            message_title: "ERROR",
          });
        });
    },
    checkField(e) {
      if (typeof e.currentTarget != "undefined") {
        switch (e.currentTarget.id) {
          case "address_country":
            if (e.currentTarget.value !== "United States") {
              this.obj_account.method = "PAYPAL";
            }
            this.obj_error.address_country = !this.obj_account.address_country;
            break;
          case "checkname":
            this.obj_error.checkname = !this.obj_account.checkname;
            break;
          case "bank_name":
            this.obj_error.checkname = !this.obj_account.checkname;
            break;
          case "routing_number":
            this.obj_error.routing_number = !this.obj_account.routing_number;
            break;
          case "account_number":
            this.obj_error.account_number = !this.obj_account.account_number;
            break;
          case "paypal_account":
            this.obj_error.paypal_account = !this.obj_account.paypal_account;
            break;
          default:
        }
      } else {
        console.log(e);
        if (e !== 232) this.obj_account.method = "PAYPAL";
        this.obj_error.address_country = !this.obj_account.address_country;
      }
    },
    check_form(e) {
      this.obj_error.address_country = !this.obj_account.address_country;
      this.obj_error.checkname = !this.obj_account.first_name;
      this.obj_error.bank_name = !this.obj_account.bank_name;
      this.obj_error.first_name = !this.obj_account.first_name;
      this.obj_error.last_name = !this.obj_account.last_name;
      this.obj_error.routing_number = !this.obj_account.routing_number;
      this.obj_error.account_number = !this.obj_account.account_number;
      this.obj_error.method = !this.obj_account.method;
      this.obj_error.account_type = !this.obj_account.account_type;
      if (
        this.obj_error.address_country ||
        this.obj_error.method ||
        this.obj_error.bank_name ||
        this.obj_error.checkname ||
        this.obj_error.first_name ||
        this.obj_error.last_name ||
        this.obj_error.account_type ||
        this.obj_error.routing_number ||
        this.obj_error.account_number
      ) {
        return false;
      }
      return true;
    },
  },
  created() {
    // this.getDepositAccount('DEPOSIT');
    //  this.finished = true;
  },
  computed: {
    ...mapGetters({
      mobile: "util/mobile",
    }),
  },
  mounted() {},
};
</script>

<style type="text/css" scoped>
.sfFormPayout .sfInputClass,
.sfFormPayout .checkRigth{
    max-width: 100% !important;
    width: 100% !important;
}
.custom-select:focus {
  /*   border-color: #9390DE; */
  outline: 0;
  box-shadow: none;
}
#address_country {
  text-align-last: left;
  text-align: left !important;
  min-height: 32px !important;
  color: #8e8d99 !important;
  font-size: 12px !important;
  background: #f0f0f7 url("/images/icons/sort.svg") no-repeat right;
  border: none !important;
}
#address_country option {
  padding: 10px !important;
  border-bottom: 1px solid #fff;
}
.rselected {
  filter: blur(0.5);
}
.runselected {
  color: #cfd5db !important;
}
.custom-control-input:checked ~ .custom-control-label::before {
  border-color: #a163c1;
  background-color: #a163c1;
}
.label_text {
  color: #1f1e34 !important;
}
.rselected:hover,
.runselected:hover,
input[type="radio"]:hover {
  cursor: pointer;
}
.btnSave {
  padding: 0.6rem 25px !important;
  border-radius: 22px !important;
  color: #1f1e34 !important;
}
.v-tabs .v-tab {
  font-size: 20px;
}
.tabs_xs {
  font-size: 18px !important;
}
.v-dialog__content--active {
  opacity: 1 !important;
  -webkit-backdrop-filter: blur(10px);
  backdrop-filter: blur(10px);
}
</style>