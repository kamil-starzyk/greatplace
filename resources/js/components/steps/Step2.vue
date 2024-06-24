<template>
  <div class="wrapper-box">
    <div id="header-box">
        <h2 class="dodaj-miejsce">Podaj lokalizacje miejsca</h2>
        <p class="przeslij-lokalizacje">Uzupełnij dane o lokalizacji, aby każdy mógł łatwo je znaleźć</p>
    </div>
    <div id="localisation-form">
      <div>
        <label for="placeName">Nazwa miejsca:</label>
        <input type="text" id="placeName" v-model="formData.placeName">
      </div>

      <div>
        <label for="voivodeship">Województwo:</label>
        <select id="voivodeship" v-model="formData.selectedVoivodeship" @change="updateDistricts">
          <option value="" disabled>Wybierz województwo</option>
          <option v-for="voivodeship in voivodeships" :key="voivodeship.name" :value="voivodeship.name">{{ voivodeship.name }}</option>
        </select>
      </div>

      <div>
        <label for="district">Powiat:</label>
        <select id="district" v-model="formData.selectedDistrict" @change="updateLocalities" :disabled="!formData.selectedVoivodeship">
          <option value="" disabled>Wybierz powiat</option>
          <option v-for="district in districts" :key="district.name" :value="district.name">{{ district.name }}</option>
        </select>
      </div>

      <div>
        <label for="locality">Miejscowość:</label>
        <input type="text" id="locality" v-model="formData.selectedLocality" list="localities">
        <datalist id="localities">
          <option v-for="locality in filteredLocalities" :key="locality">{{ locality }}</option>
        </datalist>
      </div>
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
import miejscowosci from '../../data/miejscowosci.json';

export default {
  props: ['formData', 'previousStep', 'nextStep'],
  data() {
    return {
      voivodeships: [],
      districts: [],
      localities: []
    };
  },
  computed: {
    filteredLocalities() {
      return this.localities.filter(locality => 
        locality.toLowerCase().startsWith(this.formData.selectedLocality.toLowerCase())
      );
    }
  },
  methods: {
    updateDistricts() {
      const selectedVoivodeshipData = this.voivodeships.find(v => v.name === this.formData.selectedVoivodeship);
      this.districts = selectedVoivodeshipData ? selectedVoivodeshipData.districts : [];
      this.formData.selectedDistrict = '';
      this.localities = [];
      this.formData.selectedLocality = '';
    },
    updateLocalities() {
      const selectedDistrictData = this.districts.find(d => d.name === this.formData.selectedDistrict);
      this.localities = selectedDistrictData ? selectedDistrictData.localities : [];
      this.formData.selectedLocality = '';
    }
  },
  created() {
    this.voivodeships = miejscowosci;
  }
}
</script>

<style scoped>
/* Dodaj swoje style */
</style>
