<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1 style="color: red;">This is View Test from blade</h1>

    <!-- using Raw php -->
    <?php
        $marks = 500;
    ?>

    <h2>Your marks is <?php echo $marks?></h2>

    <!-- Using Laravel -->

    @php
        $marks = 40;
    @endphp 
    <h2 style="color:green;">Your marks is {{$marks}}</h2>

    @if($marks >= 80)
        <h4>Your Grade is A+</h4>
    @elseif($marks >= 70)
        <h4>Your grade is A</h4>
    @else
        <h4>Your Grade is not A+</h4>
    @endif()


    <h2>Using Swith Case</h2>

    @php
        $day = 'Friday';
    @endphp
   
    @switch($day)
        @case('Monday')
            <h4>Today is Monday</h4>
            @break
        @case('Tuesday')
            <h4>Today is Tuesday</h4>
            @break
        @default
            <h4>Today is Off Day</h4>
    @endswitch

    <!-- <h2>For Loop</h2>
    @for($i = 0; $i <=10; $i++)
        <p>this is test forLoop</p>
        <h4> this Value {{$i}}</h4>
    @endfor -->


    @php
        $names = ['Robin', "Robiul", "hassan"];
    @endphp 

    <ul>
        @foreach($names as $name)
            <li>{{$name}}</li>
        @endforeach
    </ul>

    <h2>While Loop</h2>
    
    @php
        $marks = 80;
    @endphp

    <h4 style= "color: {{ $marks >= 80 ? 'green' : 'red'}}">Your Marks {{$marks}}</h4>

    @php
        $marks = 30;
        $color = $marks >= 80 ? 'green' : 'red';
    @endphp
    <h4 style= "color: {{$color}}">Your Marks {{$marks}}</h4>


</body>
</html>