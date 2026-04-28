

<div class="modal fade" id="invoiceShowModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Invoice Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="invoiceShowBody">
                <div class="text-center py-4 text-muted">Loading...</div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="printInvoice()">
                    <i class="bi bi-printer me-1"></i> Print
                </button>
            </div>
        </div>
    </div>
</div>

<?php $__env->startPush('scripts'); ?>
    <script>

        function viewInvoice(id){
            let invoice = invoicesData.find(inv => inv.id === id);
            let body = document.getElementById('invoiceShowBody');

            if(!invoice){
                body.innerHTML = `<div class="text-center py-4 text-danger">Invoice not found.</div>`;
                let modalElem = document.getElementById('invoiceShowModal');
                let modal = new bootstrap.Modal(modalElem);
                modal.show();
                return;
            }

            let status = invoice.status || 'draft';
            let statusBadge = '';

            if(status === 'finalized'){
                statusBadge = `<span class="badge text-bg-success"><i class="bi bi-check-circle me-1"></i>Finalized</span>`;
            }else if(status === 'cancelled'){
                statusBadge = `<span class="badge text-bg-secondary"><i class="bi bi-x-circle me-1"></i>Cancelled</span>`;
            }else{
                statusBadge = `<span class="badge text-bg-warning"><i class="bi bi-pencil-square me-1"></i>Draft</span>`;
            }

            let invoiceDate = invoice.invoice_date ? invoice.invoice_date.substring(0, 10) : '-';
            let invoiceItems = invoice.invoice_items || [] ;
            let itemsRows = '';

            invoiceItems.forEach( (item, itemIndex) => {
                let productName = item.product && item.product.name ? item.product.name : '-';
                let categoryName = item.product && item.product.category && item.product.category.name ? item.product.category.name : '-'; 
                
                let qty = item.quantity || 0;
                let unitPrice = parseFloat(item.unit_price || 0).toFixed(2);
                let itemDiscount = parseFloat(item.discount_amount || 0);
                let lineTotal = parseFloat(item.line_total || 0).toFixed(2);

                let itemDiscountHtml = '-';
                
                if(itemDiscount > 0){
                    let itemLabel = '';

                    if(item.discount_type === 'percent'){
                        itemLabel = `(${parseFloat(item.discount_value || 0)}%)`; 
                    }else if(item.discount_type === 'fixed'){
                        itemLabel = ' (Fixed)';
                    }

                    itemDiscountHtml =  `<span class="text-danger">-$${itemDiscount.toFixed(2)}</span><span class="text-muted small"> ${itemLabel} </span>`;
                }

                itemsRows += `
                    <tr>
                        <td>${itemIndex + 1}</td>
                        <td>
                            <div class="fw-semibold">${productName}</div>
                            <div class="text-muted small">${categoryName}</div>
                        </td>
                        <td class="text-center">${qty}</td>
                        <td class="text-end">$ ${unitPrice}</td>
                        <td class="text-end">${itemDiscountHtml}</td>
                        <td class="text-end fw-semibold">$ ${lineTotal}</td>
                    </tr>
                `;
            });

            if(invoiceItems.length === 0){
                itemsRows = `<tr> <td colspan="6" class="text-center text-muted py-3">No items</td></tr>`;
            }

            let subtotal = parseFloat(invoice.subtotal || 0).toFixed(2);
            let discountAmount = parseFloat(invoice.discount_amount || 0);
            let grandTotal = parseFloat(invoice.grand_total || 0).toFixed(2);
            
            let invoiceDiscountHtml = '-';

            if(discountAmount > 0){
                let label = "";

                if(invoice.discount_type === 'percent'){
                    label = `(${parseFloat(invoice.discount_value || 0)}%)`;
                }else if( invoice.discount_type === 'fixed'){
                    label = ' (Fixed)';
                }
                invoiceDiscountHtml = `-$${discountAmount.toFixed(2)} <span class="text-muted small">${label}</span>`;
            }

            body.innerHTML = `
                <div id="invoicePrintArea">
                    <div class="d-flex justify-content-between align-items-start mb-4">
                        <div>
                            <h4 class="mb-1">${invoice.invoice_no || 'N/A'}</h4>
                            <div class="text-muted">Date: ${invoiceDate}</div>
                        </div>
                        <div class="text-end">
                            ${statusBadge}
                        </div>
                    </div>

                    <hr>

                    <h6 class="mb-3">Items</h6>
                    <div class="table-responsive">
                        <table class="table table-sm table-bordered align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th style="width: 40px;">#</th>
                                    <th>Product</th>
                                    <th class="text-center" style="width: 70px;">Qty</th>
                                    <th class="text-end" style="width: 110px;">Unit Price</th>
                                    <th class="text-end" style="width: 140px;">Discount</th>
                                    <th class="text-end" style="width: 120px;">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                ${itemsRows}
                            </tbody>
                        </table>
                    </div>

                    <div class="row justify-content-end mt-3">
                        <div class="col-sm-6 col-md-5">
                            <table class="table table-sm mb-0">
                                <tr>
                                    <td class="text-muted border-0">Subtotal</td>
                                    <td class="text-end border-0">$ ${subtotal}</td>
                                </tr>
                                <tr>
                                    <td class="text-muted">Discount</td>
                                    <td class="text-end text-danger">${invoiceDiscountHtml}</td>
                                </tr>
                                <tr class="fw-bold">
                                    <td>Grand Total</td>
                                    <td class="text-end fs-5">$ ${grandTotal}</td>
                                </tr>
                            </table>
                        </div>
                    </div> 
                </div>
            `;

            let modalElem = document.getElementById('invoiceShowModal');
            let modal = new bootstrap.Modal(modalElem);
            modal.show();
        }

        function printInvoice(id){
            let w = window.open('', '_blank');
            w.document.write(document.getElementById('invoicePrintArea').innerHTML);
            w.document.close();
        }
    
        // function printInvoice(){
        //     let printArea = document.getElementById('invoicePrintArea');
        //     if(!printArea) return;

        //     let printWindow = window.open('', '_blank', 'width=800,height=600');

        //     printWindow.document.write(`
        //     <!DOCTYPE html>
        //     <html>
        //         <head>
        //             <title>Print Invoice</title>
        //                 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
        //             <style>
        //                 body{
        //                     padding: 30px;
        //                     font-size: 14px;
        //                 }
        //                 .badge {
        //                     border: 1px solid #ccc;
        //                 }
        //                 @media print {
        //                     body{
        //                         padding: 15px;
        //                     }
        //                     .badge {
        //                         border: 1px solid #ccc;
        //                     }
        //                 }
        //             </style>
        //         </head>
        //         <body>
        //             ${printArea.innerHTML}
        //         </body>
        //     </html>`);

        //     printWindow.document.close();

        //     printWindow.onload = function(){
        //         printWindow.print();
        //         printWindow.onafterprint = function () {
        //             printWindow.close(); 
        //         };
        //     };

        // }
    </script>
<?php $__env->stopPush(); ?><?php /**PATH C:\xampp\htdocs\Full Stack Laravel Projects by Ostad\inventory_project\resources\views/admin/invoices/show.blade.php ENDPATH**/ ?>