<script setup>
</script>

<template>
    <div class="dashboard">
        <aside class="sidebar">
            <h2>Sidebar</h2>
            <router-link>Profile</router-link>
            <router-link>Settings</router-link>
            <router-link>Orders</router-link>
        </aside>

        <section class="content">
            <router-view></router-view>
        </section>
    </div>
</template>

<style scoped>
    .dashboard{
        padding: 2rem;
        text-align: center;
    }
</style>