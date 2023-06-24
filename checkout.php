<?php

use Geevic\Shipping;

require "assets/includes/sessions.php";
require "assets/config/db_con.php";

cartAuth();
$shipping = new Shipping($connectDB);

$sql = "SELECT * FROM tbl_cart WHERE user = '" . $_SESSION['id'] . "' AND order_status = '0'";
$query = mysqli_query($connectDB, $sql);
$cartItems = mysqli_fetch_all($query, MYSQLI_ASSOC);

$_SESSION['cart'] = $cartItems;


$sql1 = "SELECT * FROM users WHERE _id = '" . $_SESSION['id'] . "'";
$query1 = mysqli_query($connectDB, $sql1);
$user = mysqli_fetch_assoc($query1);

$sql2 = "SELECT * FROM user_address WHERE userid = '" . $_SESSION['id'] . "'";
$query2 = mysqli_query($connectDB, $sql2);
$userAddress = mysqli_fetch_assoc($query2);
if (!$userAddress) {
    $_SESSION['errormessage'] =  "Please add a shipping address before you continue.";
    header('location: profile');
    exit();
}

$address = trim($userAddress['country']);

$total_cost = 0;
$quantity = 0;
$delivery_fee = 0;
foreach ($cartItems as $key => $item) {
    $delivery_fee += $shipping->calculateRate($item, $address);
    $total_cost += $item['total'];
    $quantity += $item['quantity'];
}

// Calculate total cost including delivery fee
$total_cost_with_delivery_fee = $total_cost + $delivery_fee;

?>

<!DOCTYPE html>
<html>

