<script setup>
import { ref } from "vue";
import ColorPicker from "./emitParents/colorPicker.vue";

    const selectedColor = ref('none');
    
    const bgColor = ref('#ffffff');

    function changeColor(newColor){
        selectedColor.value = newColor;
        bgColor.value = newColor;
    }

</script>

<template>
  <div class="parent-box" :style="{ backgroundColor: bgColor }">
    <h1>Color Picker Parent Component</h1>
    <p>
      Current Color: <strong>{{ selectedColor}}</strong>
    </p>

    <ColorPicker @color-selected="changeColor"/>
  </div>
</template>

<style scoped>
    .parent-box {
    font-family: Arial, sans-serif;
    max-width: 800px;
    margin: 40px auto;
    padding: 48px;
    border-radius: 12px;
    text-align: center;
    transition: background-color 0.3s;
    }
</style>
