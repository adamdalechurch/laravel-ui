<template>
  <page title="My Projects">
    <template v-slot:body>
      <grid v-if="cols.length > 0"
        :columnDefsProp="cols"
        itemName='Project'
        title='My Projects'
      >
      <template v-slot="{item}">
        <ProjectForm :item="item" />
      </template>
      </grid>
    </template>
  </page>
</template>
<script>
import ProjectForm from './ProjectForm.vue';
import { ProjectCols } from './ProjectCols';
export default {
  name: 'MyProjects',
  data() {
    return {
      cols: ProjectCols,
      item: {},
    }
  },
  components: {
    ProjectForm
  },
}
</script>
 