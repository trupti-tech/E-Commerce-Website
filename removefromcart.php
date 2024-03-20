<?php

    include 'conn.php';

    $id = $_GET['id'];

    $sql = "DELETE FROM cart WHERE id = $id";
    $stmt = $conn->prepare($sql);

    $result = $stmt->execute();

    if($result){
        echo "<script>
            alert('Removed from Cart')
            window.location.replace('./cart.php')
            </script>";
    }
    else{
        echo "<script>
            alert('Some error occured')
            window.location.replace('./cart.php')
            </script>";
    }
?>