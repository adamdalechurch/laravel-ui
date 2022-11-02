<template>
  <grid
    :columnDefsProp="[
      { 
        field: 'name',
        headerName: 'Name',
        filter: 'agTextColumnFilter',
        flex: 1,
        sortable: true
      },
      { 
        field: 'owner' ,
        flex: 1,
        headerName: 'Owner',
      },
      { 
        field: 'roles',
        flex: 1,
        headerName: 'My Group Roles',
      },
      { 
        field: 'created_at',
        flex: 1,
        headerName: 'Date Created',
        sortable: true
      },
    ]"
    itemName='Group'
    title='My Groups'
  >
  <template v-slot="{item}">
    <group-form :item="item" />
  </template>
  </grid>
</template>
<script>
import { AgGridVue } from 'ag-grid-vue';
export default {
  name: 'MyGroups',
  data() {
    return {
      item: {},
    }
  }
}
 