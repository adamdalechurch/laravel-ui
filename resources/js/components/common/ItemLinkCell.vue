<template>
    <span>
        <router-link  :to="`/${params.itemName}s/${params.data.id}`">
          <b><i class="fas fa-link"></i>
          {{params.value}}</b>
        </router-link>
    </span>
</template>
<script>
export default {
  name: "ItemLinkCell"
}
</script>

