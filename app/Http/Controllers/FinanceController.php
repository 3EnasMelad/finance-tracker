<?php

namespace App\Http\Controllers;

use App\Models\Income;
use App\Models\Expense;
use App\Models\Budget;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FinanceController extends Controller
{
    // Dashboard
    public function index()
    {
        $userId = Auth::id();

        $incomes = Income::where('user_id', $userId)->get();
        $expenses = Expense::where('user_id', $userId)->get();
        $budgets = Budget::where('user_id', $userId)->get();

        $totalIncome = $incomes->sum('amount');
        $totalExpenses = $expenses->sum('amount');
        $balance = $totalIncome - $totalExpenses;

        return view('dashboard', compact(
            'incomes',
            'expenses',
            'budgets',
            'totalIncome',
            'totalExpenses',
            'balance'
        ));
    }
// add incoomeeeeeeeeeee
    public function addIncome(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:0'
        ]);

        Income::create([
            'amount' => $request->amount,
            'user_id' => Auth::id()
        ]);

        return back()->with('success', 'Income added successfully!');
    }

    // add expeeeeeeeeeense

    public function addExpense(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'amount' => 'required|numeric|min:0',
        'category' => 'required|string|max:255'
    ]);

    $expense = new Expense();
    $expense->name = $request->name;
    $expense->category = $request->category;
    $expense->amount = $request->amount;
    $expense->user_id = auth()->id();
    $expense->save();
// ----------------------------------------------------
    $budget = Budget::where('category', $request->category)
                    ->where('user_id', auth()->id())
                    ->first();

    if ($budget) {
        $spent = Expense::where('category', $request->category)
                        ->where('user_id', auth()->id())
                        ->sum('amount');

        if ($spent > $budget->limit_amount) {
            return back()->with('budget_warning', "You have exceeded your budget for {$request->category}!");
        } elseif ($spent >= $budget->limit_amount * 0.8) {
            return back()->with('budget_warning', "You are approaching your budget limit for {$request->category}!");
        }
    }

    return back()->with('success', 'Expense added successfully!');
}

    public function addBudget(Request $request)
    {
        $request->validate([
            'category' => 'required|string|max:255',
            'limit_amount' => 'required|numeric|min:0'
        ]);

        Budget::updateOrCreate(
            ['category' => $request->category, 'user_id' => Auth::id()],
            ['limit_amount' => $request->limit_amount]
        );

        return back()->with('success', 'Budget set successfully!');
    }

    //  Transactions
    public function transactions()
    {
        $userId = Auth::id();
        $incomes = Income::where('user_id', $userId)->orderBy('created_at', 'desc')->get();
        $expenses = Expense::where('user_id', $userId)->orderBy('created_at', 'desc')->get();

        return view('transactions', compact('incomes', 'expenses'));
    }

    //  Overview Charts
    public function overview()
    {
        $userId = Auth::id();
        $incomes = Income::where('user_id', $userId)->get();
        $expenses = Expense::where('user_id', $userId)->get();

        return view('overview', compact('incomes', 'expenses'));
    }
}
