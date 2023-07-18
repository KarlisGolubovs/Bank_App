<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Account;

class AccountController extends Controller
{
    public function createAccount(Request $request): RedirectResponse
    {
        // Get the authenticated user
        $user = $request->user();

        // Generate a unique account number
        $accountNumber = $this->generateUniqueAccountNumber();

        // Retrieve the selected account type from the request
        $accountType = $request->input('account_type');

        // Create the account
        $account = Account::create([
            'user_id' => $user->id,
            'account_number' => $accountNumber,
            'account_type' => $accountType,
            'balance' => 0,
        ]);

        // Associate the account with the user
        $user->account()->associate($account);
        $user->save();

        return redirect()->route('account')->with('success', 'Account created successfully!');
    }

    public function index()
    {
        // Get the authenticated user
        $user = auth()->user();

        // Retrieve the user's accounts
        $accounts = $user->account;

        return view('account', compact('accounts'));
    }

    public function createAccountPage()
    {
        return view('Account.create-account');
    }

    private function generateUniqueAccountNumber(): string
    {
        $timestamp = now()->timestamp;
        $randomDigits = mt_rand(1000, 9999);
        $bankCode = "HEHE";
        return "LV" . $bankCode . $timestamp . $randomDigits;
    }
}
