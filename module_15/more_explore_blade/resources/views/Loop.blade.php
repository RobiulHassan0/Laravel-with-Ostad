<body>
    {{-- <ul></ul>
        @for ($i = 0; $i < 100; $i++)
            <li>{{ $i }}</li>

            
        
        @endfor
    </ul> --}}

    <ul>
        @foreach ($users as $eachUser)
    <li>User name is = {{ $eachUser['name']}} and city is = {{ $eachUser['city'] }}</li>        
        @endforeach
    </ul>
</body>