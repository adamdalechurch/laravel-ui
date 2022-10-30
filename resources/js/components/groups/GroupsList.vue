<template>
    <ul>
        <li :key="group.id" v-for="group in groups">
            <router-link  :to="`/groups/${ group.id}`">
                {{group.name}}
            </router-link>
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