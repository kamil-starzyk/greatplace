<template>
  <div>
    <h1>Step 3: Description and Title</h1>
    <input type="text" v-model="formData.title" placeholder="Enter title">
    <textarea v-model="formData.description" placeholder="Enter description"></textarea>
    <button @click="previousStep">Back</button>
    <button @click="submitForm">Submit</button>
  </div>
</template>

<script>
export default {
  props: ['formData', 'previousStep', 'submitForm']
}
</script>

<style scoped>
/* Dodaj swoje style */
</style>
