<template>
  <div>
    <form @submit.prevent="handleSubmit">
      <div>
        <label for="placeName">Nazwa miejsca:</label>
        <input type="text" id="placeName" v-model="formData.placeName" @input="filterLocalities">
        <ul v-if="filteredLocalities.length">
          <li v-for="locality in filteredLocalities" :key="locality.name" @click="selectLocality(locality)">
            {{ locality.name }} ({{ locality.district }}, {{ locality.voivodeship }})
          </li>
        </ul>
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
          <option v-for="locality in availableLocalities" :key="locality.name">{{ locality.name }}</option>
        </datalist>
      </div>

      <button type="submit">Zatwierdź</button>
    </form>
  </div>
</template>

<script>
import miejscowosci from '../../data/miejscowosci.json';

export default {
  props: {
    formData: {
      type: Object,
      required: true
    }
  },
  data() {
    return {
      voivodeships: [],
      districts: [],
      availableLocalities: [],
      allLocalities: [],
      filteredLocalities: []
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
      this.availableLocalities = selectedDistrictData ? selectedDistrictData.localities : [];
      if (!this.availableLocalities.find(l => l.name === this.formData.selectedLocality)) {
        this.formData.selectedLocality = '';
      }
    },
    filterLocalities() {
      if (this.formData.placeName.length > 0) {
        const searchText = this.formData.placeName.toLowerCase();
        this.filteredLocalities = this.allLocalities.filter(locality =>
          locality.name.toLowerCase().startsWith(searchText)
        );
      } else {
        this.filteredLocalities = [];
      }
    },
    selectLocality(locality) {
      this.formData.placeName = locality.name;
      this.formData.selectedVoivodeship = locality.voivodeship;
      this.formData.selectedDistrict = locality.district;
      this.formData.selectedLocality = locality.name;
      this.filteredLocalities = [];
    },
    handleSubmit() {
      this.$emit('submit');
    }
  },
  created() {
    this.voivodeships = miejscowosci;
    this.allLocalities = miejscowosci.flatMap(voivodeship => 
      voivodeship.districts.flatMap(district => 
        district.localities.map(locality => ({
          name: locality.name,
          district: district.name,
          voivodeship: voivodeship.name
        }))
      )
    );
  }
};
</script>

<style scoped>
/* Możesz dodać swoje style tutaj */
ul {
  border: 1px solid #ccc;
  max-height: 150px;
  overflow-y: auto;
  padding: 0;
  list-style: none;
  margin: 0;
}

li {
  padding: 5px;
  cursor: pointer;
}

li:hover {
  background-color: #f0f0f0;
}
</style>
