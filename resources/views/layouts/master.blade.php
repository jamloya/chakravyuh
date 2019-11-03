<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Chakravyuh</title>
</head>


<body style="color: white; background-color: black">
    <header class="container mx-auto flex justify-between py-2">
        <h1 class="text-3xl font-mono font-bold text-orange-400">Chakravyuh</h1>
        <div class="flex items-center">
            @if(Auth::check())
            <img src="{{ Auth::user()->avatar_url }}" alt="{{ Auth::user()->name }}" class="rounded-full mr-3 h-8">
            <span class="py-2 text-lg">
                {{ Auth::user()->name }}
            </span>
            <form action="/logout" method="POST" class="ml-4">
                @csrf
                <button type="submit" class="px-3 py-1 bg-red-500 text-white text-xs font-bold rounded">Logout</button>
            </form>
            @endif
        </div>
    </header>
    

    <div class="container">
        @yield('content')
    </div>
    <script type="text/javascript">
    var counter=0;
    function addHints()
    {
    var form=document.getElementById("questionform");
    var hint=document.createElement('input')
    hint.type="text";
    hint.name="hints["+counter+"]";
    form.appendChild(hint);
    counter+=1;
    }
    
    </script>
    <script src="{{asset('js/app.js')}}"></script>
</body>

</html>