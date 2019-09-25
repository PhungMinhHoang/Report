<template>
  <div>
    <!-- Select De Tai, Quy Trinh -->
    <b-card>
      <b-card-header>
        <i class="fas fa-clipboard-check fa-2x"></i>
        <h2>CheckList</h2>
      </b-card-header>
      <b-card-body>
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
              <input class="form-control" id="date" type="date" v-model="thoigian" />
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
      </b-card-body>
    </b-card>
    <!-- Checklist -->
    <b-card v-if="selectQT() == 'SP'">
      <b-card-body>
        <CheckListForm
          :quy_trinh="quy_trinh"
          :de_tai="de_tai"
          :thoigian="thoigian"
          :key="renderKey"
        ></CheckListForm>
      </b-card-body>
    </b-card>
  </div>
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
      thoigian: new Date().toISOString().substring(0, 10),
      renderKey: 0
    };
  },
  watch:{
    de_tai(){
      //rerender CheckListForm when de_tai change
      this.renderKey++;
    }
  },
  methods: {
    selectQT() {
      if (
        this.quy_trinh != null &&
        this.de_tai != null &&
        this.thoigian != null
      ) {
        return this.quy_trinh.ma_quy_trinh;
      } else if (this.quy_trinh != null) {
        let mes1 = this.de_tai == null ? "Đề tài " : "",
          mes3 = this.thoigian == null ? "Ngày đánh giá" : "",
          mes2 = this.de_tai == null && this.thoigian == null ? "và " : "";
        this.$bvToast.toast(`Vui lòng chọn: ` + mes1 + mes2 + mes3, {
          title: `Thông báo`,
          variant: "warning",
          toaster: "b-toaster-top-center",
          autoHideDelay: 5000
        });
        return null;
      }
    }
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