<template>
  <page title="Configurations">
    <template v-slot:body>
      <grid v-if="cols.length > 0"
        :columnDefsProp="cols"
        itemName='Configuration'
        title='Configurations'
        :showEdit="false"
        :showDelete="false"
        :showAdd="false"
        :showActionCell="false"
      >
      <template v-slot="{item}">
        <ConfigurationForm :item="item"></ConfigurationForm>
      </template>
      </grid>
    </template>
  </page>
</template>
<script>
import {ConfigurationCols} from './ConfigurationCols';
import ConfigurationForm from './ConfigurationForm.vue';

export default {
  name: 'Configurations',
  data() {
    return {
      cols: ConfigurationCols,
      item: {},
    }
  },
  components: {
    ConfigurationForm
  }
}
</script>
 