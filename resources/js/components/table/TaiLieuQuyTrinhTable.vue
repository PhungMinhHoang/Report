<template>
  <div class="border">
    <b-card-header>
        <i class="fas fa-link fa-lg"></i>
        <h4>Quy trình: {{kpi_quytrinh.ten_quy_trinh+' ('+kpi_quytrinh.thoigian+')'}}</h4>
    </b-card-header>
    <b-card-body>
        <v-client-table :columns="columns" :data="data" :options="options" :theme="theme" id="dataTable">
        <a slot="link" slot-scope="props" :href="'http://www.'+props.row.link" target="_blank">{{props.row.link}}</a>
        <span slot="danh_gia" slot-scope="props" v-html="getResult(props.row.danh_gia)"></span>
        </v-client-table>
    </b-card-body>
  </div>
</template>

<script>
import Vue from "vue";
import { ClientTable, Event } from "vue-tables-2";
Vue.use(ClientTable);

export default {
  name: "TaiLieuQuyTrinhTable",
  props: {
    kpi_quytrinh: Object
  },
  data: function() {
    return {
      badgeClass: "",
      columns: ["id", "ten_tai_lieu", "link", "danh_gia","ghi_chu"],
      data: [],
      options: {
        headings: {
          stt: "ID ",
          ten_tai_lieu: "Tên tài liệu",
          link: "Đường dẫn lưu trữ",
          danh_gia: "Kết quả đánh giá",
          ghi_chu: "Ghi chú"
        },
        sortable: ["id", "ten_tai_lieu", "link", "danh_gia"],
        sortIcon: {
          base: "fa",
          up: "fas fa-sort-up",
          down: "fas fa-sort-down",
          is: "fas fa-sort"
        },
        filterable: ["ten_tai_lieu", "link", "danh_gia"],
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
    axios.get(`/tai-lieu-quy-trinh/${this.kpi_quytrinh.id}`).then(response => {
      this.data = response.data;
    });
  },
  methods: {
    getResult(danh_gia) {
        console.log(danh_gia,this.badgeClass)
      switch (danh_gia) {
        case -1:
          return `<span class="badge badge-warning text-dark">Không áp dụng</span>`;
          break;
        case 0:
          return `<span class="badge badge-danger text-dark">Không đạt</span>`;
          break;
        case 1:
          return `<span class="badge badge-success text-dark">Đạt</span>`;
          break;

        default:
          break;
      }
    }
  }
};
</script>


<style lang="scss">
h2, h3, h4{
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