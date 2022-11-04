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
      
      <fieldset disabled>
        <GroupForm :item="group"></GroupForm>
      </fieldset>
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
  }
}
</script>
