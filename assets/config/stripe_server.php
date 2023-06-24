<?php

use Geevic\Item;

require "../includes/sessions.php";
require "db_con.php";

cartAuth();

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $sql = "SELECT * FROM tbl_products";
    $result = $connectDB->query($sql);
    if ($result->num_rows) {
        $array = array();
        while ($row = $result->fetch_assoc()) {
            array_push($array, new Item($row['product_id'], $row['product_name'], $row['price'], $row['details']));
        }

        echo json_encode($array);
    } else echo "Something went wrong. Try again later!!!";
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $data = json_decode(trim(file_get_contents('php://input')));

    \Stripe\Stripe::setApiKey($_ENV['STRIPE_SECRET_KEY']);

    try {
        $session = \Stripe\Checkout\Session::create([
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => 'usd',
                        'unit_amount' => $data->total * 100,
                        'product_data' => [
                            'name' => 'GEEVIC STORE',
                            'description' => $data->notes ? $data->notes : 'Thank you!',
                        ],
                    ],
                    'quantity' => 1,
                ]
            ],
            'customer_email' => $data->email,
            'billing_address_collection' => 'required',
            'payment_method_types' => ['card'],
            'mode' => 'payment',
            'success_url' => DOMAIN . '/success.php?status=success',
            'cancel_url' => DOMAIN . '/failure.php?status=failure',
        ]);
    } catch (Exception $e) {
        $api_error = $e->getMessage();
    }

    if (empty($api_error) && $session) {
     
        // save order information
        $orderId = '';

        for ($i = 0; $i < 10; $i++) {
            $digit = mt_rand(0, 9); // Generates a random digit between 0 and 9
            $orderId .= $digit;
        }

        $_SESSION['order_id'] = $orderId;
        
        $userId = $_SESSION['id'];
        $totalAmount = $data->total;
        $user_address_id = $data->user_address_id;
        $deliveryfee = $data->deliveryfee;

        $sql = "INSERT INTO tbl_orders(user_id, order_id, total_amount, user_address_id, order_status,deliveryfee) VALUES('$userId', '$orderId', '$totalAmount', '$user_address_id', 'pending','$deliveryfee')";
        // Execute the SQL query
       
        if (mysqli_query($connectDB, $sql)) {
            // Save the order items to the database
     
            foreach ($_SESSION['cart'] as $item) {
              
                $productId = $item['product_id'];
                $quantity = $item['quantity'];
                $total = $item['total'];
               
                // Prepare the SQL query to insert the order item into the database
                $iSql = "INSERT INTO order_items(order_id, product_id, quantity, price) VALUES('$orderId', '$productId', '$quantity', '$total')";
                // Execute the SQL query
              
                mysqli_query($connectDB, $iSql);
                     
            }

            $response = array(
                'status' => 1,
                'message' => 'Checkout Session created successfully!',
                'orderMessage' => 'Order saved successfully.!',
                'id' => $session->id
            );
        } else {
            $response = array(
                'status' => 1,
                'message' => 'Checkout Session created successfully!',
                'orderMessage' => "Error saving the order: " . mysqli_error($connectDB),
                'id' => $session->id
            );
            exit;
        }
        // Close the database connection
        mysqli_close($connectDB);
    } else {
        $response = array(
            'status' => 0,
            'error' => array(
                'message' => 'Checkout Session creation failed! ' . $api_error
            )
        );
    }

    echo json_encode($response);
}
