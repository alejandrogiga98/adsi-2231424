@extends('layouts.navbar')

@section('content')
   <!-- Styles -->
   <style>
      body {
         font-family: 'Nunito', sans-serif;
         color: #666;
         text-align: center;
      }
      h1{
         text-align: center;
      }
      table{
         border-collapse: collapse;
         margin: 20px auto;
         width: 80%;
      }
      table th, table td{
         border: 1px solid #999;
         padding: 10px;
      }
      table tr:nth-child(even){
         background-color: #999;
         color: #fff;
      }
      table body{
         margin-bottom: 50px;
      }
   </style>
   <h1 class="text-center mt-10 mb-6 text-2xl font-bold">Module Games</h1>
   <a href="{{ url('games/create') }}" class="bg-gray-500 text-white py-2 px-6 rounded-md my-8 w-88 mx-auto">Add Game</a>
   @if (session('message'))
      <p class="text-green-600 font-medium p-5 my-2"> {{ session('message')}} </p>
   @endif
   <table>
      <thead>
          <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Description</th>
              <th>Price</th>
              <th>Actions</th>
          </tr>
      </thead>
      <tbody>
          @foreach ($games as $game)
              <tr class="">
                  <td>{{ $game->id }}</td>
                  <td>{{ $game->name }}</td>
                  <td>{{ $game->description }}</td>
                  <td>{{ $game->price }}</td>
                  <td class="flex items-center justify-center gap-4">
                     <a href="{{ url('games/' . $game->id) }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                           <path stroke-linecap="round" stroke-linejoin="round" d="M8 16l2.879-2.879m0 0a3 3 0 104.243-4.242 3 3 0 00-4.243 4.242zM21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                     </a>
                     <a href="{{ url('games/' . $game->id . '/edit') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                           <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                        </svg>
                     </a>
                     <form action="{{ url('games/' . $game->id) }}" method="POST">
                        @csrf
                        @method('delete')
                        <button>
                           <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                           </svg>
                        </button>
                     </form>
                  </td>
              </tr>
          @endforeach
      </tbody>
  </table>
@endsection