@extends('layouts.app')

@section('content')
    <h1 class="text-center my-10 font-bold text-2xl flex items-center justify-center gap-2">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" viewBox="0 0 20 20" fill="currentColor">
            <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z" />
        </svg>
        Module Users
    </h1>
    <hr>
    <nav class="flex items-center justify-center py-4" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-3">
            <li class="inline-flex items-center">
            <a href="{{ url('dashboard') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
               <svg class="mr-2 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
                Dashboard
            </a>
            </li>
            <li>
            <div class="flex items-center">
               <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
               <a href="#" class="ml-1 text-sm font-medium text-gray-700 hover:text-gray-900 md:ml-2 dark:text-gray-400 dark:hover:text-white">Users</a>
            </div>
            </li>
        </ol>
    </nav>
    
    <a href="{{ url('users/create') }}" 
       class="bg-green-700 text-white rounded-md p-4 my-10 mx-auto w-96 flex gap-2 items-center hover:bg-green-600 hover:scale-105 transition-all duration-500">
       <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
         <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd" />
        </svg>
        Add User
    </a>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg w-10/12 mx-auto">
    <div class="p-4">
        <label for="table-search" class="sr-only">Search</label>
        <div class="relative mt-1 flex gap-2 items-center">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
            </div>
            <input type="hidden" id="tmodel" value="users">
            <input type="text" id="table-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-80 pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search for users">
            <a href="{{ url('export/users/pdf') }}" class="bg-red-800 text-white rounded-md p-2 my-5 w-40 flex gap-2 items-center hover:bg-green-600 hover:scale-105 transition-all duration-500">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V7.414A2 2 0 0015.414 6L12 2.586A2 2 0 0010.586 2H6zm5 6a1 1 0 10-2 0v3.586l-1.293-1.293a1 1 0 10-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 11.586V8z" clip-rule="evenodd" />
                </svg>
                <span class="sm:block hidden">Export PDF</span>
            </a>
            <a href="{{ url('export/users/excel') }}" class="bg-red-800 text-white rounded-md p-2 my-5 w-40 flex gap-2 items-center hover:bg-green-600 hover:scale-105 transition-all duration-500">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V7.414A2 2 0 0015.414 6L12 2.586A2 2 0 0010.586 2H6zm2 10a1 1 0 10-2 0v3a1 1 0 102 0v-3zm2-3a1 1 0 011 1v5a1 1 0 11-2 0v-5a1 1 0 011-1zm4-1a1 1 0 10-2 0v7a1 1 0 102 0V8z" clip-rule="evenodd" />
                </svg>
                <span class="sm:block hidden">Export Excel</span>
            </a>
            <form action="{{ url('import/users') }}" class="" method="post" enctype="multipart/form-data">
                @csrf
                <input type="file" name="file" id="file" class="hidden" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet">
                <button type="button" class="btn-file bg-red-800 text-white rounded-md p-2 my-5 w-40 flex gap-2 items-center hover:bg-green-600 hover:scale-105 transition-all duration-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V7.414A2 2 0 0015.414 6L12 2.586A2 2 0 0010.586 2H6zm5 6a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V8z" clip-rule="evenodd" />
                    </svg>
                    <span class="sm:block hidden">Import Excel</span>
                </button>
            </form>
            <!-- <a href="{{ url('import/users') }}" class="bg-red-800 text-white rounded-md p-2 my-5 w-40 flex gap-2 items-center hover:bg-green-600 hover:scale-105 transition-all duration-500">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V7.414A2 2 0 0015.414 6L12 2.586A2 2 0 0010.586 2H6zm5 6a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V8z" clip-rule="evenodd" />
                </svg>
                <span class="sm:block hidden">Import Excel</span>
            </a> -->
        </div>
    </div>
    <div class="loader hidden flex justify-center items-center my-10">
        <img src="{{ asset('images/loader.svg') }}" alt="">
    </div>
    <table class="table w-full text-sm text-left text-gray-500">
        <thead class="text-xs text-white uppercase bg-red-900">
            <tr>
                <th scope="col" class="p-4">
                    <div class="flex items-center">
                        <input id="checkbox-all-search" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="checkbox-all-search" class="sr-only">checkbox</label>
                    </div>
                </th>
                <th scope="col" class="px-6 py-3">
                    Fullname
                </th>
                <th scope="col" class="px-6 py-3 md:table-cell hidden">
                    Email
                </th>
                <th scope="col" class="px-6 py-3 md:table-cell hidden">
                    Photo
                </th>
                <th scope="col" class="px-6 py-3 md:table-cell hidden">
                    Role
                </th>
                <th scope="col" class="px-6 py-3 md:table-cell hidden">
                    Active
                </th>
                <th scope="col" class="px-6 py-3">
                    Actions
                </th>
            </tr>
        </thead>
        <tbody id="content">
            @foreach ($users as $user)
            <tr class="bg-white border-b hover:bg-gray-50">
                <td class="w-4 p-4">
                    <div class="flex items-center">
                        <input id="checkbox-table-search-1" type="checkbox" class="chk w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                        <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                    </div>
                </td>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                   {{ $user->fullname }}
                </th>
                <td class="px-6 py-4 md:table-cell hidden">
                    {{ $user->email }}
                </td>
                <td class="px-6 py-4 md:table-cell hidden">
                    <img src="{{ asset($user->photo) }}" alt="" width="60px" height="60px" class="rounded-xl">
                </td>
                <td class="px-6 py-4 md:table-cell hidden">
                    {{ $user->role }}
                </td>
                <td class="px-6 py-4 md:table-cell hidden">
                    @if ($user->active == 1)
                        <button class="bg-green-600 p-2 rounded-md text-white w-8 h-8">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    @else
                        <button class="bg-red-800 p-2 rounded-md text-white w-8 h-8">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M13.477 14.89A6 6 0 015.11 6.524l8.367 8.368zm1.414-1.414L6.524 5.11a6 6 0 018.367 8.367zM18 10a8 8 0 11-16 0 8 8 0 0116 0z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    @endif
                </td>
                <td class="px-6 py-8 flex items-center gap-1">
                    <a href="{{ url('users/'.$user->id) }}" class="font-medium text-white bg-blue-900 p-2 rounded-md hover:bg-blue-800 hover:scale-105 transition-all duration-500 w-8 h-8">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                            </svg>
                        </a>
                        <a href="{{ url('users/'.$user->id.'/edit') }}" class="font-medium text-white bg-blue-900 p-2 rounded-md hover:bg-blue-800 hover:scale-105 transition-all duration-500 w-8 h-8">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                            </svg>
                        </a>
                        <form action="{{ url('users/'.$user->id) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="button" class="btn-delete font-medium text-white bg-red-800 p-2 rounded-md hover:bg-red-700 hover:scale-105 transition-all duration-500 w-8 h-8">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </form>
                </td>
            </tr>
          @endforeach
    </table>
    <div class="flex items-center justify-center py-4">
        {{ $users->links() }}
    </div>
</div>
@endsection