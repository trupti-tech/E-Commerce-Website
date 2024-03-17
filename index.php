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
                <a href="food.php"><i class="fa-solid fa-utensils"></i></a>
            </div>
            <div class="rounded-full" title="Beverages">
                <a href="beverages.php"><i class="fas fa-coffee"></i></a>
            </div>
            <div class="rounded-full" title="Electronic Appliances">
                <a href="smartdevices.php"><i class="fas fa-laptop"></i></a>
            </div>
            <div class="rounded-full" title="Toys">
                <a href="gift.php?c=toys"><i class="fas fa-gamepad"></i></a>
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
    <section class="transition-delay mt-5 ml-5">
        <h1 class="uppercase font-bold text-3xl">
            <span class="onunderline">Related Products</span>
        </h1>
    </section>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>
</html>

