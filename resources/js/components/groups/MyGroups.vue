<template>
    <div>
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">My Groups</h1>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <x-button2 type='button' data-toggle="modal" data-target="#NewGroupModal"><i class="fas fa-plus fa-sm text-white-50"></i> New Group</x-button2>
            </div>
            <div class="card-body">
                <div class="table-responsive" v-if="rowData != null">
                    <ag-grid-vue style="width: 100%; height: 500px;"
                        class="ag-theme-material"
                        :columnDefs="columnDefs"
                        :rowData="rowData">
                    </ag-grid-vue>
                </div>
                <div class="table-responsive" v-if="rowData == null">
                    <i class="fas fa-circle-notch fa-spin"></i>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import { AgGridVue } from "ag-grid-vue";

export default {
  name: "My Groups",
  data() {
    return {
      columnDefs: null,
      rowData: null,
    };
  },
  components: {
    AgGridVue,
  },
  beforeMount() {
    this.columnDefs = [
      { field: "name" },
      { field: "owner" },
      { field: "roles" },
      { field: "created_at" },
      { field: "actions" }
    ];
  },
  async created(){
    axios
      .get(process.env.MIX_API_URL + '/api/groups')
      .then(response => {
        this.rowData = response.data.groups;
      })
  }
};
</script>
<style lang="scss">
   @import "~ag-grid-community/styles/ag-grid.css";
   @import "~ag-grid-community/styles/ag-theme-material.css";
</style>