<template>
  <div class="wrapper-box">
    <div id="header-box">
        <h2 class="dodaj-miejsce">Wybierz zdjęcia do publikacji</h2>
        <p class="przeslij-lokalizacje">Prześlij lokalizacje i zdjęcia ciekawego miejsca, które świetnie sprawdzi się podczas sesji fotograficznej</p>
    </div>
    <DropZone class="drop-area" @files-dropped="addFiles" #default="{ dropZoneActive }">
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
    <ul class="image-list" v-if="files.length > 0">
      <FilePreview v-for="file of files" :key="file.id" :file="file" tag="li" @remove="removeFile"/>
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
import useFileList from '../../compositions/file-list'
import DropZone from '../DropZone.vue'
import  FilePreview  from  '../FilePreview.vue'

export default {
  props: ['formData', 'nextStep'],
  components: {DropZone, FilePreview},
  setup(props, { emit }) {
    const { files, addFiles, removeFile } = useFileList();
    
    function onInputChange(e) {
      const fileArray = Array.from(e.target.files);
      addFiles(e.target.files);
      e.target.value = null;
      emit('update-photos', fileArray);
    }
    console.log('files imported successfully:', files);

    return {
      files,
      addFiles,
      removeFile,
      onInputChange
    };
  },
  methods: {
    handlePhotos(event) {
      this.formData.photos = Array.from(event.target.files);
    }
  }
}

</script>