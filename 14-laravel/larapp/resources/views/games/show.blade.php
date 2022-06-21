@extends('layouts.navbar')

@section('content')
   {{-- Back to games --}}
   <a href="{{ url('games') }}"><- Game Module</a>
   <hr><br>
   <h1>Show Game</h1>
   <table>
      <tbody>
         <tr>
            <th>Name:</th>
            <td>{{ $game->name }}</td>
         </tr>
         <tr>
            <th>Description:</th>
            <td>{{ $game->description }}</td>
         </tr>
         <tr>
            <th>Slider:</th>
            <td>{{ $game->slider }}</td>
         </tr>
         <tr>
            <th>Price:</th>
            <td>{{ $game->price }}</td>
         </tr>
         <tr>
            <th>User Id:</th>
            <td>{{ $game->user_id }}</td>
         </tr>
         <tr>
            <th>Category Id:</th>
            <td>{{ $game->category_id }}</td>
         </tr>
         <tr>
            <th>Created At:</th>
            <td>{{ $game->created_at }}</td>
         </tr>
      </tbody>
   </table>
@endsection