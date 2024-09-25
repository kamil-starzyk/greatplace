<template>
  <div class="wrapper-box">
    <div id="header-box">
        <h2 class="dodaj-miejsce">Opis miejsca</h2>
        <p class="przeslij-lokalizacje">Podaj krótki opis miejsca tak by inni wiedzieli co mogą tam znaleźć.</p>
    </div>
     
    <div class="two-column-form">
      <div id="description">
        <p style="margin-bottom: 23px"><strong>Opis miejsca</strong></p>
        <textarea type="text" class="basic-input" v-model="formData.description" placeholder="Opis miejsca"></textarea><br>
      </div>
      <div id="tags" class="basic-input">
        <div class="tag-input-box">
          <p style="margin-bottom: 23px"><strong>Dodaj tagi</strong></p>
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
      <div id="best-time">
        <p style="margin-bottom: 23px"><strong>Kiedy miejsce wygląda najlepiej</strong></p>
        <div class="button-group">
          <button 
            v-for="season in seasons" 
            :key="season" 
            :class="['btn-round', { 'btn-black': isSelected(season) }]" 
            @click="toggleSeason(season)">
            {{ season }}
          </button>
        </div>
      </div>
      <div id="price">
        <p style="margin-bottom: 23px"><strong>Cena</strong></p>
        <div>
          <input 
            type="text" 
            v-model="formData.price" 
            @input="validatePrice" 
            placeholder="0" 
            class="basic-input price-input"
          /> zł
        </div>
        <div class="button-group">
          <button 
            v-for="option in priceOptions" 
            :key="option" 
            :class="['btn-round', { 'btn-black': this.formData.priceFor === option }]" 
            @click="selectOption(option)">
            {{ option }}
          </button>
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
      seasons: ['Wiosna', 'Lato', 'Jesień', 'Zima', 'Cały rok'],
      priceOptions: ['Za godzinę', 'Za sesję', 'Za dzień', 'Bezpłatne', 'Miejsce publiczne'],
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
    },
    toggleSeason(season) {
      if (season === 'Cały rok') {
        this.formData.bestSeasons = ['Cały rok'];
      } else {
        if (this.formData.bestSeasons.includes(season)) {
          this.formData.bestSeasons = this.formData.bestSeasons.filter(s => s !== season);
        } else {
          this.formData.bestSeasons.push(season);
        }
        
        if (this.formData.bestSeasons.length === 4) {
          this.formData.bestSeasons = ['Cały rok'];
        } else {
          this.formData.bestSeasons = this.formData.bestSeasons.filter(s => s !== 'Cały rok');
        }
      }
    },
    isSelected(season) {
      return this.formData.bestSeasons.includes(season);
    },
    validatePrice() {
      if (!/^\d*\.?\d*$/.test(this.formData.price)) {
      console.log("Bęc")
        this.formData.price = this.formData.price.slice(0, -1);
        this.formData.priceFor = 'Za godzinę'
      }
      if (this.formData.price === '0') {
        this.formData.priceFor = 'Bezpłatne';
        this.formData.price = '';
      }
      if (this.formData.priceFor === 'Bezpłatne' || this.formData.priceFor === 'Miejsce publiczne') {
        if (this.formData.price !== '') {
          this.formData.priceFor = 'Za godzinę';
        }
      }
    },
    selectOption(option) {
      if (option === 'Bezpłatne' || option === 'Miejsce publiczne') {
        this.formData.price = '';
      }
      this.formData.priceFor = option;
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

.tag-close{
  cursor: pointer;
}
</style>
