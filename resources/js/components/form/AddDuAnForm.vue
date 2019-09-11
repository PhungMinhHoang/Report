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
          <b-form-input type="text" placeholder="Tên đề tài/dự án" required v-model="ten"></b-form-input>
        </b-input-group>
      </b-form-group>
      <b-form-group>
        <b-input-group>
          <b-input-group-prepend>
            <b-input-group-text>
              <i class="fas fa-code"></i>
            </b-input-group-text>
          </b-input-group-prepend>
          <b-form-input type="text" placeholder="Mã đề tài/dự án" required v-model="ma_de_tai"></b-form-input>
        </b-input-group>
      </b-form-group>
      <b-form-group>
        <b-input-group>
          <b-input-group-prepend>
            <b-input-group-text>
              <i class="far fa-building"></i>
            </b-input-group-text>
          </b-input-group-prepend>
          <b-form-select v-model="don_vi" required>
            <option :value="null" disabled>-- Chọn đơn vị --</option>
            <optgroup :label="'Khối'+index" v-for="index in 3" :key="index">
              <option v-for="(dv,index) in options[index]" :value="dv" :key="index">{{dv.ten}}</option>
            </optgroup>
          </b-form-select>
        </b-input-group>
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
      options: [[], [], [], [], []],
      don_vi: null,
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
          donvi_id: this.don_vi.id
        })
        .then(response => {
          this.$bvModal.hide("add-du-an-modal");
          let du_an_moi = {
            ma_de_tai: this.ma_de_tai,
            ten_de_tai: this.ten,
            ten_don_vi: this.don_vi.ten
          };
          EventBus.$emit("add-du-an-success", du_an_moi);
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
          if (dv.khoi == i) this.options[i].push(dv);
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