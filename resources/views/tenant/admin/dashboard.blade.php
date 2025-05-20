@extends('layouts.app')

@section('title', 'ReadSphere:Admin Dasboard')
@include('tenant.admin.sidebar')

@section('content')
<div class="p-4 sm:ml-64">
   <div class="p-4 mt-20">

      <!-- generate report -->
      <div class="flex justify-end mb-4">
         <form action="{{route('generateTenant')}}" method="POST">
         @csrf
         <button type="submit" class="shadow-md focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Generate Reports</button>
         </form>
      </div>
      
      <!-- 3 status-->
      <div class="grid grid-cols-4 gap-4 mb-4">
         <div class="flex flex-col items-center justify-center h-30 p-4 rounded-lg bg-gray-50 shadow-md">
            <p class="text-lg font-medium text-black">
               TOTAL STUDENTS
            </p>
            <p class="text-4xl font-medium text-black">
               {{$studentCount}}
            </p>
         </div>
         <div class="flex flex-col items-center justify-center h-30 p-4 rounded-lg bg-gray-50 shadow-md">
            <p class="text-lg font-medium text-black">
                BOOKS
            </p>
            <p class="text-4xl font-medium text-black">
               {{$bookCount}}
            </p>
         </div>
         <div class="flex flex-col items-center justify-center h-30 p-4 rounded-lg bg-gray-50 shadow-md">
            <p class="text-lg font-medium text-black">
                BOOKS BORROWED
            </p>
            <p class="text-4xl font-medium text-black">
               {{$borrowCount}}
            </p>
         </div>
         <div class="flex flex-col items-center justify-center h-30 p-4 rounded-lg bg-gray-50 shadow-md">
            <p class="text-lg font-medium text-black">
                BOOKS RETURNED
            </p>
            <p class="text-4xl font-medium text-black">
               {{$returnCount}}
            </p>
         </div>
      </div>

      <!-- books borrowed -->
      <div class="flex flex-col h-100 mb-4 rounded-sm bg-gray-50 shadow-md overflow-y-auto">
         <p class="text-lg p-4 text-gray-500">
            Student Borrowed Books
         </p>
         
         <!-- table -->
         <table class="w-full text-sm text-left rtl:text-right text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-200">
                  <tr>
                     <th scope="col" class="px-6 py-3 whitespace-nowrap">
                        Student ID
                     </th>
                     <th scope="col" class="px-6 py-3 whitespace-nowrap">
                        Student Name
                     </th>
                     <th scope="col" class="px-6 py-3 whitespace-nowrap">
                        Book Title
                     </th>
                     <th scope="col" class="px-6 py-3">
                        Book Author
                     </th>
                     <th scope="col" class="px-6 py-3 whitespace-nowrap">
                        Date Borrowed
                     </th>
                     <th scope="col" class="px-6 py-3 whitespace-nowrap">
                        Due Date
                     </th>
                  </tr>
            </thead>
            <tbody>
                  @foreach($borrowBooks as $borrowBook)
                  <tr class="bg-white border-b border-gray-200 hover:bg-gray-50">
                     <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                        {{$borrowBook->student->student_id}}
                     </th>
                     <td class="px-6 py-4 whitespace-nowrap">
                        {{$borrowBook->student->name}}
                     </td>
                     <td class="px-6 py-4">
                        {{$borrowBook->book->title}}
                     </td>
                     <td class="px-6 py-4">
                        {{$borrowBook->book->author}}
                     </td>
                     <td class="px-6 py-4 whitespace-nowrap">
                        {{$borrowBook->created_at->format('g:iA m/d/Y')}} 
                     </td>
                     <td class="px-6 py-4 whitespace-nowrap">
                        {{$borrowBook->due_date->format('g:iA m/d/Y')}} 
                     </td>
                  </tr>
                  @endforeach
            </tbody>
         </table>
      </div>

      <!-- Student and Books activity logs -->
      <div class="h-100 grid grid-cols-2 gap-4 mb-4">
         <!-- books return logs-->
         <div class="h-full rounded-sm h-28 bg-gray-50 shadow-md overflow-y-auto overflow-x-auto">
               <p class="text-lg p-4 text-gray-500">
               Books Returned Logs
               </p>

               <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                  <thead class="text-xs text-gray-700 uppercase bg-gray-200">
                     <tr>
                           <th scope="col" class="px-6 py-3 whitespace-nowrap">
                              Student ID
                           </th>
                           <th scope="col" class="px-6 py-3 whitespace-nowrap">
                              Student Name
                           </th>
                           <th scope="col" class="px-6 py-3 whitespace-nowrap">
                              Book Title
                           </th>
                           <th scope="col" class="px-6 py-3 whitespace-nowrap">
                              Book Author
                           </th>
                           <th scope="col" class="px-6 py-3 whitespace-nowrap">
                              Date
                           </th>
                     </tr>
                  </thead>
                  <tbody>
                     @foreach($returnLogs as $returnLog)
                     <tr class="bg-white border-b border-gray-200 hover:bg-gray-50">
                           <td class="px-6 py-4">
                              {{$returnLog->student->student_id}}
                           </td>
                           <td class="px-6 py-4 whitespace-nowrap">
                              {{$returnLog->student->name}}
                           </td>
                           <td class="px-6 py-4">
                              {{$returnLog->book->title}}
                           </td>
                           <td class="px-6 py-4 whitespace-nowrap">
                              {{ $returnLog->book->author }}
                           </td>
                           <td class="px-6 py-4 whitespace-nowrap">
                              {{ $returnLog->created_at->format('g:iA m/d/Y') }} 
                           </td>
                     </tr>
                     @endforeach
                  </tbody>
               </table>
         </div>

         <!-- Books borrowed logs -->
         <div class="h-full rounded-sm h-28 bg-gray-50 shadow-md overflow-y-auto overflow-x-auto">
               <p class="text-lg p-4 text-gray-500">
               Book Borrowed Logs
               </p>

               <!-- books table -->
               <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                  <thead class="text-xs text-gray-700 uppercase bg-gray-200">
                        <tr>
                           <th scope="col" class="px-6 py-3 whitespace-nowrap">
                              Student ID
                           </th>
                           <th scope="col" class="px-6 py-3 whitespace-nowrap">
                              Student Name
                           </th>
                           <th scope="col" class="px-6 py-3 whitespace-nowrap">
                              Book Title
                           </th>
                           <th scope="col" class="px-6 py-3 whitespace-nowrap">
                              Book Author
                           </th>
                           <th scope="col" class="px-6 py-3 whitespace-nowrap">
                              Date Borrowed
                           </th>
                        </tr>
                  </thead>
                  <tbody>
                        @foreach($borrowLogs as $borrowLog)
                        <tr class="bg-white border-b border-gray-200 hover:bg-gray-50">
                           <td class="px-6 py-4">
                              {{$borrowLog->student->id}}
                           </td>
                           <td class="px-6 py-4 whitespace-nowrap">
                              {{$borrowLog->student->name}}
                           </td>
                           <td class="px-6 py-4">
                              {{$borrowLog->book->title}}
                           </td>
                           <td class="px-6 py-4">
                              {{$borrowLog->book->author}}
                           </td>
                           <td class="px-6 py-4 whitespace-nowrap">
                              {{ $borrowLog->created_at->format('g:iA m/d/Y') }}
                           </td>
                        </tr>
                        @endforeach
                  </tbody>
               </table>
            </div>
         </div>
   </div>
</div>
@endsection

