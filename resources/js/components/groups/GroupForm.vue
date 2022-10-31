<template>
<form id="add-form">
  <div class="form-group">
    <label for="name">Group Name</label>
    <input v-model="group.name" name='name' type="text" required="required" class="form-control" id="name" aria-describedby="nameHelp" placeholder="Enter Group Name">
  </div>
</form>
</template>
<script>

export default {
    name: "GroupForm",
    props: {
        group: {}
    },
}
</script>