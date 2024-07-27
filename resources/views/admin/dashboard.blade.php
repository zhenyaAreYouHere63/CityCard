<!doctype html>
<html lang="en">
<head>
    <title>Admin Dashboard</title>
</head>
<body>
    <header>
        <h1>Admin Dashboard</h1>
        <nav>
            <ul>
                <li><a href="{{route('admin.cities.index')}}">Cities</a></li>
                <li><a href="{{route('admin.transports.index')}}">Transports</a></li>
                <li><a href="{{route('admin.tickets.index')}}">Tickets</a></li>
            </ul>
        </nav>
    </header>
</body>
</html>
