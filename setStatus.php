<?php

    include 'conn.php';

    $oid = $_GET['oid'];
    $status = $_GET['status'];

    $sql = "UPDATE orders SET status = '$status' WHERE order_id = $oid";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if(!$result){
        echo "<script>
                alert('Changed Status to : $status')
                window.location.replace('./dashboard.php')
            </script>";
        }
    else{
        echo "<script>
                alert('Some error occurred')
                window.location.replace('./dashboard.php')
            </script>";

    }

?>