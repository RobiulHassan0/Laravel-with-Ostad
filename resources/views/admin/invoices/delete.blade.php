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

@push('scripts')
    <script>
        function deleteInvoice(id){
            document.getElementById('invoiceDeleteId').value = id;
            let modalElem = document.getElementById('invoiceDeleteModal');
            let modal = new bootstrap.Modal(modalElem);
            modal.show();
        }

        async function doDeleteInvoice(){
            let id = document.getElementById('invoiceDeleteId').value.trim();
            let deleteBtn = document.getElementById('invoiceDeleteBtn');
            // Perform the delete operation here

        }
    </script>    
@endpush