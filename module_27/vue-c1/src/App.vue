<script setup>
  function sayHi(){
    alert('Hi, Welcome to Vue 3!');
  }

  function onrRightClick(){
  alert('Right click is disabled');
}

function onLeftClick(){
  alert('Left click is disabled!'); 
}

function onChange(){
    alert("Input value changed!");
}
</script>


<template>
  <button v-on:click="sayHi">Click Me</button>
  <button @click.right="onrRightClick">Right click event</button>
  <button @click.left="onLeftClick">Left Click is diabled</button>
  <br>
  <br>
  <input @change="onChange" placeholder="On change event"> <br> 
  <input @keydown="onChange" placeholder="On Key down event"> <br>
  <input @keyup="onChange" placeholder="On focus event"> <br>
  <input @focus="onChange" placeholder="On focus event"> <br>
  <input @focusin="onChange" placeholder="On focus in event"> <br>
  <input @focusout="onChange" placeholder="On focus in event"> <br>
</template>




<style scoped>

</style>
