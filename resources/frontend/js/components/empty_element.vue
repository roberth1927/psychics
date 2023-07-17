<template>
    <v-card
      class="rounded-corner"
      style="border-radius: 6px !important;"
      flat
      :style="{ borderLeft: '5px solid #A2A2A2' }"
    >
      <v-row class="py-5 mb-5 contentEmpty" no-gutters style="min-height: 90px">
        <v-col
          :lg="9"
          :md="9"
          :sm="10"
          cols="11"
          class="pr-0 my-auto"
        >
          <span class="ml-3">
            <span class="ml-11 textEmpty empty">{{message(text)}}</span>
          </span>
        </v-col>
      </v-row>
    </v-card>
</template>
<script>
export default {
  name: "empty_element",
  props: ['text'], 
  data() {
    return {
      
    };
  },
  methods: {
   message(text){
      if (!text) {
        return "Currently Empty";
      } 
      return text;
    }
  },
};
</script>