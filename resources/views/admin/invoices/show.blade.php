{{-- View Invoice Medal --}}
<div class="nodal fade" id="invoiceShowflodal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="nodal-title">Invoice Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="invoiceShowBody">
                <div class="text-center py-4 text-muted">Loading...</div>
            </div>
            <div class="nodal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="printInvoice()">
                    <i class="bi bi-printer me-1"></i> Print
                </button>
            </div>
        </div>
    </div>
</div>