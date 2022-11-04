<template>
  <page :title="task.name">
    <template v-slot:backlink>
      <router-link  :to="`/tasks/`">
        <i class='fas fa-w fa-arrow-left'></i> Back to Tasks
      </router-link>
    </template>
    <template v-slot:header>
      <!-- content for the header slot -->
    </template>
    <template v-slot:body>
      <fieldset disabled>
        <TaskForm :item="task"></TaskForm>
      </fieldset>
    </template>
  </page>
</template>
<script>
import TaskForm from './TaskForm.vue';
export default {
  name: 'Task',
  data() {
    return {
      task: {},
    }
  },
  mounted(){
    axios
    .get(`${process.env.MIX_API_URL}/api/tasks/${this.$route.params.id}`)
      .then(response => {
          this.task = response.data.item;
      }) 
  },
  components: {
    TaskForm
  }
}
</script>
