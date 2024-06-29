<template>
  <div class="wrapper-box">
    <div id="header-box">
        <h2 class="dodaj-miejsce">Podaj lokalizacje miejsca</h2>
        <p class="przeslij-lokalizacje">Uzupełnij dane o lokalizacji, aby każdy mógł łatwo je znaleźć</p>
    </div>
    
    <div class="two-column-form">
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

      <div id="coordinates">
        <input type="text" class="basic-input" v-model="formData.coordinates" placeholder="Współrzędne" readonly>
        <div class="btn-square btn-black" @click="openMap">
          <img src="/img/icons/map_pin_white.png" alt="">
        </div>
      </div>

      
      <div id="ease-of-access">
        <p style="margin-bottom: 23px"><strong>Dojazd do miejsca</strong></p>
        <div class="buttons">
          <input type="radio" id="option1" class="hide-radio" value="Łatwy" v-model="formData.easeOfAccess">
          <label for="option1" class="btn-round" :class="{ 'btn-black': formData.easeOfAccess === 'Łatwy' }">Łatwy</label>
          
          <input type="radio" id="option2" class="hide-radio" value="Trudny" v-model="formData.easeOfAccess">
          <label for="option2" class="btn-round" :class="{ 'btn-black': formData.easeOfAccess === 'Trudny' }">Trudny</label>
          
          <input type="radio" id="option3" class="hide-radio" value="Brak dojazdu" v-model="formData.easeOfAccess">
          <label for="option3" class="btn-round" :class="{ 'btn-black': formData.easeOfAccess === 'Brak dojazdu' }">Brak dojazdu</label>
        </div>
      </div>



      <div v-if="showMap" class="map-modal">
        <div class="map-modal-content">
          <l-map style="height: 400px; width: 100%;" :zoom="zoom" :center="center" @click="onMapClick">
            <l-tile-layer :url="url" :attribution="attribution"></l-tile-layer>
            <l-marker v-if="marker" :lat-lng="marker"></l-marker>
          </l-map>
          <div class="map-modal-buttons">
            <button @click="confirmCoordinates" class="btn-black btn-round left">Confirm</button>
            <button @click="closeMap" class="btn-round right">Cancel</button>
          </div>
        </div>
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
import { ref, reactive, onMounted, watch } from 'vue';
import { LMap, LTileLayer, LMarker } from '@vue-leaflet/vue-leaflet';
import L from 'leaflet'
import 'leaflet/dist/leaflet.css';
import miejscowosci from '../../data/miejscowosci.json';

export default {
  components: {
    LMap,
    LTileLayer,
    LMarker,
  },
  props: [
    'formData',
    'previousStep', 
    'nextStep'
  ],
  setup(props) {
    const voivodeships = ref([]);
    const districts = ref([]);
    const localities = ref([]);
    const showMap = ref(false);
    const coordinates = ref('');
    const zoom = ref(10);
    const center = ref([52.2297, 21.0122]); // Warsaw coordinates
    const marker = ref(null);

    const url = 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';
    const attribution = '© OpenStreetMap contributors';

    const updateDistricts = () => {
      const selectedVoivodeshipData = voivodeships.value.find(v => v.name === props.formData.selectedVoivodeship);
      districts.value = selectedVoivodeshipData ? selectedVoivodeshipData.districts : [];
      if (!districts.value.find(d => d.name === props.formData.selectedDistrict)) {
        props.formData.selectedDistrict = '';
      }
      updateLocalities();
    };

    const updateLocalities = () => {
      const selectedDistrictData = districts.value.find(d => d.name === props.formData.selectedDistrict);
      localities.value = selectedDistrictData ? selectedDistrictData.localities : [];
      if (!localities.value.find(l => l.name === props.formData.selectedLocality)) {
        props.formData.selectedLocality = '';
      }
    };

    const openMap = () => {
      showMap.value = true;
    };

    const closeMap = () => {
      showMap.value = false;
    };

    const confirmCoordinates = () => {
      if (marker.value) {
        const { lat, lng } = marker.value;
        coordinates.value = `${lat}, ${lng}`;
        props.formData.latitude = lat;
        props.formData.longitude = lng;
      }
      closeMap();
    };

    const onMapClick = (e) => {
      const { lat, lng } = e.latlng;
      marker.value = [lat, lng];
    };

    onMounted(() => {
      voivodeships.value = miejscowosci;
    });

    watch(() => props.formData.selectedVoivodeship, updateDistricts);
    watch(() => props.formData.selectedDistrict, updateLocalities);

    return {
      voivodeships,
      districts,
      localities,
      showMap,
      coordinates,
      zoom,
      center,
      marker,
      url,
      attribution,
      openMap,
      closeMap,
      confirmCoordinates,
      onMapClick
    };
  }
};
</script>
<style>
.map-container {
  height: 400px;
  width: 100%;
  margin: 20px 0;
}

.map-modal {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.5);
  display: flex;
  justify-content: center;
  align-items: center;
}

.map-modal-content {
  width:400px;
  height: 480px;
  background: white;
  padding: 20px;
  border-radius: 10px;
  text-align: center;
}

.map-modal-buttons{
  position: relative;
  margin-top: 10px;
}
.map-modal-buttons .left{
  position: absolute;
  left:0
}
.map-modal-buttons .right{
  position: absolute;
  right:0
}
</style>