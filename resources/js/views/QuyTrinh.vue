<template>
  <div>
    <div class="animated">
      <b-card>
        <b-card-header>
          <i class="far fa-list-alt fa-2x"></i>
          <h2>Danh sách quy trình</h2>
          <div class="card-header-actions">
            <b-button id="add-button" variant="success" @click="addModal = true">
              <b-tooltip target="add-button" variant="dark">
                <strong>Thêm quy trình mới</strong>
              </b-tooltip>
              <i class="fas fa-plus fa-lg"></i>
            </b-button>
            <!-- Modal add quy trinh -->
            <b-modal id="add-quy-trinh-modal" title="Thêm quy trình mới" size="md" v-model="addModal" hide-footer="">
              <AddQuyTrinhForm />
            </b-modal>
          </div>
        </b-card-header>
        <b-card-body>
          <!-- Data table -->
          <QuyTrinhTable />
        </b-card-body>
      </b-card>
    </div>
  </div>
</template>

<script>
import QuyTrinhTable from "../components/table/QuyTrinhTable";
import AddQuyTrinhForm from "../components/form/AddQuyTrinhForm";

export default {
  name: "QuyTrinh",
  components: {
    QuyTrinhTable,
    AddQuyTrinhForm
  },
  data: function() {
    return {
      addModal: false
    };
  },
  methods: {}
};
</script>

<style>
</style>