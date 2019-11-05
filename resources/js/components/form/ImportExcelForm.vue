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
  data() {
    return {
      file: null,
      Pi1: [],
      Pi2: [],
      Pi3: [],
      Pi4: [],
      Pi5: [],
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
          const sheetPi1 = workbook.Sheets["Pi1"];
          const sheetPi2 = workbook.Sheets["Pi2"];
          const sheetPi3 = workbook.Sheets["Pi3"];
          const sheetPi4 = workbook.Sheets["Pi4"];
          const sheetPi5 = workbook.Sheets["Pi5"];
          this.Pi1 = XLSX.utils.sheet_to_json(sheetPi1);
          this.Pi2 = XLSX.utils.sheet_to_json(sheetPi2);
          this.Pi3 = XLSX.utils.sheet_to_json(sheetPi3);
          this.Pi4 = XLSX.utils.sheet_to_json(sheetPi4);
          this.Pi5 = XLSX.utils.sheet_to_json(sheetPi5);
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
      this.isLoading = true;
      let app = this;
      axios
        .post("/import-kpi-quy-trinh", {
          Pi1: this.Pi1,
          Pi2: this.Pi2,
          Pi3: this.Pi3,
          Pi4: this.Pi4,
          Pi5: this.Pi5
        })
        .then(response => {
          app.isLoading = false;
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
          this.isLoading = false;
          this.$bvToast.toast("Import không thành công", {
            title: "Thông báo",
            variant: "danger",
            toaster: "b-toaster-top-center",
            autoHideDelay: 5000
          });
          this.file = null;
        });
    }
  }
};
</script>

<style>
</style>