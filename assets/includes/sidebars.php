<div class="sidebar pe-4 pb-3">
    <nav class="navbar bg-dark navbar-light">
        <?php if ($_SESSION['role'] != 'admin') { ?>
            <a href="index" class="navbar-brand mx-4 mb-3">
                <h3 style="color: rgb(177, 18, 18);">GEEVIC</h3>
            </a>
        <?php } else { ?>
            <a href="dashboard" class="navbar-brand mx-4 mb-3">
                <h3 style="color: rgb(177, 18, 18);">GEEVIC</h3>
            </a>
        <?php } ?>
        <div class="d-flex align-items-center ms-4 mb-4">
            <div class="position-relative">
                <img class="rounded-circle" src="<?php if ($_SESSION['role'] != 'admin') {
                                                        echo 'assets/img/user/users.png';
                                                    } else {
                                                        echo '../assets/img/logo/geevic logo.png';
                                                    } ?>" alt="" style="width: 40px; height: 40px;">
                <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
            </div>
            <div class="ms-3">
                <h6 class="mb-0"><?php echo ucwords($_SESSION['userName']) ?></h6>
                <!-- <span>Admin</span> -->
            </div>
        </div>
        <div class="navbar-nav w-100">
            <?php
            if ($_SESSION['role'] !== 'admin') {
            ?>
                <a href="index" class="nav-item nav-link"><i class="fas fa-home"></i>Home</a>
                <a href="profile" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Profile</a>
                <a href="orders" class="nav-item nav-link"><i class="fas fa-truck"></i>Orders</a>
                <a href="cart" class="nav-item nav-link"><i class="fas fa-shopping-cart"></i>Cart</a>
                <a href="assets/config/logout" class="nav-item nav-link"><i class="fas fa-sign-out-alt"></i>Logout</a>
            <?php } else { ?>
                <!-- Admin Nav Links -->
                <a href="../index" class="nav-item nav-link"><i class="fas fa-home"></i>Home</a>
                <a href="dashboard" class="nav-item nav-link"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                <a href="category" class="nav-item nav-link"><i class="fas fa-desktop"></i>Categories</a>
                <!-- <a href="featured" class="nav-item nav-link"><i class="fas fa-gift"></i>Featured</a> -->
                <a href="products" class="nav-item nav-link"><i class="fas fa-gift"></i>Products</a>
                <a href="orders" class="nav-item nav-link"><i class="fas fa-truck"></i>Orders</a>
                <!-- <a href="shipping" class="nav-item nav-link"><i class="fas fa-ship"></i>Shipping</a> -->
                <a href="../assets/config/logout" class="nav-item nav-link"><i class="fas fa-sign-out-alt"></i>Logout</a>
            <?php } ?>

        </div>
    </nav>
</div>
<!-- Sidebar End -->

<!-- Content Start -->
<div class="content">

    <!-- Navbar Start -->
    <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
        <a href="<?php if ($_SESSION['role'] != 'admin') {
                        echo 'index';
                    } else {
                        echo 'dashboard';
                    } ?>" class="navbar-brand d-flex d-lg-none me-4">
            <img class="rounded-circle" src="<?php if ($_SESSION['role'] != 'admin') {
                                                    echo 'assets/img/logo/geevic logo.png';
                                                } else {
                                                    echo '../assets/img/logo/geevic logo.png';
                                                } ?>" alt="" style="width: 40px; height: 40px;">
        </a>
        <a href="#" class="sidebar-toggler flex-shrink-0">
            <i class="fa fa-bars"></i>
        </a>
        <div class="navbar-nav align-items-center ms-auto">

            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                    <img class="rounded-circle me-lg-2" src="<?php if ($_SESSION['role'] != 'admin') {
                                                                    echo 'assets/img/user/users.png';
                                                                } else {
                                                                    echo '../assets/img/logo/geevic logo.png';
                                                                } ?>" alt="" style="width: 40px; height: 40px;">
                    <span class="d-none d-lg-inline-flex"><?php echo ucwords($_SESSION['userName']); ?></span>

                </a>
                <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                    <?php
                    if ($_SESSION['role'] !== 'admin') {
                        echo "<a href=\"assets/config/logout\" class=\"dropdown-item\">Log Out</a>";
                    } else {
                        echo "<a href=\"../assets/config/logout\" class=\"dropdown-item\">Log Out</a>";
                    }

                    ?>
                </div>
            </div>
        </div>
    </nav>