<table class="min-w-full divide-y divide-gray-200">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
    <thead>
    <tr>
        <th class="bg-gray-50 px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">Rank</th>
        <th class="bg-gray-50 px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">Name</th>
        <th class="bg-gray-50 px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">Symbol</th>
        <th class="bg-gray-50 px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">
            <button class="focus:outline-none" onclick="sortTable('price')">Price (EUR)</button>
        </th>
        <th class="bg-gray-50 px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">
            <button class="focus:outline-none" onclick="sortTable('market_cap')">Market Cap (EUR)</button>
        </th>
    </tr>
    </thead>
    <tbody class="divide-y divide-gray-200 bg-white">
    <div class="my-4">
        <a href="{{ route('dashboard') }}" class="flex items-center rounded bg-blue-500 px-4 py-2 font-bold text-white hover:bg-blue-700">
            <svg class="mr-2 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
            Back
        </a>
    </div>

    @foreach ($coins as $coin)
        <tr>
            <td class="whitespace-nowrap px-6 py-4">{{ $coin['cmc_rank'] }}</td>
            <td class="whitespace-nowrap px-6 py-4">{{ $coin['name'] }}</td>
            <td class="whitespace-nowrap px-6 py-4">{{ $coin['symbol'] }}</td>
            <td class="whitespace-nowrap px-6 py-4">{{ $coin['quote']['EUR']['price'] }}</td>
            <td class="whitespace-nowrap px-6 py-4">{{ $coin['quote']['EUR']['market_cap'] }}</td>
        </tr>
        <tr>
            <td colspan="5" class="px-6">
                <div class="border-t border-gray-300 opacity-50"></div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

<script>
    function sortTable(column) {
        var table, rows, switching, i, x, y, shouldSwitch;
        table = document.querySelector("table");
        switching = true;
        while (switching) {
            switching = false;
            rows = table.getElementsByTagName("tr");
            for (i = 1; i < rows.length - 1; i++) {
                shouldSwitch = false;
                x = rows[i].getElementsByTagName("td")[column].textContent.toLowerCase();
                y = rows[i + 1].getElementsByTagName("td")[column].textContent.toLowerCase();
                if (x > y) {
                    shouldSwitch = true;
                    break;
                }
            }
            if (shouldSwitch) {
                rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                switching = true;
            }
        }
    }
</script>
