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

    ?>

    <h1 id="heading" class="mt-10 mb-4 text-3xl ml-10 font-extrabold leading-none tracking-tight uppercase text-gray-900">Pending Orders</h1>
    
    <div class="relative overflow-x-auto shadow-md">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Order ID
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Product ID
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Email ID
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Status
                    </th>
                    <th scope="col" class="px-6 py-3">
                        SET STATUS
                    </th>
                </tr>
            </thead>
            <tbody>

            <?php
                $sql = "SELECT * FROM orders";
                $stmt = $conn->prepare($sql);
                $stmt->execute();

                $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                foreach ($results as $row){
                    $oid = $row['order_id'];
                    $pid = $row['product_id'];
                    $email = $row['email_id'];
                    $status = $row['status'];
                    
            ?>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <?= $oid ?>
                    </th>
                    <td class="px-6 py-4">
                        <?= $pid ?>
                    </td>
                    <td class="px-6 py-4">
                        <?= $email ?>
                    </td>
                    <td class="px-6 py-4">
                        <?= $status ?>
                    </td>
                    <td class="px-6 py-4">
                        <a href="setStatus.php?oid=<?= $oid ?>&status=Dispatched" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Dispatched</a>
                        <a href="setStatus.php?oid=<?= $oid ?>&status=Out for delivery" class="ml-10 font-medium text-blue-600 dark:text-blue-500 hover:underline">Out for delivery</a>
                        <a href="setStatus.php?oid=<?= $oid ?>&status=Delievered" class="ml-10 font-medium text-blue-600 dark:text-blue-500 hover:underline">Delievered</a>
                    </td>
                </tr>

            <?php
                }
            ?>
            </tbody>
        </table>
    </div>

    

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>
</html>