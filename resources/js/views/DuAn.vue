<template>
  <div>
    <data-table t_title=" Danh sách dự án"/>
  </div>
</template>

<script>
export default {
  data(){
    return {
      ds_du_an: []
    }
  },
  created() {
      let uri = 'http://localhost/api/du-an';
      this.axios.get(uri).then(response => {
        this.ds_du_an = response.data.data;
      });
    }
}
</script>

<style>

</style>
