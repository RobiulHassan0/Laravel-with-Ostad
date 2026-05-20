<script setup>
</script>

<template>
    <div class="dashboard">
        <aside class="sidebar">
            <h2>Sidebar</h2>
            <router-link :to="{name: 'profile'}">Profile</router-link>
            <router-link :to="{name: 'settings'}">Settings</router-link>
            <router-link :to="{name: 'orders'}">Orders</router-link>
        </aside>

        <section class="content">
            <router-view></router-view>
        </section>
    </div>
</template>

<style scoped>
    .dashboard{
        width: 200px;
        background: #f4f4f4;
        padding: 1rem;
        display: flex;
        flex-direction: column; 
        gap: 0.5rem;
    }

    .sidebar{
        width: 200px;
        background: #f4f4f4;
        padding: 1rem;
        display: flex;
        flex-direction: column;
        gap: 0.5rem;
    }
</style>