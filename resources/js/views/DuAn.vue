<template>
  <div>
    <div class="animated">
      <b-card>
        <b-card-header>
          <i class="far fa-list-alt fa-2x"></i>
          <h2>Danh sách đề tài/dự án</h2>
          <div class="card-header-actions">
            <b-button id="add-button" variant="success" @click="addModal = true">
              <b-tooltip target="add-button" variant="dark">
                <strong>Thêm dự án mới</strong>
              </b-tooltip>
              <i class="fas fa-plus fa-lg"></i>
            </b-button>
            <!-- Modal add quy trinh -->
            <b-modal title="Thêm dự án mới" size="lg" v-model="addModal" hide-footer>
              <AddDuAnForm />
            </b-modal>
          </div>
        </b-card-header>
        <b-card-body>
          <DuAnTable />
        </b-card-body>
      </b-card>
    </div>
  </div>
</template>

<script>
import DuAnTable from "../components/table/DuAnTable";
import AddDuAnForm from "../components/form/AddDuAnForm";
export default {
  name: "DuAn",
  components: {
    DuAnTable,
    AddDuAnForm
  },
  data(){
    return {
      addModal: false,
    }
  }
};
</script>


