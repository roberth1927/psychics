



<template>
  <div>
    <v-container
      :class="mobile ? 'm-0 p-0' : 'm-0 p-0'"
      :style="mobile ? '' : 'padding-left:5px !important'"
    >
      <v-card class="mx-auto">
        <v-card-text class="pa-0" style="height: 50%">
          <v-container class="p-0">
            <v-row class="mb-3">
              <v-col class="subtitle-1">Payout History</v-col>
            </v-row>

            <v-row class="mb-3">
              <v-col
                style="color: #0000008a; font-size: 12px; line-height: 18px"
              >
                Payouts are processed weekly, 7 days after each pay period. A
                $75 minimum account balance is required for payout processing.
                Earnings below the minimum will carry over to the following pay
                period.
              </v-col>
            </v-row>

            <v-row class="sfHistoryLabel">
              <v-col class="col-6 col-sm-6">
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
                >
                </v-select>
              </v-col>
              <v-col class="col-6 col-md-6">
                <v-select
                  class="widthSelect float-right"
                  background-color="#F4F4F4"
                  :items="filter_by"
                  label="Filter by Status"
                  v-model="selected_status"
                  multiple
                  attach
                  chips
                  dense
                  :menu-props="{ contentClass: 'checkList-line' }"
                  solo
                  append-icon="ico-sort-arrows"
                  :style="[
                    !$vuetify.breakpoint.smAndDown
                      ? { width: '135px !important' }
                      : { width: '135px !important', float: 'left' },
                  ]"
                >
                  <template v-slot:selection="{ item, index }">
                    <div v-if="selected_status.length <= 1">
                      {{ item }}
                    </div>
                    <span v-if="index === 1">Show Filtered</span>
                  </template>
                </v-select>
              </v-col>
            </v-row>

            <v-row class="mb-3">
              <v-col>
                <v-data-table
                  id="information"
                  class="col-12 p-0 sfPagination"
                  :search="search"
                  :items="obj_transactions"
                  :hide-default-header="mobile"
                >
                  <template v-slot:item="{ item }">
                    <tr :key="item.id">
                      <td
                        class="p-0"
                        style="
                          position: relative;
                          border: none;
                          padding-top: 10px !important;
                          padding-bottom: 15px !important;
                        "
                      >
                        <label class="sfHistoryLabel mb-0" style="float: left"
                          >${{
                            item.payout | numFormat("0,0.00")
                          }}
                          Earned</label
                        ><br />
                        <span class="sfHistorySpan" style="float: left">{{
                          item.period
                        }}</span>

                        <div style="position: absolute; right: 0px; top: 10px">
                          <label
                            class="sfHistoryLabel mb-0"
                            style="float: right"
                            >${{
                              item.payout_to_pay | numFormat("0,0.00")
                            }}</label
                          ><br />
                          <div
                            v-if="item.status === 'Processed'"
                            class="sfHistorySpan"
                            style="
                              float: right;
                              color: #2cc05f;
                              opacity: 1 !important;
                            "
                          >
                            {{ item.status }} {{ item.paid_day }}
                          </div>
                          <div
                            v-else
                            class="sfHistorySpan"
                            :style="
                              'float: right; opacity:1 !important; color:' +
                              colorPayout
                            "
                          >
                            {{ item.status }}
                          </div>
                        </div>
                      </td>
                    </tr>
                  </template>
                </v-data-table>
              </v-col>
            </v-row>
          </v-container>
          <v-row style="padding-bottom: 18px;    margin-top: 10px;">
            <v-btn
              style="
                letter-spacing: 0.28px;opacity: 1 !important; font-size: 14px !important; color : #43425D !important; font-weight: 500 !important;position: absolute;right: 0;
              "
              href="https://psychics1on1.zendesk.com/hc/en-us/articles/360037770171-When-can-I-expect-my-payout-"
              outlined
              :loading="loading"
              small
              target="_blank"
              >Pay Schedule <img src="/images/icons/calendar_history.svg"/></v-btn
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
      selected_status: "",
      range: [],
      range_data: "",
      pdf_data: [],
      pdf_data_temp: [],
      colorPayout: "#F4C150",
      range_data_list: [],
      filter_by: ["Pending", "Processed", "Carried Down"],

      headers: [
        { text: "Earnings", value: "earnings" },
        { text: "Payout", value: "payout", align: "center" },
        { text: "Pay Period", value: "period", align: "center" },
        { text: "Status", value: "status", align: "right" },
      ],
      dates: [],
      close: false,
      range_data: "Filter by Time",
      show_data_range: false,
    };
  },
  watch: {
    dates: function (newVal, oldVal) {
      if (newVal.length !== 0) {
        if (newVal.length === 2) {
          this.range_data =
            newVal[0].replace("-", "/") + " - " + newVal[1].replace("-", "/");
          this.close = false;
        }
      }
    },
  },
  computed: {
    obj_transactions() {
      return this.transactions.filter((transaction) => {

        this.range = this.range_data.split("/");
        let start = new Date(this.range[0]);
        let end = new Date(this.range[1]);
        let startDB = new Date(transaction.start_period);
        let endDB = new Date(transaction.end_period);

        if (
          this.selected_status.length > 0 &&
          this.range_data !== "Filter by Time"
        ) {
          if (
            this.selected_status.includes(transaction.status) &&
            (start <= startDB || start <= endDB) &&
            (end >= endDB || end >= startDB)
          ) {
            return true;
          }
        } else if (
          this.selected_status.includes(transaction.status) &&
          this.range_data == "Filter by Time"
        ) {
          return true;
        } else if (
          this.range_data !== "Filter by Time" &&
          this.selected_status.length <= 0
        ) {
          if (
            (start <= startDB || start <= endDB) &&
            (end >= endDB || end >= startDB)
          ) {
            return true;
          }
        } else if (
          this.selected_status.length <= 0 &&
          this.range_data == "Filter by Time"
        ) {
          return true;
        }
      });
    },
    ...mapGetters({
      mobile: "util/mobile",
    }),
  },
  props: ["transactions"],

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


    f_remove_data() {
      this.close = false;
      this.range_data = "Filter by";
      this.dates = [];
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
  },
  mounted() {
    this.dateList();
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

.v-data-footer__pagination {
  margin: 0px 10px 0px 10px;
}
td {
  font-weight: 500;
  font-size: 12px;
}
.v-card label {
  color: #3f3e3f !important;
  font-weight: 500 !important;
}

.btOnly .v-btn:not(.v-btn--round).v-size--default {
  width: 135px !important;
}
.btOnly .v-btn {
  background-color: #f0f0f7 !important;
}

.v-text-field--filled.v-input--dense.v-text-field--single-line .v-label div,
.theme--light.v-select .v-select__selection--comma div,
.v-select .v-label,
.v-select__selections div {
  font-weight: 500;
  color: #1f1e34 !important;
  opacity: 0.5;
}
.btOnly .v-btn .v-btn__content {
  color: #1f1e34 !important;
  /*opacity: .5;*/
  font-size: 12px !important;
}
.btOnly .v-btn.theme--light.v-btn:focus::before,
.btOnly .theme--light.v-btn:hover::before {
  opacity: 0 !important;
}
.btOnly button:focus {
  outline: none !important;
}
</style>
