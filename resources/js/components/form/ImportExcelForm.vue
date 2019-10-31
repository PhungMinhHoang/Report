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
        ></b-form-file>
      </b-form-group>
      <b-form-group>
        <b-button type="submit" size="md" variant="success" class="float-left">Import</b-button>
      </b-form-group>
    </b-form>
  </div>
</template>

<script>
import XLSX from "xlsx";
export default {
  data() {
    return {
      file: null,
      Pi1: []
    };
  },
  methods: {
    handleFile() {
      const reader = new FileReader();
      reader.onload = e => {
        const data = e.target.result;
        const workbook = XLSX.read(data, { type: "array" });
        const worksheet = workbook.Sheets["ThongKe"];
        const header = this.getHeaderRow(worksheet);
        this.Pi1 = XLSX.utils.sheet_to_json(worksheet);
      };
      reader.readAsArrayBuffer(this.file);
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
      axios
        .post("/import-kpi-quy-trinh", { data: this.Pi1 })
        .then(response => {
          if (response.data.hasOwnProperty("error")) {
            this.$bvToast.toast(response.data.error, {
              title: "Thông báo",
              variant: "danger",
              toaster: "b-toaster-top-center",
              autoHideDelay: 5000
            });
          } else {
            this.$bvToast.toast("Import Thành Công", {
              title: "Thông báo",
              variant: "success",
              toaster: "b-toaster-top-center",
              autoHideDelay: 5000
            });
          }
          this.file = null;
        })
        .catch(error => {
          console.log(error);
        });
    }
  }
};
</script>

<style>
</style>