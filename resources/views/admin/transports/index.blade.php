<!doctype html>
<html lang="en">
<head>
    <title>Transports</title>
</head>
<body>
<h1>List of transports</h1>
<a href="{{session('previous_url', route('admin.dashboard')) }}">Back</a>
<br>
<a href="{{route('admin.transports.create')}}">Add new transport</a>

<ul>
    @foreach($transports as $transport)
        <li>
            {{$transport->name}} - {{$transport->price}}
            <a href="{{route('admin.transports.edit', $transport->id)}}">Edit</a>
            <form action="{{route('admin.transports.destroy', $transport->id)}}"
                  method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        </li>
    @endforeach
    {{ $transports->links() }}
</ul>
</body>
</html>
