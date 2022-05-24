@extends('layouts.app2')

@section('content')
<h1 class="text-4xl text-center font-semibold my-10 bg-neutral-400 text-white">
   Conditional: if - else -endif
</h1>

   @php $ndayweek = date('w'); @endphp
   @if( $ndayweek == 1 )
      <h3 class="text-center"> Today is Monday </h3>
   @elseif( $ndayweek == 2 )
      <h3 class="text-center"> Today is Tuesday </h3>
   @elseif( $ndayweek == 3 )
      <h3 class="text-center"> Today is Wednesday </h3>
   @elseif( $ndayweek == 4 )
      <h3 class="text-center"> Today is Thursday </h3>
   @elseif( $ndayweek == 5 )
      <h3 class="text-center"> Today is Friday </h3>
   @elseif( $ndayweek == 6 )
      <h3 class="text-center"> Today is Saturday </h3>
   @else
      <h3 class="text-center"> Today is Sunday </h3>
   @endif

   {{--  --}}
   <h2 class="text-4xl text-center font-semibold my-10 bg-neutral-400 text-white">
      Conditional: switch
   </h2>
   @php $num = rand(1, 6) @endphp
   @switch($num)
      @case(1)
         <h3 class="text-center">Number 1 in the game</h3>
         @break
      @case(2)
         <h3 class="text-center">Number 2 in the game</h3>
         @break
      @case(3)
         <h3 class="text-center">Number 3 in the game</h3>
         @break
      @case(4)
         <h3 class="text-center">Number 4 in the game</h3>
         @break
      @case(5)
         <h3 class="text-center">Number 5 in the game</h3>
         @break
      @default
         <h3 class="text-center">Number 6 in the game</h3>
         @break
   @endswitch

   @php $hour = date('H') @endphp
   @switch($hour)
       @case(1)
       @case(2)
       @case(3)
       @case(4)
       @case(5)
       @case(6)
           <h3 class="text-center text-2xl font-normal p-4">
               It's too early 😁
           </h3> 
           @break
       @case(7)
       @case(8)
           <h3 class="text-center text-2xl font-normal p-4">
               Good morning guys 😁
           </h3> 
           @break
       @case(9)
       @case(10)
       @case(11)
       @case(12)
       @case(13)
           <h3 class="text-center text-2xl font-normal p-4">
               Good afternoon guys 😁
           </h3> 
           @break
       @case(14)
       @case(15)
       @case(16)
       @case(17)
       @case(18)
           <h3 class="text-center text-2xl font-normal p-4">
               Good evening guys 😁
           </h3> 
           @break        
       @default
           <h3 class="text-center text-2xl font-normal p-4">
               Good night guys 😁
           </h3>
           
   @endswitch

   {{--  --}}
   <h2 class="text-4xl text-center font-semibold my-10 bg-neutral-400 text-white">
      Loops: foreach
   </h2>
   @php $colors = ['yellow', 'blue', 'red', 'black', 'green', 'purple'] @endphp
   <ol class="list-decimal flex flex-col gap-4 justify-items-center items-center">
      @foreach ($colors as $color)
         <li class="text-center font-medium" style="color: {{$color}}">
            {{$color}}
         </li>
      @endforeach
   </ol>

   {{--  --}}
   <h2 class="text-4xl text-center font-semibold my-10 bg-neutral-400 text-white">
      Loops: for
   </h2>
   <ul class="flex flex-row mx-auto gap-4 justify-center">
      @for ($i = 0; $i < 50; $i++)
          @if ($i % 5 == 0)
              <li class="bg-red-800 text-white p-2 rounded-2xl">
                  {{ $i }}
              </li>
          @endif
      @endfor
   </ul>

   {{--  --}}
    <h2 class="text-4xl text-center font-semibold my-10 bg-neutral-400 text-white">
      Loops: while
   </h2>
   @php $i = 0 @endphp
   <ul class="flex flex-row mx-auto gap-4 justify-center">
      @while ($i < 50)
         @if ($i % 10 == 0)
            <li class="bg-rose-800 text-white p-2 rounded-2xl">
               {{ $i }}
            </li>
         @endif
         @php $i++ @endphp
      @endwhile
   </ul>

   {{--  --}}
   <h1 class="text-4xl text-center font-semibold my-10 bg-neutral-400 text-white">
   loops: forelse
   </h1>
   @php $myArray = array("😋", "🤩", "😍"); @endphp
   @forelse ($myArray as $item)
      <p class="text-center my-2 first-line:font-semibold text-blue-900">emojis {{ $item }}</p>
   @empty
      <h1 class="text-center  font-semibold text-blue-900">aqui no hay emojis</h1>
   @endforelse

@endsection