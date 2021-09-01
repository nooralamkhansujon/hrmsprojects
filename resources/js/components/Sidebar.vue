<template>
  <!-- BEGIN: Main Menu-->
  <div
    class="main-menu menu-fixed menu-dark menu-accordion menu-shadow"
    data-scroll-to-active="true"
  >
    <div class="navbar-header">
      <ul class="nav navbar-nav flex-row">
        <li class="nav-item mr-auto">
          <a
            class="navbar-brand"
            href="html/ltr/vertical-menu-template-semi-dark/index.html"
          >
            <span class="brand-logo">
              <img src="/images/logo/logo.png" />
            </span>
            <h2 class="brand-text">HRMS</h2>
          </a>
        </li>
        <li class="nav-item nav-toggle">
          <a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse">
            <vue-feather
              class="d-block d-xl-none text-primary toggle-icon font-medium-4"
              type="x"
            ></vue-feather>

            <!-- <i
              class="d-none d-xl-block collapse-toggle-icon font-medium-4 text-primary"
              data-feather="disc"
              data-ticon="disc"
            ></i> -->

            <vue-feather
              class="d-block d-xl-none text-primary toggle-icon font-medium-4"
              type="disc"
            ></vue-feather>
          </a>
        </li>
      </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
      <ul
        class="navigation navigation-main"
        id="main-menu-navigation"
        data-menu="menu-navigation"
      >
        <li class="nav-item">
          <router-link class="d-flex align-items-center" :to="{ name: 'Dashboard' }">
            <vue-feather type="home"></vue-feather>
            <span class="menu-title text-truncate" data-i18n="Dashboards">Dashboard</span>
          </router-link>
        </li>

        <li class="nav-item">
          <a class="d-flex align-items-center">
            <vue-feather type="user"></vue-feather>
            <span class="menu-title text-truncate" data-i18n="User">Employees</span></a
          >
          <ul class="menu-content">
            <li>
              <router-link
                :to="{ name: 'AddEmployee' }"
                class="d-flex align-items-center"
              >
                <vue-feather type="circle"></vue-feather>
                <span class="menu-item text-truncate" data-i18n="List">Add Employee</span>
              </router-link>
            </li>
            <li>
              <router-link
                class="d-flex align-items-center"
                :to="{ name: 'ViewEmployee' }"
              >
                <vue-feather type="circle"></vue-feather>
                <span class="menu-item text-truncate" data-i18n="View"
                  >View Employee</span
                >
              </router-link>
            </li>

          </ul>
        </li>
        <li class="nav-item">
          <router-link class="d-flex align-items-center"
          :to="{ name: 'ViewDepartment' }">
            <vue-feather type="file-text"></vue-feather>
            <span class="menu-title text-truncate" data-i18n="User">Departments</span>
          </router-link>
        </li>
        <li class="nav-item">
          <a class="d-flex align-items-center">
            <vue-feather type="user"></vue-feather>
            <span class="menu-title text-truncate" data-i18n="User">Leaves</span></a
          >
          <ul class="menu-content">
            <li>
              <router-link
                :to="{ name: 'AddLeave', }"
                class="d-flex align-items-center"
              >
                <vue-feather type="circle"></vue-feather>
                <span class="menu-item text-truncate" data-i18n="List">Add Leave</span>
              </router-link>
            </li>
            <li>
              <router-link
                class="d-flex align-items-center"
                :to="{ name: 'Leaves'}"
              >
                <vue-feather type="circle"></vue-feather>
                <span class="menu-item text-truncate" data-i18n="View"
                  >Leave List</span
                >
              </router-link>
            </li>
            <li>
              <router-link
                class="d-flex align-items-center"
                :to="{ name: 'LeaveTypeList'}"
              >
                <vue-feather type="circle"></vue-feather>
                <span class="menu-item text-truncate" data-i18n="View"
                  >Leave Type List</span
                >
              </router-link>
            </li>

          </ul>
        </li>

        <!-- holiday management  -->
        <li class="nav-item">
          <a class="d-flex align-items-center">
            <vue-feather type="user"></vue-feather>
            <span class="menu-title text-truncate" data-i18n="User">Holidays</span></a
          >
          <ul class="menu-content">
            <li>
              <router-link
                class="d-flex align-items-center"
                :to="{ name: 'Holidays'}"
              >
                <vue-feather type="circle"></vue-feather>
                <span class="menu-item text-truncate" data-i18n="View"
                  >Holiday List</span
                >
              </router-link>
            </li>
            <li>
              <router-link
                class="d-flex align-items-center"
                :to="{ name: 'HolidayTypes'}"
              >
                <vue-feather type="circle"></vue-feather>
                <span class="menu-item text-truncate" data-i18n="View"
                  >HolidayType List</span
                >
              </router-link>
            </li>

          </ul>
        </li>
      </ul>
    </div>
  </div>
  <!-- END: Main Menu-->
</template>

<script>
import initAppMenu from "../core/app-menu.js";
import initApp from "../core/app.js";
import formWizard from "../core/form-wizard.js";
import FormPicker from "../core/form-pickers.js";
export default {
  components: {},
  data() {
    return {
      links: [],
    };
  },
  watch: {
    links() {
      this.hasActiveClass();
    },
  },
  methods: {},
  mounted() {
    initAppMenu();
    initApp();
    formWizard();
    FormPicker();
    window.addEventListener("resize", function () {
      // We execute the same script as before
      var vh = window.innerHeight * 0.01;
      document.documentElement.style.setProperty("--vh", vh + "px");
    });
  },
};
</script>

<style scoped>
.main-menu.menu-light .navigation > li.active > a.router-link-exact-active {
  background: linear-gradient(118deg, #7367f0, rgba(115, 103, 240, 0.7));
  box-shadow: 0 0 10px 1px rgba(115, 103, 240, 0.7);
  color: #ffffff;
  font-weight: 400;
  border-radius: 4px;
}
/* .main-menu.menu-light .navigation > li ul .active {
  background : linear-gradient(118deg, #7367F0, rgba(115, 103, 240, 0.7));
  box-shadow : 0 0 10px 1px rgba(115, 103, 240, 0.7);
  border-radius : 4px;
  z-index : 1;
} */

.main-menu.menu-dark .navigation > li.active > a.router-link-exact-active {
  background: linear-gradient(118deg, #7367f0, rgba(115, 103, 240, 0.7));
  box-shadow: 0 0 10px 1px rgba(115, 103, 240, 0.7);
  color: #ffffff;
  font-weight: 400;
  border-radius: 4px;
}

.semi-dark-layout .main-menu-content .navigation-main .nav-item .menu-content li {
  box-shadow: none;
  background: #283046;
}
.semi-dark-layout .main-menu-content .navigation-main .nav-item .menu-content ul {
  /* box-shadow: none; */
  background: transparent;
}

.semi-dark-layout
  .main-menu-content
  .navigation-main
  .nav-item
  .menu-content
  li.active
  a.router-link-exact-active {
  background: linear-gradient(118deg, #7367f0, rgba(115, 103, 240, 0.7)) !important;
}

.semi-dark-layout .main-menu-content .navigation-main .nav-item .menu-content li {
}
</style>
