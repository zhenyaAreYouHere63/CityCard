<!doctype html>
<html lang="en">
<head>
    <title>Create city</title>
</head>
<body>
    <h1>Create city</h1>
    <form action="{{route('admin.cities.store')}}" method="POST">
        @csrf
        <label for="name">City Name:</label>
        <input type="text" id="name" name="name" required>
        <button type="submit">Save</button>
    </form>
</body>
</html>
