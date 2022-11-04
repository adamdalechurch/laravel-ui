<template>
    <span>
        <i class="fas fa-calendar"></i>
        {{params.value.replace("T", " ").split(" ")[0]}}
    </span>
</template>
<script>

export default {
  name: "DateCell"
}
</script>

