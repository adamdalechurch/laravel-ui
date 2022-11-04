<template>
  <page :title="group.name" :showHeader="false">
    <template v-slot:backlink>
      <router-link  :to="`/groups/`">
        <i class='fas fa-w fa-arrow-left'></i> Back to Groups
      </router-link>
    </template>
    <template v-slot:header>
      <!-- content for the header slot -->
    </template>
    <template v-slot:body>
      <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
          <a class="nav-item nav-link"  @click="showDetails" id="nav-details-tab" data-toggle="tab" role="tab" aria-controls="nav-home" aria-selected="true">Details</a>
          <a class="nav-item nav-link"  @click="showProjects" id="nav-projects-tab" data-toggle="tab" role="tab" aria-controls="nav-profile" aria-selected="false">Projects</a>
        </div>
      </nav>
      <div class="tab-content" style="padding: 1.25rem" id="nav-tabContent">
        <div v-if="detailsVisibile" class="tab-pane fade show active" id="nav-details" role="tabpanel" aria-labelledby="nav-home-tab">
          <fieldset disabled>
            <GroupForm :item="group"></GroupForm>
          </fieldset>
        </div>
        <div v-if="projectsVisibile" class="tab-pane fade show active" id="nav-projects" role="tabpanel" aria-labelledby="nav-profile-tab">
          <grid v-if="projectCols.length > 0"
            :columnDefsProp="projectCols"
            itemName='Project'
            title='Projects'
            :rowDataProps="group.projects"
            :propItem="item"
          >
            <template v-if="item != null" v-slot="{item}">
              <ProjectForm :item="item" />
            </template>
          </grid>
        </div>
      </div>
    </template>
  </page>
</template>
<script>
import GroupForm from './GroupForm.vue';
import { ProjectCols } from '../projects/ProjectCols';
import ProjectForm from '../projects/ProjectForm';

export default {
  name: 'Group',
  data() {
    return {
      group: {},
      item: null,
      detailsVisibile: true,
      projectsVisibile: false,
      projectCols: ProjectCols
    }
  },
  mounted(){
    axios
    .get(`${process.env.MIX_API_URL}/api/groups/${this.$route.params.id}`)
      .then(response => {
          this.group = response.data.item;
          this.item = { group_id: this.group.id};
      }) 
  },
  components: {
    GroupForm,
    ProjectForm
  },
  methods: {
    showDetails: function (){
      this.detailsVisibile = true;
      this.projectsVisibile = false;
    },
    showProjects: function (){
      this.detailsVisibile = false;
      this.projectsVisibile = true;
    },
  }
}
</script>
