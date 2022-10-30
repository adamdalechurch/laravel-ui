<template>
<div class="col-xl-4 mb-4">
        <div :class="[`border-left-${colorClass}`, 'card shadow h-100 py-2']">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            {{title}}
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800" v-if="body != null">
                            {{body}}
                            <slot></slot>
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800" v-if="body == null">
                            <i class="fas fa-circle-notch fa-spin"></i>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i :class="['fas fa-2x text-gray-300 ', iconClass]"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>

export default {
  name: "Top Box",
  props: {
    title: 'title',
    colorClass: 'primary',
    body: null,
    iconClass: 'fa-edit'
  }
}
</script>