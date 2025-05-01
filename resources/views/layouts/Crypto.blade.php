<h1>Top 10 Cryptocurrencies</h1>

<ul>
    @foreach($data['data'] as $coin)
        <li>{{ $coin['name'] }} ({{ $coin['symbol'] }}): ${{ number_format($coin['quote']['USD']['price'], 2) }}</li>
    @endforeach
</ul>
