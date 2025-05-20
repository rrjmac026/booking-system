@php
  $color = $color_hex ?? '#6D2932'; // fallback color
@endphp

<nav class="fixed top-0 z-50 w-full border-b" style="border-color: {{$color}}; background-color: {{$color}};">
  <div class="px-3 py-3 lg:px-5 lg:pl-3">
  <div class="flex items-center justify-between">
    <div class="flex items-center justify-start rtl:justify-end">
    <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button"
      class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2"
      style="color: {{$color}};">
      <span class="sr-only">Open sidebar</span>
      <!-- SVG unchanged -->
      <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
         <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
      </svg>
     </button>
    <a href="" class="flex ms-2 md:me-24">
        @php
            $logo = Auth::user()->logo_name ?? null;
        @endphp
        <img 
            src="{{ $logo ? asset('images/' . $logo) : asset('images/ReadSphere_Logo.png') }}" 
            class="h-16 me-3" 
            alt="ReadSphere Logo" 
        />
        <span class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap dark:text-white">ReadSphere</span>
    </a>
    </div>
    <div class="flex items-center">
      <div class="flex items-center ms-3">
      <div>
        <button type="button" class="flex text-sm rounded-full focus:ring-4" style="background-color: {{$color}}; focus:ring-color: {{$color}};" aria-expanded="false" data-dropdown-toggle="dropdown-user">
        <span class="sr-only">Open user menu</span>
        <img class="w-10 h-10 rounded-full" src="{{asset('images/profile.png')}}" alt="user photo">
        </button>
      </div>
      <div class="z-50 hidden my-4 text-base list-none rounded-sm shadow-sm" style="background-color: {{$color}}; border-color: {{$color}};" id="dropdown-user">
        <div class="px-4 py-3" role="none">
        <p class="text-sm text-white" role="none">
        {{ Auth::guard('students')->user()->name ?? 'Guest' }}
        </p>
        <p class="text-sm font-medium text-gray-400 truncate" role="none">
        {{ Auth::guard('students')->user()->email ?? 'no-email@example.com' }}
        </p>
        </div>
        <ul class="py-1" role="none">
        <li>
          <a href="#" data-modal-target="logout-modal" data-modal-toggle="logout-modal" class="block px-4 py-2 text-sm text-white hover:bg-opacity-80" style="background-color: {{$color}};" role="menuitem">Sign out</a>
        </li>
        </ul>
      </div>
      </div>
    </div>
  </div>
  </div>
</nav>

<!-- logout modal -->
<div id="logout-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
  <div class="relative p-4 w-full max-w-md max-h-full">
    <div class="relative bg-white rounded-lg shadow-sm">
      <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="logout-modal">
        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
        </svg>
        <span class="sr-only">Close modal</span>
      </button>
      <div class="p-4 md:p-5 text-center">
        <svg class="mx-auto mb-4 text-gray-400 w-12 h-12" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
        </svg>
        <h3 class="mb-5 text-lg font-normal text-gray-500">Are you sure you want to Logout?</h3>
        <form action="{{ Auth::check() && Auth::user()->role === 'landlord' ? route('logout') : route('student.logout') }}" method="GET" class="flex justify-center gap-3 mt-4">
          <button type="submit"
            class="py-2.5 px-6 text-sm font-semibold rounded-lg bg-red-600 text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-300 transition-colors duration-150 shadow-sm"
          >
            <svg class="inline w-4 h-4 mr-2 -mt-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a2 2 0 01-2 2H7a2 2 0 01-2-2V7a2 2 0 012-2h4a2 2 0 012 2v1" />
            </svg>
            Confirm
          </button>
          <button data-modal-hide="logout-modal" type="button"
            class="py-2.5 px-6 text-sm font-semibold rounded-lg bg-gray-100 text-gray-700 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-300 transition-colors duration-150 shadow-sm"
          >
            Cancel
          </button>
        </form>
      </div>
    </div>
  </div>
</div>