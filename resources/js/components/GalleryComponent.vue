<template>
  <div id="black_container">
    <button id="close_gallery_button" onclick="closeGallery()">X</button>
    <img :src="photos[0]" alt="">
  </div>
</template>

<script>

export default {
  props:{
    photos: Array
  },
  data() {
    return {
      
    }
  },
  methods: {
  }
}
</script>

<style scoped>
#black_container{
  position: fixed;
  top:0;
  left:0;
  width:100vw;
  min-height: 100vw;
  background-color: black;
}
#close_gallery_button{
  position: fixed;
  top:51px;
  right:81px;
  color: white;
}
</style>