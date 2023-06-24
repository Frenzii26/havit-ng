<?php
    include_once 'db_con.php';
    include "../includes/sessions.php";

    if(isset($_GET['addCart'])){
        if(!isset($_SESSION['id'])){
            header('Location: ../../login-signin');
        }else{
            $add = $_GET['addCart'];
            $user = $_SESSION['id'];
            $quantity = "1";
            $status = "0";
            // echo $_SERVER['HTTP_REFERER'];

            $productPrice = getName($connectDB,"price","tbl_products","product_id",$add);

            $total = intval($productPrice) * intval($quantity);
            $total = strval($total);

           
            $sql = "SELECT * FROM tbl_cart WHERE user = '$user' AND product_id = '$add' AND order_status = '0' ORDER BY _id DESC";
            $query = mysqli_query($connectDB, $sql);
            
            if(mysqli_num_rows($query) > 0){
                $row = mysqli_fetch_assoc($query);
                
    
                $quantity = intval($row['quantity']);
                $quantity  += 1;

                $total = intval($productPrice) * intval($quantity);
                $total = strval($total);
                $sql = "UPDATE tbl_cart SET quantity = '$quantity', total = '$total' WHERE user = '$user' AND product_id = '$add' AND order_status = '0'";
                $query = mysqli_query($connectDB, $sql);
                if ($query) {
                    $_SESSION['successmessage'] =  "Added to Cart";
                    header("Location:".$_SERVER['HTTP_REFERER']);
                }else{
                        $_SESSION['errormessage'] =  "Failed to add to Cart";
                        header("Location:".$_SERVER['HTTP_REFERER']);
                }

            }else{
                $sql = "INSERT INTO tbl_cart(user,product_id,quantity,total,order_status) VALUES(?,?,?,?,?)";
                // Initialize Database Connection
                $stmt = mysqli_stmt_init($connectDB);
                // Prepare SQL statement
                mysqli_stmt_prepare($stmt,$sql);
                // Bind parameters to the placeholder
                mysqli_stmt_bind_param($stmt,"sssss",$user,$add,$quantity,$total,$status);
                // Execute statement
                if (mysqli_stmt_execute($stmt)) {
                    $_SESSION['successmessage'] =  "Added to Cart";
                    header("Location:".$_SERVER['HTTP_REFERER']);
                }else{
                        $_SESSION['errormessage'] =  "Failed to add to Cart";
                        header("Location:".$_SERVER['HTTP_REFERER']);
                }
            }
        }
        
    }
    elseif(isset($_POST['addToCart'])){
        if(!isset($_SESSION['id'])){
            header('Location: ../../login-signin');
        }else{
            $add = $_POST['product'];
            $user = $_SESSION['id'];
            $quantity = $_POST['qty'];
            $status = "0";
            // echo $_SERVER['HTTP_REFERER'];

            $productPrice = getName($connectDB,"price","tbl_products","product_id",$add);

            $total = intval($productPrice) * intval($quantity);
            $total = strval($total);

           
            $sql = "SELECT * FROM tbl_cart WHERE user = '$user' AND product_id = '$add' AND order_status = '0' ORDER BY _id DESC";
            $query = mysqli_query($connectDB, $sql);
            
            if(mysqli_num_rows($query) > 0){
                $row = mysqli_fetch_assoc($query);
                
    
                $quantity = intval($row['quantity']);
                $quantity  += 1;

                $total = intval($productPrice) * intval($quantity);
                $total = strval($total);
                $sql = "UPDATE tbl_cart SET quantity = '$quantity', total = '$total' WHERE user = '$user' AND product_id = '$add' AND order_status = '0'";
                $query = mysqli_query($connectDB, $sql);
                if ($query) {
                    $_SESSION['successmessage'] =  "Added to Cart";
                    header("Location:".$_SERVER['HTTP_REFERER']);
                }else{
                        $_SESSION['errormessage'] =  "Failed to add to Cart";
                        header("Location:".$_SERVER['HTTP_REFERER']);
                }

            }else{
                $sql = "INSERT INTO tbl_cart(user,product_id,quantity,total,order_status) VALUES(?,?,?,?,?)";
                // Initialize Database Connection
                $stmt = mysqli_stmt_init($connectDB);
                // Prepare SQL statement
                mysqli_stmt_prepare($stmt,$sql);
                // Bind parameters to the placeholder
                mysqli_stmt_bind_param($stmt,"sssss",$user,$add,$quantity,$total,$status);
                // Execute statement
                if (mysqli_stmt_execute($stmt)) {
                    $_SESSION['successmessage'] =  "Added to Cart";
                    header("Location:".$_SERVER['HTTP_REFERER']);
                }else{
                        $_SESSION['errormessage'] =  "Failed to add to Cart";
                        header("Location:".$_SERVER['HTTP_REFERER']);
                }
            }
        }
        
    }
    elseif (isset($_GET['addQty'])) {
        $id = intval($_GET['addQty']);
        $qty = intval($_GET['qty']);
        $user = $_GET['u'];
        
        $sql = "SELECT * FROM tbl_cart WHERE _id = '$id'";
        $query = mysqli_query($connectDB,$sql);
        $row = mysqli_fetch_assoc($query);
        $reQty = intval($row['quantity']);
        $pid = $row['product_id'];
        
        
        $sql = "SELECT * FROM tbl_products WHERE product_id = '$pid'";
        $query = mysqli_query($connectDB,$sql);
        $row = mysqli_fetch_assoc($query);
        $price = $row['price'];

        
        $reQty += 1;

        $subTotal = intval($price) * $reQty;

        $sql = "UPDATE tbl_cart SET quantity = '$reQty', total = '$subTotal' WHERE _id = '$id'";
        $query = mysqli_query($connectDB,$sql);
        
        //Get Grand total 
        $sql = "SELECT SUM(total) AS grand_total FROM tbl_cart WHERE user = '$user' AND order_status = '0'";
        $query = mysqli_query($connectDB,$sql);
        $row = mysqli_fetch_assoc($query);

       $grandtotal = $row['grand_total'];
        $return = array(
            "qty"=>$reQty,
            "subTotal"=> $subTotal,
            "grandTotal" => $grandtotal
        );
        $return = json_encode($return);
        echo $return;
    }
    elseif (isset($_GET['subQty'])) {
        $id = intval($_GET['subQty']);
        $qty = intval($_GET['qty']);
        $user = $_GET['u'];
        
        $sql = "SELECT * FROM tbl_cart WHERE _id = '$id'";
        $query = mysqli_query($connectDB,$sql);
        $row = mysqli_fetch_assoc($query);
        $reQty = intval($row['quantity']);
        $pid = $row['product_id'];
        
        
        $sql = "SELECT * FROM tbl_products WHERE product_id = '$pid'";
        $query = mysqli_query($connectDB,$sql);
        $row = mysqli_fetch_assoc($query);
        $price = $row['price'];

        
        $reQty -= 1;

        $subTotal = intval($price) * $reQty;

        $sql = "UPDATE tbl_cart SET quantity = '$reQty', total = '$subTotal' WHERE _id = '$id'";
        $query = mysqli_query($connectDB,$sql);
        
        //Get Grand total 
        $sql = "SELECT SUM(total) AS grand_total FROM tbl_cart WHERE user = '$user' AND order_status = '0'";
        $query = mysqli_query($connectDB,$sql);
        $row = mysqli_fetch_assoc($query);

       $grandtotal = $row['grand_total'];
        $return = array(
            "qty"=>$reQty,
            "subTotal"=> $subTotal,
            "grandTotal" => $grandtotal
        );
        $return = json_encode($return);
        echo $return;
    }
    elseif (isset($_GET['removeCart'])) {
        $id = $_GET['removeCart'];

        $sql = "DELETE FROM tbl_cart WHERE _id = '$id'";
        $query = mysqli_query($connectDB,$sql);
        if ($query) {
            $_SESSION['successmessage'] =  "Item has been removed from cart";
            header("Location:".$_SERVER['HTTP_REFERER']);
        }else{
                $_SESSION['errormessage'] =  "Failed to add to Cart";
                header("Location:".$_SERVER['HTTP_REFERER']);
        }
    }

    elseif(isset($_POST['checkout'])){
        $oid = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
        $oid = str_shuffle($oid);
        $oid = substr($oid, 3, 13);
        $id = $_SESSION['id'];
        $status = "0";
        $promoCode = $_POST['promocode'];
        $address = $_POST['address'];

        if (empty($_POST['promocode'])) {
            if (empty($_POST['address'])) {
                $_SESSION['errormessage'] =  "Please Add Address";
                header("Location: ../../profile");
            }else{
                $sql = "SELECT * FROM tbl_cart WHERE user = '$id' AND order_status = '0'";
                $query = mysqli_query($connectDB,$sql);
                

                while($row = mysqli_fetch_assoc($query)){
                    $cid = $row['_id'];
                    $uql = "UPDATE tbl_cart SET order_status = '1' WHERE _id = '$cid'";
                    $uquery = mysqli_query($connectDB,$uql);
                    if ($uquery) {
                        $sql = "INSERT INTO tbl_orders(user,order_id,cart_id,user_address,order_status) VALUES(?,?,?,?,?)";
                        // Initialize Database Connection
                        $stmt = mysqli_stmt_init($connectDB);
                        // Prepare SQL statement
                        mysqli_stmt_prepare($stmt,$sql);
                        // Bind parameters to the placeholder
                        mysqli_stmt_bind_param($stmt,"sssss",$id,$oid,$cid,$address,$status);
                        // Execute statement
                        if (mysqli_stmt_execute($stmt)) {
                            $_SESSION['successmessage'] =  "Your order has been placed, you can track your order using the eye icon on the 'orders' page.Thank you for choosing C.I.Pinnacle.";
                            header("Location:".$_SERVER['HTTP_REFERER']);
                        }else{
                            $_SESSION['errormessage'] =  "Failed to place order please try again";
                            header("Location:".$_SERVER['HTTP_REFERER']);
                        }
                       
                    }else{
                        $_SESSION['errormessage'] =  "Failed to place order please try again";
                        header("Location:".$_SERVER['HTTP_REFERER']);
                    }
                }
            }

        }else{
            echo "Promo code";
        }

    }
    elseif (isset($_POST['acceptOrder'])) {
       $id = $_POST['oid'];
       $date = date("Y-m-d");

       $sql = "UPDATE tbl_orders SET order_status = '1', date_updated = '$date' WHERE _id = '$id'";
       $query = mysqli_query($connectDB,$sql);
       if ($query) {
            $_SESSION['successmessage'] =  "Order accepted successfully";
            header("Location:".$_SERVER['HTTP_REFERER']);
       }else{
            $_SESSION['errormessage'] =  "Something went wrong!";
            header("Location:".$_SERVER['HTTP_REFERER']);
       }
    }
    elseif (isset($_POST['shipOrder'])) {
        $id = $_POST['oid'];
        $date = date("Y-m-d");
 
        $sql = "UPDATE tbl_orders SET order_status = '2', date_updated = '$date' WHERE _id = '$id'";
        $query = mysqli_query($connectDB,$sql);
        if ($query) {
             $_SESSION['successmessage'] =  "Order is on route!";
             header("Location:".$_SERVER['HTTP_REFERER']);
        }else{
             $_SESSION['errormessage'] =  "Something went wrong!";
             header("Location:".$_SERVER['HTTP_REFERER']);
        }
     }
     elseif (isset($_POST['deliverOrder'])) {
        $id = $_POST['oid'];
        $date = date("Y-m-d");
 
        $sql = "UPDATE tbl_orders SET order_status = '3', date_updated = '$date' WHERE _id = '$id'";
        $query = mysqli_query($connectDB,$sql);
        if ($query) {
             $_SESSION['successmessage'] =  "Order accepted successfully";
             header("Location:".$_SERVER['HTTP_REFERER']);
        }else{
             $_SESSION['errormessage'] =  "Something went wrong!";
             header("Location:".$_SERVER['HTTP_REFERER']);
        }
     }
     elseif (isset($_POST['cancelOrder'])) {
        $id = $_POST['oid'];
        $date = date("Y-m-d");
 
        $sql = "UPDATE tbl_orders SET order_status = '4', date_updated = '$date' WHERE _id = '$id'";
        $query = mysqli_query($connectDB,$sql);
        if ($query) {
             $_SESSION['successmessage'] =  "Order accepted successfully";
             header("Location:".$_SERVER['HTTP_REFERER']);
        }else{
             $_SESSION['errormessage'] =  "Something went wrong!";
             header("Location:".$_SERVER['HTTP_REFERER']);
        }
     }


    //Main Else
    else{
        // echo "Fuck";
        header('Location: logout');
    }