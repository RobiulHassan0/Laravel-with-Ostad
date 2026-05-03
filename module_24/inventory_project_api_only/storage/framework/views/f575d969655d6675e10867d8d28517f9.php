<!-- Delete Invoice Modal -->
<div class="modal fade" id="invoiceDeleteModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete Invoice</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="invoiceDeleteId" value="">
                <p class="mb-0">Are you sure you want to delete this invoice? This action cannot be undone.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" id="invoiceDeleteBtn" onclick="doDeleteInvoice()">
                    <i class="bi bi-trash me-1"></i> Delete
                </button>
            </div>
        </div>
    </div>
</div>

<?php $__env->startPush('scripts'); ?>
    <script>
        function deleteInvoice(id){
            document.getElementById('invoiceDeleteId').value = id;
            let modalElem = document.getElementById('invoiceDeleteModal');
            let modal = new bootstrap.Modal(modalElem);
            modal.show();
        }

        async function doDeleteInvoice(){
            let id = document.getElementById('invoiceDeleteId').value.trim() ;
            let deleteBtn = document.getElementById('invoiceDeleteBtn');
            
            // Perform the delete operation here
            let URL = '<?php echo e(url("api/v1/invoice")); ?>/' + id; // Assuming your API endpoint for deleting an invoice is /api/v1/invoice/{id}
            let token = localStorage.getItem('token'); // Assuming you have the token stored in localStorage
            deleteBtn.disabled = true; // Disable the button to prevent multiple clicks

            try{
                let response = await axios.delete(URL, {headers: {Authorization: 'Bearer ' + token }});

                if(response.data && response.data.success){
                    showSuccessToast(response.data.message || 'Invoice deleted successfully');
                    // Optionally, you can remove the deleted invoice from the UI or refresh the list

                    let modalElem = document.getElementById('invoiceDeleteModal');
                    let modal = window.bootstrap.Modal.getInstance(modalElem);
                    if(modal) modal.hide();

                    document.getElementById('invoiceDeleteId').value = ''; // Clear the hidden input

                    if(typeof getInvoices === 'function') getInvoices(); // Refresh the invoice list if the function exists
                }else{
                    showErrorToast(getErrorMessage(null, 'Failed to delete invoice'));
                }
            }catch(err){
                showErrorToast(getErrorMessage(err, 'Failed to delete invoice. please try again later'));
            }finally{
                deleteBtn.disabled = false; // Re-enable the button
            }

        }
    </script>    
<?php $__env->stopPush(); ?><?php /**PATH C:\xampp\htdocs\Full Stack Laravel Projects by Ostad\inventory_project\resources\views/admin/invoices/delete.blade.php ENDPATH**/ ?>