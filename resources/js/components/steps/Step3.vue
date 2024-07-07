<template>
  <div class="wrapper-box">
    <div id="header-box">
        <h2 class="dodaj-miejsce">Opis miejsca</h2>
        <p class="przeslij-lokalizacje">Podaj krótki opis miejsca tak by inni wiedzieli co mogą tam znaleźć.</p>
    </div>
     
    <div class="two-column-form">
      <div id="description">
        <textarea type="text" class="basic-input" v-model="formData.description" placeholder="Opis miejsca"></textarea><br>
      </div>
      <div id="tags" class="basic-input">
        <div class="tag-input-box">
          Nowy tag: <input
          type="text"
          v-model="newTag"
          @keyup.enter="addTag"
          /><br>
        </div>
        <span v-for="(tag, index) in formData.tags" :key="index" class="tag">
          {{ tag }} <span class="tag-close" @click="removeTag(index)">×</span>
        </span>
      </div>
    </div>
   

    <div id="form-progress">
      <div class="step">
        <span>Krok 1 </span>
        <img src="/img/icons/picture_light.png" alt="obrazek">
        <span> Wybór zdjęć</span>
      </div>
      <div class="bold-strip"></div>
      <div class="step">
        <span>Krok 2 </span>
        <img src="/img/icons/localisation_light.png" alt="obrazek">
        <span> Lokalizacja</span>
      </div>
      <div class="bold-strip"></div>
      <div class="step active-step">
        <span>Krok 3 </span>
        <img src="/img/icons/rocket_black.png" alt="obrazek">
        <span> Tytuł i opis</span>
      </div>

    </div>
    <div id="form-navigation">
      <button @click="previousStep" class="btn-round left-button">Wstecz</button>
      <button @click="submitForm" class="btn-black btn-round right-button">Opublikuj</button>
    </div>
  </div>
</template>

<script>
export default {
  props: ['formData', 'previousStep', 'submitForm'],
  data() {
    return {
      newTag: '',
    }
  },
  methods: {
    addTag() {
      if (this.newTag.trim() !== '') {
        this.formData.tags.push(this.newTag.trim());
        this.newTag = '';
      }
    },
    removeTag(index) {
      this.formData.tags.splice(index, 1);
    }
  }
}
</script>

<style scoped>
#tags{
  min-height: 90px;
  padding-top: 16px;
}
.tag-input-box{
  margin-bottom: 16px;
  font-size: 14px;
  font-weight: 700;
  color:#1A1A1A
}

.tag-input-box input{
  border: none;
  box-shadow: none;
  outline: none;
}
.tag{
  height: 27px;
  color:#5D5D5D;
  background-color: #F1F3F4;
  border-radius: 19px;
  padding: 4px 8px;
  font-size: 14px;
  font-weight: 700;
  margin-right: 8px;
}
.tag-close{
  cursor: pointer;
}
</style>
