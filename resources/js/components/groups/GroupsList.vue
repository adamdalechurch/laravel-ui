<template>
    <ul class="list-group">
        <li class="list-group-item" :key="group.id" v-for="group in groups">
            <div class="row">
                <div class="col-sm-4">
                    <router-link :to="`/groups/${ group.id }`">
                        {{group.name}}
                    </router-link>
                </div>
                <div class="col-sm-4" >
                    <span class="badge badge-primary">
                        {{group.users.length}} Members
                    </span>
                </div>
                <div class="col-sm-4">
                    <span class="badge badge-secondary">
                       Owner: {{group.owner.name}}
                    </span>
                </div>
            </div>
        </li>
    </ul>
</template>
<script>
export default {
    name: "GroupsList",
    props: {
        groups: []
    }
}
</script>