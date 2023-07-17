<template>
  <div>
    <v-row class="sfTaxForms mt-0">
      <v-col cols="12" class="px-0 mt-0">
        <v-container :class="mobile ? 'm-0 p-0' : 'mx-0'">
          <v-card class="justify-content-between m-1 mt-0 pl-0 pt-1 pb-1 pr-2">
            <div class="form-row mb-0 mt-0">
              <div
                class="subtitle-1 m-0 p-0"
                :class="mobile ? 'col-12' : 'col-6'"
              >
                <div class="row" style="margin-bottom: 20px">
                  <span class="col-6">Tax Form 1099-NEC</span>
                  <div></div>
                </div>
                <div v-if="mobile" class="row">
                  <p class="col-12 sfProfileText">
                    To download a copy of your Tax Form 1099-NEC, select your
                    tax year and complete the form with the same information you
                    use to file your tax returns.
                  </p>
                </div>

                <div
                  class="col-lg-12 col-md-12 p-0 m-0"
                  style="margin-bottom: 10px !important"
                >
                  <div class="row">
                    <div class="col-6 pr-0">
                      <v-select
                        id="year"
                        :items="years"
                        label="Select Tax Year"
                        filled
                        dense
                        flat
                        hide-details
                        item-value="code"
                        item-text="name"
                        solo
                        append-icon="ico-sort-arrows"
                        v-model="user_form.year"
                        class="checkRigth"
                        :menu-props="{ contentClass: 'checkList-line' }"
                        @change="activeDownload"
                      >
                      </v-select>
                    </div>
                  </div>
                </div>

                <div v-if="mobile" class="row">
                  <div
                    class="col-12"
                    style="margin-top: 10px; margin-bottom: 20px"
                  >
                    <div
                      class="custom-control custom-radio custom-control-inline"
                    >
                      <input
                        style="opacity: 1"
                        v-model="picked"
                        value="1"
                        checked
                        type="radio"
                        id="individual"
                        name="account_type"
                        class="custom-control-input"
                        @click="activeDownload"
                      />
                      <label
                        style="
                          opacity: 1;
                          color: #43425d !important;
                          font-size: 12px !important;
                          padding-top: 3px;
                        "
                        :class="{
                          rselected: picked === '1',
                          runselected: picked !== '1',
                        }"
                        class="custom-control-label"
                        for="individual"
                      >
                        <font
                          :style="picked == 2 ? 'opacity: 0.5' : 'opacity: 1'"
                        >
                          Individual
                        </font>
                      </label>
                    </div>
                    <div
                      class="custom-control custom-radio custom-control-inline"
                    >
                      <input
                        style="opacity: 1"
                        v-model="picked"
                        value="2"
                        type="radio"
                        id="corporation"
                        name="account_type"
                        class="custom-control-input"
                        @click="activeDownload"
                      />
                      <label
                        style="
                          opacity: 1;
                          color: #43425d !important;
                          font-size: 12px !important;
                          padding-top: 3px;
                        "
                        :class="{
                          rselected: picked === '2',
                          runselected: picked !== '2',
                        }"
                        class="custom-control-label number_shown"
                        for="corporation"
                      >
                        <font
                          :style="picked == 1 ? 'opacity: 0.5' : 'opacity: 1'"
                        >
                          Corporation</font
                        >
                      </label>
                    </div>
                  </div>
                </div>

                <div
                  v-if="picked == 1"
                  class="col-12"
                  :class="mobile ? 'pl-0 pr-0' : 'pl-0'"
                  style="margin-bottom: 10px"
                >
                  <v-text-field
                    id="first_name"
                    placeholder="Legal First Name"
                    solo
                    dense
                    hide-details
                    filled
                    flat
                    class="sfInputClass"
                    prepend-icon="ico-profile-finger"
                    @change="activeDownload"
                    v-model="user_form.first_name"
                  ></v-text-field>

                  <span
                    v-if="errors['first_name']"
                    class="float-left text-danger small"
                    >{{ errors["first_name"][0] }}</span
                  >
                </div>

                <div
                  v-if="picked == 2"
                  class="col-12"
                  :class="mobile ? 'pl-0 pr-0' : 'pl-0'"
                  style="margin-bottom: 10px"
                >
                  <v-text-field
                    id="business_name"
                    placeholder="Legal Business Name"
                    solo
                    dense
                    hide-details
                    filled
                    flat
                    class="sfInputClass"
                    prepend-icon="ico-profile-business"
                    v-model="user_form.business_name"
                    @change="activeDownload"
                  ></v-text-field>

                  <span
                    v-if="errors['business_name']"
                    class="float-left text-danger small"
                    >{{ errors["business_name"][0] }}</span
                  >
                </div>
                <div
                  v-if="picked == 1"
                  class="col-12"
                  :class="mobile ? 'pl-0 pr-0' : 'pl-0'"
                  style="margin-bottom: 10px"
                >
                  <v-text-field
                    id="last_name"
                    placeholder="Legal Last Name"
                    solo
                    dense
                    hide-details
                    filled
                    flat
                    class="sfInputClass"
                    prepend-icon="ico-profile-finger"
                    v-model="user_form.last_name"
                    @change="activeDownload"
                  ></v-text-field>

                  <span
                    v-if="errors['last_name']"
                    class="float-left text-danger small"
                    >{{ errors["last_name"][0] }}</span
                  >
                </div>

                <div
                  v-if="picked == 2"
                  class="col-12"
                  :class="mobile ? 'pl-0 pr-0' : 'pl-0'"
                  style="margin-bottom: 10px"
                >
                  <v-text-field
                    id="tax_id"
                    placeholder="Tax ID"
                    solo
                    dense
                    hide-details
                    filled
                    flat
                    class="sfInputClass"
                    prepend-icon="ico-profile-inactive"
                    v-model="user_form.tax_id"
                    @change="activeDownload"
                    v-mask="'##-#######'"
                  ></v-text-field>

                  <span
                    v-if="errors['tax_id']"
                    class="float-left text-danger small"
                    >{{ errors["tax_id"][0] }}</span
                  >
                </div>
                <div
                  v-if="picked == 1"
                  class="col-12"
                  :class="mobile ? 'pl-0 pr-0' : 'pl-0'"
                  style="margin-bottom: 10px"
                >
                  <v-text-field
                    id="ssn"
                    placeholder="Social Security Number"
                    solo
                    dense
                    max="10"
                    hide-details
                    filled
                    flat
                    class="sfInputClass"
                    prepend-icon="ico-profile-inactive"
                    v-model="user_form.ssn"
                    @change="activeDownload"
                    v-mask="'###-##-####'"
                  ></v-text-field>

                  <span
                    v-if="errors['ssn']"
                    class="float-left text-danger small"
                    >{{ errors["ssn"][0] }}</span
                  >
                </div>
                <div
                  class="col-12"
                  :class="mobile ? 'pl-0 pr-0' : 'pl-0'"
                  style="margin-bottom: 10px"
                >
                  <v-text-field
                    id="address"
                    placeholder="Address"
                    solo
                    dense
                    hide-details
                    filled
                    flat
                    class="sfInputClass"
                    prepend-icon="ico-profile-city"
                    v-model="user_form.address"
                    @change="activeDownload"
                  ></v-text-field>

                  <span
                    v-if="errors['address']"
                    class="float-left text-danger small"
                    >{{ errors["address"][0] }}</span
                  >
                </div>
                <div
                  v-if="picked == 2"
                  class="col-12"
                  :class="mobile ? 'pl-0 pr-0' : 'pl-0'"
                  style="margin-bottom: 10px"
                >
                  <v-text-field
                    id="address_2"
                    placeholder="Address 2"
                    solo
                    dense
                    hide-details
                    filled
                    flat
                    class="sfInputClass"
                    prepend-icon="ico-profile-city"
                    v-model="user_form.address_2"
                    @change="activeDownload"
                  ></v-text-field>

                  <span
                    v-if="errors['address_2']"
                    class="float-left text-danger small"
                    >{{ errors["address_2"][0] }}</span
                  >
                </div>
                <div
                  class="col-12"
                  :class="mobile ? 'pl-0 pr-0' : 'pl-0'"
                  style="margin-top: 10px !important"
                >
                  <div class="row m-0">
                    <div class="col-6 pr-0 pl-0">
                      <v-text-field
                        id="city"
                        label="City"
                        style="max-width: 171px"
                        solo
                        flat
                        dense
                        hide-details
                        filled
                        type="tel"
                        class="sfInputClass"
                        prepend-icon="ico-profile-city"
                        v-model="user_form.city"
                        @change="activeDownload"
                      ></v-text-field>
                      <span
                        v-if="errors['city']"
                        class="float-left text-danger small"
                        >{{ errors["city"][0] }}</span
                      >
                    </div>

                    <div class="col-6 pr-0">
                      <v-select
                        id="state"
                        :items="states"
                        label="State"
                        filled
                        dense
                        flat
                        hide-details
                        item-value="code"
                        item-text="name"
                        solo
                        append-icon="ico-sort-arrows"
                        v-model="user_form.state"
                        class="checkRigth"
                        :menu-props="{ contentClass: 'checkList-line' }"
                        @change="activeDownload"
                      >
                      </v-select>
                      <span
                        v-if="errors['state']"
                        class="float-left text-danger small"
                        >{{ errors["state"][0] }}</span
                      >
                    </div>
                  </div>
                </div>

                <div
                  class="col-12"
                  :class="mobile ? 'pl-0 pr-0' : 'pl-0'"
                  style="margin-top: 10px !important"
                >
                  <div class="row m-0">
                    <div class="col-6 pr-0 pl-0">
                      <v-text-field
                        id="zip"
                        label="Zip Code"
                        style="max-width: 171px"
                        solo
                        flat
                        dense
                        hide-details
                        filled
                        class="sfInputClass"
                        prepend-icon="ico-profile-city"
                        v-model="user_form.zip"
                        @change="activeDownload"
                      ></v-text-field>
                      <span
                        v-if="errors['zip']"
                        class="float-left text-danger small"
                        >{{ errors["zip"][0] }}</span
                      >
                    </div>

                    <div class="col-6 pr-0">
                      <v-select
                        v-model="user_form.country"
                        :items="countries"
                        item-text="name"
                        item-value="id"
                        label="Select"
                        filled
                        append-icon="ico-sort-arrows"
                        :menu-props="{ contentClass: 'checkList-line' }"
                        class="checkRigth"
                        dense
                        hide-details
                        solo
                        :height="32"
                        disabled
                      ></v-select>

                      <span
                        v-if="errors['country']"
                        class="float-left text-danger small"
                        >{{ errors["country"][0] }}</span
                      >
                    </div>
                  </div>
                </div>

                <div
                  class="col-12"
                  :class="mobile ? 'pl-0 pr-0' : 'pl-0'"
                  style="margin-top: 10px !important"
                >
                  <div class="row m-0">
                    <div class="col-4 pr-0 pl-0">
                      <v-select
                        id="phone_number_code"
                        :items="country_all"
                        label="Select"
                        class="checkRigth checkLeftS right-left"
                        filled
                        flat
                        item-text="prefix"
                        item-value="code2"
                        hide-details
                        disabled
                        dense
                        solo
                        auto
                        autocomplete
                        v-model="user_form.phone_number_code"
                        :menu-props="{ contentClass: 'checkList-lineBlue' }"
                        @change="activeDownload"
                      >
                        <template slot="selection" slot-scope="data">
                          <!-- // HTML that describe how select should render selected items -->
                          +{{ data.item.prefix }} - {{ data.item.code3 }}
                        </template>
                        <template slot="item" slot-scope="data">
                          <!-- // HTML that describe how select should render items when the select is open -->
                          +{{ data.item.prefix }} - {{ data.item.code3 }}
                        </template>
                      </v-select>
                      <span
                        v-if="errors['phone_number_code']"
                        class="float-left text-danger small"
                        >{{ errors["phone_number_code"][0] }}</span
                      >
                    </div>
                    <div class="col-8 pr-0">
                      <v-text-field
                        id="phone_number"
                        label="5555555555"
                        solo
                        flat
                        dense
                        hide-details
                        filled
                        type="tel"
                        class="sfInputClass"
                        prepend-icon="ico-profile-phone"
                        v-model="user_form.phone_number"
                        @change="activeDownload"
                      ></v-text-field>
                      <span
                        v-if="errors['phone_number']"
                        class="float-left text-danger small"
                        >{{ errors["phone_number"][0] }}</span
                      >
                    </div>
                  </div>
                </div>
              </div>
              <div class="m-0 p-0" :class="mobile ? 'col-12' : 'col-6'">
                <div v-if="!mobile" class="row m-0">
                  <div class="col-12 p-0" style="margin-top: 40px">
                    <div
                      class="custom-control custom-radio custom-control-inline"
                    >
                      <input
                        style="opacity: 1"
                        v-model="picked"
                        value="1"
                        checked
                        type="radio"
                        id="individual"
                        name="account_type"
                        class="custom-control-input"
                        @click="activeDownload"
                      />
                      <label
                        style="
                          opacity: 1;
                          color: #43425d !important;
                          font-size: 12px !important;
                          padding-top: 3px;
                        "
                        :class="{
                          rselected: picked === '1',
                          runselected: picked !== '1',
                        }"
                        class="custom-control-label"
                        for="individual"
                      >
                        <font
                          :style="picked == 2 ? 'opacity: 0.5' : 'opacity: 1'"
                        >
                          Individual
                        </font>
                      </label>
                    </div>
                    <div
                      class="custom-control custom-radio custom-control-inline"
                    >
                      <input
                        style="opacity: 1"
                        v-model="picked"
                        value="2"
                        type="radio"
                        id="corporation"
                        name="account_type"
                        class="custom-control-input"
                        @click="activeDownload"
                      />
                      <label
                        style="
                          opacity: 1;
                          color: #43425d !important;
                          font-size: 12px !important;
                          padding-top: 3px;
                        "
                        :class="{
                          rselected: picked === '2',
                          runselected: picked !== '2',
                        }"
                        class="custom-control-label number_shown"
                        for="corporation"
                      >
                        <font
                          :style="picked == 1 ? 'opacity: 0.5' : 'opacity: 1'"
                        >
                          Corporation</font
                        >
                      </label>
                    </div>
                  </div>
                </div>

                <p
                  v-if="!mobile"
                  class="sfProfileText"
                  style="margin-top: 10px"
                >
                  To download a copy of your Tax Form 1099-NEC, select your tax
                  year and complete the form with the same information you use
                  to file your tax returns.
                </p>
                <p class="sfProfileText" style="margin-top: 20px; opacity: 1">
                  Under penalties of perjury, I certify:
                </p>

                <p
                  class="custom-control custom-radio custom-control-inline"
                  style="margin-bottom: 15px; display: flex"
                >
                  <input
                    style="opacity: 1"
                    v-model="citizen"
                    value="1"
                    type="radio"
                    id="citizen"
                    name="citizen"
                    class="custom-control-input"
                    @change="activeDownload"
                  />
                  <label
                    style="
                      opacity: 1;
                      color: #43425d !important;
                      font-size: 12px !important;
                      padding-top: 3px;
                    "
                    :class="{
                      rselected: citizen === '1',
                      runselected: citizen !== '1',
                    }"
                    class="custom-control-label"
                    for="citizen"
                    ><font :style="!citizen ? 'opacity: 0.5' : 'opacity: 1'"
                      >I am a US citizen or other U.S. person.</font
                    ></label
                  >
                </p>

                <p
                  class="custom-control custom-radio custom-control-inline"
                  style="margin-bottom: 15px; display: flex"
                >
                  <input
                    style="opacity: 1"
                    v-model="number_shown"
                    @change="activeDownload"
                    value="1"
                    type="radio"
                    id="number_shown"
                    name="number_shown"
                    class="custom-control-input"
                  />
                  <label
                    style="
                      opacity: 1;
                      color: #43425d !important;
                      font-size: 12px !important;
                      padding-top: 3px;
                    "
                    :class="{
                      rselected: number_shown === '1',
                      runselected: number_shown !== '1',
                    }"
                    class="custom-control-label"
                    for="number_shown"
                    ><font
                      :style="!number_shown ? 'opacity: 0.5' : 'opacity: 1'"
                      >The number shown on this form is my correct taxpayer
                      identification number, or I am waiting for a tax ID to be
                      assigned to me.</font
                    ></label
                  >
                </p>

                <p
                  class="custom-control custom-radio custom-control-inline"
                  style="margin-bottom: 15px; display: flex"
                >
                  <input
                    style="opacity: 1"
                    v-model="withholding"
                    @change="activeDownload"
                    value="true"
                    type="radio"
                    id="withholding"
                    name="withholding"
                    class="custom-control-input"
                  />
                  <label
                    style="
                      opacity: 1;
                      color: #43425d !important;
                      font-size: 12px !important;
                      padding-top: 3px;
                    "
                    :class="{
                      rselected: withholding === '1',
                      runselected: withholding !== '1',
                    }"
                    class="custom-control-label"
                    for="withholding"
                    ><font :style="!withholding ? 'opacity: 0.5' : 'opacity: 1'"
                      >I am not subject to backup withholding because:<br />
                      [A] I am exempt from backup withholding, or <br />[B] I
                      have not been notified by the Internal Revenue Service
                      that I am subject to backup withholding as a result of
                      failure to report all interest and dividends, or <br />[C]
                      the Internal Revenue Service has notified me that I am no
                      longer subject to backup withholding.</font
                    ></label
                  >
                </p>
              </div>
            </div>
            <div class="form-row mb-0 mt-10">
              <div
                class="col-12"
                :style="mobile ? 'text-align: left' : 'text-align: center'"
              >
                <v-btn
                  class="mb-0 btn-block"
                  @click="generateForm"
                  color="#8EbEF8"
                  depressed
                  rounded
                  max-width="114"
                  :disabled="btnDownload"
                >
                  <span style="color: #ffffff">Download</span>
                </v-btn>
              </div>
            </div>
            <!-- <v-btn
                  class="mb-0 btn-block"
                  @click="generateForm"
                  color="#8EbEF8"
                  depressed
                  rounded
                  max-width="114"
                >
                  <span style="color: #ffffff">Empty PDF</span>
                </v-btn> -->
          </v-card>
        </v-container>
      </v-col>
    </v-row>
  </div>
