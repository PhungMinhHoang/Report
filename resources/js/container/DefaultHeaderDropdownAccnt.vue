<template>
  <div>
    <AppHeaderDropdown right no-caret>
      <template slot="header">
        <!-- <img
        src="img/avatars/6.jpg"
        class="img-avatar"
        alt="admin@bootstrapmaster.com" />-->

        <i class="fas fa-user-alt" />
        {{$auth.user().email}}
      </template>
      <template slot="dropdown">
        <b-dropdown-header tag="div" class="text-center">
          <strong>Tài khoản</strong>
        </b-dropdown-header>
        <b-dropdown-item @click="changePasswordModal = true">
          <i class="fas fa-key" /> Đổi mật khẩu
        </b-dropdown-item>
        <b-dropdown-item @click="$auth.logout()">
          <i class="fa fa-lock" /> Đăng xuất
        </b-dropdown-item>
      </template>
    </AppHeaderDropdown>
    <!-- Modal Đổi mật khẩu -->
    <b-modal
      id="change-password-modal"
      title="Đổi mật khẩu"
      size="md"
      v-model="changePasswordModal"
      hide-footer
    >
      <ChangePassword />
    </b-modal>
  </div>
</template>

<script>
import { HeaderDropdown as AppHeaderDropdown } from "@coreui/vue";
import ChangePassword from "../components/ChangePassword";
export default {
  name: "DefaultHeaderDropdownAccnt",
  components: {
    AppHeaderDropdown,
    ChangePassword
  },
  data() {
    return {
      changePasswordModal: false,
    };
  },
  methods: {
    changePassword() {}
  }
};
</script>
