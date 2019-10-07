<template>
  <div>
    <v-client-table :columns="columns" :data="data" :options="options" :theme="theme" id="dataTable">
        <span slot="trang_thai" slot-scope="props">
            <ToggleButton :sync="true" :value="props.row.trang_thai" v-model="props.row.trang_thai" :color="switch_color" :labels="labelTxt" :width="140" :height="30" :font-size="14" style="color:#000" @change="changeStatus(props.row)"/>
        </span>
        
        <span slot="thao_tac" slot-scope="props">
          <b-button :id="'edit-button-'+props.index" variant="warning" @click="edit(props.row)">
              <i class="far fa-edit fa-lg"></i>
              <b-tooltip :target="'edit-button-'+props.index" variant="dark">
              <strong>Sửa</strong>
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
import { ToggleButton } from 'vue-js-toggle-button'
import EditDuAnForm from "../form/EditDuAnForm";
Vue.use(ClientTable);

export default {
  name: "DuAnTable",
  components: {
    EditDuAnForm,
    ToggleButton
  },
  data: function() {
    return {
      editModal: false,
      edit_du_an: {},
      columns: ["id","ma_de_tai", "ten_de_tai","trang_thai","ten_don_vi", "QA", "thao_tac"],
      data: [],
      options: {
        headings: {
          stt: "ID ",
          ma_de_tai: "Mã đề tài/dự án ",
          ten_de_tai: "Tên đề tài/dự án ",
          trang_thai: "Trạng thái",
          ten_don_vi: "Tên đơn vị ",
          thao_tac: "Thao tác ",
          QA: "Phụ trách QA"
        },
        sortable: ["id","ma_de_tai", "ten_de_tai", "ten_don_vi"],
        sortIcon: {
          base: "fa",
          up: "fas fa-sort-up",
          down: "fas fa-sort-down",
          is: "fas fa-sort"
        },
        filterable: ["ma_de_tai", "ten_de_tai", "trang_thai", "ten_don_vi"],
        pagination: {
          chunk: 5,
          edge: true,
          nav: "fixed"
        },
        perPage: 10,
        perPageValues: [10, 25, 50]
      },
      useVuex: false,
      theme: "bootstrap4",
      template: "default",
      labelTxt: {checked: 'Đang thực hiện', unchecked: 'Đã kết thúc'},
      switch_color: {checked: '#4dbd74', unchecked: '#ffc107'}
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
    changeStatus(edit_du_an){
      axios
        .put(`/du-an/${edit_du_an.id}`, {
          trang_thai: edit_du_an.trang_thai
        })
        .then(response => {
          this.$bvToast.toast(edit_du_an.ten_de_tai, {
            title: "Đã thay đổi trạng thái đề tài/dự án",
            variant: "success",
            toaster: "b-toaster-top-center",
            autoHideDelay: 5000
          });
        })
        .catch(error => {
          console.log(error);
        });
    },
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
      this.data.push(du_an_moi);
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
span.v-switch-label{
    color: #000 !important;
}
  
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