<?php

    include 'conn.php';

    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
    }
    else{
        echo "Some error occured. Please try again.";
    }

    $sql = "INSERT INTO users (email_id, name, password) values (?, ?,  ?)";
    $stmt = $conn->prepare($sql);

    $stmt->execute([$name, $email, $password]);

?>