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
            <td style="width: 50%;">
              <select class="form-control" id="select_de_tai" v-model="de_tai">
                <option :value="null" disabled>-- Chọn đề tài/dự án --</option>
                <option :value="dt" v-for="(dt,index) in options_dt" :key="index">{{dt.ten_de_tai}}</option>
              </select>
            </td>
            <th scope="row">Tên Module</th>
            <td style="display:inline-flex;width:100%">
              <select
                class="form-control"
                id="select_module"
                v-model="module_select"
                v-if="changeFormModule == false"
                @change="module=module_select"
              >
                <option :value="md" v-for="(md,index) in option_md" :key="index">{{md.name}}</option>
              </select>
              <input
                class="form-control"
                id="input_module"
                type="text"
                v-model="module_input.name"
                placeholder="Nhập tên module"
                v-else
              />
              <b-button @click="changeFormModule = !changeFormModule" variant="outline-primary">
                <i class="fas fa-sync-alt"></i>
              </b-button>
            </td>
          </tr>
          <tr>
            <th scope="row">Ngày đánh giá</th>
            <td>
              <input class="form-control" id="date" type="date" v-model="thoigian" />
            </td>
            <th scope="row">Quy trình áp dụng</th>
            <td>
              <select
                class="form-control select2-single"
                id="select_quy_trinh"
                v-model="quy_trinh"
                @change="showMessage()"
              >
                <option :value="null" disabled>-- Chọn quy trình --</option>
                <option :value="qt" v-for="(qt,index) in options_qt" :key="index">{{qt.ten}}</option>
              </select>
            </td>
          </tr>
        </table>
      </b-card-body>
    </b-card>
    <!-- Checklist -->
    <div class="checklist">
      <b-card v-if="selectQT() == 'SP'">
        <b-card-body>
          <CheckListSPForm
            :quy_trinh="quy_trinh"
            :de_tai="de_tai"
            :thoigian="thoigian"
            :module="module"
            :key="renderKey"
          ></CheckListSPForm>
        </b-card-body>
      </b-card>
      <b-card v-else-if="selectQT() == 'CK'">
        <b-card-body>
          <CheckListCKForm
            :quy_trinh="quy_trinh"
            :de_tai="de_tai"
            :thoigian="thoigian"
            :module="module"
            :key="renderKey"
          ></CheckListCKForm>
        </b-card-body>
      </b-card>
      <b-card v-else-if="selectQT() == 'PC'">
        <b-card-body>
          <CheckListPCForm
            :quy_trinh="quy_trinh"
            :de_tai="de_tai"
            :thoigian="thoigian"
            :module="module"
            :key="renderKey"
          ></CheckListPCForm>
        </b-card-body>
      </b-card>
      <b-card v-else-if="selectQT() == 'PCRG'">
        <b-card-body>
          <CheckListPCRGForm
            :quy_trinh="quy_trinh"
            :de_tai="de_tai"
            :thoigian="thoigian"
            :module="module"
            :key="renderKey"
          ></CheckListPCRGForm>
        </b-card-body>
      </b-card>
      <b-card v-else-if="selectQT() == 'PM'">
        <b-card-body>
          <CheckListPMForm
            :quy_trinh="quy_trinh"
            :de_tai="de_tai"
            :thoigian="thoigian"
            :module="module"
            :key="renderKey"
          ></CheckListPMForm>
        </b-card-body>
      </b-card>
      <b-card v-else-if="selectQT() == 'SXTN'">
        <b-card-body>
          <CheckListSXTNForm
            :quy_trinh="quy_trinh"
            :de_tai="de_tai"
            :thoigian="thoigian"
            :module="module"
            :key="renderKey"
          ></CheckListSXTNForm>
        </b-card-body>
      </b-card>
      <b-card v-else-if="selectQT() == 'SXL'">
        <b-card-body>
          <CheckListSXLForm
            :quy_trinh="quy_trinh"
            :de_tai="de_tai"
            :thoigian="thoigian"
            :module="module"
            :key="renderKey"
          ></CheckListSXLForm>
        </b-card-body>
      </b-card>
      <b-card v-else-if="selectQT() == 'SBH'">
        <b-card-body>
          <CheckListSBHForm
            :quy_trinh="quy_trinh"
            :de_tai="de_tai"
            :thoigian="thoigian"
            :module="module"
            :key="renderKey"
          ></CheckListSBHForm>
        </b-card-body>
      </b-card>
    </div>
  </div>
</template>

<script>
import CheckListSPForm from "../components/form/CheckListSPForm";
import CheckListCKForm from "../components/form/CheckListCKForm";
import CheckListPCForm from "../components/form/CheckListPCForm";
import CheckListPCRGForm from "../components/form/CheckListPCRGForm";
import CheckListPMForm from "../components/form/CheckListPMForm";
import CheckListSXLForm from "../components/form/CheckListSXLForm";
import CheckListSXTNForm from "../components/form/CheckListSXTNForm";
import CheckListSBHForm from "../components/form/CheckListSBHForm";
export default {
  name: "CheckList",
  components: {
    CheckListSPForm,
    CheckListCKForm,
    CheckListPCForm,
    CheckListPCRGForm,
    CheckListPMForm,
    CheckListSXLForm,
    CheckListSXTNForm,
    CheckListSBHForm
  },
  data() {
    return {
      checklistData: [],
      options_qt: [],
      quy_trinh: null,
      option_md: [],
      module: null,
      module_select: null,
      module_input: null,
      options_dt: [],
      changeFormModule: false,
      de_tai: null,
      thoigian: new Date().toISOString().substring(0, 10),
      isRendered: false,
      renderKey: 0
    };
  },
  watch: {
    de_tai() {
      if (this.isRendered == true) {
        this.quy_trinh = null;
        this.isRendered = false;
        //reset form module
        this.changeFormModule = false;
        this.module_select = this.option_md[0];
        this.module = this.module_select;
      }
    },
    quy_trinh() {
      if (this.isRendered == true) {
        //reset form module
        this.changeFormModule = false;
        this.module_select = this.option_md[0];
        this.module = this.module_select;
      }
    },
    module() {
      if (this.isRendered == true) {
        //render lại CheckListForm khi thay đổi module
        this.renderKey++;
      }
    },
    changeFormModule() {
      if (this.changeFormModule == true) {
        this.module_input.name = "";
        this.module = this.module_input;
      } else {
        this.module_select = this.option_md[0];
        this.module = this.module_select;
      }
    }
  },
  methods: {
    selectQT() {
      if (this.quy_trinh != null && this.de_tai != null) {
        this.isRendered = true;
        return this.quy_trinh.ma_quy_trinh;
      }
      return null;
    },
    showMessage() {
      if (this.de_tai == null) {
        this.$bvToast.toast("Vui lòng chọn: Đề tài", {
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
    axios.get("/module").then(response => {
      this.option_md = response.data;
      this.module_select = response.data[0];
      this.module_input = { name: "" };
      this.module = this.module_select;
    });
  }
};
</script>

<style lang="scss" scoped>
table {
  table-layout: fixed;
}
th {
  width: 150px;
}
</style>