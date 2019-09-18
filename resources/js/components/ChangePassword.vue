<template>
  <b-card>
    <div slot="header">Form</div>
    <b-form autocomplete="off" @submit.prevent="changePassword" method="post">
      <div class="alert alert-danger" v-if="error">Mật khẩu không khớp. Vui lòng thử lại!</div>
      <b-input-group class="mb-3">
        <b-input-group-prepend>
          <b-input-group-text>
            <i class="fas fa-key"></i>
          </b-input-group-text>
        </b-input-group-prepend>
        <b-form-input
          type="password"
          class="form-control"
          placeholder="Mật khẩu mới"
          v-model="password"
          required
        />
      </b-input-group>
      <b-input-group class="mb-4">
        <b-input-group-prepend>
          <b-input-group-text>
            <i class="fas fa-lock"></i>
          </b-input-group-text>
        </b-input-group-prepend>
        <b-form-input
          type="password"
          class="form-control"
          placeholder="Nhập lại mật khẩu"
          v-model="passwordAgain"
          required
        />
      </b-input-group>
      <div class="form-group form-actions">
        <b-button variant="warning" class="px-4 pull-right" type="submit">Thay đổi</b-button>
      </div>
    </b-form>
  </b-card>
</template>

<script>
export default {
  name: "ChangePassword",
  data: function() {
    return {
      password: null,
      passwordAgain: null,
      error: false
    };
  },
  methods: {
    changePassword: function() {
      if (this.password !== this.passwordAgain) this.error = true;
      else {
        axios
          .post("/changePassword", {
              password: this.password,
              passwordAgain: this.passwordAgain
          })
          .then(response => {
            this.$bvModal.hide("change-password-modal");
            console.log(response)
          })
          .catch(error => {
            console.log(error);
          });
      }
    }
  }
};
</script>
