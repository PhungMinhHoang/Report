<template>
  <div>
    <div class="animated">
        <b-card>
          <b-card-header>
            <i class="far fa-list-alt fa-2x"></i>
            <h2>Kết quả KPI đánh giá Quy trình</h2>
            <div class="card-header-actions">
              <!-- Export -->
              <JsonExcel :data="json_data" :fields="json_fields" worksheet="Sheet" name="Kết quả KPI đánh giá Quy trình" style="display:inline">
                <b-button id="export-button" variant="success" @click="1">
                  <b-tooltip target="export-button" variant="dark">
                    <strong>Xuất Excel</strong>
                  </b-tooltip>
                  <i class="fas fa-download fa-lg"></i>
                </b-button>
              </JsonExcel>
            </div>
          </b-card-header>
          <b-card-body>
            <KPIQuyTrinhTable />
          </b-card-body>
        </b-card>
    </div>
  </div>
</template>

<script>
import KPIQuyTrinhTable from "../components/table/KPIQuyTrinhTable";
import JsonExcel from "vue-json-excel";
export default {
  name: "DuAn",
  components: {
    KPIQuyTrinhTable,
    JsonExcel
  },
  data() {
    return {
        json_fields: {
        Id: "id",
        'Tên dự án':'ten_du_an',
        'Tên quy trình':'ten_quy_trinh',
        'Tên module':'ten_module',
        'Điểm':'diem',
        'Thời gian':'thoigian'
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
    axios.get("/kpi-quy-trinh").then(response => {
      this.json_data = response.data;
    });
  },
};
</script>


