<template>
    <form id="profile-form" method="POST" action="">
        <div class="form-group">
            <label for="name">Name</label>
            <input name='name' type="text" v-model="item.name" class="form-control" id="name" aria-describedby="nameHelp" placeholder="Enter Profile Name">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input name='email' type="text" v-model="item.email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter Profile Email">
        </div>
        <div class="form-group">
            <label for="created_at">Created Date</label>
            <input name='created_at' readonly type="text" v-model="item.created_at" class="form-control" id="created_at" aria-describedby="emailHelp">
        </div>
    </form>
</template>
<script>
export default {
    name: "UserForm",
    props: {
        item: {}
    },
}
</script>