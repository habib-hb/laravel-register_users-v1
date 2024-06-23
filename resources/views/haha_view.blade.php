<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
      
    </head>
    <body class="font-sans antialiased dark:bg-black dark:text-white/50">



    <p>Haha blade</p>



    <form action="{{ route('haha') }}" method="POST">
    @csrf
    <input type="text" name="laugh" placeholder='a'>
   
    <button type="submit">Create Haha</button>
    </form>



    <div>
        <br><br>
        <h2 style="color:blue">{{$user_personality_type}}</h2>
        <br><br>

    </div>



    @if(session('message') == 'The haha was uploaded successfully...!!')

    <h2 style='color:red'>{{session('message')}}</h2>

    @endif




    @if(session('message') == 'Alas! You may cry! The data got lost somehow!!')

        <h2 style='color:red'>{{session('message')}}</h2>

    @endif



    @if($hahas)
        
        @foreach($hahas as $haha)
            <h3>{{$haha->laugh}}</h3>
        @endforeach

    @endif



    </body>
</html>