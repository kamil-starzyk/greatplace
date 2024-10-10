<template>

  <div id="photos">
    <div id="big_image">
      <img :src="images[0].photo" class="photo" alt="">
    </div>
    <div id="small_images">
    <img :src="images[1].photo" class="photo" alt="">
    <img :src="images[2].photo" class="photo" alt="">
    </div>
    <button v-if="images.length > 3" id="dark_circle" @click="showGallery">
        + {{images.length - 3}}
    </button>
  </div>

  <div v-show="isGalleryVisible" id="gallery">
    <button id="close_gallery_button" @click="hideGallery"><img :src="'/img/icons/x_button_white.png'" alt=""></button>
    
    <div id="gallery_main">
      <div class="gallery_element">
        <img :src="images[selectedImageIndex].photo" id="main_gallery_photo" alt="">
      </div>
      <div class="gallery_element">
        <div id="progress_dots">
          <span class="dot"></span>
          <span class="dot"></span>
          <span class="dot white_dot"></span>
          <span class="dot"></span>
          <span class="dot"></span>
        </div>
      </div>
      <div class="gallery_element">
        <ThumbnailSlider :images="images" @thumbnail-clicked="changeMainPhoto" />
      </div>
    </div>
  </div>

</template>

<script>
import ThumbnailSlider from './ThumbnailSlider.vue';


export default {
  components: {
    ThumbnailSlider
  },
  props:{
    images: Array
  },
  data() {
    return {
      selectedImageIndex: 0,
      isGalleryVisible: false
    }
  },
  methods: {
    showGallery() {
        this.isGalleryVisible = true;
    },
    hideGallery() {
        this.isGalleryVisible = false;
    },
    changeMainPhoto(index) {
      this.selectedImageIndex = index; 
    }
  }
}
</script>

<style scoped>

#photos{
  display: flex;
  gap:24px;
}
#big_image{
  width: 70%;
  height: 442px;
}
#big_image img{
  width: 100%;
  height: 100%;
}
#small_images{
  width: 30%;
  height: 442px;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  gap: 24px;
}
#small_images img{
  width: 100%;
  height: calc((100% - 24px) / 2);
}
.photo{
  object-fit: cover;
  border-radius: 16px;
}
#dark_circle{
  position: absolute;
  right: 16px;
  bottom: 16px;
  width: 34px;
  height: 34px;
  min-width: 34px;
  min-height: 34px;
  box-sizing: border-box;
  background-color: rgba(0,0,0, 38%);
  border-radius: 50%;
  display: flex;
  justify-content: center;
  align-items: center;
  color: #FFF;
  font-size: 16px;
  font-weight: 700;
  cursor: pointer;
}
#dark_circle:hover{
  background-color: rgba(0,0,0, 68%);
}
#gallery{
  position: fixed;
  top:0;
  left:0;
  width:100vw;
  min-height: 100vw;
  background-color: black;
  display: flex;
  justify-content: center;
}
#close_gallery_button{
  position: fixed;
  top:41px;
  right:71px;
  width: 34px;
  height: 34px;
  color: white;
  cursor: pointer;
}

#gallery_main{
  width: calc(100vw - 370px);
}
.gallery_element{
  width: 100%;
  display: flex;
  justify-content: center;
}
#main_gallery_photo{
  margin-top: 99px;
  height: 602px;
  max-width: 100%;
}
#progress_dots{
  min-width: 72px;
  display: flex;
  flex-direction: row;
  gap: 8px;
  margin-top: 16px;
}
#progress_dots .dot{
  display: block;
  width: 8px;
  height: 8px;
  border-radius: 50%;
  border: 1px solid white;
}
#progress_dots .dot.white_dot{
  background-color: white;
}

</style>