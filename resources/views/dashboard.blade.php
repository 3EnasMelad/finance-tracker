<x-app-layout>
<div class="container mt-5">

    <!-- Navbar Dashboard -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-primary">Finance Tracker Dashboard</h2>
        <a href="{{ route('welcome') }}" class="btn btn-secondary">Back to Welcome</a>
    </div>

    <!-- Alerts -->
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('warning'))
        <div class="alert alert-warning">{{ session('warning') }}</div>
    @endif

    <!-- Budget Warning Modal -->
    <div class="modal fade" id="budgetWarningModal" tabindex="-1" aria-labelledby="budgetWarningLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-danger">
          <div class="modal-header bg-danger text-white">
            <h5 class="modal-title" id="budgetWarningLabel">Budget Alert!</h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <p id="budgetWarningMessage"></p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

    <div class="row g-4">
        <!-- Add Budget Form -->
        <div class="col-md-4">
            <div class="card shadow-sm p-3">
                <h5 class="card-title">Add Budget</h5>
                <form method="POST" action="{{ route('add-budget') }}">
                    @csrf
                    <input type="text" name="category" class="form-control mb-2" placeholder="Category" required>
                    <input type="number" step="0.01" name="limit_amount" class="form-control mb-2" placeholder="Limit" required>
                    <button class="btn btn-primary w-100">Set Budget</button>
                </form>
            </div>
        </div>

        <!-- Add Income Form -->
        <div class="col-md-4">
            <div class="card shadow-sm p-3">
                <h5 class="card-title">Add Income</h5>
                <form method="POST" action="{{ route('add-income') }}">
                    @csrf
                    <input type="number" step="0.01" name="amount" class="form-control mb-2" placeholder="Amount" required>
                    <button class="btn btn-success w-100">Add Income</button>
                </form>
            </div>
        </div>

        <!-- Add Expense Form -->
        <div class="col-md-4">
            <div class="card shadow-sm p-3">
                <h5 class="card-title">Add Expense</h5>
                <form method="POST" action="{{ route('add-expense') }}">
                    @csrf
                    <input type="text" name="name" class="form-control mb-2" placeholder="Expense Name" required>
                    <input type="number" step="0.01" name="amount" class="form-control mb-2" placeholder="Amount" required>
                    <input type="text" name="category" class="form-control mb-2" placeholder="Category" required>
                    <button class="btn btn-danger w-100">Add Expense</button>
                </form>
            </div>
        </div>
    </div>

    <hr class="my-4">

    <!-- Tables -->
    <div class="row g-4">
        <div class="col-md-4">
            <div class="card shadow-sm p-3">
                <h5>Budgets</h5>
                <table class="table table-sm table-bordered mb-0">
                    <tr><th>Category</th><th>Limit</th></tr>
                    @foreach($budgets as $b)
                        @if($b->user_id == auth()->id())
                            <tr><td>{{ $b->category }}</td><td>${{ $b->limit_amount }}</td></tr>
                        @endif
                    @endforeach
                </table>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm p-3">
                <h5>Incomes</h5>
                <table class="table table-sm table-bordered mb-0">
                    <tr><th>Amount</th></tr>
                    @foreach($incomes as $i)
                        @if($i->user_id == auth()->id())
                            <tr><td>${{ $i->amount }}</td></tr>
                        @endif
                    @endforeach
                </table>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm p-3">
                <h5>Expenses</h5>
                <table class="table table-sm table-bordered mb-0">
                    <tr><th>Name</th><th>Category</th><th>Amount</th></tr>
                    @foreach($expenses as $e)
                        @if($e->user_id == auth()->id())
                            <tr><td>{{ $e->name }}</td><td>{{ $e->category }}</td><td>${{ $e->amount }}</td></tr>
                        @endif
                    @endforeach
                </table>
            </div>
        </div>
    </div>

    <div class="mt-4">
        <h5>Balance: <span class="text-success">${{ $balance }}</span></h5>
        <div class="mt-3 d-flex gap-2">
            <a href="{{ route('transactions') }}" class="btn btn-info">Transactions History</a>
            <a href="{{ route('overview') }}" class="btn btn-warning">Overview Charts</a>
        </div>
    </div>

</div>

<!-- Bootstrap JS (for Modal) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

@if(session('budget_warning'))
<script>
document.addEventListener('DOMContentLoaded', function() {
    const message = @json(session('budget_warning'));
    document.getElementById('budgetWarningMessage').textContent = message;

    const modal = new bootstrap.Modal(document.getElementById('budgetWarningModal'));
    modal.show();
});
</script>
@endif

</x-app-layout>
