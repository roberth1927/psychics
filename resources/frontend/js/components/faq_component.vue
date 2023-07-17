<template>
  <div>
    <v-row>
      <v-col
        v-for="(card, index) in cardsItems"
        :key="index"
        :cols="12"
        :sm="6"
        :md="4"
      >
        <v-card
          class="styleCard"
          :style="mobile ? 'margin-bottom: 32px;' : 'margin-bottom: 52px;'"
        >
          <v-card-title>
            <div class="styleTitleIcon cursor-pointer" @click="card.showSubTitle = !card.showSubTitle"
                :style="{ display: 'flex', alignItems: card.title.split('\n').length === 1 ? 'center' : 'flex-start', 'padding-top':  card.paddingTitle ? '12px' : '5px'  }">
              <v-icon  :class="card.showSubTitle ? '' : 'icon-hover'">
                {{
                  card.showSubTitle
                    ? "mdi-minus-box-outline"
                    : "mdi-plus-box-outline"
                }}
              </v-icon>
              <span
                class="styleTitle ml-2"
                >{{ card.title }}</span
              >
            </div>
          </v-card-title>

          <v-card-text class="styleCardSubtitle" v-show="card.showSubTitle">
            <v-list style="margin-left: 15px;margin-bottom: 5px;">
              <v-list-item
                v-for="(subTitle, i) in card.subTitle"
                :key="i"
                :style="[
                  i === 0 ? {} : { 'margin-bottom': '-10px' },
                  i === card.subTitle.length - 1
                    ? { 'margin-bottom': '11px 16px' }
                    : {},
                ]"
              >
                <v-list-item-title
                  style="display: flex; align-items: flex-start;white-space: break-spaces;color: #656b72;font-weight: 500;line-height:1.5;"
                  >{{ subTitle.title
                  }}<a href="/signup">{{
                    subTitle.link ? subTitle.link : ""
                  }}</a></v-list-item-title
                >
              </v-list-item>
            </v-list>
          </v-card-text>
        </v-card>
      </v-col>
    </v-row>
  </div>
</template>
<script>
import { mapGetters } from "vuex";

export default {
  data: () => ({
    showItems: false,
    cardsItems: [
      {
        title: "How do I get my free $5.00 credit?",
        paddingTitle: true,
        subTitle: [
          {
            title: "It’s simple!",
          },
          {
            title: "1. Create your account ",
            link: "here.",
          },
          {
            title: "2. Add funds to your wallet.",
          },
          {
            title:
              "3. You’ll automatically receive an extra $5.00 in your account, free!",
          },
        ],
        showSubTitle: false,
      },
      {
        title: "Can I choose how I receive my reading?",
        subTitle: [
          {
            title:
              "Of course, that’s the beauty of Psychics1on1™! You have the freedom to select whichever method is most comfortable and convenient for you. Our psychics offer readings through: ",
          },
          {
            title: "· Chat",
          },
          {
            title: "· Calling",
          },
          {
            title: "· Video",
          },
        ],
        showSubTitle: false,
      },
      {
        title: "What if I have several questions for my psychic?",
        subTitle: [
          {
            title:
              "That’s what we’re here for! Our psychics are equipped to answer all your questions and will be happy to tackle multiple questions in a single session.",
          },
        ],
        showSubTitle: false,
      },
      {
        title: "How will a psychic reading help me?",
        subTitle: [
          {
            title:
              "If you’re curious about your future, relationships, career and finances, or have questions about life in general, a psychic reading is the answer for you. Our qualified psychics can share insights into your life that you didn’t think were possible. Psychics can help guide you toward a brighter path and offer support when you’re faced with difficult decisions.",
          },
        ],
        showSubTitle: false,
      },
      {
        title: "What types of psychics can I choose from?",
        subTitle: [
          {
            title:
              "We have thousands of readers, covering the full spectrum of psychic abilities, including:",
          },
          {
            title: "· Psychics",
          },
          {
            title: "· Mediums",
          },
          {
            title: "· Astrologers",
          },
          {
            title: "· Palm Readers",
          },
          {
            title: "· Tarot Card Readers",
          },
          {
            title: "· Clairvoyants",
          },
          {
            title: "· Spiritual Healers",
          },
          {
            title: "· Empaths",
          },
          {
            title: "· Clairaudients",
          },
        ],
        showSubTitle: false,
      },
      {
        title: "What if I’m nervous about getting a reading?",
        subTitle: [
          {
            title:
              "It’s important for our psychics to be truthful and straightforward with you. Though the answers they find may not be what you’d hoped, our psychics are are here to help lift and guide you to a better future. Know that these insights are meant to better prepare you for your future, maximize your potential, and help you heal and move forward from your past.",
          },
        ],
        showSubTitle: false,
      },
    ],
  }),
  methods: {},
  mounted() {},
  computed: {
    ...mapGetters({
      mobile: "util/mobile",
    }),
  },
};
</script>
<style scoped>
.styleCard {
  width: 335px;
  margin: 0 auto;
  min-height: 83px;
  background: #ffffff 0% 0% no-repeat padding-box;
  box-shadow: 0px 3px 6px #00000014 !important;
  border-radius: 20px !important;
  opacity: 1;
}
.styleCardSubtitle {
  background: #ffffff 0% 0% no-repeat padding-box;
  box-shadow: 0px 3px 6px #00000014 !important;
  border-radius: 20px !important;
  opacity: 1;
}
.styleTitleIcon {
  display: flex;
  align-items: flex-start;
  padding-bottom: 5px;
}
.styleTitle {
  letter-spacing: var(--unnamed-character-spacing-0);
  font: var(--unnamed-font-style-normal) normal var(--unnamed-font-weight-600)
    15px/20px var(--unnamed-font-family-montserrat);
  color: var(--unnamed-color-43425d);
  text-align: left;
  font: normal normal 600 15px/20px Montserrat;
  letter-spacing: 0px;
  color: #43425d;
  opacity: 1;
  word-break: break-word;
}
.icon-hover:hover {
  color: #8ebef8;
}
</style>
