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
        <div v-if="user" class="flex items-center gap-4">
          <Link
            :href="route('notification.index')"
            class="text-gray-500 relative pr-2 py-2 text-lg"
          >
            🔔
            <div v-if="notificationCount" class="absolute right-0 top-0 w-5 h-5 bg-red-700 dark:bg-red-400 text-white font-medium border border-white dark:border-gray-900 rounded-full text-xs text-center">
              {{ notificationCount }}
            </div>
          </Link>
          <Link :href="route('realtor.listing.index')" class="text-sm text-gray-500">{{ user.name }}</Link>
          <Link :href="route('realtor.listing.create')" class="btn-primary">+ New listing</Link>
          <div>
            <Link :href="route('logout')" method="DELETE" as="button">Logout</Link>
          </div>
        </div>
        <div v-else class="flex items-center gap-2">
          <Link :href="route('user-account.create')">Register</Link>
          <Link :href="route('login')">Sign-In</Link>
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
const user = computed(
  () => page.props.user,
)

const notificationCount = computed(
  () => page.props.user.notificationCount,
)
</script>
