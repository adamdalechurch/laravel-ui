<template>
    <div>
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-0 text-gray-800">My Profile</h1>
      </div>
      <div class="card shadow mb-4">
          <div class="card-header py-3">
          </div>
          <div class="card-body" >
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
          </div>
      </div>
    </div>
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
