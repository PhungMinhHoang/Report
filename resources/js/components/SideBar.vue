<template>
  <div class="sidebar">
    <nav class="sidebar-nav">
      <ul class="nav">
        <li class="nav-title">Dashboard</li>
        <router-link tag="li" class="nav-item" to="/du-an" exact-active-class="active" exact>
          <a class="nav-link">
            <i class="nav-icon icon-drop"></i>Dự Án
          </a>
        </router-link>
        <router-link tag="li" class="nav-item" to="/don-vi" exact-active-class="active">
          <a class="nav-link">
            <i class="nav-icon icon-drop"></i>Đơn Vị
          </a>
        </router-link>
      </ul>
    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
  </div>
</template>

<script>
export default {};
</script>

<style>
</style>
