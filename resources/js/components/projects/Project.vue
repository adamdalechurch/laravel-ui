<template>
  <page :title="project.name">
    <template v-slot:backlink>
      <router-link  :to="`/projects/`">
        <i class='fas fa-w fa-arrow-left'></i> Back to Projects
      </router-link>
    </template>
    <template v-slot:header>
      <!-- content for the header slot -->
    </template>
    <template v-slot:body>
      <fieldset disabled>
        <ProjectForm :item="project"></ProjectForm>
      </fieldset>
    </template>
  </page>
</template>
<script>
import ProjectForm from './ProjectForm.vue';
export default {
  name: 'Project',
  data() {
    return {
      project: {},
    }
  },
  mounted(){
    axios
    .get(`${process.env.MIX_API_URL}/api/projects/${this.$route.params.id}`)
      .then(response => {
          this.project = response.data.item;
      }) 
  },
  components: {
    ProjectForm
  }
}
</script>
