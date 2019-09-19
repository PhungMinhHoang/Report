<template>
  <form action class="container-fluid">
    <!-- Select De Tai, Quy Trinh -->
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <i class="icon-note"></i> Checklist
        </div>
        <div class="card-body">
            <table class="table table-bordered">
              <tr>
                <th scope="row">Tên Đề tài/Dự án</th>
                <td colspan="3">
                  <select class="form-control" id="select_de_tai" v-model="de_tai">
                    <option :value="null" disabled>-- Chọn đề tài/dự án --</option>
                    <option :value="dt" v-for="(dt,index) in options_dt" :key="index">{{dt.ten_de_tai}}</option>
                  </select>
                </td>
              </tr>
              <tr>
                <th scope="row">Ngày đánh giá</th>
                <td>
                  <input class="form-control" id="date" type="date" v-model="thoigian"/>
                </td>
                <th scope="row">Quy trình áp dụng</th>
                <td>
                  <select class="form-control select2-single" id="select_quy_trinh" v-model="quy_trinh">
                    <option :value="null" disabled>-- Chọn quy trình --</option>
                    <option :value="qt" v-for="(qt,index) in options_qt" :key="index">{{qt.ten}}</option>
                  </select>
                </td>
              </tr>
            </table>
        </div>
      </div>
    </div>
    <!-- End Select De Tai, Quy Trinh -->

    <!-- Checklist -->
    <CheckListForm
      :quy_trinh="quy_trinh"
      :de_tai="de_tai"
      :thoigian="thoigian"
      v-if="quy_trinh!=null && quy_trinh.id==1"
    ></CheckListForm>
  </form>
</template>

<script>
import CheckListForm from "../components/form/CheckListForm";
export default {
  name: "CheckList",
  components: {
    CheckListForm
  },
  data() {
    return {
      options_qt: [],
      quy_trinh: null,
      options_dt: [],
      de_tai: null,
      thoigian: null,
    };
  },
  mounted() {
    axios.get("/quy-trinh").then(response => {
      this.options_qt = response.data;
    });
    axios.get("/du-an").then(response => {
      this.options_dt = response.data;
    });
  }
};
</script>

<style>
</style>