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
        include 'header.php';
        include 'conn.php';
        
        if(isset($_GET['pid'])){
            $pid = $_GET['pid'];

            $sql = "SELECT * FROM product where product_id = :pid";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(":pid", $pid);

            $stmt->execute();

            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            if($result){
                $name = $result["product_name"];
                $brand_name = $result["brand_name"];
                $price = $result["price"];
                $desc = $result["description"];
                $size = $result["size"];
                $stock = $result["stock"];
                $image_path = $result['image_path'];
                $sizes = explode(',', $size);
            }
            else{
                die("No such product found");
            }
        }
        else{
            die("Some error occurred");
        }
    ?>
    <section class="text-gray-400 bg-gray-900 body-font overflow-hidden">
        <div class="container px-5 py-24 mx-auto">
            <div class="lg:w-4/5 mx-auto flex flex-wrap">
            <img alt="ecommerce" class="lg:w-1/2 w-full lg:h-auto h-64 object-cover object-center rounded" src="<?= $image_path ?>">
            <div class="lg:w-1/2 w-full lg:pl-10 lg:py-6 mt-6 lg:mt-0">
                <h2 class="text-sm title-font text-gray-500 tracking-widest">By : <?= $brand_name ?></h2>
                <h1 class="text-white text-3xl title-font font-medium mb-1"><?= $name ?></h1>
                <div class="flex mb-4">
                <span class="flex items-center">
                    <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-indigo-400" viewBox="0 0 24 24">
                    <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
                    </svg>
                    <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-indigo-400" viewBox="0 0 24 24">
                    <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
                    </svg>
                    <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-indigo-400" viewBox="0 0 24 24">
                    <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
                    </svg>
                    <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-indigo-400" viewBox="0 0 24 24">
                    <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
                    </svg>
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-indigo-400" viewBox="0 0 24 24">
                    <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
                    </svg>
                    <span class="ml-3">4 Reviews</span>
                </span>
                <span class="flex ml-3 pl-3 py-2 border-l-2 border-gray-800 text-gray-500 space-x-2"></span>
                </div>
                <p class="leading-relaxed"><?= $desc ?></p>
                <div class="flex flex-col gap-14 mt-6 items-center pb-5 border-b-2 border-gray-800 mb-5">
                <?php
                    if($size != '-'){
                ?>
                <div class="flex mt-6 ml-2 items-center">
                    <span class="mr-3">Size</span>
                    <div class="relative">
                    <select class="rounded border border-gray-700 focus:ring-2 focus:ring-indigo-900 bg-transparent appearance-none py-2 focus:outline-none focus:border-indigo-500 text-gray pl-3 pr-10">
                        <?php
                            for($i = 0; $i < count($sizes); $i++){
                                $val = $sizes[$i];
                        ?>
                        <option><?php echo $val ?></option>
                        <?php
                            }
                        ?>
                    </select>
                    <span class="absolute right-0 top-0 h-full w-10 text-center text-gray-600 pointer-events-none flex items-center justify-center">
                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4" viewBox="0 0 24 24">
                        <path d="M6 9l6 6 6-6"></path>
                        </svg>
                    </span>
                    </div>
                </div>
                <?php
                    }
                    else{
                        
                    }
                ?>
                <div class="flex ml-2 items-center">
                    <?php
                        if($stock > 7){
                            $msg = "Stock Available";
                        }
                        elseif($stock < 7 && $stock > 0){
                            $msg = "Very few products available";
                        }
                        else{
                            $msg = "Sorry, we are out of stock.";
                        }
                    ?>
                    <span class="mr-3"><?= $msg ?></span>
                </div>
                <?php
                    if($stock > 0){
                ?>
                <div class="flex items-center">
                        <span class="text-3xl font-bold text-gray-900 dark:text-white">₹ <?php echo $price ?></span>
                        <a href="./addtoorder.php?pid=<?php echo $pid ?>&tid=new" " class="ml-12 text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Order Now</a>
                        
                        <a href="./addtocart.php?id=<?php echo $pid ?>" class="ml-3 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add to Cart</a>
                </div>
                <?php
                    }
                    else{
                ?>
                <div class="flex items-center">
                        <span class="text-3xl font-bold text-gray-900 dark:text-white">₹ <?php echo $price ?></span>
                        <a href="./addtoorder.php?pid=<?php echo $pid ?>&tid=new" class="cursor-not-allowed ml-12 text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Order Now</a>
                        
                        <a href="./addtocart.php?id=<?php echo $pid ?>" class="cursor-not-allowed ml-3 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add to Cart</a>
                </div>
                <?php
                    }
                ?>
            </div>
            </div>
        </div>
    </section>

    <?php
        include 'footer.php';
    ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>
</html>