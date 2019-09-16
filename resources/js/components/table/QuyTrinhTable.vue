<template>
  <v-client-table :columns="columns" :data="data" :options="options" :theme="theme" id="dataTable">
    <span slot="thao_tac" slot-scope="props">
      <b-button :id="'edit-button-'+props.index" variant="warning" @click="edit()">
        <i class="far fa-edit fa-lg"></i>
        <b-tooltip :target="'edit-button-'+props.index" variant="dark">
          <strong>Sửa</strong>
        </b-tooltip>
      </b-button>
      <b-button :id="'delete-button-'+props.index" variant="danger">
        <i class="far fa-window-close fa-lg"></i>
        <b-tooltip :target="'delete-button-'+props.index" variant="dark">
          <strong>Đóng</strong>
        </b-tooltip>
      </b-button>
    </span>
  </v-client-table>
</template>

<script>
import Vue from "vue";
import { ClientTable, Event } from "vue-tables-2";
Vue.use(ClientTable);

export default {
  name: "QuyTrinhTable",
  data: function() {
    return {
      //data for table
      columns: ["ma_quy_trinh", "ten",  "thao_tac"],
      data: [],
      options: {
        headings: {
          ten: "Tên quy trình",
          ma_quy_trinh: "Mã quy Trình ",
          thao_tac: "Thao tác"
        },
        sortable: ["ten", "ma_quy_trinh"],
        sortIcon: {
          base: "fa",
          up: "fas fa-sort-up",
          down: "fas fa-sort-down",
          is: "fas fa-sort"
        },
        filterable: ["ten", "ma_quy_trinh"],
        pagination: {
          chunk: 5,
          edge: false,
          nav: "scroll"
        }
      },
      useVuex: false,
      theme: "bootstrap4",
      template: "default",
      
    };
  },
  methods: {
    edit() {},
    add() {}
  },
  mounted() {
    axios.get("/quy-trinh").then(response => {
      this.data = response.data;
      //console.log(this.data);
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
