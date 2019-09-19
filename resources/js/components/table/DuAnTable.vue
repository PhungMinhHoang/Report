<template>
  <div>
    <v-client-table :columns="columns" :data="data" :options="options" :theme="theme" id="dataTable">
        <span slot="stt" slot-scope="props">{{props.index}}</span>
        <span slot="thao_tac" slot-scope="props">
        <b-button :id="'edit-button-'+props.index" variant="warning" @click="edit(props.row)">
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
  <!-- Modal edit du an -->
    <b-modal id="edit-du-an-modal" title="Sửa" size="md" v-model="editModal" hide-footer>
      <EditDuAnForm :edit_du_an="edit_du_an"/>
    </b-modal>
  </div>
</template>

<script>
import Vue from "vue";
import { ClientTable, Event } from "vue-tables-2";
import EditDuAnForm from "../form/EditDuAnForm";
Vue.use(ClientTable);

export default {
  name: "DuAnTable",
  components: {
      EditDuAnForm
  },
  data: function() {
    return {
      editModal: false,
      edit_du_an: {},
      columns: ["stt","ma_de_tai", "ten_de_tai", "ten_don_vi", "QA", "thao_tac"],
      data: [],
      options: {
        headings: {
          stt: "STT ",
          ma_de_tai: "Mã đề tài/dự án ",
          ten_de_tai: "Tên đề tài/dự án ",
          ten_don_vi: "Tên đơn vị ",
          thao_tac: "Thao tác ",
          QA: "Phụ trách QA"
        },
        sortable: ["stt","ma_de_tai", "ten_de_tai", "ten_don_vi"],
        sortIcon: {
          base: "fa",
          up: "fas fa-sort-up",
          down: "fas fa-sort-down",
          is: "fas fa-sort"
        },
        filterable: ["ma_de_tai", "ten_de_tai", "ten_don_vi"],
        pagination: {
          chunk: 3,
          edge: true,
          nav: "fixed"
        },
        perPage: 5,
        perPageValues: [5, 10, 25]
      },
      useVuex: false,
      theme: "bootstrap4",
      template: "default"
    };
  },
  computed:{
      getIndexOfEditDuAn(){
          for (const index in this.data) {
              if(this.data[index].id == this.edit_du_an.id) return index
          }
      }
  },
  methods: {
      edit(edit_du_an){
          this.editModal = true;
          this.edit_du_an = edit_du_an;
      }
  },
  mounted() {
    axios.get("/du-an").then(response => {
      this.data = response.data;
    });

    EventBus.$on("add-du-an-success", du_an_moi => {
      this.data.unshift(du_an_moi);
      this.$bvToast.toast(du_an_moi.ten_de_tai, {
        title: "Thêm thành công đề tài/dự án",
        variant: "success",
        toaster: "b-toaster-top-center",
        autoHideDelay: 5000
      });
    });

    EventBus.$on("edit-du-an-success", du_an_moi => {
      this.$set(this.data,this.getIndexOfEditDuAn,du_an_moi)
      this.$bvToast.toast(du_an_moi.ten_de_tai, {
        title: "Sửa thành công đề tài/dự án",
        variant: "success",
        toaster: "b-toaster-top-center",
        autoHideDelay: 5000
      });
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