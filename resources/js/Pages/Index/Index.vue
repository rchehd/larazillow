<script setup>
  import {Link} from "@inertiajs/vue3";
  import MainLayout from "../../Layouts/MainLayout.vue";
  defineProps({
    message: String
  })

</script>

<template>
  <div>Index</div>
  <Link href="/hello">Show Page</Link>
  <div>
    The message is {{ message }}
  </div>
</template>

<style scoped>

</style>
