<template>
  <div class="app flex-row align-items-center">
    <div class="container">
      <b-row class="justify-content-center">
        <b-col md="6">
            <b-card no-body class="p-4">
              <b-card-body>
                <b-form autocomplete="off" @submit.prevent="login" method="post">
                  <h1>Đăng nhập</h1>
                  <div class="alert alert-danger" v-if="error">
                    <p>Đăng nhập thất bại. Vui lòng thử lại!</p>
                  </div>
                  <!-- <p class="text-muted">Sign In to your account</p> -->
                  <b-input-group class="mb-3">
                    <b-input-group-prepend><b-input-group-text><i class="fas fa-user-alt"></i></b-input-group-text></b-input-group-prepend>
                    <b-form-input type="text" class="form-control" placeholder="Email" v-model="email" required />
                  </b-input-group>
                  <b-input-group class="mb-4">
                    <b-input-group-prepend><b-input-group-text><i class="fas fa-lock"></i></b-input-group-text></b-input-group-prepend>
                    <b-form-input type="password" class="form-control" placeholder="Password" v-model="password" required />
                  </b-input-group>
                  <b-row>
                    <b-col cols="6">
                      <b-button variant="primary" class="px-4" type="submit" >Đăng nhập</b-button>
                    </b-col>
                    <b-col cols="6" class="text-right">
                      <!-- <b-button variant="link" class="px-0">Forgot password?</b-button> -->
                    </b-col>
                  </b-row>
                </b-form>
              </b-card-body>
            </b-card>
        </b-col>
      </b-row>
    </div>
  </div>
</template>

<script>
export default {
  name: 'Login',
  data: function () {
    return {
      email: null,
      password: null,
      error: false
    }
  },
  methods: {
    login: function () {
      var app = this
      this.$auth.login({
        params: {
          email: app.email,
          password: app.password
        },
        success: function (response) {},
        error: function () {
          app.error = true
        },
      })
    }
  }
}
</script>
