<template>
  <AppHeaderDropdown right no-caret>
    <template slot="header">
      <!-- <img
        src="img/avatars/6.jpg"
        class="img-avatar"
      alt="admin@bootstrapmaster.com" />-->
      
      <i class="fas fa-user-alt" /> {{$auth.user().email}}
    </template>
    <template slot="dropdown">
      <b-dropdown-header tag="div" class="text-center">
        <strong>Tài khoản</strong>
      </b-dropdown-header>
      <b-dropdown-item @click="changePassword">
        <i class="fas fa-key" /> Đổi mật khẩu
      </b-dropdown-item>
      <b-dropdown-item @click="logout">
        <i class="fa fa-lock" /> Đăng xuất
      </b-dropdown-item>
    </template>
  </AppHeaderDropdown>
</template>

<script>
import { HeaderDropdown as AppHeaderDropdown } from "@coreui/vue";
export default {
  name: "DefaultHeaderDropdownAccnt",
  components: {
    AppHeaderDropdown
  },
  data: () => {
    return { itemsCount: 42 };
  },
  methods: {
    logout: function () {
      this.$auth.logout()
    },
    changePassword(){
        
    }
  }
};
</script>
