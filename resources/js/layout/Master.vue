<template>
  <!-- header components  -->
  <Header v-if="!currentRoute"></Header>
  <!-- side bar components -->
  <Sidebar v-if="!currentRoute"></Sidebar>
  <!-- content  -->

  <!-- BEGIN: Content-->
  <div class="app-content content" v-if="!currentRoute">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
      <router-view></router-view>
    </div>
  </div>

  <!--  for login or register -->
  <div class="app-content content my-0" v-else>
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
      <!-- <div class="content-header row">
                </div> -->
      <div class="content-body">
        <div class="auth-wrapper auth-v1 px-2">
          <div class="auth-inner py-2">
            <router-view></router-view>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- or login or register-->

  <div class="sidenav-overlay"></div>
  <div class="drag-target"></div>

  <!-- footer  -->
  <Footer v-if="!currentRoute"></Footer>
</template>

<script>
import Header from "../components/Header";
import Sidebar from "../components/Sidebar";
import Footer from "../components/Footer.vue";
import User from "../api/User.js";

export default {
  components: {
    Header,
    Sidebar,
    Footer,
  },
  computed: {
    currentRoute() {
      let currentRoute = this.$router.currentRoute.value.path; //sign
      if (currentRoute == "/login" || currentRoute == "/signup") {
        return true;
      } else {
        return false;
      }
    },
  },
  mounted() {
    feather.replace({
      width: 14,
      height: 14,
    });
  },
};
</script>
