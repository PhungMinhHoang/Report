<template>
  <div>
    <div class="animated">
      <b-card>
        <b-card-header>
          <i class="fas fa-upload fa-2x"></i>
          <h2>Import Excel</h2>
          <div class="card-header-actions"></div>
        </b-card-header>
        <b-card-body>
          <strong style="color:red">Các trường thông tin cần có:</strong>
          <div>
            <div>
              <strong>Sheet Pi1:</strong>
              <table>
                <tr>
                  <td>ma_quy_trinh</td>
                  <td>ma_de_tai</td>
                  <td>diem</td>
                  <td>thoigian</td>
                </tr>
              </table>
            </div>
            <br />
            <div>
              <strong>Sheet Pi2,Pi3,Pi4,Pi5:</strong>
              <table>
                <tr>
                  <td>TCT</td>
                  <td>K1</td>
                  <td>K2</td>
                  <td>K3</td>
                  <td>thoigian</td>
                </tr>
              </table>
            </div>
          </div>
          <br />
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
    if (
      window.Vue.auth.user().roles[0].slug == "QA-admin" ||
      window.Vue.auth.user().roles[0].slug == "admin"
    ) {
      next();
    } else {
      let mes = `Bạn không có quyền truy cập vào ${to.name}`;
      window.EventBus.$emit("unauthorized", mes);
      next(false);
    }
  }
};
</script>

<style lang = "scss">
table {
  display: inline-table;
  td {
    border: solid 1px;
    width: 20%;
  }
}
</style>