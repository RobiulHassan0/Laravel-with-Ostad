<x-app-layout>
    
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Create Ticket
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-xl rounded-2xl p-8">

                <form action="{{ route('tickets.store') }}" method="POST">
                    @csrf

                    <!-- Title -->
                    <div class="mb-6">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Ticket Title
                        </label>
                        <input name="title" type="text"
                               class="w-full h-11 px-4 rounded-lg bg-gray-50 border border-gray-300
                                      focus:bg-white focus:border-indigo-500 focus:ring-indigo-500"
                               placeholder="Short issue title" required>
                    </div>

                    <!-- Description -->
                    <div class="mb-6">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Description
                        </label>
                        <textarea name="description"
                            class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-300
                                   focus:bg-white focus:border-indigo-500 focus:ring-indigo-500"
                            rows="5"
                            placeholder="Explain your issue" required></textarea>
                    </div>

                    <!-- Priority -->
                    <div class="mb-8"> 
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Priority
                        </label>
                        <select name="priority" 
                            class="w-full h-11 px-4 rounded-lg bg-gray-50 border border-gray-300
                                   focus:bg-white focus:border-indigo-500 focus:ring-indigo-500" required>
                            <option value="">Select Priority</option>
                            <option value="low">🟢 Low</option>
                            <option value="medium">🟠 Medium</option>
                            <option value="high">🔴 High</option>
                        </select>
                    </div>

                    <!-- Submit -->
                    <button type="submit"
                            class="w-full h-11 bg-indigo-600 text-white rounded-lg font-semibold
                                   hover:bg-indigo-700 transition">
                        Create Ticket
                    </button>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
