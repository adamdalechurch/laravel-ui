<template>
<form id="add-form">
  <div class="form-task">
    <label for="name">Task Name</label>
    <input v-model="item.name" name='name' type="text" required="required" class="form-control" id="name" aria-describedby="nameHelp" placeholder="Enter Task Name">
    <label v-if="item.project_id == null" for="description">Project</label>
    <select v-if="item.project_id == null" v-model="item.project_id" type="hidden" required="required" class="form-control" id="name" aria-describedby="nameHelp">
      <option v-for="project in projects" :value="project.id">{{project.name}}</option>  
    </select>
    <input v-if="item.project_id != 0" v-model="item.project_id" type="hidden" />
    <label for="due_date">Due Date</label>
    <input v-if="item.due_date == undefined" v-model="item.due_date"  name='due_date' type="date" class="form-control">
    <input v-if="item.due_date != undefined" v-model="item.due_date" name='due_date' disabled type="disabled" class="form-control">
    <label for="description">Description</label>
    <textarea v-model="item.description" class="form-control"  name='description' required="required"> </textarea>
  </div>
</form>
</template>
<script>
import { GetMyProjects } from "../projects/ProjectsMethods";
export default {
    name: "TaskForm",
    data () {
      return{
        projects: null
      }
    },
    props: {
      item: {},
    },
    mounted(){
      GetMyProjects()
        .then(projects => {this.projects = projects;})
    }
}
</script>
<style scoped>
.mx-input {
  z-index: 3 !important;
}

.mx-datepicker-popup {
  z-index: 4 !important;
}

</style>