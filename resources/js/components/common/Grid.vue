<template>
  <div>
    <button-common  type='button' @click="newItem" style="margin-bottom: 1.25rem"><i class="fas fa-plus fa-sm text-white-50"></i> New {{itemName}}</button-common>
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
  </div>
</template>
<script>
import { AgGridVue } from "ag-grid-vue";
import ActionCell from "./ActionCell.vue";
import DateCell from "./DateCell.vue";
import ItemLinkCell from './ItemLinkCell.vue'
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
  title: null,
  rowDataProps: null,
  parentName: null,
  parentId: null,
  propItem: null
},
components: {
  AgGridVue,
  ActionCell,
  DateCell,
  GroupCell,
  ItemLinkCell,
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

  if(this.rowDataProps)
    this.rowData = this.rowDataProps
},
async mounted(){
  if(!this.rowDataProps)
    this.getItems();
},
async updated(){
  if(this.rowDataProps)
    this.rowData = this.rowDataProps
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
    this.item = this.propItem ?? {};
    this.modalTitle = `New ${this.itemName}`;
    this.showModal = true;
  },
  saveItem: function(){
    this.showModal = false; 
    axios
      .post(`${process.env.MIX_API_URL}/api/${this.itemName.toLowerCase()}s/store`, this.item)
      .then(() => {
        if(this.item.id == 0)
          this.rowData = [...this.rowData, this.item];
        else
          this.rowData = [...this.rowData.filter(m => m.id != this.item.id), this.item];
      });
  },
  edit: function(e, id){
    this.item = this.rowData.find(x => x.id == id);
    this.modalTitle = `Edit ${this.itemName}`;
    this.showModal = true;
  },
  del: function(e, id){
    this.showModal = false; 
    axios
      .post(`${process.env.MIX_API_URL}/api/${this.itemName.toLowerCase()}s/${id}/delete`)
      .then(this.rowData = [...this.rowData.filter(m => m.id != id)]);
  }
}
};
</script>
<style lang="scss">
 @import "~ag-grid-community/styles/ag-grid.css";
 @import "~ag-grid-community/styles/ag-theme-material.css";
</style>