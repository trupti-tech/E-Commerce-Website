<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="shortcut icon" href="uploads/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="css/style.css">
    <title>Welcome</title>
</head>
<body>
    <?php

        include 'dashboardheader.php';
        include 'conn.php';
        $id = $_GET['id'];
    ?>
    
    <h1 id="heading" class="text-white mt-10 mb-4 underline text-5xl font-extrabold leading-none tracking-tight uppercase text-gray-900 text-center">Total Stock</h1>
    <div class="overflow-x-auto">
        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Category</th>
                <th>Name</th>
                <th>Price</th>
                <th>Stock</th>
            </tr>
            </thead>
            <tbody>
    <?php
        if($id == 0){
            $sql = "SELECT * FROM product WHERE stock = 0";
            $category_sql = "SELECT * from category";
            $stmt = $conn->prepare($sql);
            $category_stmt = $conn->prepare($category_sql);

            $stmt->execute();
            $category_stmt->execute();
            
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $categories = $category_stmt->fetchAll(PDO::FETCH_ASSOC);

            if(count($result) == 0){
                echo "<h1 class='text-white mt-10 mb-4 text-2xl font-extrabold leading-none tracking-tight uppercase text-gray-900 text-center'>All Products are in stock right now</h1>";
            }
        else{
            foreach($result as $r){
                $pid = $r['product_id'];
                $name = $r['product_name'];
                $price = $r['price'];
                $stock = $r['stock'];
                $cid = $r['category_id'];
                $category = $categories[$cid-1];
    ?>
            <tr class="hover cursor-pointer">
                <th><?= $pid ?></th>
                <td><?= $category['category_name'] ?></td>
                <td><?= $name ?></td>
                <td><?= $price ?></td>
                <td><?= $stock ?></td>
            </tr>
    <?php
            }
        }
    ?>
    <?php
        }
        else{
            $sql = "SELECT * FROM product WHERE category_id = $id";
            $category_sql = "SELECT * from category";
            $stmt = $conn->prepare($sql);
            $category_stmt = $conn->prepare($category_sql);
            
            $stmt->execute();
            $category_stmt->execute();
            
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $categories = $category_stmt->fetchAll(PDO::FETCH_ASSOC);
            if(count($result) == 0){
                echo "<h1 class='text-white mt-10 mb-4 text-2xl font-extrabold leading-none tracking-tight uppercase text-gray-900 text-center'>There is no stock of these category right now</h1>";
            }
            else{
                foreach($result as $r){
                    $pid = $r['product_id'];
                    $name = $r['product_name'];
                    $price = $r['price'];
                    $stock = $r['stock'];
                    $cid = $r['category_id'];
                    $category = $categories[$cid-1];
        ?>
                <tr class="hover cursor-pointer">
                    <th><?= $pid ?></th>
                    <td><?= $category['category_name'] ?></td>
                    <td><?= $name ?></td>
                    <td><?= $price ?></td>
                    <td><?= $stock ?></td>
                    
                </tr>
        <?php
                }
            }
        }
        ?>
            </tbody>
        </table>
    </div>
    

    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.9.0/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>
</html>