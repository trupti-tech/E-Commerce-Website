<?php

    include 'conn.php';
    $id = $_GET['id'];

    $sql = "SELECT * FROM product WHERE product_id = $id";
    $result = $conn->prepare($sql);
    $result->execute();

    $result = $result->fetch(PDO::FETCH_ASSOC);

    $name = $result['product_name'];

?>


