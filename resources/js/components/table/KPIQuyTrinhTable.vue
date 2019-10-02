<template>
  <div>
    <v-client-table :columns="columns" :data="data" :options="options" :theme="theme" id="dataTable">
      <span slot="stt" slot-scope="props">{{props.index}}</span>
      <span slot="thao_tac" slot-scope="props">
        <b-button :id="'detail-button-'+props.index" variant="primary" @click="detail(props.row)">
          <i class="far fa-eye fa-lg"></i>
          <b-tooltip :target="'detail-button-'+props.index" variant="dark">
            <strong>Xem tài liệu</strong>
          </b-tooltip>
        </b-button>
      </span>
    </v-client-table>
    <!-- Modal view detail -->
    <b-modal id="detail-modal" :title="'Đề tài: '+kpi_quytrinh.ten_du_an" size="xl" v-model="detailModal" hide-footer>
      <TaiLieuQuyTrinhTable :kpi_quytrinh="kpi_quytrinh" />
    </b-modal>
  </div>
</template>

<script>
import Vue from "vue";
import { ClientTable, Event } from "vue-tables-2";
import TaiLieuQuyTrinhTable from "./TaiLieuQuyTrinhTable";
Vue.use(ClientTable);

export default {
  name: "KPIQuyTrinhTable",
  components:{
    TaiLieuQuyTrinhTable
  },
  data: function() {
    return {
      kpi_quytrinh: {},
      detailModal: false,
      columns: [
        "id",
        "ten_du_an",
        "ten_quy_trinh",
        "diem",
        "thoigian",
        "thao_tac"
      ],
      data: [],
      options: {
        headings: {
          stt: "ID ",
          ten_du_an: "Tên đề tài/dự án ",
          ten_quy_trinh: "Quy Trình ",
          diem: "Điểm ",
          thoigian: "Thời gian",
          thao_tac: "Thao tác"
        },
        sortable: ["id", "ten_du_an", "ten_quy_trinh", "diem", "thoigian"],
        sortIcon: {
          base: "fa",
          up: "fas fa-sort-up",
          down: "fas fa-sort-down",
          is: "fas fa-sort"
        },
        filterable: ["ten_du_an", "ten_quy_trinh", "diem", "thoigian"],
        pagination: {
          chunk: 5,
          edge: true,
          nav: "fixed"
          //dropdown:true
        },
        perPage: 10,
        perPageValues: [10, 25, 50, 100]
      },
      useVuex: false,
      theme: "bootstrap4",
      template: "default"
    };
  },
  mounted() {
    axios.get("/kpi-quy-trinh").then(response => {
      this.data = response.data;
    });
  },
  methods: {
    detail(kpi_quytrinh) {
      this.detailModal = true;
      this.kpi_quytrinh = kpi_quytrinh;
    }
  }
};
</script>


<style lang="scss">
h2 {
  display: inline;
}

#dataTable {
  width: 95%;
  margin: 0 auto;

  .VuePagination {
    text-align: center;
    justify-content: center;
  }

  .vue-title {
    text-align: center;
    margin-bottom: 10px;
  }

  .VueTables__search-field {
    display: flex;
  }
  .VueTables__search-field input {
    margin-left: 0.25rem;
  }

  .VueTables__limit-field {
    display: flex;
  }

  .VueTables__limit-field select {
    margin-left: 0.25rem !important;
  }

  .VueTables__table th {
    text-align: center;
  }

  .VueTables__child-row-toggler {
    width: 16px;
    height: 16px;
    line-height: 16px;
    display: block;
    margin: auto;
    text-align: center;
  }

  .VueTables__child-row-toggler--closed::before {
    content: "+";
  }

  .VueTables__child-row-toggler--open::before {
    content: "-";
  }
}
</style>