<head>
<title>Checkout - Geevic</title>
    <link rel="icon" href="assets/img/geevic logo.jpg">

    <!-- Google Web Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400&display=swap" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1" />


    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Customized Bootstrap Stylesheet -->
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">

  <!-- Template Stylesheet -->
  <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <div class="container py-5">
        <h1 class="mb-4">Checkout</h1>
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h2 class="mb-3">Order Summary</h2>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">Items's total(<?php echo $quantity; ?>)</div>
                            <div class="col-md-6">$<?php echo $total_cost; ?></div>
                        </div>
                        <hr>

                        <div class="row">
                            <div class="col-md-6">Delivery fees</div>
                            <div class="col-md-6" id="delivery-fee">$<?php echo $delivery_fee; ?></div>
                        </div>
                        <hr>

                        <div class="row">
                            <div class="col-md-6">Total</div>
                            <div class="col-md-6" id="total-cost">$<?php echo $total_cost_with_delivery_fee; ?></div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <h2 class="mb-3">Delivery Information</h2>
                <form id="orderForm">

                    <div class="mb-3">
                        <label for="full_name" class="form-label">Full Name</label>
                        <input type="text" readonly class="form-control" id="full_name" name="full_name" value="<?php echo ucwords($user['full_name']); ?>">
                    </div>

                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" readonly class="form-control" id="address" name="address" value="<?php echo substr(ucwords($userAddress['user_address']), 0, 50) . "..."; ?>">
                        <input type="hidden" readonly class="form-control" id="user_address_id" name="user_address_id" value="<?php echo $userAddress['_id']; ?>">
                        <span><button type="button" class="btn text-primary" data-bs-toggle="modal" data-bs-target="#addressModal">Change address</button></span>
                    </div>

                    <div class="mb-3">
                        <label for="city" class="form-label">Country</label>
                        <input type="text" readonly class="form-control" id="country" name="country" value="<?php echo ucwords($userAddress['country']); ?>">
                    </div>

                    <div class="mb-3">
                        <label for="city" class="form-label">City</label>
                        <input type="text" readonly class="form-control" id="city" name="city" value="<?php echo ucwords($userAddress['city']); ?>">
                    </div>

                    <div class="mb-3">
                        <label for="state" class="form-label">State</label>
                        <input type="text" readonly class="form-control" id="state" name="state" value="<?php echo ucwords($userAddress['state']); ?>">
                    </div>

                    <div class="mb-3">
                        <label for="zip_code" class="form-label">Zip Code</label>
                        <input type="text" readonly class="form-control" id="zip_code" name="zip_code" value="<?php echo ucwords($userAddress['zip_code']); ?>">
                    </div>

                    <div class="mb-3">
                        <label for="phone_number" class="form-label">Phone Number</label>
                        <input type="tel" readonly class="form-control" id="phone_number" name="phone_number" value="<?php echo ucwords($user['phone']); ?>">
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email" readonly class="form-control" id="email" name="email" value="<?php echo ucwords($user['email']); ?>">
                    </div>

                    <div class="mb-3">
                        <label for="notes" class="form-label">Notes</label>
                        <textarea class="form-control" id="notes" name="notes"></textarea>
                    </div>

                    <button type="submit" id="placeOrder" class="btn btn-primary">Place Order</button>
                </form>
            </div>
        </div>
    </div>

    <!--Address Modal -->
    <div class="modal fade" id="addressModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addressLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Change delivery Address</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <select name="location" id="newLocation" class="form-control" style="width: 250px;">
                        <?php
                        $sql = "SELECT * FROM user_address WHERE userid = '" . $_SESSION['id'] . "'";
                        $query = mysqli_query($connectDB, $sql);
                        if (mysqli_num_rows($query) < 1) {
                            echo "<option disabled selected>No Address Found, Please Add Address </option>";
                        }
                        while ($userAddress = mysqli_fetch_assoc($query)) {
                            $destination = $userAddress['country'];
                        ?>

                            <option value="<?php echo $destination; ?>"><?php echo substr(ucwords($userAddress['user_address']), 0, 50) . "..."; ?></option>
                        <?php } ?>
                    </select>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success"><a style="color: white;" href="profile">Add New Address</a></button>
                    <!-- <button type="submit" name="changeAddress" class="btn btn-primary text-white">Change</button> -->
                </div>
            </div>
        </div>
    </div>

    <script src="https://js.stripe.com/v3/"></script>
    <script>
        document.getElementById('newLocation').onchange = function(e) {
            var address = e.target.value;
            var cartItems = <?php echo json_encode($cartItems); ?>;
            var delivery_fee = <?php echo json_encode($delivery_fee); ?>;

            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    // Update the delivery fee and total cost
                    var response = JSON.parse(this.responseText);
                    var deliveryFee = response.deliveryFee;
                    var totalCost = response.totalCost;

                    document.getElementById('delivery-fee').innerHTML = `$${deliveryFee}`;
                    document.getElementById('total-cost').innerHTML = `$${totalCost}`;

                    if (response.hasOwnProperty('country')) {
                        var address1 = response.address;
                        var city = response.city;
                        var state = response.state;
                        var country = response.country;
                        var zip_code = response.zip_code;
                        var user_address_id = response.user_address_id;
                        document.getElementById('address').value = address1;
                        document.getElementById('city').value = city;
                        document.getElementById('state').value = state;
                        document.getElementById('country').value = country;
                        document.getElementById('zip_code').value = zip_code;
                        document.getElementById('user_address_id').value = user_address_id;

                    } else {
                        console.log('no country');
                    }

                }
            };
            xhr.open('GET', 'assets/config/order_process.php?location=' + encodeURIComponent(address) + '&formal_delivery_fee=' + delivery_fee + '&cartItems=' + encodeURIComponent(JSON.stringify(cartItems)), true);
            xhr.send();
        };

        document.getElementById('placeOrder').addEventListener('click', (e) => {
            e.preventDefault();
            let form = document.getElementById('orderForm');
            let totalDelivery = document.getElementById('total-cost').innerText.replace(/[$]/, '');
            let deliveryfee = document.getElementById('delivery-fee').innerText.replace(/[$]/, '');

            let address = document.getElementById('address').value;
            let user_address_id = document.getElementById('user_address_id').value;
            let zip_code = document.getElementById('zip_code').value;
            let country = document.getElementById('country').value
            let state = document.getElementById('state').value
            let city = document.getElementById('city').value
            let email = document.getElementById('email').value;
            let name = document.getElementById('full_name').value;
            let notes = document.getElementById('notes').value;

            let formData = {
                'address': address,
                'user_address_id': user_address_id,
                'state': state,
                'zip_code': zip_code,
                'city': city,
                'country': country,
                'email': email,
                'name': name,
                'notes': notes ? notes : ''
            }

            let params = new URLSearchParams(formData);

            let extraData = {
                total: totalDelivery,
                deliveryfee: deliveryfee,
            };

            formData = Object.assign(formData, extraData);

            fetch(`assets/config/stripe_server.php?${params}`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'appliication/json'
                    },
                    body: JSON.stringify(formData)
                }).then(response => response.json())
                .then(data => {
                    stripe = Stripe("<?php echo $_ENV['STRIPE_PUBLISHABLE_KEY']; ?>")
                    stripe.redirectToCheckout({
                        sessionId: data.id
                    });
                });
        });
    </script>
</body>

</html>