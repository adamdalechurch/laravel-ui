<template>
  <page title="My Profile">
    <template v-slot:header>
      <!-- content for the header slot -->
    </template>
    <template v-slot:body>
      <fieldset disabled>
          <UserForm :item="profile"/>
      </fieldset> 
    </template>
  </page>
</template>
<script>
import UserForm from './UserForm.vue';

export default {
  name: 'MyProfile',
  data() {
    return {
      profile: {},
    }
  },
  components: {
    UserForm
  },
  mounted(){
    axios
    .get(`${process.env.MIX_API_URL}/api/my-profile`)
      .then(response => {
          this.profile = response.data.profile;
      }) 
  }
}


</script>
