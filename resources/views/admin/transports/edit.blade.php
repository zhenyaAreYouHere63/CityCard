<!doctype html>
<html lang="en">
<head>
    <title>Edit transport</title>
</head>
<body>
<h1>Edit transport</h1>
<form action="{{route('admin.transports.update', $transport->id)}}" method="POST">
    @csrf
    @method('PATCH')
    <label for="name">Transport Name:</label>
    <input type="text" id="name" name="name" value="{{$transport->name}}" required>

    <label for="name">Transport price:</label>
    <input type="number" id="price" name="price" value="{{$transport->price}}" required>
    <button type="submit">Save</button>
</form>
</body>
</html>
