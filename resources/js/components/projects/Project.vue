<template>
  <page :title="project.name" :showHeader="false">
    <template v-slot:backlink>
      <router-link  :to="`/projects/`">
        <i class='fas fa-w fa-arrow-left'></i> Back to Projects
      </router-link>
    </template>
    <template v-slot:header>
      <!-- content for the header slot -->
    </template>
    <template v-slot:body>
      <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
          <a :class="[baseLinkClass, {'active': detailsVisibile}]"  @click="showDetails" id="nav-details-tab" data-toggle="tab" role="tab" aria-controls="nav-home" aria-selected="true">Details</a>
          <a :class="[baseLinkClass, {'active': tasksVisibile}]"   @click="showTasks" id="nav-tasks-tab" data-toggle="tab" role="tab" aria-controls="nav-profile" aria-selected="false">Tasks</a>
        </div>
      </nav>
      <div class="tab-content" style="padding: 1.25rem" id="nav-tabContent">
        <div v-if="detailsVisibile" class="tab-pane fade show active" id="nav-details" role="tabpanel" aria-labelledby="nav-home-tab">
          <fieldset disabled>
            <ProjectForm :item="project"></ProjectForm>
          </fieldset>
        </div>
        <div v-if="tasksVisibile" class="tab-pane fade show active" id="nav-tasks" role="tabpanel" aria-labelledby="nav-profile-tab">
          <grid v-if="taskCols.length > 0"
            :columnDefsProp="taskCols"
            itemName='Task'
            title='Tasks'
            :rowDataProps="project.tasks"
            :propItem="item"
          >
            <template v-if="item != null" v-slot="{item}">
              <TaskForm :item="item" />
            </template>
          </grid>
        </div>
      </div>
    </template>
  </page>
</template>
<script>
import ProjectForm from './ProjectForm.vue';
import { TaskCols } from '../tasks/TaskCols';
import TaskForm from '../tasks/TaskForm';

export default {
  name: 'Project',
  data() {
    return {
      project: {},
      item: null,
      detailsVisibile: true,
      tasksVisibile: false,
      taskCols: TaskCols,
      baseLinkClass: "nav-item nav-link"
    //  :class="[activeClass, errorClass]"
    }
  },
  mounted(){
    axios
    .get(`${process.env.MIX_API_URL}/api/projects/${this.$route.params.id}`)
      .then(response => {
          this.project = response.data.item;
          this.item = { project_id: this.project.id};
      }) 
  },
  components: {
    ProjectForm,
    TaskForm
  },
  methods: {
    showDetails: function (){
      this.detailsVisibile = true;
      this.tasksVisibile = false;
    },
    showTasks: function (){
      this.detailsVisibile = false;
      this.tasksVisibile = true;
    },
  }
}
</script>
