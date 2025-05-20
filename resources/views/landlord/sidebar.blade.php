<aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen pt-25 transition-transform -translate-x-full bg-[#6D2932] sm:translate-x-0" aria-label="Sidebar">
   <div class="h-full px-3 pb-4 overflow-y-auto bg-[#6D2932]">
      <ul class="space-y-2 font-medium">
         <li>
            <a href="{{ route('landlord.dashboard.index') }}" class="flex items-center p-2 text-white rounded-lg hover:bg-[#561C24] group">
               <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="#ffffff" viewBox="0 0 22 21">
                  <path d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z"/>
                  <path d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z"/>
               </svg>
               <span class="ms-3">Dashboard</span>
            </a>
         </li>

         <li>
            <a href="{{ route('landlord.tenants.index') }}" class="flex items-center p-2 text-white rounded-lg hover:bg-[#561C24] group">
            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#ffffff"><path d="M480-480q-66 0-113-47t-47-113q0-66 47-113t113-47q66 0 113 47t47 113q0 66-47 113t-113 47ZM160-160v-112q0-34 17.5-62.5T224-378q62-31 126-46.5T480-440q66 0 130 15.5T736-378q29 15 46.5 43.5T800-272v112H160Zm80-80h480v-32q0-11-5.5-20T700-306q-54-27-109-40.5T480-360q-56 0-111 13.5T260-306q-9 5-14.5 14t-5.5 20v32Zm240-320q33 0 56.5-23.5T560-640q0-33-23.5-56.5T480-720q-33 0-56.5 23.5T400-640q0 33 23.5 56.5T480-560Zm0-80Zm0 400Z"/></svg>
               <span class="ms-3">Tenants</span>
            </a>
         </li>
      </ul>

      <ul class="pt-4 mt-4 space-y-2 font-medium border-t border-[#561C24]">
         <li>
            <a href="#" data-modal-target="logout-modal" data-modal-toggle="logout-modal" class="flex items-center p-2 text-white transition duration-75 rounded-lg hover:bg-[#561C24] group">
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#ffffff"><path d="M200-120q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h280v80H200v560h280v80H200Zm440-160-55-58 102-102H360v-80h327L585-622l55-58 200 200-200 200Z"/></svg>
               <span class="ms-3">Logout</span>
            </a>
         </li>
      </ul>
   </div>
</aside>