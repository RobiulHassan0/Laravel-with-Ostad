<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    {{-- Data pass by Array --}}

    {{-- <h2>My Name is {{$myName}} and my age is {{$myAge}}</h2> --}}


    {{-- Data pass by Compact --}}
    {{-- <h2>My First Name is {{$firstName}} and my Last name is {{$lastName}}</h2> --}}
    
    {{-- <h2>My proffestion is {{$proff}} </h2>
    <p>My Name is: {{$information['name']}} <br>
        My Age is: {{$information['age']}}, <br> 
        and I live in: {{$information['address']}}
    </p> --}}
    
    {{-- Complex Data pass by using Compact method 0 --}}

    {{-- <p>My proffestion is: {{$proffession}}</p>
    <p>
        I am a {{$info['name']}}
    </p> --}}

    {{-- Data Pass with Method  --}}

    <p>{{$greeting}} . my nam is {{$name}}</p>

</body>
</html>