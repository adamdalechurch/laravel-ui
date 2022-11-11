<template>
    <span>
        <button v-if="params.showEdit || params.showEdit == undefined" type='button' class='btn btn-success btn-xs' @click="params.edit($event, params.data.id)">
        <i class="fas fa-edit fa-sm text-white-50"></i>
        </button>
        <button v-if="params.showDelete || params.showDelete == undefined" type='button' class='btn btn-danger btn-xs' @click="params.del($event, params.data.id)">
            <i class="fas fa-trash fa-sm text-white-50"></i>
        </button>
    </span>
</template>
<script>

export default {
  name: "ActionCell"
}
</script>