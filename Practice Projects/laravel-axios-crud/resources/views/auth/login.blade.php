<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - Next-Level UI</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-r from-purple-500 via-pink-500 to-red-500 min-h-screen flex items-center justify-center font-sans">

  <div class="w-full max-w-md bg-white rounded-3xl shadow-2xl p-10">
    <!-- Header -->
    <h1 class="text-4xl font-extrabold mb-6 tracking-tight text-transparent bg-clip-text bg-gradient-to-r from-purple-700 via-pink-600 to-red-600 text-center">
      Welcome Back
    </h1>
    <p class="text-gray-500 mb-8 text-center">Sign in to your account to continue</p>

    <!-- Login Form -->
    <form class="space-y-6">
      <!-- Email -->
      <div class="relative">
        <input type="email" name="email" id="emailID" placeholder=" " required
          class="peer w-full rounded-lg border-2 border-gray-300 px-4 pt-5 pb-2 text-gray-900 text-md focus:border-pink-500 focus:outline-none transition" />
        <label for="email" class="absolute left-4 top-2.5 text-gray-400 text-sm transition-all peer-placeholder-shown:top-5 peer-placeholder-shown:text-md peer-focus:top-2.5 peer-focus:text-sm peer-focus:text-pink-500">
          Email Address
        </label>
      </div>

      <!-- Password -->
      <div class="relative">
        <input type="password" name="password" id="passID" placeholder=" " required
          class="peer w-full rounded-lg border-2 border-gray-300 px-4 pt-5 pb-2 text-gray-900 text-md focus:border-pink-500 focus:outline-none transition" />
        <label for="password" class="absolute left-4 top-2.5 text-gray-400 text-sm transition-all peer-placeholder-shown:top-5 peer-placeholder-shown:text-md peer-focus:top-2.5 peer-focus:text-sm peer-focus:text-pink-500">
          Password
        </label>
      </div>


      <!-- Submit Button -->
      <button type="submit" onclick="login()"
        class="w-full py-3 bg-pink-600 hover:bg-pink-700 text-white font-semibold rounded-xl shadow-lg transition-transform active:scale-95">
        Sign In
      </button>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
      async function login(){
        let EmailValue = document.getElementById('emailID').value;
        let PassValue = document.getElementById('passID').value;

        let obj = {
          "email" : EmailValue,
          "password" : PassValue,
        }

        try {
          let url = 'api/v1/login';
          let response = await axios.post(url, obj);

          localStorage.setItem('token', response.data.access_token)
          window.location = "/"
          
        } catch (error) {
          alert('login failed. please check your credentials.')
        }
      }

    </script>

</body>
</html>
