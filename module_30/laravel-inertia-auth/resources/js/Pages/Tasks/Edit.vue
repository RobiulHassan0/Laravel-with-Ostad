<script setup>
import { useForm } from '@inertiajs/vue3';
import {Link} from '@inertiajs/vue3';

const props = defineProps({
    task: Object,
})

const form = useForm({
    title: props.task.title,
    description: props.task.description ?? '',
    completed: props.task.completed
});
 
function updateTask(){
    form.put(`/tasks/${props.task.id}`)
}
 
</script>

<template>
    <div class="min-h-screen flex flex-col items-center py-10 ">
        <h1 class="text-3xl text-center py-10 font-bold">Edit this Task</h1>
        <div class=" text-white mb-4 w-125">
            <Link href="/tasks" class="bg-rose-500 px-4 py-2 rounded-t-2xl rounded-r-2xl">⬅️ Back</Link>
        </div>

        <form @submit.prevent="updateTask" action="" class="flex flex-col gap-6 w-125 shadow-sm bg-indigo-200 rounded-2xl p-10">
            <div class="flex items-center gap-4">
                <label>Title: </label>
                <input v-model="form.title" type="text" class="w-full border border-indigo-500 outline-0 p-2 rounded">
            </div>
            <div class="flex items-center gap-4">
                <lable>Description</lable>
                <textarea v-model="form.description" class="w-full border border-indigo-500 outline-0 p-2 rounded" ></textarea>
            </div>

            <div class="flex items-center gap-4 justify-between">
                <input v-model="form.completed" type="checkbox" class="size-11">
                <button class="w-full text-white bg-indigo-600 p-2 rounded-sm" type="submit">Update Task</button>
            </div>

        </form>
    </div>
</template>


<style scoped>

</style>