<?php
    include 'conn.php';

    if(isset($_POST['login'])){
        $email = $_POST['email'];
        $pwd = $_POST['pwd'];

        $query = "SELECT * FROM users WHERE email_id = '$email' AND password = '$pwd'";

        $stmt = $conn->prepare($query);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if($result){
            session_start();
            $_SESSION['login'] = true;
            $_SESSION['id'] = $result['id'];
            $_SESSION['name'] = $result['name'];
            $_SESSION['email'] = $result['email_id'];
            header("Location: index.php");
        }
        else{
            echo "<script>
            alert('Invalid Credentials')
            window.location.replace('./login.php')
            </script>";
        }        
        
    }
    if(isset($_POST['register'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $pwd = $_POST['pwd'];
        $conf_pwd = $_POST['conf_pwd'];
        
        if($pwd == $conf_pwd){
            $query = "SELECT * FROM users WHERE email_id = '$email'";
            $stmt = $conn->prepare($query);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if($result){
                echo "<script>
                alert('Email already exists. Please Login')
                window.location.replace('./login.php')
                </script>";
            }
            else{
                $sql = "INSERT INTO users (name, email_id, password) VALUES (:name, :email, :pwd)";
                
                $data = [
                    ':name' => $name,
                    ':email' => $email,
                    ':pwd' => $pwd
                ];
                
                $stmt = $conn->prepare($sql);
                $stmt->execute($data);
                session_start();
                $_SESSION['login'] = true;
                $_SESSION['name'] = $name;
                $_SESSION['email'] = $email;
                header("Location: index.php");
            }
        }
        else{
            echo "<script>
                    alert('Passwords do not match')
                    window.location.replace('./login.php')
                </script>";
        }
    }
?>