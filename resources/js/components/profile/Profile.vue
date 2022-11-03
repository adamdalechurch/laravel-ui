<template>
  <page title="My Profile">
    <template v-slot:header>
      <!-- content for the header slot -->
    </template>
    <template v-slot:body>
      <fieldset disabled>
          <form id="profile-form" method="POST" action="">
              <div class="form-group">
                  <label for="name">Name</label>
                  <input name='name' type="text" v-model="profile.name" class="form-control" id="name" aria-describedby="nameHelp" placeholder="Enter Profile Name">
              </div>
              <div class="form-group">
                  <label for="email">Email</label>
                  <input name='email' type="text" v-model="profile.email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter Profile Email">
              </div>
              <div class="form-group">
                  <label for="created_at">Created Date</label>
                  <input name='created_at' type="text" v-model="profile.created_at" class="form-control" id="created_at" aria-describedby="emailHelp">
              </div>
          </form>
      </fieldset> 
    </template>
  </page>
</template>
<script>
export default {
  name: 'MyProfile',
  data() {
    return {
      profile: {},
    }
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
