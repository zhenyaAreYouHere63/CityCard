<!doctype html>
<html lang="en">
<head>
    <title>Cities</title>
</head>
<body>
<h1>List of cities</h1>
<a href="{{session('previous_url', route('admin.dashboard')) }}">Back</a>
<br>
<a href="{{route('admin.cities.create')}}">Add new city</a>

<ul>
    @foreach($cities as $city)
        <li>
            {{$city->name}}
            <a href="{{route('admin.cities.edit', $city->id)}}">Edit</a>
            <form action="{{route('admin.cities.destroy', $city->id)}}"
                  method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        </li>
    @endforeach
</ul>
</body>
</html>
