<template>
  <b-card>
    <div slot="header">Example Form</div>
    <b-form>
      <b-form-group>
        <b-input-group>
          <b-input-group-prepend>
            <b-input-group-text>
              <i class="fa fa-user"></i>
            </b-input-group-text>
          </b-input-group-prepend>
          <b-form-input type="text" placeholder="Username"></b-form-input>
        </b-input-group>
      </b-form-group>
      <b-form-group>
        <b-input-group>
          <b-input-group-prepend>
            <b-input-group-text>
              <i class="fa fa-envelope"></i>
            </b-input-group-text>
          </b-input-group-prepend>
          <b-form-input type="email" placeholder="Email" autocomplete="email"></b-form-input>
        </b-input-group>
      </b-form-group>
      <b-form-group>
        <b-input-group>
          <b-input-group-prepend>
            <b-input-group-text>
              <i class="fa fa-asterisk"></i>
            </b-input-group-text>
          </b-input-group-prepend>
          <b-form-input type="password" placeholder="Password" autocomplete="current-password"></b-form-input>
        </b-input-group>
      </b-form-group>
      <div class="form-group form-actions">
        <b-button type="submit" size="sm" variant="success">Submit</b-button>
      </div>
    </b-form>
  </b-card>
</template>

<script>
export default {
  name: 'AddQuyTrinhForm',
  data () {
    return {
      selected: [], // Must be an array reference!
      show: true
    }
  },
  methods: {
    click () {
      // do nothing
    }
  }
}
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