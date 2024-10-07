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
    
    <img :src="images[0].photo" alt="">
    <img :src="images[0].thumbnail" alt="">
  </div>

</template>

<script>

export default {
  props:{
    images: Array
  },
  data() {
    return {
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
</style>