<template>
  <div class="wrapper-box">
    <div id="header-box">
        <h2 class="dodaj-miejsce">Podaj lokalizacje miejsca</h2>
        <p class="przeslij-lokalizacje">Uzupełnij dane o lokalizacji, aby każdy mógł łatwo je znaleźć</p>
    </div>
    
    <div id="form-localisation">
      <input type="text" id="placeName" class="basic-input" v-model="formData.placeName" placeholder="Nazwa miejsca"><br>

      <select id="voivodeship" class="basic-input" v-model="formData.selectedVoivodeship" @change="updateDistricts">
        <option value="" disabled>Wybierz województwo</option>
        <option v-for="voivodeship in voivodeships" :key="voivodeship.name" :value="voivodeship.name">{{ voivodeship.name }}</option>
      </select><br>

      <select id="district" class="basic-input" v-model="formData.selectedDistrict" @change="updateLocalities" :disabled="!formData.selectedVoivodeship">
        <option value="" disabled>Wybierz powiat</option>
        <option v-for="district in districts" :key="district.name" :value="district.name">{{ district.name }}</option>
      </select><br>

      <select id="locality" class="basic-input" v-model="formData.selectedLocality" :disabled="!formData.selectedDistrict">
        <option value="" disabled>Wybierz miejscowość</option>
        <option v-for="locality in localities" :key="locality.name" :value="locality.name">{{ locality.name }}</option>
      </select><br>

      <input type="text" id="streetAddress" class="basic-input" v-model="formData.streetAddress" placeholder="Ulica i nummer domu (opcjonalne)">
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
  props: [
    'formData',
    'previousStep', 
    'nextStep'
  ],
  data() {
    return {
      voivodeships: [],
      districts: [],
      localities: []
    };
  },
  watch: {
    'formData.selectedVoivodeship': {
      immediate: true,
      handler(newValue) {
        if (newValue) {
          this.updateDistricts();
        }
      }
    },
    'formData.selectedDistrict': {
      immediate: true,
      handler(newValue) {
        if (newValue) {
          this.updateLocalities();
        }
      }
    }
  },
  methods: {
    updateDistricts() {
      const selectedVoivodeshipData = this.voivodeships.find(v => v.name === this.formData.selectedVoivodeship);
      this.districts = selectedVoivodeshipData ? selectedVoivodeshipData.districts : [];
      if (!this.districts.find(d => d.name === this.formData.selectedDistrict)) {
        this.formData.selectedDistrict = '';
      }
      this.updateLocalities();
    },
    updateLocalities() {
      const selectedDistrictData = this.districts.find(d => d.name === this.formData.selectedDistrict);
      this.localities = selectedDistrictData ? selectedDistrictData.localities : [];
      if (!this.localities.find(l => l.name === this.formData.selectedLocality)) {
        this.formData.selectedLocality = '';
      }
    }
  },
  created() {
    this.voivodeships = miejscowosci;
  }
};
</script>