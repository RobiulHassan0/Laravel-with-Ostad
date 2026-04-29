

<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('content'); ?>


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
                    <h4 class="mb-0" id="totalProducts">—</h4>
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
                    <h4 class="mb-0" id="totalInvoices">—</h4>
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
                    <h4 class="mb-0" id="totalRevenue">—</h4>
                </div>
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
                    <a href="pos.html" class="btn btn-primary">
                        <i class="bi bi-receipt me-2"></i> New Invoice (POS)
                    </a>
                    <a href="products.html" class="btn btn-outline-primary">
                        <i class="bi bi-box me-2"></i> Add Product
                    </a>
                    <a href="stock.html" class="btn btn-outline-secondary">
                        <i class="bi bi-archive me-2"></i> Stock In
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>


<?php $__env->startPush('scripts'); ?>
<script>
    // Dashboard specific scripts can be added here

    loadDashboardData();
    async function loadDashboardData(){
        let url = '<?php echo e(url("./api/v1/dashboard/summery")); ?>';
        let token = localStorage.getItem('token');

        // let tbody = document.getElementById('stockAlertsTableBody');

        try{
            let response = await axios.get(url, {headers: {Authorization: 'Bearer ' + token}});
            let data = response.data['summery'] || {};

            document.getElementById('totalCategories').textContent = data.total_categories || '0'; 
            document.getElementById('totalProducts').textContent = data['total_products'] || '0';
            document.getElementById('totalInvoices').textContent = data.total_invoices || '0';
            document.getElementById('totalRevenue').textContent = '$' + parseFloat(data.total_revenue || 0).toFixed(2);
        }catch(error){
            tbody.innerHTML = `<tr><td colspan="6" class="text-center text-muted">Failed to load dashboard data.</td></tr>`;
            showErrorToast(getErrorMessage(error, 'Failed to load dashboard data. Please try again.'));
        }
    }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\Full Stack Laravel Projects by Ostad\inventory_project\resources\views/admin/dashboard/index.blade.php ENDPATH**/ ?>