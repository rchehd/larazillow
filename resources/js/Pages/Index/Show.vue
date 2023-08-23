<script setup>
  import {Link} from "@inertiajs/vue3";
  import MainLayout from "../../Layouts/MainLayout.vue";
</script>

<template>
  <div>Show</div>
  <Link href="/">Main page</Link>
</template>

<script>
  import MainLayout from "../../Layouts/MainLayout.vue";

  export default {
    layout: MainLayout,
  }
</script>

<style scoped>

</style>
