<div class="flex justify-center p-8">
    <button id="openModal" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
        Update User
    </button>
</div>

<div class="flex justify-center m-5">
    <button id="defaultModalButton" data-modal-target="userModal" data-modal-toggle="userModal"
        class="block text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800"
        type="button">
        user profile
    </button>
</div>

<!-- Modal -->
<div id="userModal" class="fixed inset-0 bg-black bg-opacity-50 justify-center items-center hidden">
    <div class="bg-white p-6 rounded-lg w-full max-w-md">
        <div class="flex justify-between items-center border-b pb-3">
            <h3 class="text-lg font-semibold">Update User</h3>
            <button id="closeModal" class="text-gray-400 hover:text-gray-600">
                &times;
            </button>
        </div>

        <!-- Form -->
        <form class="space-y-4 mt-4">
            <!-- Upload avatar -->
            <div class="flex items-center space-x-4">
                <img src="https://via.placeholder.com/100" alt="Avatar" class="w-16 h-16 rounded-full">
                <div>
                    <label class="block text-sm">Upload avatar</label>
                    <input type="file" class="block w-full text-sm text-gray-900 border rounded">
                    <button type="button" class="mt-2 px-2 py-1 bg-blue-500 text-white text-sm rounded">Upload new
                        picture</button>
                    <button type="button" class="mt-2 px-2 py-1 bg-red-500 text-white text-sm rounded">Delete</button>
                </div>
            </div>

            <!-- First Name -->
            <div>
                <label class="block text-sm font-medium text-gray-700">First Name</label>
                <input type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                    placeholder="First Name">
            </div>

            <!-- Last Name -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Last Name</label>
                <input type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                    placeholder="Last Name">
            </div>

            <!-- Email -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                    placeholder="helene@company.com">
            </div>

            <!-- Password -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                    placeholder="Password">
            </div>

            <!-- Confirm Password -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Confirm Password</label>
                <input type="password" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                    placeholder="Confirm Password">
            </div>

            <!-- Roles -->
            <div class="space-y-2">
                <label class="block text-sm font-medium text-gray-700">Assign Role</label>
                <div>
                    <input type="radio" name="role" id="admin" class="mr-2">
                    <label for="admin">Administrator</label>
                </div>
                <div>
                    <input type="radio" name="role" id="member" class="mr-2">
                    <label for="member">Member</label>
                </div>
                <div>
                    <input type="radio" name="role" id="viewer" class="mr-2" checked>
                    <label for="viewer">Viewer</label>
                </div>
            </div>

            <!-- Action buttons -->
            <div class="flex justify-between items-center mt-6">
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                    Update user
                </button>
                <button type="button" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">
                    Delete
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    // JavaScript to toggle modal visibility
    const openModal = document.getElementById('openModal');
    const closeModal = document.getElementById('closeModal');
    const userModal = document.getElementById('userModal');

    openModal.addEventListener('click', () => {
        userModal.classList.remove('hidden');
    });

    closeModal.addEventListener('click', () => {
        userModal.classList.add('hidden');
    });
</script>
