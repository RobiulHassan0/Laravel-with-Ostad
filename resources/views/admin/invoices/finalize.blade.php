<!-- Finalize Invoice Modal -->
<div class="modal fade" id="invoiceFinalizeModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Finalize Invoice</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="invoiceFinalizeId" value="">
                <div class="d-flex align-items-start">
                    <div class="flex-shrink-0 text-warning me-3">
                        <i class="bi bi-exclamation-triangle-fill fs-3"></i>
                    </div>
                    <div>
                        <p class="mb-1 fw-semibold">Are you sure you want to finalize this invoice?</p>
                        <p class="mb-0 text-muted small">Once finalized, the invoice cannot be edited or deleted. Stock will be deducted for the invoice items.</p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-success" id="invoiceFinalizeBtn" onclick="doFinalizeInvoice()">
                    <i class="bi bi-check-lg me-1"></i> Finalize
                </button>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        function finalizeInvoice(id){
            document.getElementById('invoiceFinalizeId').value = id;
            let modalElem = document.getElementById('invoiceFinalizeModal');
            let modal = new bootstrap.Modal(modalElem);
            modal.show();
        }

        async function doFinalizeInvoice(){
            let id = document.getElementById('invoiceFinalizeId').value.trim() ;
            let finalizeBtn = document.getElementById('invoiceFinalizeBtn');
            
            let invoice = invoicesData.find(inv => inv.id == id);
            if(!invoice){
                showErrorToast('invoice data not found. Please refresh the and try again');
                return;
            }

            let url = '{{ url("api/v1/invoice") }}/' + id;
            let token = localStorage.getItem('token');

            let payload = {
                status: 'finalized',
                discount_value: parseFloat(invoice.discount_value || 0),
            };

            finalizeBtn.disabled = true;

            try{
                let response = await axios.put(url, payload, {headers: {Authorization: 'Bearer ' + token}});

                if(response.data && response.data.success){
                    showSuccessToast(response.data.message || 'Invoice Finalized successfully');
                    let modalElem = document.getElementById('invoiceFinalizeModal');
                    let modal = window.bootstrap.Modal.getInstance(modalElem);
                    
                    if(modal) modal.hide();

                    document.getElementById('invoiceFinalizeId').value = '';
                    if(typeof getInvoices === 'function') getInvoices();
                }else{
                    showErrorToast(getErrorMessage(null, 'Failed to finalize invoice'));
                }
            }catch(err){
                showErrorToast(getErrorMessage(err, 'Failed to finalize invoice. please try agian.'));
            }finally{
                finalizeBtn.disabled = false; 
            }
        }
    </script>
@endpush