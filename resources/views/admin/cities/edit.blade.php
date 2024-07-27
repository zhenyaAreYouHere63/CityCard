<!doctype html>
<html lang="en">
<head>
    <title>Edit city</title>
</head>
<body>
<h1>Edit city</h1>
<form action="{{route('admin.cities.update', $city->id)}}" method="POST">
    @csrf
    @method('PATCH')
    <label for="name">City Name:</label>
    <input type="text" id="name" name="name" value="{{$city->name}}" required>
    <button type="submit">Save</button>
</form>
</body>
</html>
