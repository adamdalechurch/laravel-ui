<template>
    <span>
      <select class="form-control" @change="params.updateStatus($event, params.data.id)">
        <option v-for="status in statuses" :selected="status.value == params.data.status_id" :value="status.value">{{status.name}}</option>
      </select>    
    </span>
</template>
<script>

export default {
  name: "DateCell",
  data(){
    return{
      statuses: [
        {
          name: "To Do",
          value: 1
        },
        {
          name: "Working On It",
          value: 2
        },
        {
          name: "In Review",
          value: 3
        },
        {
          name: "Completed",
          value: 4
        },
        {
          name: "Archived",
          value: 5
        }
      ]
    }
  }
}
</script>

