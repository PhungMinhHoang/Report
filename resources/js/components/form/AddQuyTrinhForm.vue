<template>
  <b-card>
    <div slot="header">Form</div>
    <b-form @submit.prevent="formSubmit">
      <b-form-group>
        <b-input-group>
          <b-input-group-prepend>
            <b-input-group-text>
              <i class="fas fa-clipboard-check"></i>
            </b-input-group-text>
          </b-input-group-prepend>
          <b-form-input type="text" placeholder="Quy trình" required v-model="ten"></b-form-input>
        </b-input-group>
      </b-form-group>
      <b-form-group>
        <b-input-group>
          <b-input-group-prepend>
            <b-input-group-text>
              <i class="fas fa-bolt"></i>
            </b-input-group-text>
          </b-input-group-prepend>
          <b-form-input type="text" placeholder="Tên viết tắt" required v-model="ma_quy_trinh"></b-form-input>
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
  name: "AddQuyTrinhForm",
  data() {
    return {
      ten: "",
      ma_quy_trinh: ""
    };
  },
  methods: {
    formSubmit(e) {
      axios
        .post("/quy-trinh", {
          ten: this.ten,
          ma_quy_trinh: this.ma_quy_trinh
        })
        .then(response => {
          this.$bvModal.hide("add-quy-trinh-modal");
          this.$emit('add-success',response.data.success)
        })
        .catch(error => {
          console.log(error);
        });
    },
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