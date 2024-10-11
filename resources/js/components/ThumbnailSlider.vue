<template>
  <div 
    id="thumbnail_slider_wrapper"
    ref="slider"
    @mousedown="startDrag"
    @mouseup="stopDrag"
    @mouseleave="stopDrag"
    @mousemove="onDrag"
  >
    <div ref="roller" id="thumbnail_slider_roller">
      <div class="thumbnail_slider_element" 
        v-for="(image, index) in images"
        :key="index"
        @click="selectImage(index)"
      >
        <img :src="image.thumbnail" alt="" draggable="false">
      </div>
    </div>
  </div>
      
</template>

<script>

export default {
  props:{
    images: Array,
    
  },
  data() {
    return {
      rollerWidth: 0,
      isDragging: false,
      startX: 0,
      scrollLeft: 0
    };
  },
  mounted() {
    this.calculateRollerWidth();
  },
  methods: {
    calculateRollerWidth() {
      const roller = this.$refs.roller;
      let totalWidth = 0;
      const children = roller.children;

      for (let child of children) {
        const style = window.getComputedStyle(child);
        const width = parseFloat(style.width);
        const marginRight = parseFloat(style.marginRight);

        // Add width and horizontal margins to the total width
        totalWidth += width + marginRight;
      }

      this.rollerWidth = totalWidth;
      roller.style.width = `${this.rollerWidth}px`;
      console.log("Total width including margins:", this.rollerWidth);
    },
    selectImage(index){
      this.$emit('thumbnail-clicked', index);
    },
    startDrag(e) {
      this.isDragging = true;
      this.startX = e.pageX - this.$refs.slider.offsetLeft;
      this.scrollLeft = this.$refs.slider.scrollLeft;
    },
    stopDrag() {
      this.isDragging = false;
    },
    onDrag(e) {
      if (!this.isDragging) return;
      e.preventDefault();
      const x = e.pageX - this.$refs.slider.offsetLeft;
      const walk = (x - this.startX) * 2; // Speed up the scroll
      this.$refs.slider.scrollLeft = this.scrollLeft - walk;
    }
  }
};
</script>

<style scoped>
#thumbnail_slider_wrapper{
  margin-top: 24px;
  width: 100%;
  height: 129px;
  overflow-x: scroll;
  overflow-y: hidden;
  scrollbar-width: none; /* Firefox */
}
#thumbnail_slider_wrapper::-webkit-scrollbar {
  display: none; /* Chrome, Safari, and other WebKit browsers */
}
.thumbnail_slider_element{
  display: inline-block;
  margin-right: 28px;
  width: 181px;
  height: 129px;
  border-radius: 12px;
  overflow: hidden;
  cursor: pointer;
}
.thumbnail_slider_element:last-child{
  margin-right: 0;
}
.thumbnail_slider_element img{
  width: 100%;
  object-fit: cover;
}
</style>