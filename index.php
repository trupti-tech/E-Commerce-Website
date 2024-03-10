<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>
<body>
    <form action="#" method="POST">
        <label for="name">Name:</label>
        <input type="name" name="name" id="name">
        <label for="email">Email:</label>
        <input type="email" name="email" id="email">
        <label for="password">Password:</label>
        <input type="password" name="password" id="password">
        <input type="submit" name="submit" value="Login">
    </form>
</body>
</html>
<?php
    include 'conn.php';

    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $sql = "INSERT INTO users (name, email_id, password) values (?, ?,  ?)";
        $stmt = $conn->prepare($sql);
    
        $stmt->execute([$name, $email, $password]);
    }
    else{
        echo "Some error occured. Please try again.";
    }

?>
