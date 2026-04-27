<aside class="admin-sidebar" id="adminSidebar">
    <div class="sidebar-brand">
        <i class="bi bi-box-seam"></i>
        <span>IMS Admin</span>
    </div>
    <nav class="nav flex-column">
        <a class="nav-link <?php echo e(request()->routeIs('dashboard') ? 'active' : ''); ?>" href="<?php echo e(route('dashboard')); ?>">
            <i class="bi bi-speedometer2"></i>
            <span>Dashboard</span>
        </a>
        <a class="nav-link <?php echo e(request()->routeIs('categories') ? 'active' : ''); ?>" href="<?php echo e(route('categories')); ?>">
            <i class="bi bi-tags"></i>
            <span>Categories</span>
        </a>
        <a class="nav-link <?php echo e(request()->routeIs('products') ? 'active' : ''); ?>" href="<?php echo e(route('products')); ?>">
            <i class="bi bi-box"></i>
            <span>Products</span>
        </a>
        <a class="nav-link <?php echo e(request()->routeIs('stocks') ? 'active' : ''); ?>" href="<?php echo e(route('stocks')); ?>">
            <i class="bi bi-archive"></i>
            <span>Product Stock</span>
        </a>
        <a class="nav-link <?php echo e(request()->routeIs('pos') ? 'active' : ''); ?>" href="<?php echo e(route('pos')); ?>">
            <i class="bi bi-receipt"></i>
            <span>POS / Invoice</span>
        </a>
        <a class="nav-link <?php echo e(request()->routeIs('invoices') ? 'active' : ''); ?>" href="<?php echo e(route('invoices')); ?>">
            <i class="bi bi-list-ul"></i>
            <span>Invoices</span>
        </a>
    </nav>

    <div class="sidebar-footer mt-auto">
        <button type="button" class="nav-link border-0 bg-transparent w-100 text-start" id="logoutBtn">
            <i class="bi bi-box-arrow-right"></i>
            <span>Log out</span>
        </button>
    </div>
</aside><?php /**PATH C:\xampp\htdocs\Full Stack Laravel Projects by Ostad\inventory_project\resources\views/layouts/pertials/sidebar.blade.php ENDPATH**/ ?>