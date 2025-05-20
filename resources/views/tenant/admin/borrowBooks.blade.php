@extends('layouts.app')

@section('title', 'Borrow Books')

@include('tenant.admin.sidebar')

@section('content')
<div class="p-4 sm:ml-64"> 
    <div class="p-4 mt-22">
        <!-- Borrow Books -->
        <div class="flex flex-col h-100 mb-4 rounded-sm bg-gray-50 shadow-md overflow-y-auto overflow-x-auto">
            <div class="flex justify-between items-center">
                <p class="text-lg p-4 text-gray-500">
                Borrow Books
                </p>

                <div class="mr-4">
                    <form class="flex items-center max-w-lg mx-auto">   
                        <div class="relative w-full"> 
                            <input type="text" id="search" class="bg-gray-100 border border-gray-500 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Search Students" required />
                        </div>
                        <button type="submit" class="inline-flex items-center py-2.5 px-3 ms-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                            <svg class="w-4 h-4 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                            </svg>Search
                        </button>
                    </form>
                </div>
            </div>

            <!-- table -->
            <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-200">
                    <tr>
                        <th scope="col" class="px-6 py-3 whitespace-nowrap">
                            Student ID
                        </th>
                        <th scope="col" class="px-6 py-3 whitespace-nowrap">
                            Name
                        </th>
                        <th scope="col" class="px-6 py-3 whitespace-nowrap">
                            Email
                        </th>
                        <th scope="col" class="px-6 py-3 whitespace-nowrap">
                            Course
                        </th>
                        <th scope="col" class="px-6 py-3 whitespace-nowrap">
                            College
                        </th>
                        <th scope="col" class="px-6 py-3 whitespace-nowrap">
                            School year
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($students as $student)
                    <tr class="bg-white border-b border-gray-200 hover:bg-gray-50">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{$student->student_id}}
                        </th>
                        <td class="px-6 py-4 whitespace-nowrap">
                            {{$student->name}}
                        </td>
                        <td class="px-6 py-4">
                            {{$student->email}}
                        </td>
                        <td class="px-6 py-4">
                            {{$student->course}}
                        </td>
                        <td class="px-6 py-4">
                            {{$student->college}}
                        </td>
                        <td class="px-6 py-4">
                            {{$student->school_year}}
                        </td>
                        <td class="px-6 py-4 text-center  whitespace-nowrap">
                            <button type="button" data-modal-target="select-modal-{{$student->id}}" data-modal-toggle="select-modal-{{$student->id}}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">Select Books</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
        <div class="h-100 grid grid-cols-2 gap-4 mb-4">
            <!-- Books available -->
            <div class="h-full rounded-sm h-28 bg-gray-50 shadow-md overflow-y-auto overflow-x-auto">
                <p class="text-lg p-4 text-gray-500">
                Book Available
                </p>

                <!-- books table -->
                <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-200">
                        <tr>
                            <th scope="col" class="px-6 py-3 whitespace-nowrap">
                                Book Title
                            </th>
                            <th scope="col" class="px-6 py-3 whitespace-nowrap">
                                Author
                            </th>
                            <th scope="col" class="px-6 py-3 whitespace-nowrap">
                                Quantity
                            </th>
                            <th scope="col" class="px-6 py-3 whitespace-nowrap">
                                Left
                            </th>
                            <th scope="col" class="px-6 py-3 whitespace-nowrap">
                                Registration Date
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($books as $book)
                        <tr class="bg-white border-b border-gray-200 hover:bg-gray-50">
                            <td class="px-6 py-4">
                                {{$book->title}}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{$book->author}}
                            </td>
                            <td class="px-6 py-4">
                                {{$book->quantity}}
                            </td>
                            <td class="px-6 py-4">
                                {{$book->available_quantity}}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{$book->formatted_timestamp}}
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

<!-- select books modal -->
@foreach($students as $student)
<div id="select-modal-{{$student->id}}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow-sm">

            <!-- select book form -->
            <form action="{{route('admin.borrow.store')}}" method="POST">
            @csrf
            <!-- Modal header -->
             <input type="hidden" name="student_id" id="student_id" value="{{$student->id}}">
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-gray-200">
                <h3 class="text-xl font-semibold text-gray-900">
                    Select Available Books
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="select-modal-{{$student->id}}">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5 space-y-4">
                <div class="relative overflow-x-auto overflow-y-auto shadow-md sm:rounded-lg h-100">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                            <tr>
                                <th scope="col" class="p-4">
                                    <div class="flex items-center">
                                        <input id="checkbox-all-search" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500">
                                        <label for="checkbox-all-search" class="sr-only">checkbox</label>
                                    </div>
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Book Title
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Author
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Quantity
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Left
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($books as $book)
                            <tr class="bg-white border-b border-gray-200 hover:bg-gray-300">
                                <td class="w-4 p-4">
                                    <div class="flex items-center">
                                        <input id="checkbox_{{$book->id}}" type="checkbox" name="selected_books[]" value="{{$book->id}}" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500">
                                        <label for="checkbox_{{$book->id}}" class="sr-only">checkbox</label>
                                    </div>
                                </td>
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    {{$book->title}}
                                </th>
                                <td class="px-6 py-4">
                                    {{$book->author}}
                                </td>
                                <td class="px-6 py-4">
                                    {{$book->quantity}}
                                </td>
                                <td class="px-6 py-4">
                                    {{$book->available_quantity}}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="flex justify-between items-center p-4 md:p-5 border-t border-gray-200 rounded-b">
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Confirm</button>
                <button data-modal-hide="select-modal-{{$student->id}}" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-gray-200 rounded-lg border border-gray-300 hover:bg-gray-400 hover:text-gray-700 focus:z-10 focus:ring-4 focus:ring-gray-200">Cancel</button>
            </div>
            </form>
        </div>
    </div>
</div>
@endforeach