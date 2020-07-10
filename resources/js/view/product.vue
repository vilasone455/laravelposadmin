<template>
  <div>
    <headtitle :title="Product" :subtitle="Manager" />
    <box :title="Product">
      <p>Product </p>
    </box>
  </div>
</template>

<script>

import headtitle from "../components/headcontent.vue";
import box from "../components/box.vue";

export default {
components : {
  headtitle,
  box
}
}
</script>

<style>

</style>