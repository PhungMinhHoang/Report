<template>
  <div class="animated fadeIn">
    <div class="card">
      <div class="card-header">
        <h2>
          <font-awesome-icon :icon="['far','list-alt']" />
          <span>Danh sách {{tb_title}}</span>
        </h2>
        <div class="card-header-actions">
          <button class="btn btn-success" :title="'Thêm mới'+tb_title">
            <font-awesome-icon :icon="['far','plus-square']" size="2x" />
          </button>
        </div>
      </div>
      <div class="card-body">
        <table class="table table-striped table-bordered datatable">
          <thead>
            <tr>
              <th v-for="(col, index) in columns" :key="index">{{col}}</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(row, index) in ds_du_an" :key="index">
              <td v-for="(col, index) in columns" :key="index">{{row[ChangeToSlug(col)]}}</td>
              <td>
                <a class="btn btn-info" href="#" />
                <a class="btn btn-danger" href="#" />
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>

<script>
import { ClientTable, Event } from "vue-tables-2";
import { ChangeToSlug } from "../myFunction/slug.js";
Vue.use(ClientTable);

export default {
  name: "DataTable",
  props: {
    tb_title: String,
    columns: Array,
    tb_type: String,
    ds_du_an: Array
  },
  components: {
    ClientTable,
    Event
  },
  data: function() {
    return {
      rows: this.ds_du_an
      // options: {
      //   headings: {
      //     name: 'Country Name',
      //     code: 'Country Code',
      //     uri: 'View Record'
      //   },
      //   sortable: ['name', 'code'],
      //   filterable: ['name', 'code'],
      //   sortIcon: { base:'fa', up:'fa-sort-asc', down:'fa-sort-desc', is:'fa-sort' },
      //   pagination: {
      //     chunk: 5,
      //     edge: false,
      //     nav: 'scroll'
      //   }
      // },
    };
  },
  computed: {},
  methods:{
      ChangeToSlug: ChangeToSlug
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
