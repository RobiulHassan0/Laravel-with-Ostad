<script setup>
import { useRouter } from 'vue-router';

    const router = useRouter();

    function goBack(){
        // router.back();
        router.go(-2);
    }

    function goTOServices(){
        // router.push({ name: 'services' });
        router.push({ path: 'services' });
        // router.push('/services');
    }
</script>

<template>
    <div class="contact">
        <h1>📞 Contact Us</h1>
        <p>Email: info@company.com</p>
        <p>Phone: +1 (555) 123-4567</p>
        <p>Address: 123 Main St, Anytown, USA</p>
    </div>

    <button @click="goBack">Back</button>
    <button @click="goTOServices">Login</button>
</template>

<style scoped>
    .contact{
        padding: 2rem;
        text-align: center;
    }
</style>