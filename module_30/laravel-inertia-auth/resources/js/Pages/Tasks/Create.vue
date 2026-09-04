<script setup>
import { useForm } from '@inertiajs/vue3';


const form = useForm({
    title: '',
    description: '',
    completed: false,
});

const submit = ()=> {
    form.post('/tasks/store')
}

</script>

<template>
    <div class="min-h-screen flex flex-col items-center py-10 ">
        <h1 class="text-3xl text-center py-10 font-bold">Add New Task</h1>

        <form @submit.prevent="submit" action="" class="flex flex-col gap-6 w-125 shadow-sm bg-indigo-200 rounded-2xl p-10">
            <div class="flex items-center gap-4">
                <lable>Title: </lable>
                <input v-model="form.title" type="text" class="w-full border border-indigo-500 outline-0 p-2 rounded">
                <p v-if="form.errors.title" class="text-rose-600 block w-full">{{ form.errors.title }}</p>
            </div>
            <div class="flex items-center gap-4">
                <label>Description</label>
                <textarea v-model="form.description" class="w-full border border-indigo-500 outline-0 p-2 rounded" ></textarea>
                <span v-if="form.errors.description" class="text-rose-600 block w-full">{{form.errors.description}}</span>
            </div>

            <div class="flex items-center gap-4 justify-between">
                <input v-model="form.completed" type="checkbox" class="size-11">
                <button class="w-full text-white bg-indigo-600 p-2 rounded-sm" type="submit">Add Task</button>
            </div>

        </form>
    </div>
</template>


<style scoped>

</style>