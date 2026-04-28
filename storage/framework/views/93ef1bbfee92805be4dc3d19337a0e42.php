
<?php $__env->startSection('title', 'Products'); ?>

<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center flex-wrap gap-2">
            <span>Product List</span>
            <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                data-bs-target="#productCreateModal">
                <i class="bi bi-plus-lg me-1"></i> Add Product
            </button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th style="width: 70px;">#</th>
                            <th>Product</th>
                            <th style="width: 140px;">SKU</th>
                            <th style="width: 160px;">Category</th>
                            <th style="width: 100px;">Unit</th>
                            <th style="width: 120px;">Price</th>
                            <th style="width: 110px;">Stock</th>
                            <th style="width: 110px;">Status</th>
                            <th style="width: 130px;">Created</th>
                            <th class="text-end" style="width: 160px;">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="productsTableBody">
                        <!-- Static demo data (design only) -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <?php echo $__env->make('admin.products.create', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php echo $__env->make('admin.products.edit', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php echo $__env->make('admin.products.delete', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <?php $__env->startPush('scripts'); ?>
        <script>
            loadCategories();
            getProducts();
            async function getProducts() {
                let url = '<?php echo e(url("/api/v1/products")); ?>';
                let token = localStorage.getItem('token');
                let tbody = document.getElementById('productsTableBody');

                try {
                    let response = await axios.get(url, {
                        headers: {
                            'Authorization': 'Bearer ' + token,
                            'Accept': 'application/json'
                        }
                    });

                    let products = response.data['products_data'] || [];
                    tbody.innerHTML = '';
                    products.forEach(product => {
                        let created = product['created_at'] ? product['created_at'].substring(0, 10) : '-';
                        let statusBadge = product['status'] ? '<span class="badge text-bg-success">Active</span>' : '<span class="badge text-bg-secondary">Inactive</span>';
                        let categoryName = product['category'] && product['category']['name'] ? product['category']['name'] : '-';
                        let price = product['price'] != null ? parseFloat(product['price']).toFixed(2) : '0.00';
                        let stock = product['stock_qty'] != null ? product['stock_qty'] : 0;
                        let stockBadge = stock > 0 ? '<span class="badge text-bg-success">' + stock + '</span>' : '<span class="badge text-bg-secondary">' + stock + '</span>';
                        let subtext = [];

                        if (product['color']) subtext.push('Color: ' + product['color']);
                        if (product['size']) subtext.push('Size: ' + product['size']);
                        if (product['weight']) subtext.push('Weight: ' + product['weight'] + 'kg');

                        let subtextHtml = subtext.length ? '<div class="text-muted small">' + subtext.join(' • ') + '</div>' : '';

                        tbody.innerHTML += (`
                                    <tr>
                                        <td>${product['id']}</td>
                                        <td>
                                            <div class="fw-semibold">${product['name'] || ''}</div>
                                            ${subtextHtml}
                                        </td>
                                        <td class="text-muted">${product['sku']}</td>
                                        <td class="fw-semibold">${categoryName}</td>
                                        <td class="text-muted">${product['unit']}</td>
                                        <td class="fw-semibold">${price}</td>
                                        <td>${stockBadge}</td>
                                        <td>${statusBadge}</td>
                                        <td class="text-muted">${created}</td>
                                        <td class="text-end">
                                            <button type="button" class="btn btn-sm btn-outline-secondary" onclick="editProduct(${product['id']})">Edit</button>
                                            <button type="button" class="btn btn-sm btn-outline-danger" onclick="deleteProduct(${product['id']})">Delete</button>
                                        </td>
                                    </tr>
                                `);
                    });
                } catch (err) {
                    tbody.innerHTML = '<tr><td colspan="10" class="text-center text-muted py-4">Failed to load products</td></tr>';
                    showErrorToast(getErrorMessage(err, 'Failed to load products'))
                }
            }

            async function loadCategories() {
                let url = '<?php echo e(url("/api/v1/categories")); ?>';
                let token = localStorage.getItem('token');

                try {
                    let response = await axios.get(url, {
                        headers: {
                            Authorization: 'Bearer ' + token,
                            Accept: 'application/json',
                        }
                    })

                    let categories = response.data['categories_data'] || [];
                    let createSelect = document.getElementById('productCategoryId');
                    let editSelect = document.getElementById('productEditCategoryId');

                    if (createSelect) {
                        createSelect.innerHTML = '<option value="" selected disabled>Select category</option>';
                        categories.forEach((category) => {
                            createSelect.innerHTML += '<option value="' + category.id + '">' + (category.name || '') + '</option>';
                        })

                    }

                    if (editSelect) {
                        editSelect.innerHTML = '<option value="" selected disabled>Select category</option>';
                        categories.forEach((category) => {
                            editSelect.innerHTML += '<option value="' + category.id + '">' + (category.name || '') + '</option>';
                        })

                    }
                } catch (err) {
                    showErrorToast(getErrorMessage(err, 'Failed to load categories'));
                }
            }
        </script>
    <?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\Full Stack Laravel Projects by Ostad\inventory_project\resources\views/admin/products/index.blade.php ENDPATH**/ ?>