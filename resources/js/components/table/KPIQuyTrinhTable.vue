<template>
  <div>
    <v-client-table
      :columns="columns"
      :data="data"
      :options="options"
      :theme="theme"
      id="dataTable"
    >
      <span slot="stt" slot-scope="props">{{props.index}}</span>
    </v-client-table>
  </div>
</template>

<script>
import Vue from "vue";
import { ClientTable, Event } from "vue-tables-2";
Vue.use(ClientTable);

export default {
  name: "KPIQuyTrinhTable",
  data: function() {
    return {
      columns: ["stt", "ten_du_an", "ten_quy_trinh", "diem", "thoigian"],
      data: [],
      options: {
        headings: {
          stt: "STT ",
          ten_du_an: "Tên đề tài/dự án ",
          ten_quy_trinh: "Quy Trình ",
          diem: "Điểm ",
          thoigian: "Phụ trách QA"
        },
        sortable: ["stt", "ten_du_an", "ten_quy_trinh", "diem", "thoigian"],
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
    EventBus.$on("add-kpi-quy-trinh-success", kpi_quy_trinh_moi => {
      this.data.unshift(kpi_quy_trinh_moi);
    });
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