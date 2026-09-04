<script setup>

 
 </script>

<template>
    <nav class="flex gap-4 justify-center my-8 text-2xl font-bold">
        <RouterLink to="/">Home</RouterLink>
        <RouterLink to="/products">Products</RouterLink>
    </nav>

    <main>
        <RouterView></RouterView>
    </main>

</template>


<style scoped>

</style>