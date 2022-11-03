<template>
  <grid v-if="cols.length > 0"
    :columnDefsProp="cols"
    itemName='Group'
    title='My Groups'
  >
  <template v-slot="{item}">
    <GroupForm :item="item" />
  </template>
  </grid>
</template>
<script>
import GroupForm from './GroupForm.vue';
import {GroupCols} from './GroupCols';
export default {
  name: 'MyGroups',
  data() {
    return {
      cols: GroupCols,
      item: {},
    }
  },
  components: {
    GroupForm
  }
}
</script>
 