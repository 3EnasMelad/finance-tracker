<x-app-layout>
<div class="container mt-5">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="text-primary">Transactions History</h2>
        <a href="{{ route('dashboard') }}" class="btn btn-secondary">Back to Dashboard</a>
    </div>

    <div class="row g-4">
        <!-- Incomes -->
        <div class="col-md-6">
            <div class="card shadow-sm p-3">
                <h5>Incomes</h5>
                <table class="table table-sm table-bordered mb-0">
                    <tr><th>Amount</th><th>Date</th></tr>
                    @foreach($incomes as $i)
                        <tr>
                            <td>${{ $i->amount }}</td>
                            <td>{{ $i->created_at->format('d M Y H:i') }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>

        <!-- Expenses -->
        <div class="col-md-6">
            <div class="card shadow-sm p-3">
                <h5>Expenses</h5>
                <table class="table table-sm table-bordered mb-0">
                    <tr><th>Name</th><th>Category</th><th>Amount</th><th>Date</th></tr>
                    @foreach($expenses as $e)
                        <tr>
                            <td>{{ $e->name }}</td>
                            <td>{{ $e->category }}</td>
                            <td>${{ $e->amount }}</td>
                            <td>{{ $e->created_at->format('d M Y H:i') }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>

</div>
</x-app-layout>
