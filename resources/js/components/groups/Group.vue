<template>
  <page :title="group.name">
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
        </div>
      </div>
    </template>
  </page>
</template>
<script>
import GroupForm from './GroupForm.vue';
export default {
  name: 'Group',
  data() {
    return {
      group: {},
      detailsVisibile: true,
      projectsVisibile: false
    }
  },
  mounted(){
    axios
    .get(`${process.env.MIX_API_URL}/api/groups/${this.$route.params.id}`)
      .then(response => {
          this.group = response.data.item;
      }) 
  },
  components: {
    GroupForm
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
