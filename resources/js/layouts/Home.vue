<template>
  <div class="app header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show">
    <header-component />
    <div class="app-body">
      <sidebar />
      <div class="container-fluid">
           <router-view></router-view>
      </div>
    </div>
    <footer-component />
  </div>
</template>

<script>
export default {
  components: {}
};
</script>

<style>
</style>
