<template>
  <div>
    <div class="animated">
      <b-card>
        <b-card-header>
          <i class="far fa-list-alt fa-2x"></i>
          <h2>Danh sách dự án</h2>
          <div class="card-header-actions">
            <b-button id="add-button" variant="success">
              <b-tooltip target="add-button" variant="dark">
                <strong>Thêm dự án mới</strong>
              </b-tooltip>
              <i class="fas fa-plus fa-lg"></i>
            </b-button>
          </div>
        </b-card-header>
        <b-card-body>
          <v-client-table
            :columns="columns"
            :data="data"
            :options="options"
            :theme="theme"
            id="dataTable"
          >
            <span slot="thao_tac" slot-scope="props">
                <b-button id="edit-button" variant="warning" @click="edit()">
                    <i class="far fa-edit fa-lg"></i>
                </b-button>
                <b-button id="delete-button" variant="danger">
                    <i class="far fa-window-close fa-lg"></i>
                </b-button>
            </span>
            
          </v-client-table>
        </b-card-body>
      </b-card>
    </div>
  </div>
</template>

<script>
import { getData } from "../api/api.js";
import Vue from "vue";
import { ClientTable, Event } from "vue-tables-2";

Vue.use(ClientTable);

export default {
  name: "DuAn",
  components: {},
  data: function() {
    return {
      columns: ["id", "ma_du_an", "ten_du_an", "ten_don_vi", "thao_tac"],
      data: [],
      options: {
        headings: {
          stt: "ID",
          ma_du_an: "Mã Dự án",
          ten_du_an: "Tên dự án",
          ten_don_vi: "Tên đơn vị",
          thao_tac: "Thao tác"
        },
      },
      useVuex: false,
      theme: "bootstrap4",
      template: "default"
    };
  },
  methods:{
      edit(){
         alert('edit')
      }
  },
  mounted() {
    axios.get("/du-an").then(response => {
      this.data = response.data;
      console.log(this.data);
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
