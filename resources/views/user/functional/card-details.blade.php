<h1>Баланс картки: {{ $balance }}</h1>

<h2>Історія поїздок</h2>
<ul>
    @foreach($tripHistory as $trip)
        <li>{{ $trip->route }} - {{ $trip->date }}</li>
    @endforeach
</ul>

<h2>Історія поповнень</h2>
<ul>
    @foreach($topUpHistory as $topUp)
        <li>{{ $topUp->replenishment }} - {{ $topUp->date }}</li>
    @endforeach
</ul>

<h2>Історія витрат</h2>
<ul>
    @foreach($costHistory as $cost)
        <li>{{ $cost->expense }} - {{ $cost->date }}</li>
    @endforeach
</ul>
