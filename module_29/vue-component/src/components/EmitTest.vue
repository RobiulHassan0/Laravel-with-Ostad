<script setup>
import { ref } from 'vue';
import ClickButton from './emitParents/clickButton.vue';

    const message = ref("Button not clicked yet!");

    function onChildClicked(){
        message.value = "Child Button was clicked";
    }
</script>

<template>
    <div>
        <h1>Parent Component</h1>
        <p>{{ message }}</p>
        <ClickButton @button-clicked="onChildClicked"/>
    </div>
</template>

<style scoped>

</style>