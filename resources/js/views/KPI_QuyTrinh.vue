<template>
  <form action class="container-fluid">
    <!-- Select De Tai, Quy Trinh -->
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <i class="icon-note"></i> Checklist KPI
        </div>
        <div class="card-body">
          <fieldset class="form-group">
            <table class="table table-bordered">
              <tr>
                <th scope="row">Tên Đề tài/Dự án</th>
                <td colspan="3">
                  <select name="de_tai" class="form-control select2-single">
                    <option value>Chọn đề tài</option>
                  </select>
                </td>
              </tr>
              <tr>
                <th scope="row">PM Đề tài/Dự án</th>
                <td>Tạ Hồng Nam</td>
                <th scope="row">QA Đề tài/Dự án</th>
                <td>thanghm</td>
              </tr>
              <tr>
                <th scope="row">Ngày đánh giá</th>
                <td>
                  <input class="form-control" id="date" type="date" />
                </td>
                <th scope="row">Quy trình áp dụng</th>
                <td>
                  <select
                    class="form-control select2-single"
                    name="quy_trinh"
                    id="select_quy_trinh"
                    role="tablist"
                    v-model="quy_trinh_id"
                  >
                    <option value>Chọn quy trình</option>
                    <option :value="qt.id" v-for="(qt,index) in quy_trinh" :key="index">{{qt.ten}}</option>
                  </select>
                </td>
              </tr>
            </table>
          </fieldset>
        </div>
      </div>
    </div>
    <!-- End Select De Tai, Quy Trinh -->

    <!-- Checklist -->
    <ChecklistSX :quy_trinh_id="quy_trinh_id" :du_an_id="1" :thoigian="null" v-if="quy_trinh_id==1"></ChecklistSX>
  </form>
</template>

<script>
import ChecklistSX from "../components/table/ChecklistSX";
export default {
  name: "KPI_QuyTrinh",
  components: {
    ChecklistSX
  },
  data() {
    return {
      quy_trinh: null,
      quy_trinh_id: null
    };
  },
  mounted() {
    axios.get("/quy-trinh").then(response => {
      this.quy_trinh = response.data;
    });
  }
};
</script>

<style>
</style>