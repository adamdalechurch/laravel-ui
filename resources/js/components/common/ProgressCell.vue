<template>
    <span>
      <progress-bar :percent="CalcProgressPercent(params.data.tasks)" />
    </span>
</template>
<script>

import { CalcProgressPercent } from '../../utlis/functions';

export default {
  name: "ProgressCell",
  methods: {
    CalcProgressPercent: CalcProgressPercent
  },
}
</script>

