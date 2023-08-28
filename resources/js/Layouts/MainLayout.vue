<template>
  <header class="border-b border-gray-200 dark:border-gray-700 dark:bg-gray-900 bg-white w-full mb-4">
    <div class="container mx-auto">
      <nav class="p-4 flex items-center justify-between">
        <div class="text-lg font-medium">
          <Link :href="route('listing.index')">Listing</Link>
        </div>
        <div class="text-xl text-indigo-600 dark:text-indigo-300 font-bold text-center">
          <Link :href="route('listing.index')">Larazillow</Link>
        </div>
        <div>
          <Link :href="route('listing.create')" class="btn-primary">+ New listing</Link>
        </div>
      </nav>
    </div>
  </header>
  <main class="container mx-auto w-full">
    <div v-if="flashSuccess" class="mb-4 border rounded-md shadow-sm border-green-200 dark:border-green-800 bg-green-50 dark:bg-green-900 p-2">
      {{ flashSuccess }}
    </div>
    <slot />
  </main>
</template>

<script setup>
import {Link, usePage } from '@inertiajs/vue3'
import {computed} from 'vue'

// page.props.value.flash.success
const page = usePage()
const flashSuccess = computed(
  () => page.props.flash.success,
)

</script>
