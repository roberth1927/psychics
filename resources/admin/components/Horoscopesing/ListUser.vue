<template>

  <div>
      
    <v-data-table
      v-if="horoscopeuser.length"
      :headers="[
        { text: 'Name', align: 'left', value: 'name' },
        { text: 'Sign', align: 'left', value: 'sign' },
        { text: 'Birth Date', align: 'left', value: 'birth_date' },
        { text: 'Email', align: 'left', value: 'email' },
        { text: 'Phone', align: 'left', value: 'number' },
        { text: 'Sign Up', align: 'left', value: 'created_at', sortable: true },
        
        
        

        { value: 'actions' },
      ]"
      :items="horoscopeuser"
      class="elevation-1"
      disable-pagination
      hide-default-footer
    >
      
      <template v-slot:top>
      <v-row>
        <v-col class="d-flex justify-end">
          <div class="pa-3">
            <strong>Total:</strong>{{horoscopeuser.length}}
          </div>
          <v-btn icon @click="downloadExcel" class="mr-4">
              <v-icon color="purple" large class="cursor-pointer"
                >mdi-file-excel</v-icon
              >
            </v-btn>
        </v-col>
      </v-row>
    </template>

      <template v-slot:item.actions="props">
        <div style="min-width: 90px">
          <v-icon
            class="float-right"
            color="red"
            @click="deleteItem(props.item)"
          >
            mdi-delete
          </v-icon>
        </div>
      </template>
    </v-data-table>


  </div>
</template>


<script>
import { mapGetters } from "vuex";

export default {
  data() {
    return {
      name: null,
      item: null,
      store: "horoscopeuser",
      
    };
  },

  methods: {

    downloadExcel() {
      window.open(
        "/admin/horoscope-users-cvs")
    },
  
    async deleteItem(item) {
      if (confirm("Are you sure want to delete +" + item.id)) {
        await this.$store
          .dispatch(this.store + "/delete", { id: item.id })
          .then((response) => {
            if (response.data == "ok"){
              
              this.$store.dispatch(this.store + "/getUserItems");
              }
            this.item = null;
          });
      }
    },
  },
  computed: {
    ...mapGetters({
      horoscopeuser: "horoscopeuser/items",
      user: "user/view",
    }),
  },

  created() {
    if (!this.horoscopeuser.length)
      this.$store.dispatch(this.store + "/getUserItems");
  },
};
</script>
<style>
.v-data-table td.v-data-table__mobile-row:first-child {
  height: 90px;
}
</style>