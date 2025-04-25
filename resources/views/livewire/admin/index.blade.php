<div class="grid grid-cols-1 md:grid-cols-1 gap-6">
    <!-- Summary Card -->
    <div class="bg-white rounded-xl shadow-lg p-6 flex items-center justify-between">
        <div>
            <h2 class="text-lg font-semibold text-gray-700">Total Students</h2>
            <p class="text-3xl font-bold text-blue-700">{{ $totalStudents }}</p>
        </div>
        <div>
            <h2 class="text-lg font-semibold text-gray-700">Total Parties</h2>
            <p class="text-3xl font-bold text-red-600">{{ $totalParties }}</p>
        </div>
    </div>

    <!-- Vote per Party Stats -->
    <div class="bg-white rounded-xl shadow-lg p-6">
        <h2 class="text-lg font-semibold text-gray-700 mb-4">Votes per Party</h2>
        <canvas id="votesChart" height="100"></canvas>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const ctx = document.getElementById('votesChart').getContext('2d');

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: @json($votesData->pluck('name')),
                datasets: [{
                    label: 'Votes',
                    data: @json($votesData->pluck('votes')),
                    backgroundColor: @json($votesData->pluck('color')),
                    borderRadius: 8,
                    barThickness: 40
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: { color: '#4B5563' },
                        grid: { color: '#E5E7EB' }
                    },
                    x: {
                        ticks: { color: '#4B5563' },
                        grid: { display: false }
                    }
                },
                plugins: { legend: { display: false } }
            }
        });
    });
</script>
