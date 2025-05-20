@extends('layouts.app')

@section('title', 'Settings')

@include('tenant.admin.sidebar')

@section('content')
<div class="p-4 sm:ml-64">
   <div class="p-4 mt-20">
        <div class="grid grid-cols-2 gap-4 mb-4">
            <!-- change pass card -->
            <div class="h-auto rounded-sm h-28 bg-gray-50 shadow-md">
                <p class="text-lg p-4 text-gray-500">
                Change Password
                </p>
                <!-- settings form -->
                 <div class="p-4">
                    <form id="changePasswordForm" action="{{ route('admin.settings.change-password') }}" method="POST">
                        @csrf
                        <div class="mb-6">
                            <label for="current_password" class="block mb-2 text-sm font-medium text-gray-900">Current Password</label>
                            <input type="password" id="current_password" name="current_password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="•••••••••" required />
                        </div>
                        <div class="mb-6">
                            <label for="new_password" class="block mb-2 text-sm font-medium text-gray-900">New Password</label>
                            <input type="password" id="new_password" name="new_password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="•••••••••" required />
                        </div> 
                        <div class="mb-6">
                            <label for="confirm_password" class="block mb-2 text-sm font-medium text-gray-900">Confirm New Password</label>
                            <input type="password" id="confirm_password" name="confirm_password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="•••••••••" required />
                            <p id="passwordError" class="mt-2 text-sm text-red-600 hidden">Passwords do not match.</p>
                        </div> 
                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Submit</button>
                    </form>
                    <script>
                    document.getElementById('changePasswordForm').addEventListener('submit', function(e) {
                        var password = document.getElementById('new_password').value;
                        var confirm = document.getElementById('confirm_password').value;
                        var error = document.getElementById('passwordError');
                        var minLength = 8;
                        if (password !== confirm) {
                            error.textContent = 'Passwords do not match.';
                            error.classList.remove('hidden');
                            e.preventDefault();
                        } else if (password.length < minLength) {
                            error.textContent = 'Password must be at least 8 characters.';
                            error.classList.remove('hidden');
                            e.preventDefault();
                        } else {
                            error.classList.add('hidden');
                        }
                    });
                    </script>
                 </div>
            </div>
        </div>

        <!-- customize -->
        <div class="grid grid-cols-2 gap-4">

            <!-- customize card -->
            <div class="h-auto rounded-sm h-28 bg-gray-50 shadow-md">
                <p class="text-lg p-4 text-gray-500">
                Customize
                </p>
                <!-- Customize form -->
                <div class="p-4">
                    <form action="{{route('admin.settings.customize')}}" method="POST" enctype="multipart/form-data" class="space-y-5">
                        @csrf

                        <!-- Logo Upload -->
                        <div>
                            <label for="logo" class="block text-sm font-medium text-gray-700 mb-1">Brand Logo</label>
                            <input type="file" id="logo" name="logo" accept="image/*" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4
                                file:rounded-full file:border-0
                                file:text-sm file:font-semibold
                                file:bg-blue-50 file:text-blue-700
                                hover:file:bg-blue-100"/>
                        </div>

                        <!-- Primary Color -->
                        <div>
                            <label for="color_hex" class="block text-sm font-medium text-gray-700 mb-1">Color</label>
                            <input type="color" id="color_hex" name="color_hex" value="#000000"
                                class="w-16 h-10 rounded border border-gray-300 cursor-pointer" />
                        </div>

                        <!-- Submit -->
                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Submit</button>
                    </form>
                </div>
            </div>
        </div>
   </div>
</div>
@endsection