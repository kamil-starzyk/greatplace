<template>
  <div class="wrapper-box">
    <div id="header-box">
        <h2 class="dodaj-miejsce">Opis miejsca</h2>
        <p class="przeslij-lokalizacje">Podaj krótki opis miejsca tak by inni wiedzieli co mogą tam znaleźć.</p>
    </div>
     
    <div class="two-column-form">
      <textarea type="text" id="description" class="basic-input" v-model="formData.description" placeholder="Opis miejsca"></textarea><br>
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
  props: ['formData', 'previousStep', 'submitForm']
}
</script>

<style scoped>
/* Dodaj swoje style */
</style>
