<!doctype html>
<html lang="en">
<head>
    <title>Edit ticket</title>
</head>
<body>
<h1>Edit ticket</h1>
<form action="{{route('admin.tickets.update', $ticket->id)}}" method="POST">
    @csrf
    @method('PATCH')
    <label for="type">Ticket Name:</label>
    <input type="text" id="type" name="type" value="{{$ticket->type}}" required>
    <button type="submit">Save</button>
</form>
</body>
</html>
