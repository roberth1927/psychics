<template>
  <div>
    <v-row>
      <v-col cols="12" class="px-0">
        <v-container class="mx-0">
          <v-row class="mb-3 mt-3">
            <v-col class="subtitleDiv">Your transactions</v-col>
          </v-row>

          <v-card tile class="mx-auto">
            <v-card-text class="pa-0" style="height: 50%">
              <v-container>
                <v-row>
                  <v-col class="col-6 col-sm-6">
                    <v-text-field
                      style="background-color: white;"
                      filled
                      solo
                      dense
                      flat
                      prepend-inner-icon="mdi-magnify"
                      label="Search"
                      v-model="search"
                      clearable
                      background-color="#F4F4F4"
              class="magnifyInput"
                    ></v-text-field>
                  </v-col>
                  <v-col class="col-6 col-md-6">
                    <v-row>
                      <v-col>
                        <v-select
                          :items="filter_by"
                          label="Filter by"
                          v-model="selected_service"
                          multiple
                          filled
                          dense
                          solo
                          background-color="#F0F0F7"
                          class="widthSelect float-right"
                          :menu-props="{contentClass: 'checkListGray'}"
                          :style="[ !$vuetify.breakpoint.smAndDown ? {'width': '135px !important'}:{'width': '135px !important'}]"
                          @change="serviceSelected"
                          >
                          <template v-slot:selection="{ item, index }">
                            <div v-if="selected_service.length <= 1" class>{{ item }}</div>
                            <span v-if="index === 1">Show Filtered</span>
                          </template>
                        </v-select>
                      </v-col>
                    </v-row>
                  </v-col>
                </v-row>
              </v-container>
              <v-data-table
                id="information"
                :items-per-page="10"
                class="col-12"
                :search="search"
                :items="(search != '' && search != null ) || !selected_service.length ? transactionsList : transactionsListEmptySearch"
                :hide-default-header="mobile"
                :headers="headers"
                :custom-filter="filterText"
              >
                 <template v-slot:item="{item}">
                  <tr>
                    <td
                      class="px-2"
                      v-if="!mobile || item.psychic_name==='-------'"
                    >{{item.psychic_name}}</td>
                    <td class="px-2" v-else>
                      <img class="img" :title="item.psychic_name" :src="item.psychic_image" />
                    </td>
                    <td class="px-2">{{item.created | fdate}}</td>
                    <td class="px-2">
                      <v-icon>{{item.icon}}</v-icon>

                      <div v-if="!mobile" class="d-inline">{{item.service}}</div>
                    </td>
                    <td class="px-2">{{item.duration | ftime}}</td>
                    <td
                class="px-2"
                :style="[item.impact === 'negative' ? {color:'red'} : {color:'green'}]"
              >{{item.impact == 'negative' ? '-' : ''}}${{item.amount | numFormat('0,0.00')}}</td>
                  </tr>
                </template>
              </v-data-table>
              <v-row class="pa-5">
                <v-btn
                  style="right: 15px;
    display: block;
    margin-left: auto;text-transform: none;
    font-weight: 600;"
                  @click="f_generate_pdf"
                  class="text-transform-none"
                  outlined
                  :loading="loading"
                  small
                >Download PDF</v-btn>
              </v-row>
            </v-card-text>
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
  data: function () {
    return {
      loading: false,
      search: "",
      flag: true,
      selected_service: "",
      pdf_data: [],
      pdf_data_temp: [],
      filter_by: [
        "Calling",
        "Chat",
        "Video Chat",
        "Chat Refunded",
        "Failed Call",
        "Failed V-Chat",
        "Purchased",
      ],

      headers: [
        { text: "Psychic", value: "psychic_name" },
        { text: "Date", value: "created" },
        { text: "Service", value: "service" },
        { text: "Time", value: "duration" },
        { text: "Amount", value: "amount" },
      ],
      transactionsList: [],
      transactionsListEmptySearch: [],
    };
  },
  watch: {},
  computed: {
      ...mapGetters({
      mobile: "util/mobile",
    }),
  },

  filters: {
    fdate: function (date) {
      var created = new Date(date);
      return (
        (created.getMonth() > 8
          ? created.getMonth() + 1
          : "0" + (created.getMonth() + 1)) +
        "/" +
        (created.getDate() > 9 ? created.getDate() : "0" + created.getDate()) +
        "/" +
        created.getFullYear()
      );
    },
    ftime: function (time) {
      if (!time || typeof time === "undefined" || time === "0.00") {
        return "-------";
      }

      // if (time < 1) {
      //   return "< 1";
      // }

      return new Date(time * 1000 * 60).toISOString().substr(11, 8);
      // var h = Math.floor(time / 3600);
      // var m = Math.floor(time % 3600 / 60);
      // var s = Math.floor(time % 3600 % 60);
      //  let r ='';
      //           if(m){
      //             r=m.toString();
      //           }
      //       return (h.toString() +'-'+m.toString() +'-'+s.toString());
    },
  },
  props: ["transactions", "name"],
  created() {
    let item = null;
    this.transactions.forEach(i => {

      this.transactionsList.push(i);
      
      if(i.promo && i.promo != 0){
        item = Object.assign({}, i);
        item.amount = item.promo;
        item.service = 'Promo';
        this.transactionsList.push(item);
      }

      if(i.promo_amount && i.promo_amount != 0){
        item = Object.assign({}, i);
        item.amount = item.promo_amount;
        item.service = 'Promo'+` (${item.promo_code})`;
        this.transactionsList.push(item);
      }
    })
  },
  methods: {
      serviceSelected() {
        if( this.search== "" || this.search == null){
        this.transactionsListEmptySearch=this.transactionsList.filter((transaction) => {
        if (this.selected_service.includes(transaction.service)) {
          return true;
        }
        });
        }
      },
       filterText (value, search, item) {
         if(value != null && search != null && typeof value === 'string' && value.toString().toLowerCase().indexOf(search.toLowerCase()) !== -1)  {
         if (this.selected_service.length) {
            if (this.selected_service.includes(item.service)) {
              return true;
            }
         }
         else
         return true;
       }
        else if (this.selected_service.length && ( search== "" || search == null)) {
            if (this.selected_service.includes(item.service)) {
              return true;
            }
         }
      },
    show_if_promo(user_credit_log){
      return user_credit_log.promo > 0 ? '+$'+user_credit_log.promo : '';
    },
    f_fdate(date) {
      var created = new Date(date);
      return (
        (created.getMonth() > 8
          ? created.getMonth() + 1
          : "0" + (created.getMonth() + 1)) +
        "/" +
        (created.getDate() > 9 ? created.getDate() : "0" + created.getDate()) +
        "/" +
        created.getFullYear()
      );
    },
    f_ftime(time) {
      if (!time || typeof time === "undefined" || time === "0.00") {
        return "-------";
      }
      return new Date(time * 1000 * 60).toISOString().substr(11, 8).toString();
    },
    f_generate_pdf() {
      this.loading = true;

      let colums = [
        { header: "Psychic", dataKey: "psychic_name" },
        { header: "Date", dataKey: "created" },
        { header: "Service", dataKey: "service" },
        { header: "Time", dataKey: "duration" },
        { header: "Amount", dataKey: "amount" },
      ];

      // this.pdf_data = this.obj_transactions;
      this.pdf_data_temp = this.obj_transactions;
      let temp = [];

      for (let i = 0; i < this.pdf_data_temp.length; i++) {
        let elem = Object.assign({}, this.pdf_data_temp[i]);
        elem.created = this.f_fdate(elem.created);
        elem.duration = this.f_ftime(elem.duration);
        elem.psychic_image = "";
        elem.amount =
          elem.impact == "negative"
            ? "-" + this.$options.filters.money(elem.amount)
            : this.$options.filters.money(elem.amount);
        temp.push(elem);
      }
      let color = ";";
      let pdfName =
        this.name + " - Transaction History";
      var doc = new jsPDF("p", "pt");
      doc.text(pdfName, 40, 70);
      doc.autoTable({
        headStyles: {
          fillColor: "#A163C1",
        },
        startY: 100,
        columns: colums,
        body: temp,
      });
      //doc.autoTable(colums,inf);
      doc.save(pdfName + ' ' + moment().format("MM-DD-YYYY") + ".pdf");
      this.loading = false;
    },
    get_transactions() {
      axios
        .get("/api/v1/user/transactions/", {})
        .then((response) => {
          this.transactions = response.data.data;
        })
        .catch((error) => {
          alert("Something was wrong");
          location.reload();
        });
    },
  },
};
</script>

<style>
.icon-close {
  position: absolute;
  top: 0;
  right: 0;
  margin-right: 5px;
  margin-top: 5px;
}
.img {
  border-radius: 50%;
  width: 50px;
  height: 50px;
  padding: 5px;
}
.v-data-footer__pagination {
  margin: 0px 10px 0px 10px;
}
td {
  font-weight: 600;
}
</style>
