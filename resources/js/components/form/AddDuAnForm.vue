<template>
  <b-card>
    <div slot="header">Form</div>
    <b-form @submit.prevent="formSubmit">
      <b-form-group>
        <b-input-group>
          <b-input-group-prepend>
            <b-input-group-text>
              <i class="fas fa-project-diagram"></i>
            </b-input-group-text>
          </b-input-group-prepend>
          <b-form-input type="text" placeholder="Tên dự án" required v-model="ten"></b-form-input>
        </b-input-group>
      </b-form-group>
      <b-form-group>
        <b-input-group>
          <b-input-group-prepend>
            <b-input-group-text>
              <i class="fas fa-code"></i>
            </b-input-group-text>
          </b-input-group-prepend>
          <b-form-input type="text" placeholder="Mã dự án" required v-model="ma_de_tai"></b-form-input>
        </b-input-group>
      </b-form-group>
      <b-form-group>
        <b-form-select v-model="donvi_id" required>
          <option :value="null" disabled>-- Chọn đơn vị --</option>
          <optgroup :label="'Khối'+index" v-for="index in 3" :key="index">
            <option v-for="(dv,index) in data[index]" :value="dv.id" :key="index">{{dv.ten}}</option>
          </optgroup>
        </b-form-select>
      </b-form-group>

      <div class="form-group form-actions">
        <b-button type="submit" size="md" variant="success" class="float-right">Thêm</b-button>
      </div>
    </b-form>
  </b-card>
</template>

<script>
export default {
  name: "AddDuAnForm",
  data() {
    return {
      data: [[], [], [], [], []],
      donvi_id: null,
      ma_de_tai: null,
      ten: null
    };
  },
  methods: {
    formSubmit(e) {
      axios
        .post("/du-an", {
          ma_de_tai: this.ma_de_tai,
          ten: this.ten,
          donvi_id: this.donvi_id
        })
        .then(response => {
          console.log(response);
        })
        .catch(error => {
          console.log(error);
        });
    }
  },
  mounted() {
    axios.get("/don-vi").then(response => {
      for (let i = 1; i <= 3; i++) {
        response.data.forEach(dv => {
          if (dv.khoi == i) this.data[i].push(dv);
        });
      }
    });
  }
};
</script>

<style scoped>
.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.5s;
}
.fade-enter,
.fade-leave-to {
  opacity: 0;
}
</style>