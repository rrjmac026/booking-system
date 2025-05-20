<aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen pt-25 transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar" style="background-color: {{ $color_hex }}">
   <div class="h-full px-3 pb-4 overflow-y-auto" style="background-color: {{ $color_hex }}">
      <ul class="space-y-2 font-medium">
         <li>
            <a href="{{ route('admin.dashboard.index') }}" class="flex items-center p-2 text-white rounded-lg hover:bg-opacity-80 group hover:bg-[#561C24]">
               <svg class="w-5 h-5 text-gray-500 transition duration-75" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="#ffffff" viewBox="0 0 22 21">
                  <path d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z"/>
                  <path d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z"/>
               </svg>
               <span class="ms-3">Dashboard</span>
            </a>
         </li>

         <li>
            <a href="{{ route('admin.student.index')}}" class="flex items-center p-2 text-white rounded-lg hover:bg-opacity-80 group hover:bg-[#561C24]">
            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#ffffff"><path d="M480-480q-66 0-113-47t-47-113q0-66 47-113t113-47q66 0 113 47t47 113q0 66-47 113t-113 47ZM160-160v-112q0-34 17.5-62.5T224-378q62-31 126-46.5T480-440q66 0 130 15.5T736-378q29 15 46.5 43.5T800-272v112H160Zm80-80h480v-32q0-11-5.5-20T700-306q-54-27-109-40.5T480-360q-56 0-111 13.5T260-306q-9 5-14.5 14t-5.5 20v32Zm240-320q33 0 56.5-23.5T560-640q0-33-23.5-56.5T480-720q-33 0-56.5 23.5T400-640q0 33 23.5 56.5T480-560Zm0-80Zm0 400Z"/></svg>
               <span class="ms-3">Students</span>
            </a>
         </li>

         <li>
            <a href="{{ route('admin.book.index')}}" class="flex items-center p-2 text-white rounded-lg hover:bg-opacity-80 group hover:bg-[#561C24]">
            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#ffffff"><path d="M400-400h160v-80H400v80Zm0-120h320v-80H400v80Zm0-120h320v-80H400v80Zm-80 400q-33 0-56.5-23.5T240-320v-480q0-33 23.5-56.5T320-880h480q33 0 56.5 23.5T880-800v480q0 33-23.5 56.5T800-240H320Zm0-80h480v-480H320v480ZM160-80q-33 0-56.5-23.5T80-160v-560h80v560h560v80H160Zm160-720v480-480Z"/></svg>
               <span class="ms-3">Books</span>
            </a>
         </li>
      </ul>

      <ul class="pt-4 mt-4 space-y-2 font-medium border-t border-[#561C24]">
         <li>
            <button type="button" class="flex items-center w-full p-2 text-base text-white transition duration-75 rounded-lg group hover:bg-[#561C24]" aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#ffffff"><path d="M280-120 80-320l200-200 57 56-104 104h607v80H233l104 104-57 56Zm400-320-57-56 104-104H120v-80h607L623-784l57-56 200 200-200 200Z"/></svg>
                  <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Transaction</span>
                  <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                     <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                  </svg>
            </button>
            <ul id="dropdown-example" class="hidden py-2 space-y-2">
                  <li>
                     <a href="{{ route('admin.borrow.index') }}" class="flex items-center w-full p-2 text-white transition duration-75 rounded-lg pl-11 group hover:bg-[#561C24]">
                     <svg class="w-6 h-6 text-gray-800 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#ffffff" viewBox="0 0 24 24">
                     <path stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 12H5m14 0-4 4m4-4-4-4"/>
                     </svg>
                        Borrow Books
                     </a>
                  </li>
                  <li>
                     <a href="{{ route('admin.return.index') }}" class="flex items-center w-full p-2 text-white transition duration-75 rounded-lg pl-11 group hover:bg-[#561C24]">
                     <svg class="w-6 h-6 text-gray-800 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#ffffff" viewBox="0 0 24 24">
                     <path stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12l4-4m-4 4 4 4"/>
                     </svg>
                        Return Books
                     </a>
                  </li>
            </ul>
         </li>
      </ul>

      <ul class="pt-4 mt-4 space-y-2 font-medium border-t border-[#561C24]">
         <li>
            <a href="{{ route('admin.settings.index') }}" class="flex items-center p-2 rounded-lg text-white hover:bg-[#561C24] group">
            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#ffffff"><path d="m370-80-16-128q-13-5-24.5-12T307-235l-119 50L78-375l103-78q-1-7-1-13.5v-27q0-6.5 1-13.5L78-585l110-190 119 50q11-8 23-15t24-12l16-128h220l16 128q13 5 24.5 12t22.5 15l119-50 110 190-103 78q1 7 1 13.5v27q0 6.5-2 13.5l103 78-110 190-118-50q-11 8-23 15t-24 12L590-80H370Zm70-80h79l14-106q31-8 57.5-23.5T639-327l99 41 39-68-86-65q5-14 7-29.5t2-31.5q0-16-2-31.5t-7-29.5l86-65-39-68-99 42q-22-23-48.5-38.5T533-694l-13-106h-79l-14 106q-31 8-57.5 23.5T321-633l-99-41-39 68 86 64q-5 15-7 30t-2 32q0 16 2 31t7 30l-86 65 39 68 99-42q22 23 48.5 38.5T427-266l13 106Zm42-180q58 0 99-41t41-99q0-58-41-99t-99-41q-59 0-99.5 41T342-480q0 58 40.5 99t99.5 41Zm-2-140Z"/></svg>
               <span class="ms-3">Settings</span>
            </a>
         </li>
         <li>
            <a href="#" data-modal-target="logout-modal" data-modal-toggle="logout-modal" class="flex items-center p-2 text-white transition duration-75 rounded-lg hover:bg-[#561C24]">
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#ffffff"><path d="M200-120q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h280v80H200v560h280v80H200Zm440-160-55-58 102-102H360v-80h327L585-622l55-58 200 200-200 200Z"/></svg>
               <span class="ms-3">Logout</span>
            </a>
         </li>
      </ul>

      @if(auth()->user()->subscription === 'free')
         <ul class="pt-4 mt-4 space-y-2 font-medium border-t border-[#561C24]">
            <li>
            <a href="#" data-modal-target="pro-modal" data-modal-toggle="pro-modal" class="flex items-center p-2 text-white transition duration-75 rounded-lg hover:bg-[#561C24]">
                <svg viewBox="0 0 16 16" fill="#ffffff" height="24px" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill-rule="evenodd" clip-rule="evenodd" d="M2 15L0 4H2L5 7L7 1H9L11 7L14 4H16L14 15H2ZM7.5 9L6 11L7.5 13H8.5L10 11L8.5 9H7.5Z" fill="#ffffff""></path> </g></svg>
               <span class="ms-3">Upgrade to pro</span>
            </a>
            </li>
         </ul>
      @endif
   </div>
