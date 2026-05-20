<script setup>


</script>

<template>
  <div>
    <nav class="navbar">
      <router-link to="/">Home</router-link>

      <!-- <router-link :to="{path: '/about'}">About</router-link> -->
      <!-- <router-link to="/about">About</router-link> -->

      <router-link to="/about">About</router-link>
      
      <router-link to="/contact">Contact</router-link>

      <router-link to="/services">Services</router-link>
      <router-link to="/dashboard">Dashboard</router-link>
    </nav>
    <h1>My App</h1>

  </div>

  <main>
    <router-view></router-view>
  </main>
</template>

<style scoped>
  .navbar{
    display: flex;
    /* justify-content: space-between; */
    align-items: center;
    gap: 1rem;
    padding: 1rem;
    background-color: #42b883;
  }

  .navbar a{
    color: white;
    text-decoration: none;
    font-weight: bold;
  }

  /* .navbar a.router-link-active{
    text-decoration: underline;
  } */
</style>
