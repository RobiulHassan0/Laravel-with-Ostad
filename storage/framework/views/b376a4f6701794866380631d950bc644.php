<!-- Add Category Modal -->
<div class="modal fade" id="categoryEditModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <form id="categoryEditForm">
                <input type="hidden" id="categoryEditId" value="">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label" for="categoryName">Name <span class="text-danger">*</span></label>
                        <input type="text" name="name" id="categoryEditName" class="form-control"
                            placeholder="e.g. Electronics" maxlength="255" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="categoryDescription">Description</label>
                        <textarea name="description" id="categoryEditDescription" class="form-control" rows="3"
                            placeholder="Optional description"></textarea>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="status" value="1" id="categoryEditStatus"
                            checked>
                        <label class="form-check-label" for="categoryEditStatus">Active</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary" id="categoryEditSaveBtn">
                        <i class="bi bi-check2-circle me-1"></i> Save
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php $__env->startPush('scripts'); ?>
    <script>
        async function getCategoryInfo(id) {
            let url = '<?php echo e(url("/api/v1/categories")); ?>/' + id;
            let token = localStorage.getItem('token');

            try {
                let response = await axios.get(url, {
                    headers: { Authorization: 'Bearer ' + token }
                });

                let data = response.data['category_data'];
                if (data) {
                    document.getElementById('categoryEditId').value = data['id'] || id;
                    document.getElementById('categoryEditName').value = data['name'] || '';
                    document.getElementById('categoryEditDescription').value = data['description'] || '';
                    document.getElementById('categoryEditStatus').checked = data['status'];
                }
            } catch (err) {
                showErrorToast(getErrorMessage(err, 'Failed to load category'));
            }
        }

        async function editCategory(id) {
            document.getElementById('categoryEditId').value = id;
            await getCategoryInfo(id);

            let modalElem = document.getElementById('categoryEditModal');
            let modal = new bootstrap.Modal(modalElem);
            modal.show();
        }

        async function makeEditCategory() {
            let id = document.getElementById('categoryEditId').value.trim();
            let nameValue = document.getElementById('categoryEditName').value.trim();
            let descriptionValue = document.getElementById('categoryEditDescription').value.trim();
            let statusChecked = document.getElementById('categoryEditStatus').checked;
            let saveBtn = document.getElementById('categoryEditSaveBtn');

            let obj = {
                name: nameValue,
                description: descriptionValue || null,
                status: statusChecked
            };

            let url = '<?php echo e(url("/api/v1/categories")); ?>' + '/' + id;
            let token = localStorage.getItem('token');
            saveBtn.disabled = true;

            try {
                let response = await axios.put(url, obj, {
                    headers: { Authorization: 'Bearer ' + token }
                })

                if (response.data && response.data.success) {
                    showSuccessToast(response.data.message || 'Category updated successfully');
                    let modalElem = document.getElementById('categoryEditModal');
                    let modal = window.bootstrap.Modal.getInstance(modalElem);
                    if (modal) modal.hide();

                    document.getElementById('categoryEditForm').reset();
                    document.getElementById('categoryEditId').value = '';
                    document.getElementById('categoryEditStatus').checked = true;
                    if (typeof getCategories === 'function') {
                        getCategories();
                    } else {
                        showErrorToast(getErrorMessage(null, 'Failed to updated category'));
                    }
                }
            } catch (err) {
                showErrorToast(getErrorMessage(err, 'Failed to update category. please try again'));
            } finally {
                saveBtn.disabled = false;
            }
        }

        document.getElementById('categoryEditForm').addEventListener('submit', async function (e) {
            e.preventDefault();
            await makeEditCategory();
        });
    </script>
<?php $__env->stopPush(); ?><?php /**PATH C:\xampp\htdocs\Full Stack Laravel Projects by Ostad\inventory_project\resources\views/admin/categories/edit.blade.php ENDPATH**/ ?>