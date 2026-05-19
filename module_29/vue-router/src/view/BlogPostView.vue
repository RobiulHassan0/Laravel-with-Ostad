<script setup>
import { useRoute } from 'vue-router';

const route = useRoute();
</script>

<template>
    <div class="blog-post">
        <h1>Blog Post</h1>
        <p>This is the content of the blog post. {{ route.params.id }}</p>
        <router-link to="/blogs/1">Article 1</router-link>
        <router-link to="/blogs/2">Article 2</router-link>
        <router-link to="/blogs/3">Article 3</router-link>
        <router-link :to="{name: blogs, params: {id:4}}">Article 4</router-link>
    </div>
</template>

<style scoped>
    .blog-post{
        padding: 2rem;
        text-align: center;
    }
</style>