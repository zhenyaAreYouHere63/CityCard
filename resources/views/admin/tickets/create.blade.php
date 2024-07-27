<!doctype html>
<html lang="en">
<head>
    <title>Create ticket</title>
</head>
<body>
<h1>Create ticket</h1>
<form action="{{route('admin.tickets.store')}}" method="POST">
    @csrf
    <label for="type">Type ticket:</label>
    <input type="text" id="type" name="type" required>

    <label for="card_id">Card:</label>
    <select id="card_id" name="card_id" required>
        @foreach($cards as $card)
            <option value="{{ $card->id }}">{{ $card->name }}</option>
        @endforeach
    </select>
    <button type="submit">Save</button>
</form>
</body>
</html>
