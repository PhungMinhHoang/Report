<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">KPI Veco</div>

          <div class="card-body">
            <form @submit="formSubmit">
              <strong>Đơn vị:</strong>
              <select name="don_vi" class="form-control" v-model="id_don_vi">
                <option value disabled selected="selected">Chọn đơn vị</option>
                <option
                  v-for="(item, index) in data"
                  :key="index"
                  :value="item.id"
                >{{item.id+'. '+item.ten}}</option>
              </select>
              <strong>Chỉ số:</strong>
              <input type="text" class="form-control" v-model="chi_so" />
              <br />
              <strong>Thời gian:</strong>
              <input type="date" class="form-control" v-model="thoi_gian" />
              <br />
              <button class="btn btn-success">Submit</button>
            </form>
            <strong>Output:</strong>
            <pre>{{output}}</pre>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      data: [],
      output: "",
      id_don_vi: 0,
      chi_so: null,
      thoi_gian: null,
    };
  },
  methods: {
    formSubmit(e) {
      e.preventDefault();
      axios
        .post("/kpi-veco", {
          don_vi_id: this.id_don_vi,
          tuy_chon_id: 15,
          chi_so: this.chi_so,
          thoi_gian: this.thoi_gian
        })
        .then(response => {
          this.data.shift();
          this.chi_so = null;
          this.output = response.data.success;
        })
        .catch(error => {
          this.output = error;
        });
    }
  },
  mounted() {
    axios.get("/don-vi").then(response => {
      this.data = response.data;
      //console.log(this.data);
    });
  }
};
</script>

<style>
</style>