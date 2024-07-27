<!doctype html>
<html lang="en">
<head>
    <title>Create transport</title>
</head>
<body>
<h1>Create transport</h1>
<form action="{{route('admin.transports.store')}}" method="POST">
    @csrf
    <label for="name">Transport Name:</label>
    <input type="text" id="name" name="name" required>

    <label for="price">Fare price:</label>
    <input type="number" id="price" name="price" required>

    <label for="city_id">City:</label>
    <select id="cities_id" name="cities_id" required>
        @foreach($cities as $city)
            <option value="{{ $city->id }}">{{ $city->name }}</option>
        @endforeach
    </select>
    <button type="submit">Save</button>
</form>
</body>
</html>
