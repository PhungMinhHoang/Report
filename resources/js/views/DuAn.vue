<template>
  <div>
    <data-table tb_title=" Dự án" :columns="columns" :tb_type="tb_type" :ds_du_an="ds_du_an" />
  </div>
</template>

<script>
import { getDuAn } from "../api/api.js";
export default {
  data() {
    return {
      ds_du_an: [],
      columns: ["STT", "Mã dự án", "Tên dự án","Tên đơn vị", "Thao tác"],
      tb_type: "ds_du_an"
    };
  },
  mounted() {
    getDuAn().then(response => {
      this.ds_du_an = response.data;
      console.log(this.ds_du_an)
    });
  },
  methods: {}
};
</script>

<style>
</style>
