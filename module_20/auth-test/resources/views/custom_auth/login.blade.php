<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>

    <!-- Milligram CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/milligram/1.4.1/milligram.css">

    <style>
        body {
            background: #f4f5f6;
        }
        .login-box {
            max-width: 420px;
            margin: 80px auto;
            padding: 30px;
            background: #ffffff;
            border-radius: 6px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.08);
        }
        h1 {
            text-align: center;
            margin-bottom: 30px;
        }
        button {
            width: 100%;
        }
    </style>
</head>
<body>

<div class="login-box">
    <h1>Custom Login</h1>

    <form method="POST" action="{{route('login.submit')}}">
        @csrf

        <label>Email</label>
        <input type="email" name="email" placeholder="Enter your email" required>

        <label>Password</label>
        <input type="password" name="password" placeholder="Enter your password" required>

        <button class="button-primary" type="submit">Login</button>
    </form>
</div>

</body>
</html>
