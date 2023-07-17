<template>
    <div>
        <div class="row">
          <div class="col sfSign">
            <h3 style="opacity: 0.6; color: #43425d; text-align: center">
              As Featured In
            </h3>
          </div>
        </div>
        <div class="row">
          <div
            class="col sfFeatured"
            style="text-align: center"
            v-if="!$vuetify.breakpoint.xsOnly"
          >
            <img
              style="height: 22px"
              src="/images/press/extra_new.png"
              alt="Extra New"
            />
            <img
              style="height: 96px;width: 100px;"
              src="/images/press/daily-mail.svg"
              alt=""
            />
            <img style="height: 70px" src="/images/press/yahoo.png" alt="" />
            <img style="height: 24px" src="/images/press/msn.svg" alt="" />
            <img
              style="height: 42px"
              src="/images/press/in-touch-weekly-logo-vector.png"
              alt=""
            />
            <img
              style="height: 18px"
              src="/images/press/la_opinions.png"
              alt=""
            />
            <img style="height: 25px;" src="/images/press/US_WEEKLY_LOGO_(1).svg" alt="" />
            <img style="height: 17px" src="/images/press/enquirer.png" alt="" />
          </div>
          <div class="col sfFeaturedMo" v-else>
            <div class="row">
              <div class="col-6" style="text-align: center; height: 70px">
                <img
                  style="height: 27px"
                  src="/images/press/extra_new.png"
                  alt="Extra New"
                />
              </div>
              <div class="col-6" style="text-align: center; height: 70px">
                <img
                  style="height: 100px;width: 106px;"
                  src="/images/press/daily-mail.svg"
                  alt="Refinery29"
                />
              </div>
            </div>
            <div class="row">
              <div class="col-6" style="text-align: center; height: 70px">
                <img
                  style="height: 70px"
                  src="/images/press/yahoo.png"
                  alt=""
                />
              </div>
              <div class="col-6" style="text-align: center; height: 70px">
                <img style="height: 32px" src="/images/press/msn.svg" alt="" />
              </div>
            </div>
            <div class="row">
              <div class="col-6" style="text-align: center; height: 70px">
                <img
                  style="height: 38px"
                  src="/images/press/in-touch-weekly-logo-vector.png"
                  alt=""
                />
              </div>
              <div class="col-6" style="text-align: center; height: 70px">
                <img
                  style="height: 23px"
                  src="/images/press/la_opinions.png"
                  alt=""
                />
              </div>
            </div>
            <div class="row">
              <div class="col-6" style="text-align: center; height: 70px">
                <img style="height: 25px;" src="/images/press/US_WEEKLY_LOGO_(1).svg" alt="" />
              </div>
              <div class="col-6" style="text-align: center; height: 70px">
                <img
                  style="height: 22px"
                  src="/images/press/enquirer.png"
                  alt=""
                />
              </div>
            </div>
          </div>
        </div>
    </div>
</template>
<script>
export default {
    
}
</script>
<style>
.sfFeatured img {
  margin: 0px 20px;
}

.sfFeaturedMo .row .col-6 {
  height: 70px;
  display: flex;
  align-items: center;
  justify-content: center;
}

.sfSign h1 {
  color: #1f1e34;
  text-align: center;
  letter-spacing: 0.64px;
  line-height: 35px;
  font-size: 32px;
  font-weight: 500;
  padding: 40px 0px;
}

.sfSign h2 {
  color: #1f1e34;
  text-align: left;
  letter-spacing: 0.5px;
  line-height: 35px;
  font-size: 25px;
  font-weight: 600;
  padding-bottom: 10px;
}
.sfSign h3 {
  color: #1f1e34;
  text-align: left;
  letter-spacing: 0px;
  line-height: 26px;
  font-size: 16px;
  padding-top: 10px;
}

.sfSign p {
  color: #5a6066;
  text-align: left;
  letter-spacing: 0px;
  line-height: 26px;
  font-size: 16px;
  padding-bottom: 10px;
}
</style>