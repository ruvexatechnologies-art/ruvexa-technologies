@extends('dashboard.layout')

@section('content')
<!-- Welcome Banner -->
<div class="card border-0 shadow-sm mb-4" style="background: linear-gradient(135deg, #4F46E5 0%, #3B82F6 100%); border-radius: 16px; overflow: hidden; position: relative;">
    <div style="position: absolute; top: -50px; right: -20px; width: 200px; height: 200px; background: rgba(255,255,255,0.1); border-radius: 50%;"></div>
    <div style="position: absolute; bottom: -50px; right: 100px; width: 100px; height: 100px; background: rgba(255,255,255,0.05); border-radius: 50%;"></div>
    
    <div class="card-body p-4 p-md-5 text-white position-relative z-1">
        <h3 class="fw-bold mb-2">Welcome back, {{ Auth::user()->name ?? 'Admin' }}! 👋</h3>
        <p class="mb-4 opacity-75" style="font-size: 1.05rem;">Here is what's happening with Ruvexa Technologies today.</p>
        <div class="d-flex flex-wrap gap-3">
            <a href="#" class="btn btn-light text-primary fw-bold rounded-pill px-4"><i class="bi bi-envelope-paper me-2"></i> Read Inquiries</a>
            <a href="#" class="btn btn-outline-light fw-bold rounded-pill px-4"><i class="bi bi-gear me-2"></i> Manage Settings</a>
        </div>
    </div>
</div>

<!-- Stats Cards Row -->
<div class="row g-4 mb-4">
    <div class="col-md-6 col-xl-3">
        <div class="card border-0 shadow-sm h-100" style="border-radius: 16px;">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between mb-3">
                    <div class="rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px; background: #ECFDF5; color: #10B981;">
                        <i class="bi bi-currency-dollar fs-4"></i>
                    </div>
                    <span class="badge bg-success bg-opacity-10 text-success rounded-pill px-2 py-1"><i class="bi bi-arrow-up-right me-1"></i> +12.5%</span>
                </div>
                <p class="text-muted fw-semibold mb-1 text-uppercase" style="font-size: 0.75rem; letter-spacing: 0.5px;">Total Revenue</p>
                <h3 class="fw-bold mb-0 text-dark">$24,500</h3>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-3">
        <div class="card border-0 shadow-sm h-100" style="border-radius: 16px;">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between mb-3">
                    <div class="rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px; background: #EFF6FF; color: #3B82F6;">
                        <i class="bi bi-briefcase fs-4"></i>
                    </div>
                    <span class="badge bg-primary bg-opacity-10 text-primary rounded-pill px-2 py-1"><i class="bi bi-arrow-up-right me-1"></i> +3</span>
                </div>
                <p class="text-muted fw-semibold mb-1 text-uppercase" style="font-size: 0.75rem; letter-spacing: 0.5px;">Active Projects</p>
                <h3 class="fw-bold mb-0 text-dark">{{ $activeProjects }}</h3>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-3">
        <div class="card border-0 shadow-sm h-100" style="border-radius: 16px;">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between mb-3">
                    <div class="rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px; background: #FEF2F2; color: #EF4444;">
                        <i class="bi bi-envelope-paper fs-4"></i>
                    </div>
                    <span class="badge bg-danger bg-opacity-10 text-danger rounded-pill px-2 py-1"><i class="bi bi-arrow-down-right me-1"></i> -1.2%</span>
                </div>
                <p class="text-muted fw-semibold mb-1 text-uppercase" style="font-size: 0.75rem; letter-spacing: 0.5px;">Total Inquiries</p>
                <h3 class="fw-bold mb-0 text-dark">{{ $totalInquiries }}</h3>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-3">
        <div class="card border-0 shadow-sm h-100" style="border-radius: 16px;">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between mb-3">
                    <div class="rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px; background: #F5F3FF; color: #8B5CF6;">
                        <i class="bi bi-people fs-4"></i>
                    </div>
                    <span class="badge bg-success bg-opacity-10 text-success rounded-pill px-2 py-1"><i class="bi bi-arrow-up-right me-1"></i> +8.1%</span>
                </div>
                <p class="text-muted fw-semibold mb-1 text-uppercase" style="font-size: 0.75rem; letter-spacing: 0.5px;">System Users</p>
                <h3 class="fw-bold mb-0 text-dark">{{ $totalUsers }}</h3>
            </div>
        </div>
    </div>
</div>

<!-- Charts Row -->
<div class="row g-4 mb-4">
    <!-- Line Chart (Fixed container to stop infinite height growth) -->
    <div class="col-lg-8">
        <div class="card border-0 shadow-sm h-100" style="border-radius: 16px;">
            <div class="card-header bg-white border-0 p-4 pb-0 d-flex justify-content-between align-items-center">
                <h5 class="fw-bold mb-0 text-dark">Revenue Analytics</h5>
                <select class="form-select form-select-sm w-auto border-0 bg-light rounded-pill px-3 fw-semibold text-muted shadow-none">
                    <option>Last 7 Days</option>
                    <option>Last 30 Days</option>
                </select>
            </div>
            <div class="card-body p-4">
                <div style="position: relative; height: 300px; width: 100%;">
                    <canvas id="revenueChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Doughnut Chart (Fixed container) -->
    <div class="col-lg-4">
        <div class="card border-0 shadow-sm h-100" style="border-radius: 16px;">
            <div class="card-header bg-white border-0 p-4 pb-0">
                <h5 class="fw-bold mb-0 text-dark">Inquiry Status</h5>
            </div>
            <div class="card-body p-4 d-flex flex-column align-items-center justify-content-center">
                <div style="position: relative; height: 200px; width: 200px;">
                    <canvas id="statusChart"></canvas>
                </div>
                <div class="mt-4 w-100">
                    <div class="d-flex justify-content-between mb-2">
                        <span class="text-secondary fw-semibold" style="font-size: 0.85rem;"><i class="bi bi-circle-fill text-primary me-2" style="font-size: 0.6rem;"></i> Resolved</span>
                        <span class="fw-bold text-dark">75%</span>
                    </div>
                    <div class="d-flex justify-content-between">
                        <span class="text-secondary fw-semibold" style="font-size: 0.85rem;"><i class="bi bi-circle-fill text-warning me-2" style="font-size: 0.6rem;"></i> Pending</span>
                        <span class="fw-bold text-dark">25%</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Recent Inquiries Table -->
