<x-app-layout>
<div class="container mt-5">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="text-primary">Overview Charts</h2>
        <a href="{{ route('dashboard') }}" class="btn btn-secondary">Back to Dashboard</a>
    </div>

    <canvas id="financeChart" width="400" height="200"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const ctx = document.getElementById('financeChart').getContext('2d');

// جهز البيانات من PHP
const incomes = @json($incomes->pluck('amount'));
const expenses = @json($expenses->pluck('amount'));

// حوّل التواريخ في PHP قبل الـ JSON
const labels = @json(
    $incomes->pluck('created_at')->map(fn($d) => \Carbon\Carbon::parse($d)->format('d M Y'))
);

new Chart(ctx, {
    type: 'bar',
    data: {
        labels: labels,
        datasets: [
            { label: 'Incomes', data: incomes, backgroundColor: 'green' },
            { label: 'Expenses', data: expenses, backgroundColor: 'red' },
        ]
    },
    options: { responsive: true }
});
</script>
</x-app-layout>
