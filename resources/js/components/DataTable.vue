<template>
  <div class="animated fadeIn">
    
    <div class="card">
      <div class="card-header">
        <h2>
          <i class="fa fa-list"></i>
          {{t_title}}
        </h2>
        <div class="card-header-actions">
          <button class="btn btn-success">
            <font-awesome-icon :icon="['fas','plus-square']"/>
          </button>
        </div>
      </div>
      <div class="card-body">
        <table class="table table-striped table-bordered datatable">
          <thead>
            <tr>
              <th>STT</th>
              <th>Mã</th>
              <th>Tên</th>
              <th>Thao tác</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Anton Phunihel</td>
              <td>2012/01/01</td>
              <td>Member</td>
              <td>
                <a class="btn btn-info" href="#">
                  <i class="fa fa-edit"></i>
                </a>
                <a class="btn btn-danger" href="#">
                  <i class="fa fa-trash-o"></i>
                </a>
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

Vue.use(ClientTable);

export default {
  name: "DataTable",
  props: {
    t_title: String
  },
  components: {
    ClientTable,
    Event
  },
  data: function() {
    return {
      columns: ["name", "code", "uri"],
      data: ["VietNam", 1, "google.com"],
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
      theme: "bootstrap4",
      template: "default"
    };
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
