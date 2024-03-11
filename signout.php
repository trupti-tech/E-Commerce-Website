<?php
    session_start();
    session_unset();

    echo "
        <script>
            alert('You have been logged out');
            window.location.replace('./index.php');
        </script>";
?>