<template>
  <div class="app header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show">
    <header-component />
    <div class="app-body">
      <sidebar />
      <main class="main">
        <div class="container-fluid">
           <router-view></router-view>
      </div>
      </main>
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