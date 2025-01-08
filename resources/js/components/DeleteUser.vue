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
    async handleDelete(payload) {
      try {
        const response = await axios.delete('/profile', {
          data: { password: payload.password },
        });
        console.log('Delete successful:', response.data);
        window.location.href = '/';
      } catch (error) {
        console.error('Error submitting form:', error);
        alert(
          error.response?.data?.message ||
            'There was an error submitting the form. Please try again later.'
        );
      }
    }
  },
};
</script>
