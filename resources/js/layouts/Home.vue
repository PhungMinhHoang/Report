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

<style lang="scss">
  /* Import Font Awesome Icons Set */
  $fa-font-path: '~font-awesome/fonts/';
  @import '~font-awesome/scss/font-awesome.scss';
  /* Import Simple Line Icons Set */
  $simple-line-font-path: '~simple-line-icons/fonts/';
  @import '~simple-line-icons/scss/simple-line-icons.scss';
</style>