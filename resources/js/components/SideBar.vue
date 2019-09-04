<template>
  <div class="sidebar">
    <nav class="sidebar-nav">
      <ul class="nav">
        <li class="nav-title">Dashboard</li>
        <li class="nav-item">
          <router-link tag="a" class="nav-link" to="/don-vi" exact-active-class="active" exact>
            <i class="nav-icon icon-drop"></i>Đơn Vị
        </router-link>
        </li>
        <li class="nav-item">
          <router-link tag="a" class="nav-link" to="/du-an" exact-active-class="active">
            <i class="nav-icon icon-drop"></i>Dự Án
        </router-link>
        </li>
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
