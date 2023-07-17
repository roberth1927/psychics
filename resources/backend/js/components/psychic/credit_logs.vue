<template>
  <div>
    <v-container
      :class="mobile ? 'm-0 p-0' : 'm-0 p-0'"
      :style="mobile ? '' : 'padding-right:5px !important'"
    >
      <v-card tile class="mx-auto">
        <v-card-text class="pa-0" style="height: 50%">
          <v-container class="m-0 p-0 sfHistoryLabel">
            <v-row class="mb-3">
              <v-col class="subtitle-1">Transaction History</v-col>
            </v-row>
            <v-row>
              <v-col class="col-6 col-md-6 col-sm-6">
                <v-select
                  id="year"
                  :items="range_data_list"
                  item-text="name"
                  item-value="key"
                  label="Filter by Time"
                  filled
                  dense
                  flat
                  hide-details
                  solo
                  append-icon="ico-sort-arrows"
                  v-model="range_data"
                  class="widthSelect"
                  background-color="#F4F4F4"
                  :menu-props="{ contentClass: 'checkList-line' }"
                  clearable
                >
                </v-select>
              </v-col>
              <v-col class="col-6 col-md-6 mb-0">
                <v-select
                  class="widthSelect float-right"
                  background-color="#F4F4F4"
                  :items="filter_by"
                  item-text="name"
                  item-value="key"
                  label="Filter by Service"
                  v-model="selected_service"
                  multiple                  
                  dense
                  :menu-props="{ contentClass: 'checkList-line' }"
                  solo
                  append-icon="ico-sort-arrows"
                  :style="[
                    !$vuetify.breakpoint.smAndDown
                      ? { width: '135px !important' }
                      : { width: '135px !important', float: 'left' },
                  ]"
                  clearable
                >
                 
                </v-select>
              </v-col>
            </v-row>
          </v-container>
          <v-data-table
            id="information"
            class="col-12 p-0 sfPagination"
            :search="search"
            :items="paginate.data"
            :hide-default-header="mobile"
            :custom-filter="filterText"
            :loading="loadingTransactions"
            loading-text="Loading... Please wait"
            :server-items-length="paginate.meta.total"
            :options.sync="options"
            :items-per-page="perPage"
      :footer-props="{
        itemsPerPageOptions: [25, 10, 35, 50, 100, -1],
      }"
          >

            
            <template v-slot:item="{ item }">
              <tr :key="item.id">
                <td
                  class="p-0"
                  style="
                    position: relative;
                    border: none;
                    padding-top: 10px !important;
                  "
                >
                  <div
                    class="sfHeaderIco"
                    style="float: left; margin-top: -3px; margin-left: -8px"
                  >
                    <img :src="'/images/icons/' + item.icon + '.svg'" />
                  </div>

                  <label class="sfHistoryLabel mb-0" style="float: left">{{
                    item.client_name
                  }} </label
                  ><br />
                  <span class="sfHistorySpan" style="float: left">{{
                    item.created | fdate
                  }}</span>

                  <div style="position: absolute; right: 0px; top: 10px">
                    <label
                      class="sfHistoryLabel mb-0"
                      style="float: right"
                      :style="[
                        item.impact === 'negative'
                          ? { color: '#E85D4ECC !important' }
                          : { color: '#43425D !important' },
                      ]"
                      >${{ item.amount | numFormat("0,0.00") }}</label
                    ><br />
                    <div
                      v-if="f_ftime(item.duration)"
                      class="sfHistorySpan"
                      style="float: right"
                    >
                      {{ item.duration | ftime }} {{ item.service }}
                    </div>
                    <div v-else class="sfHistorySpan" style="float: right">
                      {{ item.service }}
                    </div>
                  </div>
                </td>
              </tr>

              
            </template>
          </v-data-table>
          <v-row style="padding-bottom: 18px;    margin-top: 10px;">
            <v-btn
              style="
                letter-spacing: 0.28px;opacity: 1 !important; font-size: 14px !important; color : #43425D !important; font-weight: 500 !important;position: absolute;right: 0;
              "
              @click="f_generate_pdf"
              outlined
              :loading="loading"
              small
              >Download <img src="/images/icons/download.svg"/></v-btn
            >
          </v-row>
        </v-card-text>
      </v-card>
    </v-container>
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
      range_data: null,
      range: [],
      range_data_list: [],
      filter_by: [
        { name: "Calling", key: "Call" },
        { name: "Chat", key: "Chat" },
        { name: "Video Chat", key: "Video Chat" },
        { name: "Chat Refunded", key: "Chat Refunded" },
        { name: "Failed Call", key: "Failed Call" },
        { name: "Failed V-Chat", key: "Failed V-Chat" },
      ],

      headers: [
        { text: "Date", value: "created" },
        { text: "Client", value: "client_name" },
      ],
      transactionsEmptySearch: [],
      options: {},
      paginate: {meta: {total: 0}},
      page: 1,
      perPage: 10,
      loadingTransactions: false
    };
  },
  watch: {
    range_data(){
      this.page = 1;
      this.getTransactions()
    },
    selected_service(){
      this.page = 1;
      this.getTransactions()
    },
    options: {
      handler() {
        let reload = false;

        const { sortBy, sortDesc, page, itemsPerPage } = this.options;

        // if (sortBy.length === 1 && sortDesc.length === 1) {
        //   if (this.sort != sortBy[0] || this.sortDesc != sortDesc[0]) {
        //     this.sort = sortBy[0];
        //     this.sortDesc = sortDesc[0];
        //     reload = true;
        //     this.$store.dispatch(this.store + "/page", 1);
        //   }
        // }

        if (this.page != page) {
          reload = true;
          this.page = page
        }
        if (this.perPage != itemsPerPage) {
          reload = true;
          this.perPage = itemsPerPage == -1 ? this.paginate.meta.total : itemsPerPage;
        }

        if (reload)
          this.getTransactions()
      },
      deep: true,
    },
  },
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
        return false;
      }

      return new Date(time * 1000 * 60).toISOString().substr(11, 8);
    },
  },
  props: ["name"],


  methods: {
    dateList() {
      var date = new Date();
      
      //All
      var all = [
        moment(date).subtract(10, "year").startOf("year").format("YYYY-MM-DD"),
        moment(date).endOf("year").format("YYYY-MM-DD"),
      ];

      //This Week
      var thisWeek = [
        moment(date).startOf("week").format("YYYY-MM-DD"),
        moment(date).endOf("week").format("YYYY-MM-DD"),
      ];
      //Last date
      var lastWeek = [
        moment(date).subtract(1, "week").startOf("week").format("YYYY-MM-DD"),
        moment(date).subtract(1, "week").endOf("week").format("YYYY-MM-DD"),
      ];
      //This Month
      var thisMonth = [
        moment(date).startOf("month").format("YYYY-MM-DD"),
        moment(date).endOf("month").format("YYYY-MM-DD"),
      ];
      //Last Month
      var lastMonth = [
        moment(date)
          .subtract(1, "months")
          .startOf("month")
          .format("YYYY-MM-DD"),
        moment(date).subtract(1, "months").endOf("month").format("YYYY-MM-DD"),
      ];
      //This Year
      var thisYear = [
        moment(date).startOf("year").format("YYYY-MM-DD"),
        moment(date).endOf("year").format("YYYY-MM-DD"),
      ];
      //Last Year
      var lastYear = [
        moment(date).subtract(1, "year").startOf("year").format("YYYY-MM-DD"),
        moment(date).subtract(1, "year").endOf("year").format("YYYY-MM-DD"),
      ];

      this.range_data_list = [
        { name: "All Time", key: all[0] + "/" + all[1] },
        { name: "This Week", key: thisWeek[0] + "/" + thisWeek[1] },
        { name: "Last Week", key: lastWeek[0] + "/" + lastWeek[1] },
        { name: "This Month", key: thisMonth[0] + "/" + thisMonth[1] },
        { name: "Last Month", key: lastMonth[0] + "/" + lastMonth[1] },
        { name: "This Year", key: thisYear[0] + "/" + thisYear[1] },
        { name: "Last Year", key: lastYear[0] + "/" + lastYear[1] },
      ];
    },


    filterText(value, search, item) {
      if (
        value != null &&
        search != null &&
        typeof value === "string" &&
        value.toString().toLowerCase().indexOf(search.toLowerCase()) !== -1
      ) {
        if (this.selected_service.length) {
          if (this.selected_service.includes(item.service)) {
            return true;
          }
        } else return true;
      } else if (
        this.selected_service.length &&
        (search == "" || search == null)
      ) {
        if (this.selected_service.includes(item.service)) {
          return true;
        }
      }
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
        return false;
      }
      return new Date(time * 1000 * 60).toISOString().substr(11, 8).toString();
    },
    f_generate_pdf() {
      this.loading = true;

      let colums = [
        { header: "Date", dataKey: "created" },
        { header: "Client", dataKey: "client_name" },
        { header: "Service", dataKey: "service" },
        { header: "Time", dataKey: "duration" },
        { header: "Amount", dataKey: "amount" },
      ];

      this.pdf_data_temp = this.paginate.data;
      let temp = [];

      for (let i = 0; i < this.pdf_data_temp.length; i++) {
        let elem = Object.assign({}, this.pdf_data_temp[i]);
        elem.created = this.f_fdate(elem.created);
        elem.duration = this.f_ftime(elem.duration);
        elem.client_image = "";
        elem.amount =
          elem.impact == "negative"
            ? "-" + this.$options.filters.money(elem.amount)
            : this.$options.filters.money(elem.amount);
        temp.push(elem);
      }
      let color = ";";
      let pdfName = this.name + " - Transaction History";
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
      doc.save(pdfName + " " + moment().format("MM-DD-YYYY") + ".pdf");
      this.loading = false;
    },
    getTransactions() {
      this.loadingTransactions = true;
      let uri = `/api/v1/psychic/transactions?page=${this.page}&per_page=${this.perPage}`;
      if(this.range_data && typeof this.range_data != 'undefined') uri += `&range=${this.range_data}`
      if(this.selected_service.length && typeof this.selected_service != 'undefined') uri += `&services=${this.selected_service.join(',')}`
      axios
        .get(uri)
        .then((response) => {
          this.paginate = response.data
        }).finally(() => this.loadingTransactions = false)
    },
  },
  created() {
    this.getTransactions();
  },
  mounted() {
    this.dateList();
  },
};
</script>

