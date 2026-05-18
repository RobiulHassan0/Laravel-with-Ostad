<script setup>
    const emit = defineEmits(['button-clicked']);

    function notifyParent(){
        emit('button-clicked')
    }
</script>

<template>
    <button class="child-btn" @click="notifyParent">
        Click Me!
    </button>
</template>

<style scoped>
    .child-btn{
        padding: 12px 24px;
        background-color: #42b883;
        color: white;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        font-size: 16px;
    }
    .child-btn:hover{
        background-color: #38a06d;
    }
</style>