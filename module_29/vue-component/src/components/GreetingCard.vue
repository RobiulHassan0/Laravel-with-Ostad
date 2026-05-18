<script setup>
import { ref } from 'vue';


  const title = ref('Hello World');

</script>

<template>

  <div class="greeting-card">
    <h3>{{ title }}</h3>
    <p>Welcome to your first component</p>
  </div>

</template>

<style scoped>
  .greeting-card{
    background: #e8f5e9;
    border: 2px solid #4caf50;
    padding: 20px;
    margin: 16px;
    text-align: center;
  }

  .greeting-card h2{
    color: #2e7d32;
    margin: 0 0 8px 0;
  }
</style>
