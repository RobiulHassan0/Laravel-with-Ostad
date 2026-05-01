@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    {{-- Summary Cards --}}

    <div class="row g-4 mb-4">
        <div class="col-sm-6 col-xl-3">
            <div class="card h-100">
                <div class="card-body d-flex align-items-center gap-3">
                    <div class="rounded-3 bg-primary bg-opacity-10 p-3">
                        <i class="bi bi-tags text-primary fs-3"></i>
                    </div>
                    <div>
                        <p class="text-muted small mb-0">Categories</p>
                        <h4 class="mb-0" id="totalCategories">—</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card h-100">
                <div class="card-body d-flex align-items-center gap-3">
                    <div class="rounded-3 bg-success bg-opacity-10 p-3">
                        <i class="bi bi-box text-success fs-3"></i>
                    </div>
                    <div>
                        <p class="text-muted small mb-0">Products</p>
                        <h4 class="mb-0" id="totalProducts"></h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card h-100">
                <div class="card-body d-flex align-items-center gap-3">
                    <div class="rounded-3 bg-info bg-opacity-10 p-3">
                        <i class="bi bi-receipt text-info fs-3"></i>
                    </div>
                    <div>
                        <p class="text-muted small mb-0">Invoices</p>
                        <h4 class="mb-0" id="totalInvoices"></h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card h-100">
                <div class="card-body d-flex align-items-center gap-3">
                    <div class="rounded-3 bg-warning bg-opacity-10 p-3">
                        <i class="bi bi-currency-dollar text-warning fs-3"></i>
                    </div>
                    <div>
                        <p class="text-muted small mb-0">Total Revenue</p>
                        <h4 class="mb-0" id="totalRevenue"></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Stock Alerts --}}
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span><i class="bi bi-exclamation-triangle me-1"></i> Stock Alerts</span>
                <span class="badge text-bg-danger" id="stockAlertCount">0</span>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                        <tr>
                            <th style="width: 70px;">#</th>
                            <th>Product</th>
                            <th style="width: 160px;">Category</th>
                            <th style="width: 120px;">Stock Qty</th>
                            <th style="width: 140px;">Threshold</th>
                            <th style="width: 120px;">Status</th>
                        </tr>
                        </thead>
                        <tbody id="stockAlertsTableBody">
                        <tr>
                            <td colspan="6" class="text-center text-muted py-4">Loading...</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">Recent Activity</div>
                <div class="card-body">
                    <p class="text-muted mb-0">Activity summary will appear here once connected to APIs.</p>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">Quick Actions</div>
                <div class="card-body">
                    <div class="d-grid gap-2">
                        <a href="{{ route('pos') }}" class="btn btn-primary">
                            <i class="bi bi-receipt me-2"></i> New Invoice (POS)
                        </a>
                        <a href="{{ route('products') }}" class="btn btn-outline-primary">
                            <i class="bi bi-box me-2"></i> Manage Product
                        </a>
                        <a href="{{ route('stocks') }}" class="btn btn-outline-secondary">
                            <i class="bi bi-archive me-2"></i> Stock In
                        </a>

                        <a href="{{ route('categories') }}" class="btn btn-outline-secondary">
                            <i class="bi bi-tags me-2"></i> Manage Categories
                        </a>

                        <a href="{{ route('invoices') }}" class="btn btn-outline-secondary">
                            <i class="bi bi-journal-text me-2"></i> View Invocies
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        // Dashboard specific scripts can be added here

        loadDashboardData();
        async function loadDashboardData(){
            let url = '{{ url("/api/v1/dashboard/summary") }}';
            let token = localStorage.getItem('token');

            let tbody = document.getElementById('stockAlertsTableBody');

            try{
                let response = await axios.get(url, {headers: {Authorization: 'Bearer ' + token}});
                let data = response.data['summary'] || {};

                document.getElementById('totalCategories').textContent = data.total_categories || '0'; 
                document.getElementById('totalProducts').textContent = data['total_products'] || '0';
                document.getElementById('totalInvoices').textContent = data.total_invoices || '0';
                document.getElementById('totalRevenue').textContent = '$' + parseFloat(data.total_revenue || 0).toFixed(2);

                let alerts = data['low_stock_alerts'] || [];
                document.getElementById('stockAlertCount').textContent = alerts.length;

                tbody.innerHTML = '';

                if(alerts.length === 0){
                    tbody.innerHTML = `
                        <tr><td colspan="6" class="text-center text-muted py-4">No stock aerts. All products well-stocked.</td></tr>
                    `;
                }

                alerts.forEach( (item) => {
                    let categoryName = item.category && item.category.name ? item.category.name : '-';
                    let stock = item.stock_qty != null ? item.stock_qty : 0;
                    let threshold = item.low_stock_threshold != null ? item.low_stock_threshold : 0;
                    let statusBadge = stock === 0 
                        ? `<span class="badge text-bg-danger"> OUT of Stock</span>`
                        : `<span class="badge text-bg-danger"> Low Stock</span>`; 
                    tbody.innerHTML += (`
                        <tr>
                            <td>${item.id}</td>
                            <td class="fw-semibold">${item['name'] || '-'}</td>
                            <td class="text-muted">${categoryName}</td>
                            <td><span class="badge text-bg-danger">${stock}</span></td>
                            <td><span class="text-muted font-semibold">${threshold}</span></td>
                            <td>${statusBadge}</td>
                        </tr>
                    `);
                });
            }catch(error){
                tbody.innerHTML = `<tr><td colspan="6" class="text-center text-muted">Failed to load dashboard data.</td></tr>`;
                showErrorToast(getErrorMessage(error, 'Failed to load dashboard data. Please try again.'));
            }
        }
    </script>
@endpush
