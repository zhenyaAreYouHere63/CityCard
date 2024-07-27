<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
</head>
<body>
<form action="{{route('login')}}" method="POST">
    @csrf
    <div>
        <label for="number">Number of card:</label>
        <input type="text" id="number" name="number" required>
    </div>
    <div>
        <label for="phone_number">Phone number:</label>
        <input type="text" id="phone_number" name="phone_number" required>
    </div>
    <button type="submit">Login</button>
</form>

@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
</body>
</html>
