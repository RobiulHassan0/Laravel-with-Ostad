<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit User - Next-Level CRUD</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-r from-purple-500 via-pink-500 to-red-500 min-h-screen p-10 font-sans text-gray-900">

  <div class="max-w-4xl mx-auto bg-white rounded-3xl shadow-2xl p-10">
    <h1 class="text-4xl font-extrabold mb-8 tracking-tight text-transparent bg-clip-text bg-gradient-to-r from-purple-700 via-pink-600 to-red-600">
      Edit User
    </h1>

    <nav class="text-gray-500 text-sm mb-6">
      <a href="#" class="hover:underline">Dashboard</a> &rarr; <span class="font-semibold text-gray-700">Edit User</span>
    </nav>

    <form class="space-y-6">
      <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Name -->
        <div class="relative">
          <input type="text" name="name" id="name" placeholder=" " required value="Jane Doe"
            class="peer w-full rounded-lg border-2 border-gray-300 px-4 pt-5 pb-2 text-gray-900 text-md focus:border-pink-500 focus:outline-none transition" />
          <label for="name" class="absolute left-4 top-2.5 text-gray-400 text-sm transition-all peer-placeholder-shown:top-5 peer-placeholder-shown:text-md peer-focus:top-2.5 peer-focus:text-sm peer-focus:text-pink-500">
            Full Name
          </label>
        </div>

        <!-- Email -->
        <div class="relative">
          <input type="email" name="email" id="email" placeholder=" " required value="jane@example.com"
            class="peer w-full rounded-lg border-2 border-gray-300 px-4 pt-5 pb-2 text-gray-900 text-md focus:border-pink-500 focus:outline-none transition" />
          <label for="email" class="absolute left-4 top-2.5 text-gray-400 text-sm transition-all peer-placeholder-shown:top-5 peer-placeholder-shown:text-md peer-focus:top-2.5 peer-focus:text-sm peer-focus:text-pink-500">
            Email Address
          </label>
        </div>

        <!-- Role -->
        <div class="relative">
          <select name="role" id="role" required
            class="peer w-full rounded-lg border-2 border-gray-300 px-4 pt-5 pb-2 text-gray-900 text-md focus:border-pink-500 focus:outline-none transition appearance-none">
            <option value="Admin" selected>Admin</option>
            <option value="User">User</option>
            <option value="Editor">Editor</option>
          </select>
          <label for="role" class="absolute left-4 top-2.5 text-gray-400 text-sm transition-all peer-focus:top-2.5 peer-focus:text-sm peer-focus:text-pink-500">
            Role
          </label>
        </div>

        <!-- Status -->
        <div class="relative">
          <select name="status" id="status" required
            class="peer w-full rounded-lg border-2 border-gray-300 px-4 pt-5 pb-2 text-gray-900 text-md focus:border-pink-500 focus:outline-none transition appearance-none">
            <option value="Active" selected>Active</option>
            <option value="Pending">Pending</option>
            <option value="Inactive">Inactive</option>
          </select>
          <label for="status" class="absolute left-4 top-2.5 text-gray-400 text-sm transition-all peer-focus:top-2.5 peer-focus:text-sm peer-focus:text-pink-500">
            Status
          </label>
        </div>
      </div>

      <!-- Password -->
      <div class="relative">
        <input type="password" name="password" id="password" placeholder=" " 
          class="peer w-full rounded-lg border-2 border-gray-300 px-4 pt-5 pb-2 text-gray-900 text-md focus:border-pink-500 focus:outline-none transition" />
        <label for="password" class="absolute left-4 top-2.5 text-gray-400 text-sm transition-all peer-placeholder-shown:top-5 peer-placeholder-shown:text-md peer-focus:top-2.5 peer-focus:text-sm peer-focus:text-pink-500">
          New Password (optional)
        </label>
      </div>

      <!-- Submit Button -->
      <div class="pt-4 flex gap-4">
        <button type="submit"
          class="flex-1 py-3 bg-purple-600 hover:bg-purple-700 text-white font-semibold rounded-xl shadow-lg transition-transform active:scale-95">
          Update User
        </button>
        <a href="#" class="flex-1 py-3 text-center border-2 border-gray-300 rounded-xl text-gray-700 hover:bg-gray-100 transition">
          Cancel
        </a>
      </div>
    </form>
  </div>

</body>
</html>
