<template>
  <div>
    <DeleteAccountButton @open-modal="openModal" />
    <ConfirmUserDeletion
      :show="showModal"
      @close-modal="closeModal"
      @submit="handleDelete"
    />
  </div>
</template>

<script>
import DeleteAccountButton from './DeleteAccountButton.vue';
import ConfirmUserDeletion from './ConfirmUserDeletion.vue';

export default {
  components: {
    DeleteAccountButton,
    ConfirmUserDeletion,
  },
  data() {
    return {
      showModal: false,
    };
  },
  methods: {
    openModal() {
      this.showModal = true; // Opens the modal
    },
    closeModal() {
      this.showModal = false; // Closes the modal
    },
    handleDelete(payload) {
      console.log('Deleting account with password:', payload.password);
      // Submit the form data to your backend
      this.closeModal(); // Close modal after submitting
    },
  },
};
</script>
