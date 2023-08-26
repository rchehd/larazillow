<script setup>
import {Link, usePage } from '@inertiajs/vue3'
import {computed} from 'vue'

// page.props.value.flash.success
const page = usePage()
const flashSuccess = computed(
  () => page.props.flash.success,
)
// import {ref} from 'vue'

// const timer = ref(0)
// setInterval(() => timer.value++, 1000)

</script>

<template>
  <Link href="/listing">Listing</Link>&nbsp;
  <Link href="/listing/create">New listing</Link>
<!--  <div>The page with time {{ timer }}</div>-->
  <div v-if="flashSuccess" class="success">
    {{ flashSuccess }}
  </div>

  <slot />
</template>

<style scoped>
  .success {
    background-color: green;
    color: white;
  }
</style>
