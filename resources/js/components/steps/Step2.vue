<template>
  <div>
    <h1>Step 2: Location Information</h1>
    <input type="text" v-model="formData.location" placeholder="Enter location">
    <button @click="previousStep">Back</button>
    <button @click="nextStep">Next</button>
  </div>
</template>

<script>
export default {
  props: ['formData', 'previousStep', 'nextStep']
}
</script>

<style scoped>
/* Dodaj swoje style */
</style>
