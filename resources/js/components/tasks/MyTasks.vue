<template>
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
  <script>
  import TaskForm from './TaskForm.vue';
  import { TaskCols } from './TaskCols';
  export default {
    name: 'MyTasks',
    data() {
      return {
        cols: TaskCols,
        item: {},
      }
    },
    components: {
      TaskForm
    },
  }
  </script>
   