<template>
  <page :title="title">
    <template v-slot:header>
      <button-common  type='button' @click="newItem"><i class="fas fa-plus fa-sm text-white-50"></i> New {{itemName}}</button-common>
    </template>
    <template v-slot:body>
      <div class="table-responsive" style="display: flex; flex-direction: column; height: 100%" v-if="rowData != null">
        <ag-grid-vue style="width: 100%; height: 500px;"
            class="ag-theme-material"
            :columnDefs="columnDefs"
            :rowData="rowData"
            :paginationAutoPageSize="true"
            :pagination="true"
            :defaultColDef="defaultColDef"
            :sizeColumnsToFit="true"
            :autoSizeColumns="true"
            v-on:edit="edit"
            >
        </ag-grid-vue>
    </div>
    <div class="table-responsive" v-if="rowData == null">
        <i class="fas fa-circle-notch fa-spin"></i>
    </div>
    <modal 
        v-if="showModal" 
        @close="showModal=false"
        @save="saveItem"
        :ModalTitle="modalTitle"
        ModalConfirmBtnTxt="Save"
      >
        <slot :item="item" v-bind="item"></slot>
      </modal>
    </template>
   
  </page>
</template>
<script>
import { AgGridVue } from "ag-grid-vue";
import ActionCell from "./ActionCell.vue";
import DateCell from "./DateCell.vue";
import GroupCell from "../groups/GroupCell.vue";
import ProgressCell from "./ProgressCell.vue";
import ProjectCell from "../projects/ProjectCell.vue";
import UserCell from "../profile/UserCell.vue";

export default {
name: "Grid",
data() {
  return {
    rowData: null,
    showModal: false,
    modalTitle: null,
    defaultColDef: {
      editable: true,
      enableRowGroup: true,
      enablePivot: true,
      enableValue: true,
      sortable: true,
      resizable: true,
      filter: true,
      flex: 1,
      minWidth: 150,
      item: null
    },
    columnDefs: null
  };
},
props: {
  columnDefsProp: null,
  itemName: null,
  title: null
},
components: {
  AgGridVue,
  ActionCell,
  DateCell,
  GroupCell,
  ProgressCell,
  ProjectCell,
  UserCell
},
beforeMount() {
  this.columnDefs = [
    ...this.columnDefsProp,
    { 
      headerName: "Actions",
      flex: 1,
      cellRenderer: 'ActionCell',
      cellRendererParams : {
        edit: this.edit.bind(this),
        del: this.del.bind(this)
      }
    }
  ]
},
async created(){
  this.getItems();
},
methods: {
  getItems: function(){
    this.showModal = false; 
    this.rowData = null;
    axios
      .get(`${process.env.MIX_API_URL}/api/${this.itemName.toLowerCase()}s/`)
      .then(response => {
          this.rowData = response.data.items;
      })    
  },
  newItem: function (){
    this.item = {};
    this.modalTitle = `New ${this.itemName}`;
    this.showModal = true;
  },
  saveItem: function(){
    axios
      .post(`${process.env.MIX_API_URL}/api/${this.itemName.toLowerCase()}s/store`, this.item)
      .then(this.getItems());
  },
  edit: function(e, id){
    this.item = this.rowData.find(x => x.id == id);
    this.modalTitle = `Edit ${this.itemName}`;
    this.showModal = true;
  },
  del: function(e, id){
    axios
      .post(`${process.env.MIX_API_URL}/api/${this.itemName.toLowerCase()}s/${id}/delete`)
      .then(this.getItems());
  }
}
};
</script>
<style lang="scss">
 @import "~ag-grid-community/styles/ag-grid.css";
 @import "~ag-grid-community/styles/ag-theme-material.css";
</style>