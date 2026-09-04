<script setup>
import { Link } from "@inertiajs/vue3";

defineProps({
    version: {
        type: String, 
        default: "0.0"
    },
    greet: String
})

</script>

<template>
    <div class="text-4xl font-bold ml-20">
        <h1>{{greet}} Home Page from Vue </h1>
        <h4>the Version is {{version}} </h4>
        <Link href="/products">Go to About</Link>
    </div>
</template>


<style scoped>

</style>