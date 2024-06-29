<template>
  <div id="main-wrapper">
    <step1 v-if="step === 1" :formData="formData" :nextStep="nextStep"></step1>
    <step2 v-if="step === 2" :formData="formData" :previousStep="previousStep" :nextStep="nextStep"></step2>
    <step3 v-if="step === 3" :formData="formData" :previousStep="previousStep" :submitForm="submitForm"></step3>
    <div v-if="step === 4">
      <h1>Form Submitted Successfully!</h1>
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
        coordinates: '',
        easeOfAccess: '',
        description: ''
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
      this.formData.photos.forEach((photo, index) => {
        formData.append(`photos[${index}]`, photo);
      });
      formData.append('location', this.formData.location);
      formData.append('title', this.formData.title);
      formData.append('description', this.formData.description);

      try {
        const response = await axios.post('/submit-form', formData, {
          headers: {
            'Content-Type': 'multipart/form-data'
          }
        });
        if (response.data.message) {
          this.step = 4;
        }
      } catch (error) {
        console.error('Error submitting form:', error);
      }
    }
  }
}
</script>