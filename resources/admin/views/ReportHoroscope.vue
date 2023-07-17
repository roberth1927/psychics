<template>
  <div>
    <v-card-title>
      Report Horosope

      <div class="flex-grow-1"></div>
    </v-card-title>
    <div style="padding: 16px 16px 8px">
      <v-simple-table>
        <template v-slot:default>
          <thead>
            <tr>
              <th class="text-left">Action</th>
              <th class="text-left">Report</th>
              <th class="text-center">Value</th>
            </tr>
          </thead>
          <tbody class="tdClass">
            <tr>
              <td>INVITES</td>
              <td>
                # of Psychics Who Sent Invite
                <p>
                  # of Psychics who sent at least one email invite via dashboard
                </p>
              </td>
              <td class="tdValue">{{report.item1}}</td>
            </tr>
            <tr>
              <td>INVITES</td>
              <td>
                # of Psychics With Accepted Invites
                <p>
                  of total psychics who sent at least 1 invite, what % had at
                  least one accepted invite
                </p>
              </td>
              <td class="tdValue">{{report.item2}}</td>
            </tr>
            <tr>
              <td>SIGN UPS</td>
              <td>
                #of invites sent out
                <p># of invites accepted (signed up)</p>
              </td>
              <td class="tdValue">{{report.item3}}</td>
            </tr>
            <tr>
              <td>SIGN UPS</td>
              <td>
                # of invites sent out without a follow up email
                <p># of invites accepted (signed up)</p>
              </td>
              <td class="tdValue">{{report.item4}}</td>
            </tr>
            <tr>
              <td>SIGN UPS</td>
              <td>
                #of invites sent out with a follow up email
                <p>% of invites accepted</p>
              </td>
              <td class="tdValue">{{report.item5}}</td>
            </tr>
            <tr>
              <td>PURCHASES</td>
              <td>
                revenue generated
                <p>total revenue generated</p>
              </td>
              <td class="tdValue">{{report.item6}}</td>
            </tr>
            <tr>
              <td>PURCHASES</td>
              <td>
                #of clients who added to their wallet after signing up via
                invite
              </td>
              <td class="tdValue">{{report.item7}}</td>
            </tr>
            <tr>
              <td>PURCHASES</td>
              <td>
                #of clients who added to their wallet after signing up via
                invite
                <p>% of clients who purchased < 35 dollars</p>
              </td>
              <td class="tdValue">{{report.item8}}</td>
            </tr>
            <tr>
              <td>PURCHASES</td>
              <td>
                #of clients who added to their wallet after signing up via
                invite
                <p>% of clients who purchsed 35-50 dollars</p>
              </td>
              <td class="tdValue">{{report.item9}}</td>
            </tr>
            <tr>
              <td>PURCHASES</td>
              <td>
                #of clients who added to their wallet after signing up via
                invite
                <p>% of clients who purchsed over 50 dollars</p>
              </td>
              <td class="tdValue">{{report.item10}}</td>
            </tr>
            <tr>
              <td>NO-FEES</td>
              <td>
                #of psychics with 30 days no fees
                <p>#of psychics who had 30-day fee free initiation</p>
              </td>
              <td class="tdValue">{{report.item11}}</td>
            </tr>
            <tr>
              <td>REFERRAL LOYALTY</td>
              <td>
                #of psychics who sent  an invite 
                <p># of clients who spent money on the psychic that invited them/ # of referral sign ups</p>
              </td>
              <td class="tdValue">{{report.item12}}</td>
            </tr>
            <tr>
              <td>COSMIC CREDITS</td>
              <td>
                cosmic credit earners
                <p>#of psychics who received cosmic credits</p>
              </td>
              <td class="tdValue">{{report.item13}}</td>
            </tr>
            <tr>
              <td>COSMIC CREDITS</td>
              <td>
                cosmic credit earners = 35-50
                <p>%of psychics who received 35-50 cosmic credits</p>
              </td>
              <td class="tdValue">{{report.item14}}</td>
            </tr>
            <tr>
              <td>COSMIC CREDITS</td>
              <td>
                cosmic credit earners = 51 -100
                <p>% of psychics who received 51-100 cosmic credits</p>
              </td>
              <td class="tdValue">{{report.item15}}</td>
            </tr>
            <tr>
              <td>COSMIC CREDITS</td>
              <td>
                cosmic credit earners =101-150
                <p>% of psychics who received 101-150 cosmic credits</p>
              </td>
              <td class="tdValue">{{report.item16}}</td>
            </tr>
            <tr>
              <td>COSMIC CREDITS</td>
              <td>
                cosmic credit earners =151-200
                <p>% of psychics who received 151-200 cosmic credits</p>
              </td>
              <td class="tdValue">{{report.item17}}</td>
            </tr>
            <tr>
              <td>COSMIC CREDITS</td>
              <td>
                cosmic credit earners =201-250
                <p>% of psychics who received 201-250 cosmic credits</p>
              </td>
              <td class="tdValue">{{report.item18}}</td>
            </tr>
            <tr>
              <td>COSMIC CREDITS (BADGES)</td>
              <td>
                #of psychics who sent an invite 
                <p>#of psychics who have badges</p>
              </td>
              <td class="tdValue">{{report.item19}}</td>
            </tr>
            <tr>
              <td>COSMIC CREDITS (BADGES)</td>
              <td>
                #of psychics who sent an invite 
                <p>% of psychics who attained featured badge</p>
              </td>
              <td class="tdValue">{{report.item20}}</td>
            </tr>
            <tr>
              <td>COSMIC CREDITS (BADGES)</td>
              <td>
                #of psychics who sent an invite 
                <p>% of psychics who attained preferred badge</p>
              </td>
              <td class="tdValue">{{report.item21}}</td>
            </tr>
          </tbody>
        </template>
      </v-simple-table>
    </div>
  </div>
</template>
<style scoped>


.tdClass td {
  line-height: 16px;
  padding: 5px 10px !important;
  margin: 0px;
  height: auto !important;
  font-size: 13px !important;
}
.tdClass .tdValue{
  font-size: 15px !important;
  font-weight: 600;
  text-align: center;
}
.tdClass td p {
  font-size: 12px;
  color: rgb(142 142 142);
  margin-bottom: 0px !important;
}
</style>

<script>

export default {
  data() {
    return {
      report:{
        item1: 0,
        item2: '0%',
        item3: 0,
        item4: '0%',
        item5: '0%',
        item6: 0,
        item7: 0,
        item8: '0%',
        item9: '0%',
        item10: '0%',
        item11: 0,
        item12: '0%',
        item13: 0,
        item14: '0%',
        item15: '0%',
        item16: '0%',
        item17: '0%',
        item18: '0%',
        item19: 0,
        item20: '0%',
        item21: '0%',
      }
    };
  },
  mounted () {
    axios
      .get('/api/v1/search/reportcosmic')
      .then(response => (this.report = response.data))
  }
};
</script>
