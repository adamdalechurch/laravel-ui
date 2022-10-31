
<template>
    <button @click="click" class='d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm'>
        <slot></slot>
    </button>
</template>
<script>
export default {
    name: "Button",
    props: {
    },
    methods: {
        click(){
            this.$emit('click');
        }
    }
}
</script>