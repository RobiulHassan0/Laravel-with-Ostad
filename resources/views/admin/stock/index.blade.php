@extends('layouts.admin')

@section('title', 'Stock')

@section('content')
    <div class="row g-4 mb-4">
        <div class="col-md-6">
            <div class="card h-100">
                <div class="card-header">Stock In</div>
                <div class="card-body">
                    <p class="text-muted small">Record new stock received. Form will be wired to API later.</p>
                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                        data-bs-target="#stockInModal">
                        <i class="bi bi-box-arrow-in-down me-1"></i> Stock In
                    </button>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card h-100">
                <div class="card-header">Stock Adjustment</div>
                <div class="card-body">
                    <p class="text-muted small">Adjust quantity (corrections / damage). Form will be wired to API later.</p>
                    <button type="button" class="btn btn-outline-secondary btn-sm" data-bs-toggle="modal"
                        data-bs-target="#stockAdjustModal">
                        <i class="bi bi-pencil-square me-1"></i> Adjust
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center flex-wrap gap-2">
            <span>Stock Movements</span>
            <div class="d-flex gap-2">
                <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#stockInModal">
                    <i class="bi bi-plus-lg me-1"></i> Stock In
                </button>
                <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal"
                    data-bs-target="#stockAdjustModal">
                    <i class="bi bi-sliders me-1"></i> Adjustment
                </button>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th style="width: 70px;">#</th>
                            <th>Product</th>
                            <th style="width: 140px;">Category</th>
                            <th style="width: 110px;">Type</th>
                            <th style="width: 100px;">Quantity</th>
                            <th>Note</th>
                            <th style="width: 120px;">Invoice</th>
                            <th style="width: 130px;">Date</th>
                        </tr>
                    </thead>
                    <tbody id="stocksTableBody">
                        <!-- Static demo data (design only) -->
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Stock In Modal -->
    @include('admin.stock.stockIn')
    
    <!-- Stock Adjustment Modal -->
    @include('admin.stock.adjust')

     @push('scripts')
        <script>
            getStocks();
            loadProductsStock();

            async function getStocks() {
                let url = '{{ url("/api/v1/stocks") }}';
                let token = localStorage.getItem('token');
                let tbody = document.getElementById('stocksTableBody');

                try{
                    let response = await axios.get(url, {
                        headers: {Authorization: 'Bearer ' + token}
                    });

                    let stocks = response.data['stock_movements_data'] || [];
                    tbody.innerHTML = '';
                    stocks.forEach( stockItem => {
                        let created = stockItem['created_at'] ? stockItem['created_at'].substring(0, 10) : ''; 
                        let productName = stockItem['product'] && stockItem['product']['name'] ? stockItem['product']['name'] : '-';
                        let categoryName = stockItem['product'] && stockItem['product']['category'] ? stockItem['product']['category']['name'] : '-'; 
                        let typeBadge = stockItem['type'] === 'IN' ? '<span class="badge text-bg-success">IN</span>' : '<span class="badge text-bg-danger">OUT</span>';
                        let qty = stockItem['quantity'] || 0;
                        let qtyDisplay = stockItem['type'] === 'IN' ? '+' + qty : '-' + qty;
                        let invoiceDisplay = stockItem['invoice_id'] ? '<span class="text-muted">INV-' + stockItem['invcoice_id'] + '</span>' : '<span class="text-muted">—</span>';
                        tbody.innerHTML += `
                            <tr>
                                <td>${stockItem['id']}</td>
                                <td class="fw-semibold">${productName}</td>
                                <td class="text-muted">${categoryName}</td>
                                <td>${typeBadge}</td>
                                <td class="fw-semibold">${qtyDisplay}</td>
                                <td class="text-muted">${stockItem['note'] || '—'}</td>
                                <td>${invoiceDisplay}</td>
                                <td class="text-muted">${created}</td>
                            </tr>
                        `;
                    });
                }catch(err){
                    tbody.innerHTML = '<tr><td colspan"8" class="text-center text-muted py-4">Failed to load stock movements.</td></tr>';
                    showErrorToast(getErrorMessage('Faild to load stock movements'));
                }
            }

            async function loadProductsStock(){
                let url = '{{ url("/api/v1/products") }}';
                let token = localStorage.getItem('token');

                try {
                    let response = await axios.get(url, {
                        headers: {
                            Authorization: 'Bearer ' + token,
                            Accept: 'application/json'
                        }
                    });

                    let products = response.data['products_data'];
                    let stockInSelect = document.getElementById('stockInProductId');
                    let stockAdjustSelect = document.getElementById('stockAdjustProductId');

                    if(stockInSelect){
                        stockInSelect.innerHTML =  '<option value="" selected disabled>Select Product</option>';
                        products.forEach((product) => {
                            let category = product.category && product.category.name ? product.category.name : '';
                            let stock = product.stock_qty != null ? product.stock_qty : 0;
                            stockInSelect.innerHTML += `<option value="${product.id}" > ${product.name || ''} (${category}) -> Stock: ${stock} </option>`;
                        });
                    }

                    if(stockAdjustSelect){
                        stockAdjustSelect.innerHTML = `<option value="" selected disabled>Select Product</option>`;
                        products.forEach( (product) => {
                            let category = product['category'] && product['category']['name'] ? product['category']['name'] : '';
                            let stock = product['stock_qty'] != null ? product['stock_qty'] : 0;
                            stockAdjustSelect.innerHTML += '<option value="' + product['id'] + '">' + (product['name'] || '') + ' (' + category + ') -> Stock: ' + stock + '</option>';
                        });
                    }
                } catch (error) {
                    showErrorToast(getErrorMessage(error, 'Failed to load products'));
                }
            }
        </script>
     @endpush
    
@endsection