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
              <i class="fas fa-building"></i>
            </b-input-group-text>
          </b-input-group-prepend>
          <b-form-select v-model="don_vi" required>
            <option :value="null" disabled>-- Chọn đơn vị --</option>
            <optgroup :label="'Khối'+index" v-for="index in 3" :key="index">
              <option v-for="(dv,index) in options_dv[index]" :value="dv" :key="index">{{dv.ten}}</option>
            </optgroup>
          </b-form-select>
        </b-input-group>
      </b-form-group>
      <b-form-group>
        <b-input-group>
          <b-input-group-prepend>
            <b-input-group-text>
              <i class="fas fa-user"></i>
            </b-input-group-text>
          </b-input-group-prepend>
          <b-form-select v-model="QA" required>
            <option :value="null" disabled>-- Chọn QA --</option>
              <option v-for="(QA,index) in options_QA" :value="QA" :key="index">{{QA.name}}</option>
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
      options_dv: [[], [], [], [], []],
      options_QA: [],
      don_vi: null,
      ma_de_tai: null,
      ten: null,
      QA: null
    };
  },
  methods: {
    formSubmit() {
      axios
        .post("/du-an", {
          ma_de_tai: this.ma_de_tai,
          ten: this.ten,
          donvi_id: this.don_vi.id,
          user_id: this.QA.id
        })
        .then(response => {
          this.$bvModal.hide("add-du-an-modal");
          let du_an_moi = {
            ma_de_tai: this.ma_de_tai,
            ten_de_tai: this.ten,
            ten_don_vi: this.don_vi.ten,
            QA: this.QA.name
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
          if (dv.khoi == i) this.options_dv[i].push(dv);
        });
      }
    });
    axios.get("/QA").then(response => {
      this.options_QA = response.data;
      console.log("test", this.options_QA);
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