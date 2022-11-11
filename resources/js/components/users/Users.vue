<template>
  <page title="Users">
    <template v-slot:body>
      <grid v-if="cols.length > 0"
        :columnDefsProp="cols"
        itemName='User'
        title='Users'
        :showEdit="false"
        :showDelete="false"
        :showAdd="false"

      >
      <template v-slot="{item}">
        <UserForm :item="item" />
      </template>
      </grid>
    </template>
  </page>
</template>
<script>
import UserForm from './UserForm.vue';
import {UserCols} from './UserCols';
export default {
  name: 'MyUsers',
  data() {
    return {
      cols: UserCols,
      item: {},
    }
  },
  components: {
    UserForm
  }
}
</script>
 