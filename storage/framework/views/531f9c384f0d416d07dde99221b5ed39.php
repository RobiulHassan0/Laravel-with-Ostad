

<?php $__env->startSection('title', 'Categories'); ?>

<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center flex-wrap gap-2">
            <span>Category List</span>
            <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                data-bs-target="#categoryCreateModal">
                <i class="bi bi-plus-lg me-1"></i> Add Category
            </button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="categoiresTable" class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th style="width: 70px;">#</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th style="width: 110px;">Status</th>
                            <th style="width: 130px;">Created</th>
                            <th class="text-end" style="width: 160px;">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="categoriesTableBody">
                        <!-- Static demo data (design only) -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <?php echo $__env->make('admin.categories.create', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php echo $__env->make('admin.categories.edit', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php echo $__env->make('admin.categories.delete', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <?php $__env->startPush('scripts'); ?>
        <script>
            getCategories();

            async function getCategories(){
                let url = '<?php echo e(url("/api/v1/categories")); ?>';
                let token = localStorage.getItem('token');
                let tbody = document.getElementById('categoriesTableBody');

                try {
                    let response = await axios.get(url, {
                        headers: {
                            'Authorization': 'Bearer ' + token,
                            'Accept': 'application/json'
                        }
                    })

                    let categories = response.data['categories_data'] || [];
                    tbody.innerHTML = '';
                    categories.forEach( (item) => {
                        let created = item['created_at'] ? item['created_at'].substring(0, 10) : '-';
                        let statusBadge = item['status'] ? '<span class="badge text-bg-success">Active</span>' : '<span class="badge text-bg-secondary">Inactive</span>';
                        tbody.innerHTML += (`
                            <tr>
                                <td>${item['id']}</td>
                                <td class="fw-semibold">${item['name']}</td>
                                <td class="text-muted">${item['description']}</td>
                                <td>${statusBadge}</td>
                                <td class="text-muted">${created}</td>
                                <td class="text-end">
                                    <button type="button" class="btn btn-sm btn-outline-secondary" onclick="editCategory(${item['id']})">Edit</button>
                                    <button type="button" class="btn btn-sm btn-outline-danger" onclick="deleteCategory(${item['id']})">Delete</button>
                                </td>
                            </tr>
                        `);
                    });
                    let table = new DataTable('#categoiresTable');
                    
                } catch (err) {
                    tbody.innerHTML = `<tr> <td colspan="6" class="text-center text-muted py-4">Failed to load categories. </td> </tr>`;
                    showErrorToast(getErrorMessage(err, 'Failed to load categories'));
                }
            }
        </script>
    <?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\Full Stack Laravel Projects by Ostad\inventory_project\resources\views/admin/categories/index.blade.php ENDPATH**/ ?>