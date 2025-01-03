<template>
  <div v-if="show" class="modal-overlay" @click="closeModal">
    <div class="modal-content" @click.stop>
      <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
        {{ modalTitle }}
      </h2>

      <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
        {{ modalDescription }}
      </p>

      <div class="mt-6">
        <label for="password" class="sr-only">
          {{ passwordLabel }}
        </label>
        <input
          id="password"
          v-model="password"
          type="password"
          class="mt-1 block w-3/4"
          :placeholder="passwordPlaceholder"
        />
        <p v-if="error" class="mt-2 text-red-500 text-sm">
          {{ error }}
        </p>
      </div>

      <div class="mt-6 flex justify-end">
        <button type="button" class="secondary-button" @click="closeModal">
          {{ cancelButtonText }}
        </button>
        <button type="submit" class="danger-button ms-3">
          {{ deleteButtonText }}
        </button>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    show: {
      type: Boolean,
      default: false,
    },
    modalTitle: {
      type: String,
      default: 'Are you sure you want to delete your account?',
    },
    modalDescription: {
      type: String,
      default:
        'Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.',
    },
    passwordLabel: {
      type: String,
      default: 'Password',
    },
    passwordPlaceholder: {
      type: String,
      default: 'Password',
    },
    cancelButtonText: {
      type: String,
      default: 'Cancel',
    },
    deleteButtonText: {
      type: String,
      default: 'Delete Account',
    },
    error: {
      type: String,
      default: '',
    },
  },
  data() {
    return {
      password: '',
    };
  },
  methods: {
    closeModal() {
      this.$emit('close-modal');
    },
    submitForm() {
      this.$emit('submit', { password: this.password });
    },
  },
};
</script>

<style scoped>
.modal-overlay {
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background: rgba(0, 0, 0, 0.5);
  display: flex;
  align-items: center;
  justify-content: center;
  z-index: 1000;
}

.modal-content {
  background: white;
  border-radius: 0.5rem;
  padding: 1rem;
  width: 90%;
  max-width: 500px;
}

.secondary-button,
.danger-button {
  padding: 0.5rem 1rem;
  border-radius: 0.375rem;
}

.secondary-button {
  background-color: #e2e8f0;
  color: #1a202c;
}

.danger-button {
  background-color: #e3342f;
  color: white;
}
</style>
