<template>
  <page title="My Tasks">
    <template v-slot:body>
      <grid v-if="cols.length > 0"
        :columnDefsProp="cols"
        itemName='Task'
        title='My Tasks'
      >
      <template v-slot="{item}">
        <TaskForm :item="item" />
      </template>
      </grid>
    </template>
  </page>
</template>
<script>
import TaskForm from './TaskForm.vue';
import { TaskCols } from './TaskCols';
import StatusCell from "../common/StatusCell.vue";

export default {
  name: 'MyTasks',
  data() {
    return {
      cols: TaskCols,
      item: {},
    }
  },
  components: {
    TaskForm,
    StatusCell
  },
  beforeMount() {
    this.cols[2] = { 
      headerName: "Status",
      flex: 1,
      cellRenderer: 'StatusCell',
      cellRendererParams : {
        updateStatus: this.updateStatus.bind(this)
      }
    }
  },
  methods:{
    updateStatus: function(e, id){
      axios
        .post(`${process.env.MIX_API_URL}/api/tasks/${id}/update/status`, {status_id: e.target.value})
        //.then(this.getItems());
    }
  }
}
</script>
  