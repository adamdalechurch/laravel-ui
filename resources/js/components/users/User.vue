<template>
  <page :title="user.name" :showHeader="false">
    <template v-slot:backlink>
      <router-link  :to="`/users/`">
        <i class='fas fa-w fa-arrow-left'></i> Back to Users
      </router-link>
    </template>
    <template v-slot:header>
      <!-- content for the header slot -->
    </template>
    <template v-slot:body>
      <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
          <a :class="[baseLinkClass, {'active': detailsVisibile}]"  @click="showDetails" id="nav-details-tab" data-toggle="tab" role="tab" aria-controls="nav-home" aria-selected="true">Details</a>
          <!-- <a :class="[baseLinkClass, {'active': tasksVisibile}]"   @click="showTasks" id="nav-tasks-tab" data-toggle="tab" role="tab" aria-controls="nav-profile" aria-selected="false">Tasks</a> -->
        </div>
      </nav>
      <div class="tab-content" style="padding: 1.25rem" id="nav-tabContent">
        <div v-if="detailsVisibile" class="tab-pane fade show active" id="nav-details" role="tabpanel" aria-labelledby="nav-home-tab">
          <fieldset disabled>
            <UserForm :item="user"></UserForm>
          </fieldset>
        </div>
        <!-- <div v-if="tasksVisibile" class="tab-pane fade show active" id="nav-tasks" role="tabpanel" aria-labelledby="nav-profile-tab">
          <grid v-if="taskCols.length > 0"
            :columnDefsProp="taskCols"
            itemName='Task'
            title='Tasks'
            :rowDataProps="user.tasks"
            :propItem="item"
          >
            <template v-if="item != null" v-slot="{item}">
              <TaskForm :item="item" />
            </template>
          </grid>
        </div> -->
      </div>
    </template>
  </page>
</template>
<script>
import UserForm from './UserForm.vue';
import StatusCell from '../common/StatusCell.vue';
import { TaskCols } from '../tasks/TaskCols';
import TaskForm from '../tasks/TaskForm';

export default {
  name: 'User',
  data() {
    return {
      user: {},
      item: null,
      detailsVisibile: true,
      tasksVisibile: false,
      taskCols: TaskCols,
      baseLinkClass: "nav-item nav-link"
    }
  },
  mounted(){
    axios
    .get(`${process.env.MIX_API_URL}/api/users/${this.$route.params.id}`)
      .then(response => {
          this.user = response.data.item;
          this.item = { user_id: this.user.id};
      }) 
  },
  components: {
    UserForm,
    StatusCell,
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
