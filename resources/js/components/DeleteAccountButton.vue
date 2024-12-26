<template>
  <button
    type="button"
    class="danger-button"
    @click="openModal"
  >
    {{ buttonText }}
  </button>
</template>

<script>
export default {
  props: {
    buttonText: {
      type: String,
      default: 'Delete Account',
    },
  },
  methods: {
    openModal() {
      this.$emit('open-modal', 'confirm-user-deletion');
    },
  },
};
</script>

<style scoped>
.danger-button {
  background-color: #e3342f;
  color: white;
  padding: 0.5rem 1rem;
  border-radius: 0.375rem;
  cursor: pointer;
}
</style>
