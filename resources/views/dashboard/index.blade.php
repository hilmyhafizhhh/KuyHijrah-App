@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-4 border-bottom">
        <h1 class="h2">Welcome back, <span class="text-primary">{{ auth()->user()->name }}</span></h1>
    </div>

    {{-- Summary Cards --}}
    <div class="row g-3">
        <div class="col-md-4">
            <div class="card shadow-sm border-0 bg-light">
                <div class="card-body">
                    <h6 class="text-muted">Total News</h6>
                    <h3 class="fw-bold">{{ $newsCount }}</h3>
                    <span class="text-secondary small">All time</span>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm border-0 bg-light">
                <div class="card-body">
                    <h6 class="text-muted">Total Categories</h6>
                    <h3 class="fw-bold">{{ $categoryCount }}</h3>
                    <span class="text-secondary small">All time</span>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm border-0 bg-light">
                <div class="card-body">
                    <h6 class="text-muted">Total Sources</h6>
                    <h3 class="fw-bold">{{ $sourceCount }}</h3>
                    <span class="text-secondary small">All time</span>
                </div>
            </div>
        </div>
    </div>

    {{-- Charts Section --}}
    <div class="row mt-5 g-4">
        {{-- News per Category --}}
        <div class="col-md-6">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body">
                    <h6 class="card-title text-muted">News per Category</h6>
                    <canvas id="newsCategoryChart" height="200"></canvas>
                </div>
            </div>
        </div>

        {{-- News per Source --}}
        <div class="col-md-6">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body">
                    <h6 class="card-title text-muted">News per Source</h6>
                    <canvas id="newsSourceChart" height="200"></canvas>
                </div>
            </div>
        </div>
    </div>

    {{-- Chart.js CDN --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // News per Category Bar Chart
        new Chart(document.getElementById('newsCategoryChart').getContext('2d'), {
            type: 'bar',
            data: {
                labels: {!! json_encode($categoryNames) !!},
                datasets: [{
                    label: 'Jumlah Berita',
                    data: {!! json_encode($newsCounts) !!},
                    backgroundColor: '#3b82f6',
                    borderRadius: 5
                }]
            },
            options: {
    responsive: true,
    animation: {
        duration: 0 // disable global animation, kita pakai yang lebih custom di bawah
    },
    animations: {
        y: {
            type: 'number',
            easing: 'easeOutQuart',
            duration: 1000,
            from: (ctx) => ctx.chart.scales.y.min,
            delay: (ctx) => ctx.dataIndex * 200
        }
    },
    plugins: {
        legend: { display: false },
        tooltip: {
            backgroundColor: '#3b82f6',
            titleFont: { weight: 'bold' },
            bodyFont: { weight: 'normal' },
            padding: 10
        }
    },
    scales: {
        x: {
            grid: {
                display: false
            }
        },
        y: {
            beginAtZero: true,
            ticks: { precision: 0 },
            grid: {
                color: '#e5e7eb'
            }
        }
    }
}
        });

        // News per Source Pie Chart
        new Chart(document.getElementById('newsSourceChart').getContext('2d'), {
            type: 'pie',
            data: {
                labels: {!! json_encode($sourceNames) !!},
                datasets: [{
                    label: 'Jumlah Berita',
                    data: {!! json_encode($sourceCounts) !!},
                    backgroundColor: [
                        '#60a5fa', '#3b82f6', '#6366f1', '#8b5cf6',
                        '#ec4899', '#f59e0b', '#10b981', '#14b8a6'
                    ],
                    borderColor: '#fff',
                    borderWidth: 2
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            boxWidth: 15,
                            padding: 15
                        }
                    }
                }
            }
        });
    </script>
@endsection
