@extends('layouts.app')

@section('title', 'Tenants')

@include('landlord.sidebar')
@include('landlord.modal')

@section('content')
<div class="p-4 sm:ml-64">
   <div class="pl-4 pr-2 mt-22 flex justify-end">
      <!-- add button -->
      <button type="button" data-modal-target="add-modal" data-modal-toggle="add-modal" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
         Add Tenant
      </button>
   </div>

   <div class="p-4">
      <div class="flex flex-col h-160 mb-4 rounded-sm bg-gray-50 shadow-md overflow-y-auto overflow-x-auto">
         <div class="flex justify-between items-center">
            <p class="text-lg p-4 text-gray-500">
               Manage Tenants
            </p>
         </div>

         <!-- table -->
         <table class="w-full text-sm text-left rtl:text-right text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-200">
               <tr>
                  <th scope="col" class="px-6 py-3">Tenant_ID</th>
                  <th scope="col" class="px-6 py-3 whitespace-nowrap">Name</th>
                  <th scope="col" class="px-6 py-3 whitespace-nowrap">Email</th>
                  <th scope="col" class="px-6 py-3 whitespace-nowrap">Domain</th>
                  <th scope="col" class="px-6 py-3">Subscription</th>
                  <th scope="col" class="px-6 py-3">Status</th>
                  <th scope="col" class="px-6 py-3 whitespace-nowrap">Subscription Date</th>
                  <th scope="col" class="px-6 py-3 whitespace-nowrap">Expiration Date</th>
               </tr>
            </thead>
            <tbody>
               @foreach($tenants as $tenant)
                  <tr class="bg-white border-b border-gray-200 hover:bg-gray-50">
                     <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                        {{ $tenant->id }}
                     </th>
                     <td class="px-6 py-4 whitespace-nowrap">
                        {{ $tenant->name }}
                     </td>
                     <td class="px-6 py-4">
                        {{ $tenant->email }}
                     </td>
                     <td class="px-6 py-4">
                        {{ $tenant->subdomain }}
                     </td>
                     <td class="px-6 py-4">
                        {{ $tenant->subscription}}
                     </td>
                     <td class="px-6 py-4">
                        active
                     </td>
                     <td class="px-6 py-4 whitespace-nowrap">
                        {{ $tenant->created_at->format('g:iA M/d/Y') }}
                     </td>
                     <td class="px-6 py-4 whitespace-nowrap">
                        {{ $tenant->expiration_date->format('g:iA M/d/Y')}}
                     </td>
                  </tr>
               @endforeach
            </tbody>
         </table>
      </div>
   </div>
</div>
@endsection