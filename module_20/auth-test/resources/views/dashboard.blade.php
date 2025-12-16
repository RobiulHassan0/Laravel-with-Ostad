<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <h1>Welcome to Dashboard</h1>

    @php
       $userInfo = \App\Models\CustomModel::find(session('custom_user_id'));
    @endphp 

    <p>Your Name: {{$userInfo->name}}</p>
    <p>Your Name: {{$userInfo->email}}</p>
    <p>Your Name: {{$userInfo->pasword}}</p>

    <button><a href="{{route('custom.logout')}}">Log Out</a></button>
</body>
</html>