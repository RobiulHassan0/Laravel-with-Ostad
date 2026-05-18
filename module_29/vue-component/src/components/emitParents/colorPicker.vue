<script setup>

// step 1: Declare the event we want to emit
     const emit = defineEmits(['color-selected']);

// step 2: Create a function to emit the event with the selected color
    function pickColor(colorName){
        emit('color-selected', colorName);
    }
</script>
 
<template>
    <div class="color-picker">
        <p>Pick a color</p>

        <div class="buttons">
            <button class="color-btn clamon" @click="pickColor('Salmon')">Salmon</button>
            <button class="color-btn cayan" @click="pickColor('Cyan')">Cyan</button>
            <button class="color-btn violet" @click="pickColor('Violet')">Violet</button>
            <button class="color-btn green" @click="pickColor('Green')">Green</button>
            <button class="color-btn blue" @click="pickColor('Blue')">Blue</button>
            <button class="color-btn red" @click="pickColor('Red')">Red</button>
        </div>
    </div>
</template>

<style scoped>
    .color-picker{
        /* background: #f5f5f5; */
        border-radius: 12px;
        padding: 20px;
        margin: 16px;
        text-align: center;
    }
    .buttons{
        display: flex;
        flex-wrap: wrap;
        gap: 12px;
        justify-content: center;
    }
    .color-btn{
        padding: 12px 24px;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        font-size: 16px;
        color: white;
    }
    .clamon{
        background-color: #ffb74d;
    }
    .cayan{
        background-color: #00bcd4;
    }
    .violet{
        background-color: #9c27b0;
    }
    .green{
        background-color: #4caf50;
    }
    .blue{
        background-color: #2196f3;
    }
    .red{
        background-color: #f44336;
    }

</style>