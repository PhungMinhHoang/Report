<template>
  <div>
    <b-form @submit.prevent="formSubmit">
      <b-form-group>
        <b-form-file
          v-model="file"
          placeholder="Chọn file import"
          style="width:100%"
          accept=".xlsx, .xls"
          @input="handleFile()"
          required
        ></b-form-file>
      </b-form-group>
      <b-form-group>
        <b-button type="submit" size="md" variant="success" class="float-left">Import</b-button>
      </b-form-group>
    </b-form>
    <Loading :active.sync="isLoading" :is-full-page="true"></Loading>
  </div>
</template>

<script>
import XLSX from "xlsx";
import Loading from "vue-loading-overlay";
import "vue-loading-overlay/dist/vue-loading.css";

export default {
  components: {
    Loading
  },
  props: {
    quy_trinh: Object
  },
  data() {
    return {
      file: null,
      data: [],
      isLoading: false
    };
  },
  methods: {
    handleFile() {
      if (this.file != null) {
        this.isLoading = true;
        const reader = new FileReader();
        reader.onload = e => {
          const data = e.target.result;
          const workbook = XLSX.read(data, { type: "array" });
          const sheetPi1 = workbook.Sheets[this.quy_trinh.ten];
          this.data = XLSX.utils.sheet_to_json(sheetPi1);
          this.isLoading = false;
        };
        reader.readAsArrayBuffer(this.file);
      }
    },
    getHeaderRow(sheet) {
      const headers = [];
      const range = XLSX.utils.decode_range(sheet["!ref"]);
      let C;
      const R = range.s.r;
      /* start in the first row */
      for (C = range.s.c; C <= range.e.c; ++C) {
        /* walk every column in the range */
        const cell = sheet[XLSX.utils.encode_cell({ c: C, r: R })];
        /* find the cell in the first row */
        let hdr = "UNKNOWN " + C; // <-- replace with your desired default
        if (cell && cell.t) hdr = XLSX.utils.format_cell(cell);
        headers.push(hdr);
      }
      return headers;
    },
    formSubmit() {
      if (this.data.length > 0) {
        EventBus.$emit("import-excel", this.data);
      } else {
        this.$bvToast.toast("File import không đúng quy trình", {
          title: `Thông báo`,
          variant: "danger",
          toaster: "b-toaster-top-center",
          autoHideDelay: 3000
        });
      }
    }
  }
};
</script>

<style>
</style>