<div class="card border-0 shadow-sm" style="border-radius: 16px;">
    <div class="card-header bg-white p-4 border-0 d-flex justify-content-between align-items-center">
        <h5 class="fw-bold mb-0 text-dark">Recent Inquiries</h5>
        <a href="#" class="btn btn-sm btn-light rounded-pill px-3 fw-bold text-primary">View All</a>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="ps-4 py-3 text-secondary" style="font-size: 0.8rem; border:none;">CLIENT</th>
                        <th class="py-3 text-secondary" style="font-size: 0.8rem; border:none;">SUBJECT</th>
                        <th class="py-3 text-secondary" style="font-size: 0.8rem; border:none;">DATE</th>
                        <th class="py-3 text-secondary" style="font-size: 0.8rem; border:none;">STATUS</th>
                        <th class="text-end pe-4 py-3 text-secondary" style="font-size: 0.8rem; border:none;">ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($recentInquiries as $inquiry)
                    <tr>
                        <td class="ps-4 py-3" style="border-bottom: 1px solid #F1F5F9;">
                            <div class="d-flex align-items-center">
                                <div class="text-white rounded-circle d-flex align-items-center justify-content-center me-3 fw-bold" style="width: 40px; height: 40px; background: linear-gradient(135deg, #4F46E5, #7C3AED);">
                                    {{ substr($inquiry->name, 0, 1) }}
                                </div>
                                <div>
                                    <h6 class="mb-0 fw-bold text-dark">{{ $inquiry->name }}</h6>
                                    <small class="text-muted">{{ $inquiry->email }}</small>
                                </div>
                            </div>
                        </td>
                        <td class="py-3 fw-semibold text-secondary" style="border-bottom: 1px solid #F1F5F9;">{{ Str::limit($inquiry->subject, 35) }}</td>
                        <td class="py-3 text-muted" style="border-bottom: 1px solid #F1F5F9;">{{ $inquiry->created_at->format('M d, Y') }}</td>
                        <td class="py-3" style="border-bottom: 1px solid #F1F5F9;">
                            @if($loop->first)
                                <span class="badge rounded-pill px-3 py-2" style="background: #FEF3C7; color: #D97706;">Pending</span>
                            @else
                                <span class="badge rounded-pill px-3 py-2" style="background: #D1FAE5; color: #059669;">Resolved</span>
                            @endif
                        </td>
                        <td class="text-end pe-4 py-3" style="border-bottom: 1px solid #F1F5F9;">
                            <button class="btn btn-sm btn-light text-primary rounded-circle me-1" style="width: 35px; height: 35px;"><i class="bi bi-eye"></i></button>
                            <button class="btn btn-sm btn-light text-danger rounded-circle" style="width: 35px; height: 35px;"><i class="bi bi-trash"></i></button>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center py-5 text-secondary">
                            <i class="bi bi-inbox fs-1 d-block mb-3 text-muted"></i>
                            No inquiries found yet.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Line Chart
    const ctxRevenue = document.getElementById('revenueChart').getContext('2d');
    const gradient = ctxRevenue.createLinearGradient(0, 0, 0, 300);
    gradient.addColorStop(0, 'rgba(79, 70, 229, 0.2)');
    gradient.addColorStop(1, 'rgba(79, 70, 229, 0)');

    new Chart(ctxRevenue, {
        type: 'line',
        data: {
            labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
            datasets: [{
                label: 'Revenue',
                data: [12000, 19000, 15000, 25000, 22000, 30000, 24500],
                borderColor: '#4F46E5',
                backgroundColor: gradient,
                borderWidth: 3,
                tension: 0.4,
                fill: true,
                pointBackgroundColor: '#ffffff',
                pointBorderColor: '#4F46E5',
                pointBorderWidth: 2,
                pointRadius: 4,
                pointHoverRadius: 6
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false, // CRITICAL FOR FIXING HEIGHT
            plugins: { legend: { display: false } },
            scales: {
                y: { beginAtZero: true, grid: { borderDash: [5, 5], color: '#E2E8F0' } },
                x: { grid: { display: false } }
            }
        }
    });

    // Doughnut Chart
    const ctxStatus = document.getElementById('statusChart').getContext('2d');
    new Chart(ctxStatus, {
        type: 'doughnut',
        data: {
            labels: ['Resolved', 'Pending'],
            datasets: [{
                data: [75, 25],
                backgroundColor: ['#4F46E5', '#F59E0B'],
                borderWidth: 0,
                cutout: '75%'
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false, // CRITICAL FOR FIXING HEIGHT
            plugins: { legend: { display: false } }
        }
    });
</script>
@endpush