</aside>

<div id="pro-modal" tabindex="-1" aria-hidden="true" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-40">
   <div class="relative w-full max-w-md mx-auto">
      <!-- Modal content -->
      <div class="relative bg-white rounded-2xl shadow-lg overflow-hidden">
         <!-- Modal header -->
         <div class="flex items-center justify-between px-6 py-4 border-b border-gray-200 bg-gradient-to-r from-[#561C24] to-[#7D2E68]">
            <h3 class="text-lg font-bold text-white flex items-center gap-2">
               <svg viewBox="0 0 16 16" fill="#fff" height="22" class="inline"><path fill-rule="evenodd" clip-rule="evenodd" d="M2 15L0 4H2L5 7L7 1H9L11 7L14 4H16L14 15H2ZM7.5 9L6 11L7.5 13H8.5L10 11L8.5 9H7.5Z"/></svg>
               Upgrade to Pro
            </h3>
            <button type="button" class="text-white hover:bg-white/10 rounded-full p-2 transition" data-modal-toggle="pro-modal">
               <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
               </svg>
               <span class="sr-only">Close modal</span>
            </button>
         </div>
         <!-- Modal body -->
         <form class="px-6 py-6 bg-white" method="POST" action="{{ route('admin.settings.pro') }}">
            @csrf
            <div class="mb-4">
               <label for="amount" class="block mb-2 text-sm font-semibold text-gray-700">Amount</label>
               <div class="relative">
                  <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400">$</span>
                  <input type="number" name="amount" id="amount" min="1" class="pl-7 pr-3 py-2 w-full border border-gray-300 rounded-lg focus:ring-[#561C24] focus:border-[#561C24] text-gray-900 text-sm transition" placeholder="500" required>
               </div>
            </div>
            <button type="submit" class="w-full flex items-center justify-center gap-2 text-white bg-gradient-to-r from-[#561C24] to-[#7D2E68] hover:from-[#7D2E68] hover:to-[#561C24] focus:ring-4 focus:ring-[#561C24]/30 font-semibold rounded-lg text-base px-5 py-2.5 transition">
               <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
               </svg>
               Upgrade Now
            </button>
            <p class="mt-4 text-xs text-center text-gray-400">Enjoy premium features and priority support with Pro!</p>
         </form>
      </div>
   </div>
</div>