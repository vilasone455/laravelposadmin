<template>
  <div>
    <headtitle :title="Dashboard" :subtitle=" Report" />
    <box :title="Dashboard">
      <p>Dashboard</p>
    </box>
  </div>
</template>

<script>
import headtitle from "../components/headcontent.vue";
import box from "../components/box.vue";

export default {
  components: {
    headtitle,
    box
  }
};
</script>