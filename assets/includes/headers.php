<style>
  @media (max-width: 1300px) {
    #navbar {
      display: flex;
      flex-direction: column;
      align-items: flex-start;
      justify-content: flex-start;
      position: fixed;
      top: 0;
      right: -300px;
      height: 100vh;
      width: 300px;
      transition: 0.3s ease;
      background-color: rgb(22, 22, 22);
      box-shadow: 0 40px 60px rgba(0, 0, 0, 0.1);
      padding: 80px 0 0 10px;
    }

    #navbar.active {
      right: 0;
    }

    #navbar li {
      margin-bottom: 25px;
    }

    #mobile {
      display: flex !important;
      align-items: center;
    }

    #mobile i {
      color: rgb(180, 177, 177);
      font-size: 24px;
      padding-left: 20px;
    }

    #close {
      display: initial !important;
      position: absolute;
      top: 30px;
      left: 30px;
    }

    #lg-cart {
      display: none;
    }

  }

  @media (max-width:550px) {
    #header {
      padding: 10px 25px !important;
    }
  }
  .closed{
      color: rgb(180, 177, 177) !important;
      font-size: 24px;
      padding-left: 20px;
    }

  .index-logo span {
    color: rgb(177, 18, 18);
    font-size: 20px;
  }

  .index-logo {
    padding-right: 20px;
  }

  #index-span {
    font-weight: 900;
  }
  .dropdown-toggle{
    background-color: transparent;
    color: rgba(255, 255, 255, 0.678);
    font-size: 15px;
    
}
.dropdown-toggle:hover,
.dropdown-toggle.active{
    background-color: transparent !important;
    color: rgb(177, 18, 18);
    
}

  .index-logo:hover {
    text-decoration: none;
  }

  #header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 10px 80px;
    background-color: rgb(22, 22, 22);
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.06);
    z-index: 999;
    position: sticky;
    top: 0;
    left: 0;
  }

  #mobile {
    display: none;
    align-items: center;
  }

  #close {
    display: none;
    
  }

  #header img {
    width: 90px;
    height: 90px;
  }

  #navbar {
    display: flex;
    align-items: center;

  }

  #navbar li {
    list-style-type: none;
    padding: 0 18px;
    position: relative;
  }

  #navbar li a {
    text-decoration: none;
    font-size: 16px;
    font-weight: 600;
    color: #D8D8D8;
    transition: 0.3s ease;
  }

  #navbar li a:hover,
  #navbar li a.active {
    color: rgb(177, 18, 18);
    background-color: rgb(22, 22, 22);
  }

  #navbar li a.active::after,
  #navbar li a:hover::after {
    content: "";
    width: 30%;
    height: 2px;
    background: rgb(177, 18, 18);
    position: absolute;
    bottom: -4px;
    left: 20px;
  }

  .navbar-nav .nav-link:hover,
  .navbar-nav .nav-link.active,
  .fas:hover,
  .fas.active {
    color: rgb(177, 18, 18);
  }
</style>
<section id="header">
  <a href="index" class="index-logo"><img src="assets/img/geevic main logo.png" alt=""><span id="index-span">HAVITNG</span></a>
  <div>
    <ul id="navbar">
      <li><a class="" href="index ">Home</a></li>
      <li><a href="shop">Shop</a></li>
      <!-- Default dropend button -->
      <div class="dropdown shophead ">
        <button type="button" class=" dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
          Our Policies
        </button>
        <ul class="dropdown-menu">
          <!-- Dropdown menu links -->
          <li><a class="dropdown-item" href="privacy">Privacy policy</a></li>
          <li><a class="dropdown-item" href="return policy">Return Policy</a></li>
        </ul>
      </div>
      <li><a href="about">About Us</a></li>
      <li><a href="contact">Contact Us</a></li>
      <?php
      if (!isset($_SESSION['id'])) {
      ?>
        <li><a href="login-signin">Login/Signup</a></li>
      <?php } else { ?>
        <li><a href="orders">Orders</a></li>
        <li>
          <div class="dropdown ">
            <button type="button" class=" dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
              <?php echo $_SESSION['userName']; ?>
            </button>
            <ul class="dropdown-menu">
              <!-- Dropdown menu links -->

              <li><a class="dropdown-item" href="<?php if ($_SESSION['role'] != 'admin') {
                                                    echo 'profile';
                                                  } else {
                                                    echo 'secure/profile';
                                                  } ?>">Profile</a></li>
              <li><a class="dropdown-item" href="assets/config/logout">Logout</a></li>
            </ul>
          </div>
        </li>
      <?php } ?>

      <li id="lg-cart">
        <a href="cart" class="position-relative">
          <i class="fas fa-shopping-cart closed"></i>
          <?php
          if (isset($_SESSION['id'])) {
            $sql = "SELECT * FROM tbl_cart WHERE order_status = '0' AND user = '" . $_SESSION['id'] . "'ORDER BY _id DESC";
            $query = mysqli_query($connectDB, $sql);
            if (mysqli_num_rows($query) > 0) {
          ?>
              <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                <?php echo mysqli_num_rows($query); ?>
              </span>
          <?php }
          } ?>
        </a>
      </li>
      <a href="#" id="close"><i class="fas fa-times closed"></i></a>
    </ul>
  </div>
  <div id="mobile">
    <a href="login-signin"><i class="fas fa-user"></i></a>
    <a href="cart" class="position-relative">
      <?php
      if (isset($_SESSION['id'])) {
        $sql = "SELECT * FROM tbl_cart WHERE order_status = '0' AND user = '" . $_SESSION['id'] . "'ORDER BY _id DESC";
        $query = mysqli_query($connectDB, $sql);

      ?>
        <i class="fas fa-shopping-cart"></i>
        <?php if (mysqli_num_rows($query) > 0) { ?>
          <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
            <?php echo mysqli_num_rows($query); ?>
          </span>
      <?php }
      } ?>
    </a>
    <i id="bar" class="fas fa-outdent"></i>
  </div>
</section>