<style>
#list-58 .v-list-item {
  border: 1px solid #f0f0f8 !important;
  color: #8e8d99 !important;
  background: #f0f0f8 !important;
}
.v-label {
  font-size: 12px !important;
}

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
.sfPagination .v-data-footer__pagination {
  margin: 0px  !important;
}

.sfPagination .v-data-footer{
  padding: 0px !important;
}

.sfPagination .v-data-footer__icons-before{
    width: 20px;
    margin-left: 10px;
}
.sfPagination .v-data-footer__icons-after{
    width: 20px;
    margin-left: 10px;
}

.sfPagination .v-btn--icon.v-size--default {
  width: 20px;
  height: 20px;
}
 .v-application--is-ltr  .sfPagination .v-data-footer__select .v-select{
    margin: 1px 0 0px 29px !important;
}

td {
  font-weight: 500;
  font-size: 12px;
}
.v-card label {
  color: #3f3e3f !important;
  font-weight: 500 !important;
}
.v-data-footer__select .v-select__selections .v-select__selection--comma {
  color: #3f3e3f !important;
  font-weight: 500;
}

.sfHistoryLabel,
.v-card label.sfHistoryLabel {
  letter-spacing: 0.24px !important;
  color: #43425d !important;
  opacity: 1 !important;
  line-height: 18px !important;
  font-size: 12px !important;
  font-weight: 600 !important;
}

.sfHistorySpan {
  letter-spacing: 0px !important;
  opacity: 0.5 !important;
  line-height: 9px;
  font-size: 12px !important;
  font-weight: 500 !important;
}

.sfHistoryLabel .v-label {
  font-size: 12px !important;
}
</style>
