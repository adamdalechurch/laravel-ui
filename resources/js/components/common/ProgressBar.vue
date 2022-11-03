<template>
    <center>
    <div class="col-lg-12">
        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{percent}}%</div>
    </div>
    <div class="col-lg-12">
        <div class="progress progress-sm mr-2">
            <div   :class="{ 'bg-success': this.percent > 66, 'bg-warning': this.percent <= 66 && this.percent > 33, 'bg-danger': this.percent <= 33 }" role="progressbar"
                :style="{ width: percent + '%'}" :aria-valuenow="percent" aria-valuemin="0"
                aria-valuemax="100"></div>
        </div>
    </div>
</center>

</template>
<script>

export default {
    name: "ProgressBar",
    props: {
        title: 'title',
        colorClass: 'primary',
        percent: 0
    }
}
</script>
<style scoped>
    center, .col-lg-12{
        width: 100% !important;
    }
</style>