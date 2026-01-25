<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>CRUD with Laravel and Axios</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-r from-purple-500 via-pink-500 to-red-500 min-h-screen p-10 font-sans text-gray-900">

    <div class="max-w-7xl mx-auto bg-white rounded-3xl shadow-2xl p-10">
        <h1
            class="text-4xl font-extrabold mb-8 tracking-tight text-transparent bg-clip-text bg-gradient-to-r from-purple-700 via-pink-600 to-red-600">
            User Management Dashboard
        </h1>

        <!-- Search & Add Button -->
        <div class="flex flex-col md:flex-row justify-between items-center mb-8 gap-4">
            <input type="search" placeholder="Search users..."
                class="w-full md:w-1/3 px-5 py-3 rounded-lg border-2 border-gray-300 focus:outline-none focus:border-pink-500 transition" />
            <button
                class="px-7 py-3 bg-pink-600 text-white rounded-lg shadow-lg hover:bg-pink-700 active:scale-95 transition-transform font-semibold">
               <a href="/create">+ Add New User</a> 
            </button>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto rounded-xl shadow-lg">
            <table class="min-w-full text-left border-collapse">
                <thead class="bg-gradient-to-r from-purple-600 to-pink-600 text-white">
                    <tr>
                        <th class="px-6 py-4 font-semibold uppercase tracking-wider border-r border-pink-400">ID</th>
                        <th class="px-6 py-4 font-semibold uppercase tracking-wider border-r border-pink-400">Name</th>
                        <th class="px-6 py-4 font-semibold uppercase tracking-wider border-r border-pink-400">Email</th>
                        <th class="px-6 py-4 font-semibold uppercase tracking-wider border-r border-pink-400">Role</th>
                        <th class="px-6 py-4 font-semibold uppercase tracking-wider border-r border-pink-400">Status
                        </th>
                        <th class="px-6 py-4 font-semibold uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody id="members-data" class="divide-y divide-gray-200">

                </tbody>
            </table>
        </div>

        <!-- Pagination -->

        <div class="flex justify-between">
            <div class="mt-6">
                <button onclick="logOut()" class="px-4 py-2 rounded-lg bg-purple-700 text-white font-semibold hover:bg-purple-800 transition">LogOut</button>
            </div>
            <div class="flex justify-end mt-6 gap-2">
                <button
                    class="px-4 py-2 rounded-lg bg-pink-600 text-white font-semibold hover:bg-pink-700 transition">Prev</button>
                <button
                    class="px-4 py-2 rounded-lg bg-pink-600 text-white font-semibold hover:bg-pink-700 transition">1</button>
                <button
                    class="px-4 py-2 rounded-lg bg-pink-600 text-white font-semibold hover:bg-pink-700 transition">2</button>
                <button
                    class="px-4 py-2 rounded-lg bg-pink-600 text-white font-semibold hover:bg-pink-700 transition">3</button>
                <button
                    class="px-4 py-2 rounded-lg bg-pink-600 text-white font-semibold hover:bg-pink-700 transition">Next</button>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <script>
        getAllMembers();
        async function getAllMembers() {
            let token = localStorage.getItem('token')
            if (!token) {
                window.location = '/login'
                return;
            }

            try {
                let url = '/api/v1/members';
                let response = await axios.get(url, {
                    headers: {
                        'Authorization': 'Bearer ' + token
                    }
                });
                let members = response.data.data['data'];

                members.forEach((member) => {
                    document.getElementById('members-data').innerHTML += (`
                    <tr class="hover:bg-pink-50 transition-colors cursor-default">
                        <td class="px-6 py-4 border-r border-gray-200">${member['id']}</td>
                        <td class="px-6 py-4 border-r border-gray-200 font-medium">${member['name']}</td>
                        <td class="px-6 py-4 border-r border-gray-200">${member['email']}</td>
                        <td class="px-6 py-4 border-r border-gray-200">${member['role']}</td>
                        <td class="px-6 py-4 border-r border-gray-200">
                            <span
                                class="inline-block px-3 py-1 rounded-full bg-green-100 text-green-800 text-xs font-semibold">
                                ${member['status']}
                            </span>
                        </td>
                        <td class="px-6 py-4 flex gap-3">
                            <button class="text-purple-600 hover:text-purple-800 font-semibold" onclick="editMember(${member['id']})">Edit</button>
                            <button class="text-red-600 hover:text-red-800 font-semibold" onclick="deleteMember(${member['id']})">Delete</button>
                        </td>
                    </tr>
                `)
                });
            } catch (error) {
                if (error.response && error.response.status === 401) {
                    localStorage.removeItem('token');
                    window.location = 'login'
                } else {
                    alert('Failed to load members data');
                    console.log(error);
                }
            }


        }
    
        async function logOut(){
            let token = localStorage.getItem('token');
            if(!token){
                window.location = "/";
                return;
            }

            try{
                let url = 'api/v1/members';
                let response = axios.post(url, {}, {
                    headers: {
                        'Authorization': 'Bearer ' + token
                    }
                })
                localStorage.removeItem('token');
                window.location = "/";
            }catch(error){
                localStorage.removeItem('token');
                window.location = "/";
            }
        }
    </script>
</body>

</html>