<template>
  <div class="app">
    <AppHeader fixed>
      <SidebarToggler class="d-lg-none" display="md" mobile />
      <b-link class="navbar-brand" to="/">
        <img
          class="navbar-brand-full"
          src="assets/images/logo_full.png"
          width="100"
          height="55"
          alt="VHT Logo"
        />
        <img
          class="navbar-brand-minimized"
          src="assets/images/logo_mini.png"
          width="30"
          height="30"
          alt="VHT Logo"
        />
      </b-link>
      <SidebarToggler class="d-md-down-none" display="lg" />
      <b-navbar-nav class="d-md-down-none">
        <b-nav-item class="px-3" to="/dashboard">Dashboard</b-nav-item>
        <b-nav-item class="px-3" to="/users" exact>Users</b-nav-item>
        <b-nav-item class="px-3">Settings</b-nav-item>
      </b-navbar-nav>
      <b-navbar-nav class="ml-auto">
        <DefaultHeaderDropdownAccnt />
      </b-navbar-nav>
      <!-- <AsideToggler class="d-none d-lg-block" /> -->
      <!--<AsideToggler class="d-lg-none" mobile />-->
    </AppHeader>
    <div class="app-body">
      <AppSidebar fixed>
        <SidebarNav :navItems="nav"></SidebarNav>
        <SidebarMinimizer />
      </AppSidebar>
      <main class="main">
        <Breadcrumb :list="list" />
        <div class="container-fluid">
          <router-view></router-view>
        </div>
      </main>
      <!-- <AppAside fixed>
        <DefaultAside />
      </AppAside> -->
    </div>
    <TheFooter>
      <!--footer-->
      <div>
        <i class="fas fa-email"></i>
        <div class="ml-1">
          <span>Mọi thắc mắc vui lòng liên hệ admin:</span>
          <address>
            <i class="far fa-envelope"></i> hoangpm7@viettel.com.vn
            <br>
            <i class="fas fa-phone"></i> 0977481901
          </address>
        </div>
      </div>
    </TheFooter>
  </div>
</template>

<script>
import {
  Header as AppHeader,
  SidebarToggler,
  Sidebar as AppSidebar,
  SidebarMinimizer,
  SidebarNav,
  Aside as AppAside,
  AsideToggler,
  Footer as TheFooter,
  Breadcrumb
} from "@coreui/vue";
import DefaultAside from "./DefaultAside";
import DefaultHeaderDropdownAccnt from "./DefaultHeaderDropdownAccnt";

export default {
  name: "DefaultContainer",
  components: {
    AsideToggler,
    AppHeader,
    AppSidebar,
    AppAside,
    TheFooter,
    Breadcrumb,
    DefaultAside,
    DefaultHeaderDropdownAccnt,
    SidebarToggler,
    SidebarNav,
    SidebarMinimizer
  },
  props: {
    nav: Array
  },
  data() {
    return {};
  },
  computed: {
    name() {
      return this.$route.name;
    },
    list() {
      return this.$route.matched.filter(
        route => route.name || route.meta.label
      );
    }
  },
  
};
</script>
