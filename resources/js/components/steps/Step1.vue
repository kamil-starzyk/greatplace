<template>
  <div class="wrapper-box">
    <div id="header-box">
      <h2 class="dodaj-miejsce">Wybierz zdjęcia do publikacji</h2>
      <p class="przeslij-lokalizacje">Prześlij lokalizacje i zdjęcia ciekawego miejsca, które świetnie sprawdzi się podczas sesji fotograficznej</p>
    </div>
    <DropZone class="drop-area" @files-dropped="onFilesDropped" #default="{ dropZoneActive }">
      <label for="file-input">
        <div v-if="dropZoneActive">
          <div class="drop-zone"><img src="/img/add_page_picture_2_active.png" alt="ilustracja kilku zdjęć w tym zdjęcie natury" class="drop-zone-picture"></div>
        </div>
        <div v-else>
          <div class="drop-zone"><img src="/img/add_page_picture_2.png" alt="ilustracja kilku zdjęć w tym zdjęcie natury" class="drop-zone-picture"></div>
        </div>
        <input type="file" id="file-input" multiple @change="onInputChange" />
      </label>
    </DropZone>
    <ul class="image-list" v-if="formData.photos.length > 0">
      <FilePreview v-for="(file, index) in formData.photos" :key="index" :file="file" tag="li" @remove="removeFile(file)" />
    </ul>
    <ul class="image-list" v-else>
      <li class="file-preview">
        <img src="/img/add_page_picture_2.png" alt="No images available" class="placeholder-image">
      </li>
    </ul>
    <strong class="checkbox-strong">Prawa autorskie *</strong>
    <input type="checkbox"><span class="checkbox-text">Potwierdzam, że posiadam prawa autorskie do powyższych zdjęć lub zgodę autora zdjęć na publikacje</span><br>
    <strong class="checkbox-strong">Regulamin *</strong>
    <input type="checkbox"><span class="checkbox-text">Akceptuję <a href="regulamin" target="_blank">Regulamin</a> serwisu Greatplace</span>
    
    <div id="form-progress">
      <div class="step active-step">
        <span>Krok 1 </span>
        <img src="/img/icons/picture_black.png" alt="obrazek">
        <span> Wybór zdjęć</span>
      </div>
      <div class="bold-strip"></div>
      <div class="step">
        <span>Krok 2 </span>
        <img src="/img/icons/localisation_light.png" alt="obrazek">
        <span> Lokalizacja</span>
      </div>
      <div class="bold-strip"></div>
      <div class="step">
        <span>Krok 3 </span>
        <img src="/img/icons/rocket_light.png" alt="obrazek">
        <span> Tytuł i opis</span>
      </div>
    </div>
    <div id="form-navigation">
      <button @click="nextStep" class="btn-black btn-round right-button">Dalej</button>
    </div>
  </div>
</template>

<script>
import DropZone from '../DropZone.vue';
import FilePreview from '../FilePreview.vue';

export default {
  props: ['formData', 'nextStep'],
  components: { DropZone, FilePreview },
  setup(props, { emit }) {
    function onInputChange(e) {
      const fileArray = Array.from(e.target.files);
      addFiles(fileArray);
      e.target.value = null;
    }

    function onFilesDropped(fileArray) {
      addFiles(fileArray);
    }

    function addFiles(newFiles) {
      const uploadableFiles = newFiles
        .filter(file => !fileExists(file))
        .map(file => ({
          file,
          url: URL.createObjectURL(file),
        }));

      props.formData.photos = props.formData.photos.concat(uploadableFiles);
    }

    function fileExists(newFile) {
      const newFileId = `${newFile.name}-${newFile.size}-${newFile.lastModified}-${newFile.type}`;
      return props.formData.photos.some(file => {
        const existingFileId = `${file.file.name}-${file.file.size}-${file.file.lastModified}-${file.file.type}`;
        return existingFileId === newFileId;
      });
    }

    function removeFile(fileToRemove) {
      props.formData.photos = props.formData.photos.filter(file => file.file !== fileToRemove.file);
      emit('update-photos', props.formData.photos);
    }

    return {
      onInputChange,
      onFilesDropped,
      removeFile,
      formData: props.formData
    };
  }
}
</script>
