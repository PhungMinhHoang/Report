<template>
  <DefaultContainer :nav="nav" />
</template>

<script>
import DefaultContainer from "../container/DefaultContainer";
export default {
  components: {
    DefaultContainer
  },
  data() {
    return {
      nav: [
        { name: "Đơn Vị", url: "/don-vi", icon: "icon-speedometer" },
        {
          name: "Dự Án",
          url: "/du-an",
          icon: "fas fa-project-diagram"
        },
        {
          name: "KPI Veco",
          url: "/kpi-veco",
          icon: "fas fa-project-diagram"
        },
      ]
    };
  }
};
</script>

<style lang="scss">
button[id^="edit-button"],
button[id^="delete-button"] {
  width: 3rem;
  margin-top: 2px;
}
</style>

