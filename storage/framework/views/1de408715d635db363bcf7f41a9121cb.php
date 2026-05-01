
<?php $__env->startSection('title', 'POS'); ?>

<?php $__env->startSection('content'); ?>
    <div class="row g-4">
        <!-- Left: Products -->
        <div class="col-lg-8">
            <!-- Search -->
            <div class="card mb-3">
                <div class="card-body py-3">
                    <div class="row g-2  d-flex justify-content-between">
                        <div class="col-md-6">
                            <div class="input-group">
                                <span class="input-group-text bg-white"><i class="bi bi-search"></i></span>
                                <input type="text" class="form-control" placeholder="Search product by name or SKU..."
                                    id="searchInput">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <select class="form-select" id="categoryFilter">
                                <option value="">All categories</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Product Grid -->
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span><i class="bi bi-grid me-2"></i>Products</span>
                    <span class="text-muted small">Click to add to cart</span>
                </div>
                <div class="card-body">
                    <div class="row g-3" id="productGrid">
                        <!-- Product 1: In stock -->

                        <div class="col-12 text-center text-muted py-4">Loading Products</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right: Cart -->
        <div class="col-lg-4">
            <div class="card cart-sticky">
                <div class="card-header d-flex justify-content-between align-items-center bg-primary text-white">
                    <span><i class="bi bi-cart3 me-2"></i>Cart</span>
                    <span class="badge bg-white text-primary" id="cartBadge">0 item</span>
                </div>
                <div class="card-body p-0">
                    <!-- Cart Items -->
                    <div class="p-3" style="max-height: 320px; overflow-y: auto;" id="cartItemsContainer">

                        <!-- Cart item 2 with item discount -->

                        <div class="text-center text-muted py-4">Cart is empty</div>

                    </div>

                    <!-- Totals -->
                    <div class="border-top p-3 bg-light" style="display: none" id="totalSelection">
                        
                        <!-- Item discounts total -->
                        <div class="d-flex justify-content-between mb-2 text-danger" style="display: none" id="itemDiscountRow">
                            <span>Item Discounts</span>
                            <span id="itemDiscountDisplay">- $ 0.00</span>
                        </div>

                        <!-- Subtotal -->
                        <div class="d-flex justify-content-between mb-2">
                            <span class="text-muted">Subtotal</span>
                            <span id="subtotalDisplay">$ 0.00</span>
                        </div>

                        <!-- Invoice discount -->
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="text-muted">Invoice Discount</span>
                            <div class="d-flex align-items-center gap-1">
                                <select class="form-select form-select-sm" style="width: 65px;" id="invoiceDiscountType">
                                    <option value="">None</option>
                                    <option value="fixed" selected>$</option>
                                    <option value="percent">%</option>
                                </select>
                                <input type="number" class="form-control form-control-sm" id="invoiceDiscountValue"
                                    style="width: 70px;" value="0" min="0">
                            </div>
                        </div>
                        <div class="d-flex justify-content-between mb-2 text-danger" style="display: none" id="invoiceDiscountRow">
                            <span></span>
                            <span id="invoiceDiscountDisplay">- $ 00.00</span>
                        </div>

                        <hr class="my-2">

                        <!-- Grand Total -->
                        <div class="d-flex justify-content-between fs-5 fw-bold">
                            <span>Grand Total</span>
                            <span class="text-success" id="grandTotalDisplay">$ 0.00</span>
                        </div>
                    </div>

                    <!-- Invoice Info & Actions -->
                    <div class="border-top p-3">
                        <div class="row g-2 mb-3">
                            <div class="col-6">
                                <label class="form-label small text-muted mb-1">Invoice No</label>
                                <input type="text" class="form-control form-control-sm" value="" id="invoiceNoInput"
                                    readonly>
                            </div>
                            <div class="col-6">
                                <label class="form-label small text-muted mb-1">Date</label>
                                <input type="date" class="form-control form-control-sm" value="" id="invoiceDateInput">
                            </div>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="button" class="btn btn-success btn-lg" id="finalizeBtn" disabled>
                                <i class="bi bi-check-circle me-2"></i>Finalize Invoice
                            </button>
                            <div class="row g-2">
                                <div class="col-6">
                                    <button type="button" class="btn btn-outline-primary w-100" id="saveDraftBtn" disabled>
                                        <i class="bi bi-save me-1"></i>Save Draft
                                    </button>
                                </div>
                                <div class="col-6">
                                    <button type="button" class="btn btn-outline-secondary w-100" id="clearCartBtn" disabled>
                                        <i class="bi bi-x-lg me-1"></i>Clear
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        // API URLS
        let productsUrl = '<?php echo e(url("/api/v1/products")); ?>';
        let categoriesUrl = '<?php echo e(url("/api/v1/categories")); ?>';
        let invoiceUrl = '<?php echo e(url("/api/v1/invoice")); ?>';

        // Data holders or sates
        let allProducts = [];
        let allCategories = [];
        let cart = [];

        // Helper Functions
        function getToken() {
            return localStorage.getItem('token') || '';
        }

        function authHeaders() {
            return { headers: { Authorization: 'Bearer ' + getToken() } };
        }

        function formatMoney(amount) {
            return '$ ' + parseFloat(amount).toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, '.');
        }

        function todayDate() {
            let d = new Date();
            let y = d.getFullYear();
            let m = String(d.getMonth() + 1).padStart(2, '0');
            let day = String(d.getDate()).padStart(2, '0');
            return y + '-' + m + '-' + day;
        }

        function escapeHtml(text) {
            let div = document.createElement('div');
            div.textContent = text == null ? '' : text;
            return div.innerHTML;
        }

        async function loadCategories() {
            try {
                let response = await axios.get(categoriesUrl, authHeaders());
                allCategories = response.data['categories_data'] || [];
                let select = document.getElementById('categoryFilter');
                select.innerHTML = '<option value="">All categories</option>'

                allCategories.forEach(function (category) {
                    select.innerHTML += '<option value="' + category.id + '">' + escapeHtml(category.name) + '</option>';
                });
            } catch (err) {
                showErrorToast(getErrorMessage(err), 'Failed to load categories.');
            }
        }
        loadCategories();

        // load products and render Grid
        async function loadProducts() {
            let grid = document.getElementById('productGrid');
            try {
                let response = await axios.get(productsUrl, authHeaders());
                allProducts = response.data['products_data'] || [];
                renderProducts();
            } catch (err) {
                grid.innerHTML = '<div class="col-12 text-center text-muted py-4">Failed to load products.</div>'
                showErrorToast(getErrorMessage(err, 'Failed to load products'));
            }
        }
        loadProducts();

        // Render Products for UI 
        function renderProducts() {
            let searchText = (document.getElementById('searchInput').value || '').toLowerCase();
            let categoryId = document.getElementById('categoryFilter').value;
            let grid = document.getElementById('productGrid');

            // Filter products by search and category
            let filtered = allProducts.filter(function (product) {
                let matchesSearch = !searchText || (product.name || '').toLowerCase().includes(searchText) || (product.sku || '').toLowerCase().includes(searchText);
                let matchesCategory = !categoryId || String(product.category_id) === String(categoryId);
                return matchesSearch && matchesCategory;
            });

            if (filtered.length === 0) {
                grid.innerHTML = '<div class="col-12 text-center text-muted py-4">No products found.</div>';
                return;
            }

            grid.innerHTML = '';

            filtered.forEach(function (product) {
                let stockQty = product.stock_qty != null ? parseInt(product.stock_qty) : 0;
                let price = product.price != null ? parseFloat(product.price) : 0;
                let isOutOfStock = stockQty <= 0;
                let categoryName = product.category ? product.category.name : '';

                let stockBadgeClass = stockQty <= 0 ? 'text-bg-secondary' : (stockQty <= 5 ? 'text-bg-warning' : 'text-bg-success');

                let colDiv = document.createElement('div');
                colDiv.className = "col-6 col-md-4 col-xl-3";
                colDiv.innerHTML = 
                    `<div class="card pos-product-card h-100 ${isOutOfStock ? 'out-of-stock' : ''}" data-product-id="${product.id}">
                        <div class="product-image"><i class="bi bi-phone"></i></div>
                        <div class="card-body p-2">
                            <div class="fw-semibold small text-truncate" title="${escapeHtml(product.name)}">${escapeHtml(product.name)}</div>
                            <div class="text-muted small">${escapeHtml(product.sku)}</div>
                            <div class="text-muted small">${escapeHtml(categoryName)}</div>
                            <div class="d-flex justify-content-between align-items-center mt-2">
                                <span class="fw-bold text-primary">${formatMoney(price)}</span>
                                <span class="badge ${stockBadgeClass}">${stockQty}</span>
                            </div>
                        </div>
                    </div>`;

                if(!isOutOfStock){
                    colDiv.querySelector('.pos-product-card').addEventListener('click', function () {
                        addToCart(product);
                    });
                }

                grid.appendChild(colDiv); 

            });

        }

        // --- Cart: Add ------------
        function addToCart(product){
            let stockQty = product.stock_qty != null ? parseInt(product.stock_qty) : 0;
            if(stockQty <= 0) return;

            let unitPrice = product.price != null ? parseFloat(product.price) : 0;
            let existingItem = cart.find( function (item) {
                return item.product_id === product.id; 
            });

            if(existingItem){
                if(existingItem.quantity >= stockQty){
                    return;
                }else{
                    existingItem.quantity += 1;
                }
            }else{
                cart.push({
                    product_id: product.id,
                    name: product.name || '',
                    sku: product.sku || '',
                    unit_price: unitPrice,
                    quantity: 1,
                    discount_type: '',
                    discount_amount: 0,
                    discount_value: 0,
                    line_total: unitPrice,
                    max_stock: stockQty,
                });
            }

            recalcCart();
            renderCart();
        }

        // --- Cart: Remove ---------
        function removeFromCart(productId){
            cart = cart.filter( function (item) {
                return item.product_id !== productId;
            })

            // Reset invoice discount if  cart becomes empty
            if(cart.length === 0){
                document.getElementById('invoiceDiscountType').value = '';
                document.getElementById('invoiceDiscountValue').value = '0';
                document.getElementById('itemDiscountDisplay').value = '0';
            }

            recalcCart();
            renderCart();
        }

        // --- Cart: Change Quantity ------- 
        function changeQuantity(productId, delta){
            let item = cart.find(function (x) {return x.product_id === productId;});
            if(!item) return; 

            let newQty = item.quantity + delta;
            if(newQty < 1) {removeFromCart(productId); return}
            if(newQty > item.max_stock) newQty = item.max_stock;

            item.quantity = newQty;
            recalcCart();
            renderCart();
        }
        
        // --- Cart: Update Item Discount
        function updateItemDiscount(productId, discountType, discountValue){
            let item = cart.find( function (x) {
                return x.product_id === productId;
            })

            if(!item) return;

            item.discount_type = discountType || '';
            item.discount_value = parseFloat(discountValue) || 0;
            
            recalcCart();
            renderCart();
        }
        // ---- Recalculate Cart
        function recalcCart(){
            cart.forEach( function (item) {
                let lineBeforeDiscount = item.quantity * item.unit_price;
                let discountAmount = 0;

                if(item.discount_type === 'fixed'){
                    discountAmount = Math.min(item.discount_value, lineBeforeDiscount);
                    // discountAmount = lineBeforeDiscount - item.discount_value;
                }else if(item.discount_type === 'percent'){
                    discountAmount = lineBeforeDiscount * (item.discount_value / 100);
                }

                item.discount_amount = Math.round(discountAmount * 100) / 100;
                item.line_total = Math.round((lineBeforeDiscount - item.discount_amount) * 100) / 100; 
            })

            updateTotals();
        }

        function getSubtotal(){
            return cart.reduce(function (sum, item) {
                return sum + item.line_total;
            }, 0)
        }

        function getItemDiscountTotal(){
            return cart.reduce( function (sum, item) {
                return sum + item.discount_amount;
            }, 0)
        }

        function getInvoiceDiscountAmount(){
            let type = document.getElementById('invoiceDiscountType').value;
            let value = parseFloat(document.getElementById('invoiceDiscountValue').value) || 0;
            let subtotal = getSubtotal();

            if(type === 'fixed') return Math.min(value, subtotal);
            if(type === 'percent') return Math.round(subtotal * value / 100 * 100) / 100;
            return 0;
        }
 
        // ----- Update Totals Display --------
        function updateTotals(){
            let subtotal = getSubtotal();
            let itemDiscountTotal = getItemDiscountTotal();
            let invoiceDiscountAmount = getInvoiceDiscountAmount();
            let grandTotal = Math.round((subtotal - invoiceDiscountAmount) * 100) / 100;
            
            document.getElementById('subtotalDisplay').textContent = formatMoney(subtotal);
            document.getElementById('grandTotalDisplay').textContent = formatMoney(grandTotal);

            // item discount row
            let itemDiscountRow = document.getElementById('itemDiscountRow');
            if(itemDiscountTotal > 0){
                itemDiscountRow.style.display = 'flex';
                document.getElementById('itemDiscountDisplay').textContent = '- ' + formatMoney(itemDiscountTotal);
            }else{
                itemDiscountRow.style.display = 'none';
            }

            // item Discount row
            let invoiceDiscountRow = document.getElementById('invoiceDiscountRow');
            if(invoiceDiscountAmount > 0){
                invoiceDiscountRow.style.display = 'flex';
                document.getElementById('invoiceDiscountDisplay').textContent = '- ' + formatMoney(invoiceDiscountAmount);
            }else{
                invoiceDiscountRow.style.display = 'none';
            }

            // cart badge and buttons
            document.getElementById('cartBadge').textContent = cart.length + ' item' + (cart.length !== 1 ? 's' : '');
            document.getElementById('totalSelection').style.display = cart.length > 0 ? 'block' : 'none';
            document.getElementById('finalizeBtn').disabled = cart.length === 0;
            document.getElementById('saveDraftBtn').disabled = cart.length === 0; 
            document.getElementById('clearCartBtn').disabled = cart.length === 0; 
        }

        // --- Render Cart UI ----
        function renderCart(){
            let container = document.getElementById('cartItemsContainer');
            if(cart.length === 0){
                container.innerHTML = '<div class="text-center text-muted py-4">Cart is empty</div>';
                updateTotals();
                return;
            }

            let html = '';

            cart.forEach(function (item) {
                let hasDiscount = item.discount_type && item.discount_value > 0;

                html += `
                <div class="pos-cart-item">
                    <!-- product name + remove button -->
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <div class="flex-grow-1 me-2">
                            <div class="fw-semibold">${escapeHtml(item.name)}</div>
                            <div class="text-muted small">${formatMoney(item.unit_price)} × ${item.quantity}</div>
                        </div>
                        <button type="button" class="btn btn-sm btn-outline-danger p-1 lh-1" onclick="removeFromCart(${item.product_id})">
                            <i class="bi bi-x"></i>
                        </button>
                    </div>
                    
                    <!-- Quantity controls + line total --> 
                    <div class="d-flex align-items-center gap-2 mb-2">
                        <div class="input-group input-group-sm" style="width: 100px;">
                            <button class="btn btn-outline-secondary" type="button" onclick="changeQuantity(${item.product_id}, - 1)">−</button>
                            <input type="number" class="form-control text-center px-1" value="${item.quantity}" min="1" max="${item.max_stock}" onchange="setQuantity(${item.product_id}, this.value)">
                            <button class="btn btn-outline-secondary" type="button" onclick="changeQuantity(${item.product_id}, 1)">+</button>
                        </div>
                        <div class="flex-grow-1 text-end fw-semibold">${formatMoney(item.line_total)}</div>
                    </div>

                    <!-- Item discount -->
                    <div class="d-flex align-items-center gap-2 bg-light rounded p-2 mt-2">
                        <span class="small text-muted">Discount:</span>
                        <select class="form-select form-select-sm" style="width: 80px;" onchange="updateItemDiscount(
                            ${item.product_id},
                            this.value,
                            this.parentElement.querySelector('input').value
                        )">
                            <option value="">None</option>
                            <option value="fixed" ${item.discount_type === 'fixed' ? 'selected' : ''}>$</option>
                            <option value="percent" ${item.discount_type === 'percent' ? 'selected' : ''}>%</option>
                        </select>

                        <input type="number" class="form-control form-control-sm" style="width: 60px;" value="${item.discount_value}"
                            min="0" step="0.01" oninput="updateItemDiscount(${item.product_id}, this.parentElement.querySelector('select').value, this.value)">
                        <span class="small text-danger">-${formatMoney(item.discount_amount)}</span>
                    </div>
                </div>`;
            });

            container.innerHTML = html;
            updateTotals();
        }

        // --- Cart: Reset 
        function resetCart(){
            cart = [];
            document.getElementById('invoiceNoInput').value = '';
            document.getElementById('invoiceDateInput').value = todayDate(); 
            document.getElementById('invoiceDiscountType').value = '';
            document.getElementById('invoiceDiscountValue').value = '0';

            renderCart();
        }

        // Build Payload for API 
        function buildInvoicePayload(status){
            let subtotal = getSubtotal();
            let discountType = document.getElementById('invoiceDiscountType').value;
            let discountValue = parseFloat(document.getElementById('invoiceDiscountValue').value || 0);
            let discountAmount = getInvoiceDiscountAmount();
            let grandTotal = Math.round((subtotal - discountAmount) * 100) / 100;
            let invoiceDate = document.getElementById('invoiceDateInput').value;
            let invoiceNumber = document.getElementById('invoiceNoInput').value || null;

            let items = cart.map( function (item) {
                return {
                    product_id: item.product_id,
                    quantity: item.quantity,
                    unit_price: item.unit_price,
                    discount_type: item.discount_type || null,
                    discount_value: item.discount_value,
                    discount_amount: item.discount_amount,
                    line_total: item.line_total
                }
            });

            return {
                invoice_no: invoiceNumber,
                invoice_date: invoiceDate,
                invoiceItems: items,
                subtotal: Math.round(subtotal * 100) / 100,
                discount_type: discountType || null,
                discount_value: discountValue,
                discount_amount: Math.round(discountAmount * 100) / 100,
                grand_total: grandTotal,
                status: status
            };
        }

        // Submit Invoice
        async function submitInvoice(status){
            if(cart.length === 0){
                showErrorToast('Cart is empty');
                return;
            }

            let payload = buildInvoicePayload(status);

            if(!payload.invoice_date){
                showErrorToast('Please set the invoice date.');
                return;
            }

            let btn = (status === 'finalized') ? document.getElementById('finalizeBtn') : document.getElementById('saveDraftBtn');
            let originalHtml = btn.innerHTML;
            btn.disabled = true;
            btn.innerHTML = `<span class="spinner-border spinner-border-sm me-1"></span> Saving...`;

            try{
                let response = await axios.post(invoiceUrl, payload, authHeaders());
                if(response.data.success){
                    showSuccessToast(response.data.message || 'Invoice saved successfully!');
                    resetCart();
                }else{
                    showErrorToast(response.data.message || 'Failed to save invoice!');
                }
            }catch(err){
                showErrorToast(getErrorMessage(err, 'Failed to save invoice.'));
            }finally{
                btn.disabled = false;
                btn.innerHTML = originalHtml;
            }
        }

        // --- Event Listeners
        document.getElementById('searchInput').addEventListener('input', renderProducts);
        document.getElementById('categoryFilter').addEventListener('change', renderProducts);
        document.getElementById('invoiceDiscountType').addEventListener('change', function () {recalcCart(); renderCart(); });
        document.getElementById('invoiceDiscountValue').addEventListener('input', function () {recalcCart(); renderCart(); });
        document.getElementById('clearCartBtn').addEventListener('click', function () {
            resetCart();
            showSuccessToast('Cart cleared.');
        })

        document.getElementById('finalizeBtn').addEventListener('click', function () { submitInvoice('finalized'); });
        document.getElementById('saveDraftBtn').addEventListener('click', function () { submitInvoice('draft'); });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\Full Stack Laravel Projects by Ostad\inventory_project\resources\views/admin/pos/index.blade.php ENDPATH**/ ?>