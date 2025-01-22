<template>
   <div class="profile-picture-wrapper">
    <label for="profile-picture-input" class="profile-picture-label">
      <img :src="preview || '/img/default-image.jpg'" alt="Zdjęcie profilowe" class="profile-picture">
      <span class="change-photo-text">Zmień zdjęcie</span>
    </label>
    <input type="file" id="profile-picture-input" name="profile_picture" accept="image/*" @change="onFileChange" style="display: none;">
  </div>
</template>

<script>
export default {
  props: {
    initialPicture: {
      type: String,
      default: null,
    },
  },
  data() {
    return {
        preview: this.initialPicture || null // Podgląd zdjęcia
    }
  },
  mounted() {
    this.preview = this.initialPicture; // Set preview after the component mounts
  },
  methods: {
    onFileChange(event) {
      const file = event.target.files[0];
      if (file) {
        const reader = new FileReader();
        reader.onload = (e) => {
          this.preview = e.target.result; // Aktualizuj podgląd zdjęcia
        };
        reader.readAsDataURL(file);
      }
    }
  }
}
</script>

<style scoped>
.profile-picture-wrapper {
    display: flex;
    align-items: center;
    gap: 10px;
    cursor: pointer;
}

.profile-picture-label {
    display: flex;
    align-items: center;
    gap: 10px;
    cursor: pointer;
}



.change-photo-text {
    font-size: 14px;
    color: #888;
    text-decoration: none;
    transition: color 0.2s ease;
}

.profile-picture-label:hover .change-photo-text {
    color: #555;
}

</style>