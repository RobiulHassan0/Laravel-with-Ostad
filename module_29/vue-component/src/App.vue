<script setup>
import ColorParent from './components/ColorParent.vue';
import EmitTest from './components/EmitTest.vue';
import TodoList from './components/TodoList.vue';


</script>

<template>

<div class="todo-list">

  <h2>My Todo List</h2>
  <TodoList/>

</div>

  <h1>Using Emit</h1>
  <EmitTest/>


  <h1>Color Picker Test</h1>
  <ColorParent/>

</template>





<style scoped>

  .todo-list{
    background: #f5f5f5;
    border-radius: 12px;
    padding: 20px;
    margin: 16px;
  }

</style>
