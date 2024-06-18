<template>
  <div>
    <h1>Step 1: Add Photos</h1>
    <input type="file" multiple @change="handlePhotos">
    <button @click="nextStep">Next</button>
  </div>
</template>

<script>
export default {
  props: ['formData', 'nextStep'],
  methods: {
    handlePhotos(event) {
      this.formData.photos = Array.from(event.target.files);
    }
  }
}
</script>

<style scoped>
/* Dodaj swoje style */
</style>
