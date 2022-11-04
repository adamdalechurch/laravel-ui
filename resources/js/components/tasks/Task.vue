<template>
  <page :title="task.name" :showHeader="false">
    <template v-slot:backlink>
      <router-link  :to="`/tasks`">
        <i class='fas fa-w fa-arrow-left'></i> Back to Tasks
      </router-link>
    </template>
    <template v-slot:body>
      <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
          <a :class="[baseLinkClass, {'active': detailsVisibile}]" id="nav-details-tab" data-toggle="tab" role="tab" aria-controls="nav-home" aria-selected="true">Details</a>
          <!-- <a :class="[baseLinkClass, {'active': tasksVisibile}]"   @click="showTasks" id="nav-tasks-tab" data-toggle="tab" role="tab" aria-controls="nav-profile" aria-selected="false">Tasks</a> -->
        </div>
      </nav>
      <div class="tab-content" style="padding: 1.25rem" id="nav-tabContent">
        <div v-if="detailsVisibile" class="tab-pane fade show active" id="nav-details" role="tabpanel" aria-labelledby="nav-home-tab">
          <fieldset disabled>
            <TaskForm :item="task"></TaskForm>
          </fieldset>
        </div>
      </div>
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
      item: null,
      detailsVisibile: true,
      baseLinkClass: "nav-item nav-link"
    //  :class="[activeClass, errorClass]"
    }
  },
  mounted(){
    axios
    .get(`${process.env.MIX_API_URL}/api/tasks/${this.$route.params.id}`)
      .then(response => {
          this.task = response.data.item;
          this.item = { task_id: this.task.id};
      }) 
  },
  components: {
    TaskForm
  },
}
 </script>
