<template>
    <div>
      <div style="margin-bottom: 1.25rem">
        <slot name="backlink"></slot>
      </div>
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-0 text-gray-800">{{title}}</h1>
      </div>
      <div class="card shadow mb-4">
          <div class="card-header py-3">
            <slot name="header"></slot>
          </div>
          <div class="card-body" >
            <slot name="body"></slot>
          </div>
      </div>
    </div>
</template>
<script>
export default {
  name: 'Page',
  props: {
    title: null
  }
}
</script>
