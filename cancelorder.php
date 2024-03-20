<?php

    include 'conn.php';

    $id = $_GET['oid'];

    try{
        $sql = "DELETE FROM orders WHERE order_id = $id AND STATUS <> 'Out for delivery'";
        $stmt = $conn->exec($sql);

        if($stmt){
            echo "<script>
                alert('Removed from Orders')
                window.location.replace('./orders.php')
                </script>";
        }
        else{
            echo "<script>
                alert('This order cannot be cancelled, since it is out for delievery')
                window.location.replace('./orders.php')
                </script>";

        }
    }
    catch(PDOException $e){
        echo "<script>
            alert('Some error occured')
            window.location.replace('./orders.php')
            </script>";
    }
?>