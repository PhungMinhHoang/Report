<template>
  <div>
    <div class="animated">
      <b-card>
        <b-card-header>
          <i class="fas fa-upload fa-2x"></i>
          <h2>Import Excel</h2>
          <div class="card-header-actions">
          </div>
        </b-card-header>
        <b-card-body>
          <ImportExcelForm />
        </b-card-body>
      </b-card>
    </div>
  </div>
</template>

<script>
import ImportExcelForm from "../components/form/ImportExcelForm";

export default {
  name: "ImportExcel",
  components: {
    ImportExcelForm
  },
  data: function() {
    return {};
  },
  methods: {},
  beforeRouteEnter(to, from, next) {
    if (window.Vue.auth.user().roles[0].slug == "QA-admin" || window.Vue.auth.user().roles[0].slug == "admin") {
      next();
    } else {
      let mes = `Bạn không có quyền truy cập vào ${to.name}`;
      window.EventBus.$emit("unauthorized", mes);
      next(false);
    }
  }
};
</script>

<style>
</style>