<template>
<form id="add-form">
  <div class="form-project">
    <label for="name">Project Name</label>
    <input v-model="item.name" name='name' type="text" required="required" class="form-control" id="name" aria-describedby="nameHelp" placeholder="Enter Project Name">
    <label v-if="item.group_id == null" for="description">Group</label>
    <select v-if="item.group_id == null" v-model="item.group_id" type="hidden" required="required" class="form-control" id="name" aria-describedby="nameHelp">
      <option v-for="group in groups" :value="group.id">{{group.name}}</option>  
    </select>
    <input v-if="item.group_id != 0" v-model="item.group_id" type="hidden" />
    <label for="due_date">Due Date</label>
    <input v-if="item.due_date == undefined" v-model="item.due_date"  name='due_date' type="date" class="form-control">
    <input v-if="item.due_date != undefined" v-model="item.due_date" name='due_date' disabled type="disabled" class="form-control">

    <label for="description">Description</label>
    <textarea v-model="item.description" class="form-control"  name='description' required="required"> </textarea>
    
  </div>
</form>
</template>
<script>
import { GetMyGroups } from "../groups/GroupsMethods";
export default {
    name: "ProjectForm",
    data () {
      return{
        groups: null
      }
    },
    props: {
      item: {},
    },
    mounted(){
      GetMyGroups()
        .then(groups => {this.groups = groups;})
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