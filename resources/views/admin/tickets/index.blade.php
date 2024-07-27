<!doctype html>
<html lang="en">
<head>
    <title>Tickets</title>
</head>
<body>
<h1>List of tickets</h1>
<a href="{{session('previous_url', route('admin.dashboard')) }}">Back</a>
<br>
<a href="{{route('admin.tickets.create')}}">Add new ticket</a>

<ul>
    @foreach($tickets as $ticket)
        <li>
            {{$ticket->type}}
            <a href="{{route('admin.tickets.edit', $ticket->id)}}">Edit</a>
            <form action="{{route('admin.tickets.destroy', $ticket->id)}}"
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