</template>

<script>
import { mapGetters } from "vuex";
import jsPDF from "jspdf";
import autoTable from "jspdf-autotable";
import moment from "moment";

export default {
  data: function() {
    return {
      user_form: { phone_number: "", phone_number_code: "", country: 232 },
      errors: [],
      citizen: 0,
      number_shown: 0,
      withholding: 0,
      picked: 1,
      typeform: [],
      yeardata: [],
      btnDownload: true,
      pass: 0,
      amountForm: parseFloat(0),
      amountFormI: parseFloat(0),
      amountFormD: parseFloat(0),
    };
  },
  props: ["user", "countries", "states", "country_all", "years"],
  mounted() {
    this.user_form.phone_number = this.user.userMobile.number;
    this.user_form.phone_number_code = this.user.userMobile.code2;
    this.user_form.country = 232;

    // var currentYear = new Date().getFullYear();
    // for (var i = currentYear - 5; i <= currentYear - 1; i++) {
    //   this.years.push(i);
    // }
  },

  computed: {
    ...mapGetters({
      mobile: "util/mobile",
    }),
  },
  watch: {},
  methods: {
    formatNumber(num) {
      return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");
    },
    generateForm() {

      this.amountFormD = parseFloat(0);
      this.amountFormI = parseFloat(0);
      this.amountForm = parseFloat(0);

      this.loading = true;

      if (!this.user_form.year) {
        var today = new Date();
        var yearOnly = today.getFullYear() - 1;
        this.year_form = yearOnly.toString();
        this.amountForm = 0;
      } else {


        this.year_form = this.user_form.year.toString();
        this.years.forEach((year) => {
          if (year.name == this.user_form.year) {
            console.log("" + year.type + " = " + year.amount);
            if (year.type != "REFUND")
              this.amountFormI =
                parseFloat(this.amountFormI) +
                parseFloat(year.amount);
            else
              this.amountFormD = parseFloat(this.amountFormD) + parseFloat(year.amount);
          }
        });
      }

      this.amountForm = parseFloat(this.amountFormI) - parseFloat(this.amountFormD);
      console.log('amountForm = ' +this.amountForm);

      this.amountForm = this.formatNumber(parseFloat(this.amountForm).toFixed(2));



      this.yeardata[0] = this.year_form.charAt(0) + this.year_form.charAt(1);
      this.yeardata[1] = this.year_form.charAt(2) + this.year_form.charAt(3);

      let pdfName = "max - Transaction History";
      var doc = new jsPDF("p", "pt");

      doc.setFontSize(7);

      //left colum                    //right colum
      doc.rect(20, 20, 250, 85);
      doc.setFillColor(200, 200, 200).rect(271, 20, 98, 85, "F");
      doc.rect(370, 20, 75, 85);
      doc.text(
        25,
        30,
        "PAYER’S name, street address, city or town, state or province, country, ZIP"
      );
      doc.rect(271, 20, 98, 85);
      doc.text(375, 30, "OMB No. 1545-0116");
      doc
        .setFontType("normal")
        .setFontSize(7)
        .text(25, 40, "or foreign postal code, and telephone no.");
      doc
        .setFontSize(25)
        .setFontType("bold")
        .text(380, 70, this.yeardata[0]);
      doc.setFontType("bold").text(408, 70, this.yeardata[1]);
      doc.setFontSize(12).text(490, 60, "Nonemployee");
      doc
        .setFontSize(22)
        .setFontType("normal")
        .setTextColor(255, 255, 255)
        .text(381.5, 68.7, this.yeardata[0]);
      doc.setTextColor(0, 0, 0);
      doc
        .setFontSize(7)
        .setFontType("normal")
        .text(375, 100, "Form");
      doc
        .setFontSize(10)
        .setFontType("bold")
        .text(393, 100, "1099-NEC");
      doc.setFontSize(12).text(485, 75, "Compensation");
      //Input info
      doc
        .setFont("courier")
        .setFontType("normal")
        .setFontSize(11);
      doc.text(35, 60, "Psychics1on1, Inc");
      doc.text(35, 74, "4700 Millenia Blvd, Ste 400");
      doc.text(35, 88, "Orlando, FL  32839");
      doc
        .setFontType("normal")
        .setFontSize(7)
        .setFont("helvetica");

      doc.line(470, 105, 570, 105);
      doc
        .setFontSize(10)
        .setFontType("bold")
        .text(534, 117, "Copy B");
      doc
        .setFontSize(9)
        .setFontType("bold")
        .text(510, 131, "For Recipient");
      doc.setFontType("normal").setFontSize(7);
      doc.text(505, 141, "This is important tax");
      doc.text(493, 149, "information and is being");
      doc.text(473, 157, "furnished to the IRS. If you are");
      doc.text(489, 165, "required to file a return, a");
      doc.text(483, 173, "negligence penalty or other");
      doc.text(479, 181, "sanction may be imposed on");
      doc.text(482, 189, "you if this income is taxable");
      doc.text(475, 197, "and the IRS determines that it");
      doc.text(498, 205, "has not been reported.");
      doc.rect(20, 105, 125, 28);
      doc.rect(145, 105, 125, 28);
      doc.rect(270, 105, 200, 28);
      doc.setFontType("bold").text(275, 113, "1");
      doc.setFontType("normal").text(25, 113, "PAYER’S TIN");
      doc.text(150, 113, "RECIPIENT’S TIN");
      doc.text(285, 113, "Nonemployee compensation");
      doc
        .setFontSize(11)
        .text(275, 127, "$")
        .setFontSize(7);
      //Input info
      doc.setFontType("normal").setFontSize(11);
      doc.text(285, 127, "" + this.amountForm + "");
      doc.setFontSize(7);

      doc.rect(270, 133, 200, 28);
      doc
        .setFontType("bold")
        .text(275, 141, "2", { charSpace: "0" })
        .setFontType("normal");
      doc.text(285, 141, "Payer made direct sales totaling $5,000 or more of");
      doc.text(285, 149, "consumer products to recipient for resale");
      doc.rect(455, 145, 8, 8);

      //Input info
      doc
        .setFont("courier")
        .setFontType("normal")
        .setFontSize(11);
      doc.text(35, 127, "85-2529875");
      if (this.user_form.ssn && this.picked == 1)
        doc.text(160, 127, this.user_form.ssn);
      if (this.user_form.tax_id && this.picked == 2)
        doc.text(160, 127, this.user_form.tax_id);
      doc
        .setFontType("normal")
        .setFontSize(7)
        .setFont("helvetica");

      doc.setFillColor(200, 200, 200).rect(270, 161, 200, 28, "F");
      doc.setFillColor(255, 255, 255).rect(271, 161, 15, 12, "F");
      doc.rect(270, 161, 200, 28);
      doc
        .setFontType("bold")
        .text(275, 169, "3")
        .setFontType("normal");
      doc.rect(270, 189, 200, 28);
      doc.setFontType("bold").text(275, 197, "4");
      doc.text(285, 197, "Federal income tax withheld").setFontType("normal");
      doc
        .setFontSize(11)
        .text(275, 211, "$")
        .setFontSize(7);

      doc.rect(20, 133, 250, 97);

      doc.setFontType("normal").text(25, 141, "RECIPIENT’S name ");
      //Input info
      doc
        .setFont("courier")
        .setFontType("normal")
        .setFontSize(11);
      if (
        this.user_form.first_name &&
        this.user_form.last_name &&
        this.picked == 1
      )
        doc.text(
          35,
          158,
          this.user_form.first_name + " " + this.user_form.last_name
        );
      if (this.user_form.business_name && this.picked == 2)
        doc.text(35, 158, this.user_form.business_name);
      doc
        .setFontType("normal")
        .setFontSize(7)
        .setFont("helvetica");

      doc
        .setFontType("normal")
        .text(25, 175, "Street address (including apt. no.)  ");

      //Input info
      doc
        .setFont("courier")
        .setFontType("normal")
        .setFontSize(11);
      if (this.user_form.address_2)
        doc.text(
          35,
          190,
          this.user_form.address + " " + this.user_form.address_2
        );
      if (this.user_form.address) doc.text(35, 190, this.user_form.address);
      doc
        .setFontType("normal")
        .setFontSize(7)
        .setFont("helvetica");

      doc
        .setFontType("normal")
        .text(
          25,
          203,
          "City or town, state or province, country, and ZIP or foreign postal code "
        );
      //Input info
      doc
        .setFont("courier")
        .setFontType("normal")
        .setFontSize(11);
      if (this.user_form.city && this.user_form.state && this.user_form.zip)
        doc.text(
          35,
          220,
          this.user_form.city +
            "," +
            this.user_form.state +
            " " +
            this.user_form.zip
        );
      doc
        .setFontType("normal")
        .setFontSize(7)
        .setFont("helvetica");

      doc.rect(20, 230, 250, 27);
      doc.rect(270, 217, 100, 40);
      doc.rect(370, 217, 100, 40);
      doc.line(470, 217, 570, 217);
      doc.setFontType("bold").text(275, 225, "5");
      doc.setFontType("bold").text(375, 225, "6");
      doc.setFontType("bold").text(475, 225, "7");
      doc
        .setFontType("normal")
        .text(25, 241, "Account number (see instructions) ");
      doc.setFontType("normal").text(285, 225, "State tax withheld");
      doc.setFontType("normal").text(385, 225, "State/Payer’s state no.");
      doc.setFontType("normal").text(485, 225, "State income");
      doc.line(470, 257, 570, 257);
      doc
        .setFontSize(11)
        .text(275, 238, "$")
        .setFontSize(7);
      doc
        .setFontSize(11)
        .text(475, 238, "$")
        .setFontSize(7);
      doc
        .setLineDash([3, 3], 0)
        .setDrawColor(150, 150, 150)
        .line(270, 242, 570, 242);
      doc
        .setFontSize(11)
        .text(275, 253, "$")
        .setFontSize(7);
      doc
        .setFontSize(11)
        .text(475, 253, "$")
        .setFontSize(7);

      //Input info
      doc.setFontType("normal").setFontSize(11);
      doc.text(385, 238, "FL");
      doc.text(485, 238, "" + this.amountForm + "");
      doc.setFontType("normal").setFontSize(7);

      doc
        .setFontSize(7)
        .setFontType("normal")
        .text(20, 268, "Form");
      doc
        .setFontSize(10)
        .setFontType("bold")
        .text(40, 268, "1099-NEC");
      doc
        .setFontSize(7)
        .setFontType("normal")
        .text(120, 268, "(keep for your records)");
      doc
        .setFontSize(7)
        .setFontType("normal")
        .text(
          400,
          268,
          "Department of the Treasury - Internal Revenue Service"
        );

      // doc.save(pdfName +' '+ moment().format('MM-DD-YYYY') + ".pdf");
      doc.output("dataurlnewwindow");
      this.loading = false;
    },
    activeDownload() {
      if (
        this.picked == 1 &&
        this.user_form.first_name &&
        this.user_form.last_name &&
        this.user_form.ssn
      ) {
        this.pass = 1;
      } else if (
        this.picked == 2 &&
        this.user_form.business_name &&
        this.user_form.tax_id
      ) {
        this.pass = 1;
      } else {
        this.pass = 0;
      }

      if (
        this.pass == 1 &&
        this.user_form.year &&
        this.user_form.address &&
        this.user_form.city &&
        this.user_form.state &&
        this.user_form.zip &&
        this.user_form.phone_number &&
        this.citizen &&
        this.number_shown &&
        this.withholding
      ) {
        this.btnDownload = false;
      } else {
        this.btnDownload = true;
      }

    },
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
  width: 171px;
  max-width: 171px;
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

.sfTaxForms .v-input,
.sfTaxForms .v-select__selections,
.sfTaxForms .v-select.v-input--dense .v-select__selection--comma,
.sfTaxForms
  .v-text-field--filled.v-input--dense.v-text-field--single-line
  .v-label {
  font-size: 14px !important;
}

.sfTaxForms .v-select.v-input--dense .v-select__selection--comma {
  padding-left: 10px;
}

.sfTaxForms .sfInputClass,
.sfTaxForms .checkRigth,
.sfTaxForms .checkRigth .v-input__slot,
.sfTaxForms .checkRigth .v-select__slot,
.sfTaxForms .checkRigth .v-input__control {
  width: 100% !important;
  max-width: 100% !important;
}

.sfTaxForms .v-label.theme--light {
  color: #c7c7c7;
}

.sfTaxForms
  .v-text-field--filled.v-input--dense.v-text-field--single-line
  .v-label {
  color: #bebebe !important;
}
.sfTaxForms .theme--light.v-select .v-select__selection--disabled,
.sfTaxForms .theme--light.v-input--is-disabled input,
.sfTaxForms .theme--light.v-input--is-disabled .v-select__selections {
  color: #1f1e34 !important;
  opacity: 1 !important;
}
</style>
