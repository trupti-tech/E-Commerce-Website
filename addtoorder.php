<?php

    include 'conn.php';
    session_start();

    $pid = $_GET['pid'];
    $tid = $_GET['tid'];

    if(isset($_SESSION['login'])){
        date_default_timezone_set("Asia/Kolkata");

        $product_id = $_GET['pid'];
        $user_email = $_SESSION['email'];
        $curren_date_time = date("Y-m-d h:i:s");
        $status = 'Order processing';

        $sql = "INSERT INTO orders (product_id, email_id, transaction_time, status) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql); 
        $stmt->bindParam(1, $product_id);
        $stmt->bindParam(2, $user_email);
        $stmt->bindParam(3, $curren_date_time);
        $stmt->bindParam(4, $status);
        
        $stmt->execute();

        if($tid != "new"){
            $sql = "DELETE FROM cart WHERE id = $tid AND product_id = $pid";
            $stmt = $conn->exec($sql);
        }
        else{
            
        }

        if($stmt){
            echo "<script>
                alert('Added to orders')
                window.location.replace('./orders.php')
                </script>";
            }
        else{
            echo "<script>
                alert('Some error occurred')
                window.location.replace('./cart.php')
                </script>";
            
        }
    }
    else{
        echo "<script>
            alert('You have to login to continue the process')
            window.location.replace('./login.php')
            </script>";
    }

?>