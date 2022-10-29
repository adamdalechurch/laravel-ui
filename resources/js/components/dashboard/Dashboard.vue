<template>
    <div>
        Dashboard    
    </div>
</template>

<script>
async function getDashboardData()  {
    // const res = fetch(`/api/dashboard`)
    // .then(response => {
    //     console.log(response);
    // })
    const res = await axios.get('/api/dashboard', {
   params: {
   }
});

console.log(res);

};
export default {
  name: "Dashboard",
  data() {
    return {
      dashboard: {}
    }
  },
  created(){
    getDashboardData();
  },
  methods: {
    async getDashboardData() {
        // const res = await fetch(`api/dashboard`)
        // .then(response => {
        //     console.log(response);
        // })

        // if (!res.ok) {
        //   const message = `An error has occured: ${res.status} - ${res.statusText}`;
        //   throw new Error(message);
        // }

        // const data = await res.json();

        // const result = {
        //   status: res.status + "-" + res.statusText,
        //   headers: {
        //     "Content-Type": res.headers.get("Content-Type"),
        //     "Content-Length": res.headers.get("Content-Length"),
        //   },
        //   length: res.headers.get("Content-Length"),
        //   data: data,
        // };

        // this.getResult = this.fortmatResponse(result);

    }
  }
}
</script>