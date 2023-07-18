@extends('layouts.app')

@section('content')
    <div class="mx-auto max-w-sm rounded bg-white p-6 shadow-md">
        <h1 class="mb-6 text-2xl font-bold">Currency Exchange</h1>

        <form method="POST" action="/convert">
            @csrf <!-- Add CSRF protection -->

            <div class="mb-4">
                <label for="amount" class="block text-gray-700">Amount:</label>
                <input type="number" name="amount" id="amount" step="0.01" required class="mt-1 w-full rounded border border-gray-300 px-3 py-2">
            </div>

            <div class="mb-4">
                <label for="from" class="block text-gray-700">From:</label>
                <select name="from" id="from" required class="mt-1 w-full rounded border border-gray-300 px-3 py-2">
                    @foreach($currencies as $currency)
                        <option value="{{ $currency->ID }}">{{ $currency->CurrencyName }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="to" class="block text-gray-700">To:</label>
                <select name="to" id="to" required class="mt-1 w-full rounded border border-gray-300 px-3 py-2">
                    @foreach($currencies as $currency)
                        <option value="{{ $currency->ID }}">{{ $currency->CurrencyName }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mt-6">
                <button type="submit" class="rounded bg-blue-500 px-4 py-2 text-white hover:bg-blue-600">Convert</button>
            </div>
        </form>
    </div>
@endsection
