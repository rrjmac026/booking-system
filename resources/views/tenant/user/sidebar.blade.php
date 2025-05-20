<aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen pt-25 transition-transform -translate-x-full sm:translate-x-0 bg-[#6D2932]" aria-label="Sidebar">
   <div class="h-full px-3 pb-4 overflow-y-auto bg-[#6D2932]">
      <ul class="space-y-2 font-medium">
        <li>
            <a href="{{ route('user.borrow.index') }}" class="flex items-center p-2 text-white rounded-lg hover:bg-[#561C24] group">
            <svg class="w-6 h-6 text-gray-800 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#ffffff" viewBox="0 0 24 24">
            <path stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 12H5m14 0-4 4m4-4-4-4"/>
            </svg>
               <span class="ms-3">Borrow Books</span>
            </a>
         </li>

         <li>
            <a href="{{ route('user.return.index') }}" class="flex items-center p-2 text-white rounded-lg hover:bg-[#561C24] group">
            <svg class="w-6 h-6 text-gray-800 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#ffffff" viewBox="0 0 24 24">
            <path stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12l4-4m-4 4 4 4"/>
            </svg>
               <span class="ms-3">Return Books</span>
            </a>
         </li>
      </ul>

      <ul class="pt-4 mt-4 space-y-2 font-medium border-t border-[#561C24]">
         <li>
            <a href="#" data-modal-target="logout-modal" data-modal-toggle="logout-modal" class="flex items-center p-2 text-white transition duration-75 rounded-lg hover:bg-[#561C24]">
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#ffffff"><path d="M200-120q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h280v80H200v560h280v80H200Zm440-160-55-58 102-102H360v-80h327L585-622l55-58 200 200-200 200Z"/></svg>
               <span class="ms-3">Logout</span>
            </a>
         </li>
      </ul>
   </div>
</aside>