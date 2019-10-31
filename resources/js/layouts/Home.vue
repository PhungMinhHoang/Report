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
        }
      ]
    };
  },
  mounted() {
    if (this.$auth.user().roles[0].slug == "admin") {
      this.nav.push(
        {
          name: "KPI veco",
          url: "/kpi-veco",
          icon: "fas fa-tools"
        }
      );
    }
    if (this.$auth.user().roles[0].slug == "admin" || this.$auth.user().roles[0].slug == "QA-admin") {
      this.nav.push(
        {
          name: "Import Excel",
          url: "/import-excel",
          icon: "fas fa-upload"
        }
      );
    }

    EventBus.$on("unauthorized", mes => {
      this.$bvToast.toast(mes, {
        title: "Thông báo",
        variant: "danger",
        toaster: "b-toaster-top-center",
        autoHideDelay: 5000
      });
    });
  }
};
</script>

<style lang="scss">
</style>

