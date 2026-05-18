  <script setup>
import { ref } from 'vue';
import TodoItem from './child/TodoItem.vue';

  const todos = ref([
    'Buy groceries',
    'Buy Vue.js documentation',
    'Build a practice project',
    'Review component lifecycle',
  ]);

</script>

<template>

  <div class="greeting-card">
    <h2>My Todo List Manually</h2>
    <TodoItem task="PHP Batch 09 Class"/>
    <TodoItem task="Jukti Team Meating"/>
    <TodoItem task="Prepare Project Proposal"/>

      <h2>Todo List by using Loop</h2>
      
      <TodoItem 
        v-for="(item, index) in todos"
        :key="index"
        :task="item"
      />
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
