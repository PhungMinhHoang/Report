<template>
  <div>
    <div class="animated">
      <b-card>
        <b-card-header>
          <i class="far fa-list-alt fa-2x"></i>
          <h2>Danh sách kpi quy trình</h2>
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
export default {
  name: "DuAn",
  components: {
    KPIQuyTrinhTable
  },
  data() {
    return {};
  }
};
</script>


