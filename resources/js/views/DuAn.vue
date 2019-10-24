<template>
  <div class="animated">
    <b-card>
      <b-card-header>
        <i class="far fa-list-alt fa-2x"></i>
        <h2>Danh sách đề tài/dự án</h2>
        <div class="card-header-actions">
          <!-- Export -->
          <JsonExcel :data="json_data" :fields="json_fields" worksheet="Sheet" name="Danh sách dự án" style="display:inline">
            <b-button id="export-button" variant="success" @click="1">
              <b-tooltip target="export-button" variant="dark">
                <strong>Xuất Excel</strong>
              </b-tooltip>
              <i class="fas fa-download fa-lg"></i>
            </b-button>
          </JsonExcel>
          <!-- Add -->
          <b-button id="add-button" variant="success" @click="addModal = true">
            <b-tooltip target="add-button" variant="dark">
              <strong>Thêm đề tài/dự án mới</strong>
            </b-tooltip>
            <i class="fas fa-plus fa-lg"></i>
          </b-button>
          <!-- Modal add du an -->
          <b-modal
            id="add-du-an-modal"
            title="Thêm dự án mới"
            size="md"
            v-model="addModal"
            hide-footer
          >
            <AddDuAnForm />
          </b-modal>
        </div>
      </b-card-header>
      <b-card-body>
        <DuAnTable />
      </b-card-body>
    </b-card>
  </div>
</template>

<script>
import DuAnTable from "../components/table/DuAnTable";
import AddDuAnForm from "../components/form/AddDuAnForm";
import JsonExcel from "vue-json-excel";
export default {
  name: "DuAn",
  components: {
    DuAnTable,
    AddDuAnForm,
    JsonExcel
  },
  data() {
    return {
      addModal: false,
      json_fields: {
        Id: "id",
        "Mã đề tài": "ma_de_tai",
        "Tên đề tài": "ten_de_tai",
        "Trạng thái": {
          field: "trang_thai",
          callback: value => {
            if (value == true) return "Đang thực hiện";
            else return "Đã kết thúc";
          }
        },
        "Tên đơn vị": "ten_don_vi",
        "Phụ trách QA": "QA"
      },
      json_data: [],
      json_meta: [
        [
          {
            key: "charset",
            value: "utf-8"
          }
        ]
      ]
    };
  },
  mounted() {
    axios.get("/du-an").then(response => {
      this.json_data = response.data;
    });
  }
};
</script>


