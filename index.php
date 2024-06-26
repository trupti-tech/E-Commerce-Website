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
        <link href="https://cdn.jsdelivr.net/npm/daisyui@4.9.0/dist/full.min.css" rel="stylesheet" type="text/css" />
    <title>Welcome</title>
</head>
<body>
    <?php
        include 'conn.php';
        include 'header.php';

    ?>

    <!-- Hero Section -->
    <section class="bg-center bg-no-repeat bg-[url('https://flowbite.s3.amazonaws.com/docs/jumbotron/conference.jpg')] bg-gray-700 bg-blend-multiply">
        <div class="px-4 mx-auto max-w-screen-xl text-center py-24 lg:py-40">
            <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-white md:text-5xl lg:text-6xl">Trupti Mart</h1>
            <p class="mb-8 text-lg font-normal text-gray-300 lg:text-xl sm:px-16 lg:px-48">Providing our valuable services to our valuable customers.</p>
            
        </div>
        <div class="categories text-white w-full h-28 flex flex-wrap justify-center content-center gap-20 text-3xl ">
            <div class="rounded-full" title="Men's Fashion">
                <a href="fashion.php?cg=M&c=1"><i class="fa-solid fa-shirt"></i></a>
            </div>
            <div class="rounded-full" title="Women's Fashion">
                <a href="fashion.php?cg=F&c=1"><i class="fa-solid fa-person-dress"></i></a>
            </div>
            <div class="rounded-full" title="Kid's Fashion">
                <a href="fashion.php?cg=K&c=1"><i class="fas fa-child"></i></a>
            </div>
            <div class="rounded-full" title="Food Items">
                <a href="groceries.php?type=Food"><i class="fa-solid fa-utensils"></i></a>
            </div>
            <div class="rounded-full" title="Beverages">
                <a href="groceries.php?type=BG"><i class="fas fa-coffee"></i></a>
            </div>
            <div class="rounded-full" title="Electronic Appliances">
                <a href="devices.php?type=gen"><i class="fas fa-laptop"></i></a>
            </div>
            <div class="rounded-full" title="Gaming Laptop">
                <a href="devices.php?type=Laptop"><i class="fas fa-gamepad"></i></a>
            </div>
            <div class="rounded-full" title="Gift Items and cards">
                <a href="gift.php?c=items"><i class="fa-solid fa-gifts"></i></a>
            </div>
            <div class="rounded-full" title="Books">
                <a href="gift.php?c=books"><i class="fa-solid fa-book-open"></i></a>
            </div>
        </div>
    </section>

    <!-- Related Products -->
    <section class="transition-delay mt-10 ml-5 mb-5">
        <h1 class="uppercase font-bold text-3xl ml-10 text-white">
            <span class="onunderline">Latest Products</span>
        </h1>
        <div class="flex pl-10 pt-10 gap-10 flex-wrap">
            <?php
                $sql = "SELECT * FROM PRODUCT WHERE STOCK > 50 ORDER BY RAND() LIMIT 8";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
    
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
                foreach($result as $r){
                    $product_id = $r['product_id'];
                    $name = $r['product_name'];
                    $price = $r['price'];
                    $image = $r['image_path'];
                    $rating = mt_rand (1*10, 5*10) / 10;
            ?>
                <div class="card w-96 glass">
                    <a href="./product.php?pid=<?= $product_id ?>">
                        <figure><img class="hover:scale-125 transition-all duration-500 p-5 rounded-md" src="<?= $image ?>" alt="Product Image"/></figure>
                    </a>
                <div class="card-body">
                    <h2 class="card-title"><?= $name ?></h2>
                    <div class="card-actions justify-between">
                        <span class="text-2xl text-white">₹ <?= $price ?></span>
                        <a href="./addtocart.php?id=<?= $product_id ?>" class="btn btn-primary">Add to Cart</a>
                    </div>
                </div>
                </div>
    
            <?php
                }
            ?>
        </div>
    </section>
    

    <?php
        include 'footer.php';
    ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>
</html>

