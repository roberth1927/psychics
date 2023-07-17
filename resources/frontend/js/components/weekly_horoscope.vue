<template>
  <div>
    <section class="hero">
      <div :style="$vuetify.breakpoint.xs || $vuetify.breakpoint.smAndDowm ? 'margin-top: 45px;' : ''">
        <h1>Discover Your Weekly Horoscope Today</h1>
        <p :style="$vuetify.breakpoint.xs || $vuetify.breakpoint.smAndDowm ? 'padding: 0px 15px;' : ''">Find out what’s in store for the week ahead<br class="show-desktop" >Stay in touch with your future today!</p>
        <div :style="$vuetify.breakpoint.xs || $vuetify.breakpoint.smAndDowm ? 'padding: 0px 15px;' : ''">
          <input type="email" v-model="user_horoscope.email" placeholder="Enter Email" :style="$vuetify.breakpoint.xs || $vuetify.breakpoint.smAndDowm ? 'padding-left: 20px;' : ''">
          <button @click="getTokenUser()">Try It</button>
          <div class="float-right text-danger" v-if="errors1.email" >
            {{ errors1.email[0] }}
          </div>
        </div>
      </div>
    </section>
    <section class="principal">
      <div class="principal-blog" :style="`background-image: url('/images/blog_images/${ principalBlog.image }');`">
        <div>
          <p>{{ principalBlog.title }}</p>
          <a :href="`/blog/${principalBlog.url}`">
            Read the latest issue
            <img src="/images/horoscopes/arrow_right_alt.svg" alt="Right Arrow">
          </a>
        </div>
      </div>
      <div class="featured">
        <h2>Featured</h2>
        <ul>
          <li v-for="blog in featuredBlogs" :key="blog.subtitle"> 
            <a :href="`/blog/${blog.url}`">
              <img :src="`/images/blog_images/${ blog.image }`" :alt="blog.title">
            </a>
            <div>
              <a :href="`/blog/${blog.url}`">{{ blog.title }}</a>
              <span>{{ blog.date }}</span>
            </div>
          </li>
        </ul>
      </div>
    </section>
    <section class="latest">
      <h2>Latest Stories</h2>
      <ul>
        <li v-for="blog in latestBlogs" :key="blog.subtitle"> 
          <a :href="`/blog/${blog.url}`">
            <img :src="`/images/blog_images/${ blog.image }`" :alt="blog.title">
          </a>
          <div>
            <span>{{ blog.categories[Math.floor(Math.random() * blog.categories.length)].name }}</span>
            <p>{{ blog.title }}</p>
          </div>
        </li>
      </ul>
      <h2>More Stories</h2>
      <ul>
        <li v-for="blog in moreBlogs" :key="blog.subtitle"> 
          <a :href="`/blog/${blog.url}`">
            <img :src="`/images/blog_images/${ blog.image }`" :alt="blog.title">
          </a>
          <div>
            <span>{{ blog.categories[Math.floor(Math.random() * blog.categories.length)].name }}</span>
            <p>{{ blog.title }}</p>
          </div>
        </li>
      </ul>
    </section>
    <section class="discover">
      <div>
        <h2>Discovery Your Weekly Horoscope Today</h2>
        <p>Find out what’s in store for the week ahead.<br>Stay in touch with your future today!</p>
        <div>
          <input type="email" v-model="user_horoscope.email" placeholder="Enter Email">
          <button @click="getTokenUser()">Try It</button>
          <div class="float-right text-danger" v-if="errors1.email">
            {{ errors1.email[0] }}
          </div>
        </div>
      </div>
    </section>
  </div>
