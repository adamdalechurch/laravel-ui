<template>
    <div>
        My Groups    
    </div>
</template>
<script>
export default {
  name: "MyGroups",
  data() {
    return {
        groups: []
    }
  },
//   methods: {
//     CalcProgressPercent: CalcProgressPercent
//   },
  async created(){
    axios
      .get(process.env.MIX_API_URL + '/api/groups')
      .then(response => {
        this.groups = response.data;
        console.log(this.groups);
      })
  }
}
</script>