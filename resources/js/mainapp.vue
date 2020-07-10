<template>
  <div>
    <headbar></headbar>
    <sidebar></sidebar>
    <div class="content-wrapper">
      <router-view></router-view>
    </div>
  </div>
</template>

<script>
import headbar from "./components/staticmenu/headbar.vue";
import sidebar from "./components/staticmenu/sidebar.vue";

export default {
  components: {
    headbar,
    sidebar
  }
};
</script>

<style>
</style>