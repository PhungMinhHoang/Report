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
        { name: "Dashboard", url: "/", icon: "fas fa-tachometer-alt" },
        { name: "Danh sách", title: true },
        // { name: "Đơn Vị", url: "/don-vi", icon: "far fa-building" },
        {
          name: "Quy trình",
          url: "/quy-trinh",
          icon: "fas fa-clipboard-check"
        },
        {
          name: "Đề tài/Dự án",
          url: "/du-an",
          icon: "fas fa-project-diagram"
        },
        {
          name: "Kpi quy trình",
          url: "/kpi-quy-trinh",
          icon: "fas fa-chart-line"
        },
        { name: "Công cụ", title: true },
        {
          name: "Chấm điểm quy trình",
          url: "/check-list",
          icon: "fas fa-user-check"
        },
        {
          name: "KPI veco",
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

