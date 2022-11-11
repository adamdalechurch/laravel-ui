<template>
    <span>
        <input @input="saveItem" class="form-control" v-if="params.data.type == 'string'" type="text" v-model="params.data.value">
        <input @change="saveItem" v-if="params.data.type == 'bool'" type="checkbox" v-model="params.data.value">
        <select @change="saveItem" class="form-control" v-if="params.data.type == 'select'" v-model="params.data.value">
            <option v-for="option in params.selects[params.data.name].options" :key="option.id" :value="option.name">{{option.name}}</option>
        </select>
    </span>
</template>
<script>

export default {
  name: "ConfigurationValueCell",
  methods: {
    saveItem: function($event){
    axios
      .post(`${process.env.MIX_API_URL}/api/configurations/store`, this.params.data)
      .then((res) => {
      
      });
    }
  }
}
</script>

