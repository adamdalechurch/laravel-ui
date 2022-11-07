<template>
<form id="add-form">
  <div class="form-group">
    <label for="description">User</label>
    <select  v-model="item.user_id" type="hidden" required="required" class="form-control" id="name" aria-describedby="nameHelp">
      <option v-for="user in users" :key="user.id" :value="user.id">{{user.name}}</option>  
    </select>
  </div>
</form>
</template>
<script>
import { GetUsers } from "../profile/UserMethods.js";

export default {
    name: "GroupUserForm",
    data (){ 
      return {
        users: null
      }
    },
    props: {
      item: {},
    },
    mounted(){
      GetUsers()
        .then(users => {this.users = users;})
    }
}
</script>