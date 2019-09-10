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
        { name: "Dashboard", url: "/", icon: "fas fa-chart-line" },
        { name: "Danh sách", title: true },
        { name: "Đơn Vị", url: "/don-vi", icon: "far fa-building" },
        {
          name: "Đề tài/Dự Án",
          url: "/du-an",
          icon: "fas fa-project-diagram"
        },
        {
          name: "Quy Trình",
          url: "/quy-trinh",
          icon: "fas fa-clipboard-check"
        },
        { name: "Công cụ", title: true },
        {
          name: "Chấm điểm quy trình",
          url: "/kpi-quy-trinh",
          icon: "fas fa-user-check"
        },
        {
          name: "KPI Veco",
          url: "/kpi-veco",
          icon: "fas fa-tools"
        }
      ]
    };
  }
};
</script>

<style lang="scss">
</style>

