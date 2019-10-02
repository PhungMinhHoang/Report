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
              <select class="form-control select2-single" id="select_quy_trinh" v-model="quy_trinh" @change="showMessage()">
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
        <CheckListSPForm :quy_trinh="quy_trinh" :de_tai="de_tai" :thoigian="thoigian" :key="renderKey"></CheckListSPForm>
      </b-card-body>
    </b-card>
    <b-card v-else-if="selectQT() == 'CK'">
      <b-card-body>
        <CheckListCKForm :quy_trinh="quy_trinh" :de_tai="de_tai" :thoigian="thoigian" :key="renderKey"></CheckListCKForm>
      </b-card-body>
    </b-card>
    <b-card v-else-if="selectQT() == 'PC'">
      <b-card-body>
        <CheckListSPForm :quy_trinh="quy_trinh" :de_tai="de_tai" :thoigian="thoigian" :key="renderKey"></CheckListSPForm>
      </b-card-body>
    </b-card>
    <b-card v-else-if="selectQT() == 'PCRG'">
      <b-card-body>
        <CheckListSPForm :quy_trinh="quy_trinh" :de_tai="de_tai" :thoigian="thoigian" :key="renderKey"></CheckListSPForm>
      </b-card-body>
    </b-card>
    <b-card v-else-if="selectQT() == 'PM'">
      <b-card-body>
        <CheckListSPForm :quy_trinh="quy_trinh" :de_tai="de_tai" :thoigian="thoigian" :key="renderKey"></CheckListSPForm>
      </b-card-body>
    </b-card>
    <b-card v-else-if="selectQT() == 'SXTN'">
      <b-card-body>
        <CheckListSPForm :quy_trinh="quy_trinh" :de_tai="de_tai" :thoigian="thoigian" :key="renderKey"></CheckListSPForm>
      </b-card-body>
    </b-card>
    <b-card v-else-if="selectQT() == 'SXL'">
      <b-card-body>
        <CheckListSPForm :quy_trinh="quy_trinh" :de_tai="de_tai" :thoigian="thoigian" :key="renderKey"></CheckListSPForm>
      </b-card-body>
    </b-card>
  </div>
</template>

<script>
import CheckListSPForm from "../components/form/CheckListSPForm";
import CheckListCKForm from "../components/form/CheckListCKForm";
export default {
  name: "CheckList",
  components: {
    CheckListSPForm,
    CheckListCKForm,

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
      //render lại CheckListForm khi thay đổi lựa chọn đề tài
      this.renderKey++;
    },
  },
  methods: {
    selectQT(){
      if(this.quy_trinh != null && this.de_tai!=null) return this.quy_trinh.ma_quy_trinh;
      return null;
    },
    showMessage(){
      if(this.de_tai==null){
        this.$bvToast.toast('Vui lòng chọn: Đề tài', {
          title: `Thông báo`,
          variant: "warning",
          toaster: "b-toaster-top-center",
          autoHideDelay: 5000
        });
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