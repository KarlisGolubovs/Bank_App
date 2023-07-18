@if ($searchedCurrency && $exchangeRate)
    <div class="mt-4 border rounded p-4">
        <h2 class="text-xl font-bold mb-2">Exchange Rate for {{ $searchedCurrency }}:</h2>
        <p class="text-lg">1 {{ $searchedCurrency }} = {{ $exchangeRate }} EUR</p>
    </div>
@elseif ($searchedCurrency)
    <div class="mt-4">
        <p class="text-lg">No exchange rate found for {{ $searchedCurrency }}</p>
    </div>
@endif
