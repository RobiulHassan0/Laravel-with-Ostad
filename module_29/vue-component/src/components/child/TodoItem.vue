<script setup>
import { ref } from 'vue';


const props = defineProps({
    task: {
        type: String,
        required: true
    }
});
    const isDone = ref(false);
</script>

<template>

  <div class="todo-item">
    <input type="checkbox" v-model="isDone">
    <span :class="{completed: isDone}">{{ task }}</span>
  </div>

</template>

<style scoped>
  .todo-item{
    background: white;
    padding: 12px 16px;
    margin: 8px 0;
    border-radius: 8px;
    display: flex;
    align-items: center;
    gap: 12px;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
  }

  .completed{
    text-decoration: line-through;
    color: #999;
  }
</style>
