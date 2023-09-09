<template>
  <form
    enctype="multipart/form-data"
    method="post" 
    :action="route('realtor.listing.image.store', { listing: listing.id })"
  >
    <input type="file" multiple="files" name="images[]"/>
    <button type="submit">Send</button>
  </form>
</template>

<script setup>
defineProps({
  listing: Object,
})
</script>