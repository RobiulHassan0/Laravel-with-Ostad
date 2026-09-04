<script setup>
import {router} from "@inertiajs/vue3"
import {Link} from "@inertiajs/vue3"
import Navbar from "../../Components/Navbar.vue"

const props = defineProps({
    tasks: Array,
})

const deleteTask = (id) => {
    if(confirm("Are you sure to delete? ")){
        router.delete(`/tasks/${id}/delete`)
    }
}

 
</script>

<template>
    <Navbar />
    
    <div class="min-h-screen bg-gray-50 py-12">
        <div class="mx-auto max-w-3xl px-6">

            <p v-if="$page.props.flash?.success" class="text-green-500">{{ $page.props.flash.success }}</p>

            <!-- Header -->
            <div class="mb-8 flex items-end justify-between">
                <div>
                    <p class="mb-1 text-sm font-medium text-indigo-600"> Task Manager </p>

                    <h1 class="text-3xl font-bold tracking-tight text-gray-900"> My Tasks </h1>

                    <p class="mt-2 text-sm text-gray-500"> Keep track of what needs to be done. </p>
                </div>
                
                <Link  href="/tasks/create"
                    class="rounded-lg bg-gray-900 px-4 py-2.5 text-sm font-medium text-white transition hover:bg-gray-700">
                    + New Task 
                </Link>
                <!-- <button @click="goToCreatePage"
                    class="rounded-lg bg-gray-900 px-4 py-2.5 text-sm font-medium text-white transition hover:bg-gray-700">
                    + New Task
                </button> -->
            </div>

            <div v-if="tasks.length === 0">
                No Tasks were found. please add a new task.
            </div>

            <!-- Task List -->
            <div v-else class="overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-sm">

                <!-- Empty State -->
         

                <!-- Tasks -->
                <div v-for="(task, index) in tasks" :key="task.id"
                    class="flex items-center justify-between gap-4 px-6 py-5 transition hover:bg-gray-50"
                    :class="{'border-t border-red-500' : index !== 0 }">
                    
                    <!-- Checkbox -->
                    <div>
                        <input type="checkbox" v-model="task.completed">
                    </div>

                    <!-- Content -->
                    <div class="min-w-0 flex-1 ml-10">
                        <p :class="task.completed ? 'line-through text-gray-400' : 'text-gray-900' "  
                        class="text-gray-900 text-2xl">{{ task.title }}</p>
                        <p class="text-gray-500">{{ task.description }}</p>
                    </div>

                    <!-- Status -->
                    <div class="flex gap-2">
                        <p v-if="task.completed" class="bg-indigo-500 p-2 rounded text-white">Completed</p>
                        <p class="bg-sky-500 p-2 rounded text-white"><Link :href="`/tasks/${task.id}/edit`">Edit</Link></p>
                        <button @click="deleteTask(task.id)" class="bg-rose-500 p-2 rounded text-white">Delete</button>
                    </div>

                    <!-- More -->
           

                </div>
            </div>

            <!-- Footer -->
            <div class="mt-4 flex justify-between px-1 text-xs text-gray-400">
                <span>{{ tasks.length }} tasks</span>

                <span>
                    {{tasks.filter(task => task.completed).length}} completed
                </span>
            </div>

        </div>
    </div>
</template>
