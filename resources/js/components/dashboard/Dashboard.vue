<template>
    <div>
        Dashboard {{dashboard.open_tasks}}
    </div>
</template>

<script>

export default {
  name: "Dashboard",
  data() {
    return {dashboard: {open_tasks: 0}}
  },
  async created(){
    axios
      .get('/api/dashboard')
      .then(response => (this.dashboard = response.data))
  },
  methods: {

  }
}
</script>