</template>
<script>
export default {
  props: ['blogs'],
  data() {
    return {
      principalBlog: [],
      featuredBlogs: [],
      latestBlogs: [],
      moreBlogs: [],
      user_horoscope: {
        email: "",
        token: "",
      },
      errors1: [],
    }
  },
  mounted() {
    let counter = 0;
    const number = {
      principal: 1,
      featured: 3,
      latest: 6,
      more: 9,
    }
    this.principalBlog = this.blogs[0];
    counter += number.principal;
    this.featuredBlogs = this.blogs.slice(counter, counter + number.featured);
    counter += number.featured;
    this.latestBlogs = this.blogs.slice(counter, counter + number.latest);
    counter += number.latest;
    this.moreBlogs = this.blogs.slice(counter, counter + number.more);
  },
  methods: {
    getTokenUser() {
      if (this.user_horoscope.email == "") {
        this.errors1 = {
          email: ["Please enter your email"],
        };
        return ;
      }
      this.loading = true;
      const self = this;
      grecaptcha.ready(function () {
        grecaptcha
          .execute("6Ld5_t0UAAAAALQUAPjguf3meaiPSGQUAh_GcDuD", {
            action: "registerUser",
          })
          .then(function (token) {
            if (token) {
              self.user_horoscope.token = token;
              self.registerUser();
            }
          });
      });
    },
    registerUser() {
      var input = this.user_horoscope;
      axios
        .post("/register/weekly-horoscope", input)
        .then((res) => {
          console.log(res);
          if (res.status == 201) {
            this.$root.$emit("open_standard_dialog", {
              buttom_text: "Got It",
              title: "You're Subscribed!",
              subtitle: "We'll deliver your horoscope each Monday.",
            });
          }
          this.loading = false;
          this.errors1 = [];
          this.resetUser();
        })
        .catch((error) => {
          this.user_horoscope.token = "";
          this.message =
            "There is something wrong, please check that all form fields are correct.";

          if (
            error.response &&
            (error.response.status === 401 || error.response.status === 419)
          ) {
            location.reload();
          }
          if (error.response.status === 422) {
            this.errors1 = error.response.data.errors;
          }

          if (typeof error.response.data === "object") {
            this.errors1 = error.response.data.errors;
          } else {
            this.errors1 = ["Something went wrong. Please try again."];
          }
          this.show = false;
          this.loading = false;
          this.message =
            "There is something wrong, please check that all form fields are correct.";
        });
    },
    resetUser() {
      this.user_horoscope = {
        email: "",
        token: "",
      };
    },
  }
}

