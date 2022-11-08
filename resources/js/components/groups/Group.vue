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
          <a :class="[baseLinkClass, {'active': detailsVisible}]"  @click="showDetails" id="nav-details-tab" data-toggle="tab" role="tab" aria-controls="nav-home" aria-selected="true">Details</a>
          <a :class="[baseLinkClass, {'active': projectsVisible}]"   @click="showProjects" id="nav-projects-tab" data-toggle="tab" role="tab" aria-controls="nav-profile" aria-selected="false">Projects</a>
          <a :class="[baseLinkClass, {'active': membersVisible}]"   @click="showMembers" id="nav-members-tab" data-toggle="tab" role="tab" aria-controls="nav-profile" aria-selected="false">Members</a>
        </div>
      </nav>
      <div class="tab-content" style="padding: 1.25rem" id="nav-tabContent">
        <div v-if="detailsVisible" class="tab-pane fade show active" id="nav-details" role="tabpanel" aria-labelledby="nav-home-tab">
          <fieldset disabled>
            <GroupForm :item="group"></GroupForm>
          </fieldset>
        </div>
        <div v-if="projectsVisible" class="tab-pane fade show active" id="nav-projects" role="tabpanel" aria-labelledby="nav-profile-tab">
          <grid v-if="projectCols.length > 0 && projectsVisible"
            :columnDefsProp="projectCols"
            itemName='Project'
            title='Projects'
            :rowDataProps="group.projects"
            :propItem="item"
            :key="1"
          >
            <template v-if="item != null" v-slot="{item}">
              <ProjectForm :item="item" />
            </template>
          </grid>
        </div>
        <div v-if="membersVisible" class="tab-pane fade show active" id="nav-members" role="tabpanel" aria-labelledby="nav-profile-tab">
          <grid v-if="userCols.length > 0 && membersVisible"
            :columnDefsProp="userCols"
            :itemName="`Group ${group.id} Member`"
            title='Members'
            :showEdit="false"
            :rowDataProps="group.users"
            :propItem="item"
            :key="2"
          >
            <template v-if="item != null" v-slot="{item}">
              <GroupUserForm :item="item" />
            </template>
          </grid>
        </div>
      </div>
    </template>
  </page>
</template>
<script>
import GroupForm from './GroupForm.vue';
import GroupUserForm from './GroupUserForm.vue';
import { ProjectCols } from '../projects/ProjectCols';
import { UserCols } from '../profile/UserCols';
import ProjectForm from '../projects/ProjectForm';

export default {
  name: 'Group',
  data() {
    return {
      group: {},
      item: null,
      detailsVisible: true,
      membersVisible: false,
      projectsVisible: false,
      projectCols: ProjectCols,
      userCols: UserCols,
      baseLinkClass: "nav-item nav-link"
    //  :class="[activeClass, errorClass]"
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
    GroupUserForm,
    ProjectForm
  },
  methods: {
    showDetails: function (){
      this.detailsVisible = true;
      this.projectsVisible = false;
      this.membersVisible = false;
    },
    showProjects: function (){
      this.projectsVisible = true;
      this.detailsVisible = false;
      this.membersVisible = false;
    },
    showMembers: function (){
      this.membersVisible = true;
      this.detailsVisible = false;
      this.projectsVisible = false;
    },
  }
}
</script>
