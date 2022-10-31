<template>
    <div>
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">My Groups</h1>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <button-common  type='button' @click="newItem"><i class="fas fa-plus fa-sm text-white-50"></i> New Group</button-common>
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
        <modal 
          v-if="showModal" 
          @close="showModal=false"
          @save="saveItem"
          :ModalTitle="modalTitle"
          ModalConfirmBtnTxt="Save"
        >
          <group-form :group="item"></group-form>
        </modal>
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
      item: null,
      showModal: false,
      modalTitle: null,
      itemName: null,
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
    this.itemName = "Group";
    this.getItems();
  },
  methods: {
    getItems: function(){
      this.showModal = false; 
      axios
        .get(process.env.MIX_API_URL + '/api/groups')
        .then(response => {
          this.rowData = response.data.groups;
      })    
    },
    newItem: function (){
      this.item = {};
      this.modalTitle = `New ${this.itemName}`;
      this.showModal = true;
    },
    saveItem: function(){
      alert(this.item.name);
      axios
        .post(process.env.MIX_API_URL + '/api/groups/store', this.item)
        .then(this.getItems());
    }
  }
};
</script>
<style lang="scss">
   @import "~ag-grid-community/styles/ag-grid.css";
   @import "~ag-grid-community/styles/ag-theme-material.css";
</style>