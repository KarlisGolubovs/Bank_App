<div class="mx-auto mt-8 max-w-sm">
    <div class="rounded-lg bg-gray-100 p-6 shadow-lg">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
        <x-jet-validation-errors class="mb-4" />
        <form method="POST" action="{{ route('accounts') }}" class="space-y-6">
            @csrf
            <div class="mb-4">
                <label class="mb-2 block text-sm font-bold text-gray-700" for="account_type">Account Type</label>
                <select class="focus:shadow-outline w-full appearance-none rounded border px-3 py-2 leading-tight text-gray-700 focus:outline-none" id="account_type" name="account_type" required>
                    <option value="savings">Savings</option>
                    <option value="current">Current</option>
                    <option value="checking">Checking</option>
                </select>
            </div>
            <div class="mt-4 flex items-center justify-between">
                <a href="{{ route('dashboard') }}" class="text-sm text-gray-600 underline hover:text-gray-900">Back to Dashboard</a>

                <a href="{{ route('create.account') }}" class="focus:shadow-outline rounded bg-blue-500 px-4 py-2 font-bold text-white focus:outline-none"> Create Account </a>
            </div>
            <div class="mt-4 flex items-center justify-between">
                <a href="{{ route('dashboard') }}" class="text-sm text-gray-600 underline hover:text-gray-900">Back to Dashboard</a>

                <button type="submit" class="focus:shadow-outline rounded bg-indigo-500 px-4 py-2 font-bold text-white focus:outline-none">Create Account</button>
            </div>
        </form>
    </div>
</div>
