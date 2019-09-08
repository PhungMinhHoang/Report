<template>
  <div class="animated">
    <b-card>
      <b-card-header>
        <i class="far fa-list-alt fa-2x"></i>
        <h2>{{"Danh sách"+tb_title}}</h2>
        <div class="card-header-actions">
          <b-button id="add-button" variant="success">
            <b-tooltip target="add-button" variant="dark">
              <strong>Thêm{{tb_title}}mới</strong>
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
          <a slot="uri" slot-scope="props" target="_blank" :href="props.row.uri" class="icon-eye"></a>

          <div slot="child_row" slot-scope="props">
            The link to {{props.row.name}} is
            <a :href="props.row.uri">{{props.row.uri}}</a>
          </div>
        </v-client-table>
      </b-card-body>
    </b-card>
  </div>
</template>

<script>
import { ClientTable, Event } from "vue-tables-2";
Vue.use(ClientTable);

export default {
  name: "DataTable",
  props: {
    tb_title: String,
    tb_columns: Array,
    tb_type: String,
    tb_data: Array
  },
  components: {
    ClientTable,
    Event
  },
  data: function() {
    return {
      columns: this.tb_columns,
      data: this.tb_data,
      options: {
        headings: {
          name: "Country Name",
          code: "Country Code",
          uri: "View Record"
        },
        sortable: ["name", "code"],
        filterable: ["name", "code"],
        sortIcon: {
          base: "fa",
          up: "fa-sort-asc",
          down: "fa-sort-desc",
          is: "fa-sort"
        },
        pagination: {
          chunk: 5,
          edge: false,
          nav: "scroll"
        }
      },
      useVuex: false,
      theme: "bootstrap4",
      template: "default"
    };
  },
  computed: {},
  methods: {}
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
