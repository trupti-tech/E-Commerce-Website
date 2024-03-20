<?php

    include 'conn.php';

    $id = $_GET['oid'];

    $sql = "DELETE FROM orders WHERE order_id = $id";
    $stmt = $conn->prepare($sql);

    $result = $stmt->execute();

    if($result){
        echo "<script>
            alert('Removed from Orders')
            window.location.replace('./orders.php')
            </script>";
    }
    else{
        echo "<script>
            alert('Some error occured')
            window.location.replace('./orders.php')
            </script>";
    }
?>