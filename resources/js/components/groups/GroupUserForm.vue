<template>
<form id="add-form">
  <div class="form-group">
    <input type="hidden"  v-model="item.group_id" /> 
    <label for="description">User</label>
    <select v-model="item.user_id" type="hidden" required="required" class="form-control" id="name" aria-describedby="nameHelp">
      <option v-for="user in users" :value="user.id">{{user.name}}</option>  
    </select>
  </div>
</form>
</template>
<script>
import { GetUsers } from "../profile/UserMethods.js";

export default {
    name: "GroupUserForm",
    props: {
        item: {},
        users: []
    },
    mounted(){
      GetUsers()
        .then(users => {this.users = users})
    }
}
</script>