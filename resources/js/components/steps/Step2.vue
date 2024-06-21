<template>
  <div class="wrapper-box">
    <div id="header-box">
        <h2 class="dodaj-miejsce">Podaj lokalizacje miejsca</h2>
        <p class="przeslij-lokalizacje">Uzupełnij dane o lokalizacji, aby każdy mógł łatwo je znaleźć</p>
    </div>
    <div id="localisation-form">
      <input type="text" v-model="formData.placeName" placeholder="Nazwa miejsca">
      <select name="" v-model="formData.wojewodztwo" id=""></select>

    </div>

    <div id="form-progress">
      <div class="step">
        <span>Krok 1 </span>
        <img src="/img/icons/picture_light.png" alt="obrazek">
        <span> Wybór zdjęć</span>
      </div>
      <div class="bold-strip"></div>
      <div class="step active-step">
        <span>Krok 2 </span>
        <img src="/img/icons/localisation_black.png" alt="obrazek">
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
      <button @click="previousStep" class="btn-round left-button">Wstecz</button>
    </div>

  </div>
</template>

<script>
export default {
  props: ['formData', 'previousStep', 'nextStep']
}
</script>

<style scoped>
/* Dodaj swoje style */
</style>