</script>
<style lang="scss" scoped>
@mixin size-picture($height, $width) {
  max-height: $height;
  min-height: $height;
  max-width: $width;
  min-width: $width;
}
$black-color: #43425D;
section {
  margin-bottom: 40px;
  max-width: 1280px;
  ul {
    list-style-type: none;
    padding-left: 0;
  }
}
.show-desktop {
  display: none;
}
.hero {
  background-image: url('/images/horoscopes/weekly-mobile.jpg');
  width: 100vw;
  height: 125vw;
  background-size: cover;
  padding: 20px 0;
  > div {
    width: 95%;
    margin: 0 auto;
    > h1 {
      font-size: 25px;
      text-align: center;
      color: white;
      font-weight: 600;
    }
    > p {
      color: white;
      margin-top: 20px;
      font-size: 16px;
      text-align: center;
      font-weight: 500;
    }
    > div {
      display: flex;
      justify-content: center;
      align-items: center;
      margin-top: 20px;
      max-width: 640px;
      width: 100%;
      position: relative;
      > input {
        width: 68%;
        border-top-left-radius: 10px;
        border-bottom-left-radius: 10px;
        padding: 10px;
        background-color: white;
        color: $black-color;
        font-size: 16px;
        &::placeholder {
          opacity: 1 !important;
          color: $black-color;
          font-weight: 400;
        }
      }
      > button {
        max-width: 200px;
        width: 32%;
        border-top-right-radius: 10px;
        border-bottom-right-radius: 10px;
        padding: 10px;
        background-color: #8EBEF8;
        color: white;
        font-size: 16px;
        font-weight: 500;
      }
      > div {
        font-size: 12px;
        margin-right: 20px;
        font-weight: bold;
        position: absolute;
        bottom: 0;
        left: 10px;
      }
    }
  }
}
.principal-blog {
  width: 100vw;
  height: 117vw;
  background-size: cover;
  background-position: center;
  display: flex;
  flex-direction: column-reverse;
  padding-bottom: 20px;
  margin-bottom: 40px;
  > div {
    width: 95%;
    margin: 0 auto;
    background-color: white;
    padding: 20px;
    > p {
      font-size: 16px;
      color: $black-color;
      font-weight: bold;
      margin-bottom: 10px;
      font-weight: 600;
    }
    > a {
      text-align: center;
      font-size: 18px;
      text-decoration: none;
      font-weight: 400;
      > img {
        width: 25px;
        margin-left: 15px;
      }
    }
  }
}
.featured {
  width: 95%;
  margin: 0 auto;
  > h2 {
    color: $black-color;
    font-size: 18px;
    font-weight: 600;
  }
  > ul {
    > li {
      border-bottom: 1px solid rgba($color: #000000, $alpha: .2);
      padding: 20px 0;
      display: flex;
      > a {
        @include size-picture(80px, 110px);
        margin-right: 20px;
        > img {
          width: 100%;
          height: 100%;
          object-fit: cover;
        }
      }
      > div {
        width: 100%;
        > a {
          display: block;
          font-size: 14px;
          text-decoration: none;
          color: $black-color;
          margin-bottom: 15px;
          font-weight: 600;
        }
        > span {
          display: block;
          font-size: 14px;
          color: #989898;
          font-weight: 600;
        }
      }
    }
  }
}
.latest {
  width: 95%;
  margin: 0 auto;
  > h2 {
    color: $black-color;
    font-size: 18px;
    margin-bottom: 25px;
    font-weight: 600;
  }
  > ul {
    margin-bottom: 40px;
    > li {
      margin-bottom: 20px;
      > a {
        width: 100%;
        > img {
          width: inherit;
          object-fit: cover;
        }
      }
      > div {
        margin-top: 10px;
        width: 100%;
        > span {
          display: block;
          font-size: 16px;
          text-decoration: none;
          color: #A163C1;
          margin-bottom: 15px;
          font-weight: 600;
        }
        > p {
          display: block;
          font-size: 16px;
          color: $black-color;
          font-weight: normal;
          margin-bottom: 0;
          font-weight: 500;
        }
      }
    }
  }
}
.discover {
  background-color: #43425D;
  width: 100%;
  padding: 40px 0;
  margin-bottom: 0;
  > div {
    width: 95%;
    margin: 0 auto;
    > h2 {
      font-size: 25px;
      text-align: center;
      color: white;
      font-weight: 600;
      margin-bottom: 20px;
    }
    > p {
      color: white;
      font-size: 16px;
      text-align: center;
      margin-bottom: 40px;
      font-weight: 500;
    }
    > div {
      display: flex;
      justify-content: center;
      align-items: center;
      max-width: 640px;
      width: 100%;
      position: relative;
      > input {
        width: 68%;
        border-top-left-radius: 10px;
        border-bottom-left-radius: 10px;
        padding: 10px;
        background-color: white;
        color: $black-color;
        font-size: 16px;
        &::placeholder {
          opacity: 1 !important;
          color: $black-color;
          font-weight: 400;
        }
      }
      > button {
        max-width: 200px;
        width: 32%;
        border-top-right-radius: 10px;
        border-bottom-right-radius: 10px;
        padding: 10px;
        background-color: #8EBEF8;
        color: white;
        font-size: 16px;
        font-weight: 500;
      }
      > div {
        font-size: 12px;
        margin-right: 20px;
        font-weight: bold;
        position: absolute;
        bottom: 0;
        left: 10px;
      }
    }
  }
}
@media screen and (min-width: 768px) {
.show-desktop {
  display: block;
}
.hero {
  background-image: url('/images/horoscopes/weekly-desktop.jpg');
  height: 42vw;
  display: flex;
  flex-direction: column;
  justify-content: center;
  margin: 0 auto 40px auto;
  > div {
    width: 85%;
    > h1 {
      font-size: 40px;
      text-align: left;
    }
    > p {
      font-size: 22px;
      text-align: left;
    }
    > div {
      justify-content: flex-start;
      margin-top: 30px;
      height: 75px;
      > input {
        font-size: 22px;
        height: inherit;
        &::placeholder {
          font-weight: 500;
        }
      }
      > button {
        font-size: 28px;
        height: inherit;
      }
      > div {
        font-size: 16px;
      }
    }
  }
}
.principal {
  display: flex;
  justify-content: space-between;
  width: 95%;
  margin: 0 auto 40px auto;
}
.principal-blog {
  width: 57%;
  height: auto;
  > div {
    width: 95%;
    margin: 0 auto;
    > p {
      font-size: 20px;
      margin-bottom: 0;
    }
    > a {
      text-align: right;
      display: block;
    }
  }
}
.featured {
  width: 38%;
  > h2 {
    font-size: 25px;
  }
  > ul {
    > li {
      flex-direction: row-reverse;
      > a {
        @include size-picture(110px, 150px);
        margin-right: 0;
        margin-left: 20px;
      }
      > div {
        width: 100%;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        padding-bottom: 10px;
        > a {
          font-size: 16px;
          margin-bottom: 20px;
        }
        > span {
          font-size: 16px;
        }
      }
    }
  }
}
.latest {
  > h2 {
    padding-left: 10px;
    font-size: 25px;
    margin-bottom: 40px;
  }
  > ul {
    margin-bottom: 40px;
    display: flex;
    flex-wrap: wrap;
    > li {
      width: 426px;
      padding-left: 10px;
      padding-right: 10px;
      > a {
        width: 406px;
        height: 200px;
      }
      > div {
        margin-top: 15px;
        width: 100%;
        > span {
          margin-bottom: 10px;
        }
      }
    }
  }
}
.discover {
  margin: 0 auto;
  > div {
    max-width: 700px;
    > h2 {
      margin-bottom: 30px;
      text-transform: uppercase;
    }
    > p {
      font-size: 25px;
      margin-bottom: 30px;
    }
    > div {
      margin: 0 auto;
      height: 75px;
      > input {
        font-size: 22px;
        height: inherit;
        &::placeholder {
          font-weight: 500;
        }
      }
      > button {
        font-size: 28px;
        height: inherit;
      }
      > div {
        font-size: 16px;
      }
    }
  }
}
}
@media screen and (min-width: 1348px) {
.hero {
  width: 1280px;
  height: 538px;
}
.principal {
  width: 1280px;
}
.latest {
  width: 1280px;
}
.discover {
  width: 1280px;
}
}
</style>