<?php

    include 'conn.php';
    session_start();

    if(isset($_SESSION['login'])){
        $product_id = $_GET['id'];
        $user_email = $_SESSION['email'];

        $sql = "INSERT INTO CART (product_id, user_email) VALUES (?, ?)";
        $stmt = $conn->prepare($sql); 
        $stmt->bindParam(1, $product_id);
        $stmt->bindParam(2, $user_email);
        
        $stmt->execute();
        echo "<script>
            alert('Added to cart')
            window.location.replace('cart.php')
            </script>";
    }
    else{
        echo "<script>
            alert('You have to login to continue the process')
            window.location.replace('./login.php')
            </script>";
    }

?>