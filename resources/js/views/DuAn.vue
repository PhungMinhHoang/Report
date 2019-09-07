<template>
  <div>
    <data-table tb_title=" Dự án" :columns="columns" :tb_type="tb_type" :ds_du_an="ds_du_an" />
  </div>
</template>

<script>
import { getData } from "../api/api.js";
export default {
  data() {
    return {
      ds_du_an: [],
      columns: ["Mã dự án", "Tên dự án","Tên đơn vị"],
      tb_type: "ds_du_an"
    };
  },
  mounted() {
    getData('/du-an').then(response => {
      this.ds_du_an = response.data;
      console.log(this.ds_du_an)
    });
  },
  methods: {}
};
</script>

<style>
</style>
