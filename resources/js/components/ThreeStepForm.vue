<template>
  <div id="main-wrapper">
    <step1 v-if="step === 1" :formData="formData" :nextStep="nextStep"/>
    <step2 v-if="step === 2" :formData="formData" :previousStep="previousStep" :nextStep="nextStep"/>
    <step3 v-if="step === 3" :formData="formData" :previousStep="previousStep" :submitForm="submitForm"/>
    <div v-if="step === 4" id="main-box">
      <img src="/img/add_page_picture_success.png" alt="Ilustracja osoby stojącej obok dużego ekranu smartfona, na którym wyświetlane są miniatury obrazów" class="obraz-ludzi">
      <h2 class="dodaj-miejsce">Dziękujemy za dodanie nowego miejsca</h2>
      <p class="przeslij-lokalizacje">Twoje miejsce zostało dodane i będzie wyświetlane razem z innymi</p>
      <div class="flex-centered" style="gap:25px">
        <a href="add-form" class="btn-round btn-black btn-big"><span>Dodaj kolejne</span></a>
        <a href="/my-places" class="btn-round btn-big"><span>Zobacz dodane</span></a>

      </div>
    </div>
  </div>
</template>

<script>
import Step1 from './steps/Step1.vue';
import Step2 from './steps/Step2.vue';
import Step3 from './steps/Step3.vue';

export default {
  components: {
    Step1,
    Step2,
    Step3
  },
  data() {
    return {
      step: 1,
      formData: {
        photos: [],
        placeName: '',
        selectedVoivodeship: '',
        selectedDistrict: '',
        selectedLocality: '',
        streetAddress: '',
        latitude: '',
        longitude: '',
        easeOfAccess: '',
        description: '',
        tags: [],
        bestSeasons: [],
        price: '',
        priceFor: ''
      }
    };
  },
  methods: {
    nextStep() {
      if (this.step < 3) {
        this.step++;
      }
    },
    previousStep() {
      if (this.step > 1) {
        this.step--;
      }
    },
    async submitForm() {
      const formData = new FormData();
      let price = this.formData.price === '' ? 0 : parseInt(this.formData.price, 10);

      this.formData.photos.forEach((photo) => {
        formData.append(`photos[]`, photo.file);
      });

      this.formData.tags.forEach((tag) => {
        formData.append(`tags[]`, tag);
      });
      

      formData.append('placeName', this.formData.placeName);
      formData.append('selectedVoivodeship', this.formData.selectedVoivodeship);
      formData.append('selectedDistrict', this.formData.selectedDistrict);
      formData.append('selectedLocality', this.formData.selectedLocality);
      formData.append('streetAddress', this.formData.streetAddress);
      formData.append('latitude', this.formData.latitude);
      formData.append('longitude', this.formData.longitude);
      formData.append('easeOfAccess', this.formData.easeOfAccess);
      formData.append('description', this.formData.description);
      formData.append('bestSeasons', JSON.stringify(this.formData.bestSeasons));
      formData.append('price', price);
      formData.append('priceFor', this.formData.priceFor);

      try {
        const response = await axios.post('/submit-add-form', formData, {
          headers: {
            'Content-Type': 'multipart/form-data'
          }
        });
        if (response.data.message) {
          this.step = 4;
        }
      } catch (error) {
        console.error('Error submitting form:', error);
        alert('There was an error submitting the form. Please try again later.');
      }
    }
  }
}
</script>